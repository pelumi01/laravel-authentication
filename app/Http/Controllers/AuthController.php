<?php

namespace App\Http\Controllers;

use App\Enums\ResponseCode\AuthResponseCode;
use App\Http\Requests\auth\CreateAccountRequest;
use App\Http\Requests\auth\ForgotPasswordRequest;
use App\Http\Requests\auth\LoginRequest;
use App\Http\Requests\auth\VerifyEmailRequest;
use App\services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function createAccount(CreateAccountRequest $request) {
        try {
            AuthService::createAccount($request->validated());
            return response(["message" => "User successfully created", "status" => 200, "code" => 00], 200);
        }catch (\Exception $exception){
            return response(['message'=> $exception->getMessage(), 'status' => $exception->getCode(), 'code' => -1], 400);
        }
    }

    public function login(LoginRequest $request) {
        try {
            $res = AuthService::Login($request->validated());
            return response([
                "token" => $res['token'],
                "data" => $res['data'],
                "message" => "User request successful", "status" => 200, "code" => 00
            ], 200);
        }catch (\Exception $exception){
            return response(['message'=> $exception->getMessage(), 'status' => $exception->getCode(), 'code' => -1], 400);
        }
    }

    public function verifyEmail(VerifyEmailRequest $request) {
        try {
            AuthService::verifyEmail($request->validated());
            return response([
                "message" => "Email successfuly verified", "status" => 200, "code" => 00
            ], 200);
        }catch (\Exception $exception){
            return response(['message'=> $exception->getMessage(), 'status' => $exception->getCode(), 'code' => -1], 400);
        }
    }

    public function forgotPassword(ForgotPasswordRequest $request) {
        try {
            AuthService::forgotPassword($request->validated()["email"]);
            return response(["message" => "A reset link has been sent to your mail account", "status"=> 200, "code" => 00], 200);
        }catch (\Exception $exception){
            return response(['message'=> $exception->getMessage(), 'status' => $exception->getCode(), 'code' => -1], 400);
        }
    }

    public function resetPassword(ForgotPasswordRequest $request) {
        try {
            AuthService::forgotPassword($request->validated());
            return response(["message" => "A reset link has been sent to your mail account", "status"=> 200, "code" => 00], 200);
        }catch (\Exception $exception){
            return response(['message'=> $exception->getMessage(), 'status' => $exception->getCode(), 'code' => -1], 400);
        }
    }
}
