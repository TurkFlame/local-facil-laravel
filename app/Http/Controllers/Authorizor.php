<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Authorizor extends Controller
{
    public function authorizeCurrentUser($user)
    {
        Auth::user();
    }
}
