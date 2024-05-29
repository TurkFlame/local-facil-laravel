<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Authorizor;
use Illuminate\Support\Facades\Hash;


class Login extends Controller
{
    protected $authorizor;

    public function __construct(Authorizor $authorizor)
    {
        $this->authorizor = $authorizor; // Correctly injected via constructor
    }

    public function validate_login(Request $request)
    {
        $email = $request->input('email');
        $senha = $request->input('senha');
        $user = User::where("email", $email)->first();

        if ($user && Hash::check($senha, $user->senha)) { // Simplified password check (not recommended for production)
            $this->authorizor->authorizeCurrentUser($user);
            return redirect('home'); // Example redirection
        } else {
            return back()->withErrors(['email' => 'Invalid credentials.'])->withInput(); // Example error handling
        }
    }
}
