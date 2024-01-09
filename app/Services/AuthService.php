<?php
namespace App\Services;

use App\Mail\ForgotPasswordMail;
use App\Mail\VerifyEmailMail;
use App\Models\Otp;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Mockery\Exception;

class AuthService {
    public static function createAccount(array $data) {
        $user = User::where("email", $data['email'])->orWhere("phone", $data["phone"])->first();
        $data["password"] = bcrypt($data["password"]);
        if ($user) throw new \Exception("User already exist", 400);

        DB::beginTransaction();

        try {
           $user =  User::firstOrCreate(
                ["email" => $data['email']],
                $data
            );

            self::sendVerificationEmail($user->email);

            DB::commit();
        }
        catch (Exception $e){
            throw new \Exception("Unable to create user", 400);
        }
    }

    public static function sendVerificationEmail($email) {
        $otp = mt_rand(1000, 9999);

        $user = User::where("email", $email)->first();

        if(!$user) throw new \Exception("User not found", 400);

        Otp::create([
            "action" => "verify_email",
            "username" => $user->email,
            "otp" => $otp
        ]);

        //Send mail
        Mail::to($user->email)->send(new VerifyEmailMail([
            "name" => $user->firstname,
            "otp" => $otp
        ]));
    }

    public static function verifyEmail(array $data) {
        $user = User::where("email", $data['username'])->first();
        $otp = Otp::where(["action" => "verify_email", "username" => $data['username'], "otp" => $data['otp']])->first();

        if(!$user) throw new \Exception("User not found", 400);
        if(!$otp) throw new \Exception("Invalid otp", 400);

        $user->email_verified_at = Carbon::now();
        $user->save();

        $otp->delete();
    }

    public static function login(array $data) {
        $user = User::where("email", $data["email"])->first();

        if (!$user || !Hash::check($data["password"], $user->password)){
            throw new \Exception("The provided credentials are incorrect.", 400);
        }

        if ($user->email_verified_at == null) {
            self::sendVerificationEmail($data["email"]);

            throw new \Exception("Please verify your email", 400);
        };

        return [
            "token" => $user->createToken($user->email)->plainTextToken,
            "data" => $user,
        ];
    }

    public static function forgotPassword( $email) {
        $user = User::where("email", $email)->first();

        if(!$user) throw new \Exception("User not found", 400);

        $user->remember_token = random_int(10000,99999) . Str::random(8) . random_int(10000,999999);
        $user->save();

        //Send mail
        Mail::to($user->email)->send(new ForgotPasswordMail([
            "name" => $user->firstname,
            "link" => env('AUTH_SYSTEM_URL')."/reset-password/".$user->remember_token
        ]));

    }

    public static function resetPassword(array $data) {
        $user = User::where('remember_token', $data['token'])->first();

        if(!$user) throw new \Exception("Token has expired.", 400);

        $user->password = bcrypt($data["password"]);
        $user->remember_token = Str::random(5) . random_int(99999,999999);
        $user->save();
    }
}