<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestPost;
use App\Models\Users;

class RequestLog extends Controller
{
    public function Register(RequestPost $req)
    {
        $users = new Users();

        $users->email = $req->input('email');
        $users->password = $req->input('password');

        $users->save();

        return redirect()->route("/");
    }
}
