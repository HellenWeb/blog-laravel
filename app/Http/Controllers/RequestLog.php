<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestPost;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RequestLogin;

class RequestLog extends Controller
{
    public function Register(RequestPost $req)
    {
        $users = new Users();

        $users->email = $req->input('email');
        $users->password = $req->input('password');

        $users->save();

        return response()->json([
            "msg" => "You have successfully registered",
        ]);
    }
    public function Login(Request $req)
    {
        $this->validate($req, [
            'email' => 'bail|required|email',
            'password' => 'bail|required|min:6'
        ]);
        
        if (Auth::attempt(['email' => $req->email, 'password' => $req->password]))
        {
            return response()->json([
                "message" => "You are login in",
            ]);
        } else {
            return response()->json([
                "message" => "Incorrect data",
            ], 401);
        }
    }
}
