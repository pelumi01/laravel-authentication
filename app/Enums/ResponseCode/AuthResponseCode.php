<?php

namespace App\Enums\ResponseCode;

enum AuthResponseCode: int
{
    case AUTH_REQUEST_SUCCESSFUL = 1000;
    case AUTH_REQUEST_FAILED = 1001;
    case AUTH_REQUEST_VALIDATION_ERROR = 1002;
    case INVALID_AUTHORIZATION = 1003;

    public function toString()
    {
        return match ($this) {
            self::AUTH_REQUEST_SUCCESSFUL => [
                'status' => 200,
                'message' => $this->name,
                'response_code' => "00",
            ],
            self::AUTH_REQUEST_FAILED => [
                'status' => 400,
                'message' => $this->name,
            ],
            self::AUTH_REQUEST_VALIDATION_ERROR => [
                'status' => 400,
                'message' => $this->name,
            ],
            self::INVALID_AUTHORIZATION => [
                'status' => 400,
                'message' => $this->name,
            ],
            self::INVALID_OTP_TOKEN => [
                'status' => 400,
                'message' => $this->name,
            ],
        };
    }
}
