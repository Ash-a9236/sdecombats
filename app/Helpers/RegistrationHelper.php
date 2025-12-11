<?php

namespace App\Helpers;

class RegistrationHelper {
    private static ?string $cachedCode = null;

    //generates random 6 length code
    private static function generateCode (int $length): string {
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $code = '';

        for ($i = 0; $i < $length; $i++) {
            $code .= $chars[random_int(0, strlen($chars) - 1)];
        }

        return $code;
    }
}
