<?php

namespace App\Amyservices;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Str;

class PasswordService
{
    function generateRandomString($length = 8) {
        $characters = 'avczr';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

}
