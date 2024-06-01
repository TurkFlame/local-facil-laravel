<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function createUserSession($email, $name)
    {
        session()->put('email', $email);
        session()->put('name', $name);
        session()->put('id', User::where('email', $email)->first()->id);
    }

    public function destroyUserSession(Request $request)
    {
        session()->forget('email');
    }
}
