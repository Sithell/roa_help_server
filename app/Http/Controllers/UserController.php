<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    function create(Request $request) {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::whereEmail($email)->first();
        if (!is_null($user)) {
            return self::jsonResponse([], 400, "User already exists");
        }
        $user = new User();
        $user->email = $email;
        $user->password = $password;
        $code = Str::random(40);
        $user->confirmation_code = $code;
        $user->save();
        return self::jsonResponse(["confirmation_code" => $code], 201, "Check your email");
    }

    function confirm(Request $request) {
        $email = $request->input('email');
        $code = $request->input('confirmation_code');
        $user = User::whereEmail($email)->first();
        if ($user == null) {
            return self::jsonResponse([], 404, "User not found");
        }
        if ($user->confirmation_code == $code) {
            $user->confirmation_code = null;
            $token = Str::random(80);
            $user->api_token = $token;
            $user->save();
            return self::jsonResponse(["token" => $token]);
        }
        return self::jsonResponse([], 401, "Incorrect confirmation code");
    }

    function getToken(Request $request) {
        $email = $request->input('email');
        $password = $request->input('password');
        $user = User::whereEmail($email)->first();
        if (is_null($user)) {
            return self::jsonResponse([], 404, "User not found");
        }
        if ($user->password != $password) {
            return self::jsonResponse([], 401, "Incorrect password");
        }
        $token = Str::random(80);
        $user->api_token = $token;
        $user->save();
        return self::jsonResponse(["token" => $token]);
    }

    function index(Request $request) {
        return self::jsonResponse(User::whereApiToken($request->input("token"))->first());
    }
}
