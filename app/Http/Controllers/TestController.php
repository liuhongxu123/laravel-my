<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class TestController extends Controller
{
    public function hello()
    {
        return response()->json([
            'code' => 0,
            'message' => 'success',
            'data' => [
                'hello' =>'hello world'
            ]
        ]);
    }

    public function login()
    {
        $User = new User();
        $User->name = str_random(10);
        $User->password = password_hash('1111111', 1);
        $User->email = $User->name.'@test.com';
        $User->save();
        $token = auth()->login($User);
        return response()->json([
            'code' => 0,
            'message' => 'token generate success',
            'data' => [
                'token' => $token
            ]
        ]);
    }

    public function info()
    {
        $User = auth()->user();
        return response()->json([
            'code' => 0,
            'message' => 'get user_info success',
            'data' => [
                'test' => $User
            ]
        ]);
    }
}
