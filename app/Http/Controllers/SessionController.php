<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function createUserSession($email, $name)
    {
        session()->put('email', $email);
        session()->put('name', $name);
    }

    public function destroyUserSession(Request $request)
    {
        session()->forget('email');
    }
}
