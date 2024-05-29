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
        $this->authorizor = $authorizor;
    }

    public function index(Request $request)
    {
        $email = $request->input('email');
        $senha = $request->input('senha');
        $valida_login = $this->validate_login($email, $senha);
        if ($valida_login['status']) {
            return redirect('/home');
        }
        return $valida_login['msg'];
    }

    public function validate_login($email, $senha)
    {
        $user = User::where("email", $email)->first();

        if ($user) {
            if (Hash::check($senha, $user->senha)) {
                echo $this->authorizor->authorizeCurrentUser($user);
                return ['status' => true, "msg" => 'Sucesso. Seja bem vindo!'];
            } else {
                return ['status' => false, "msg" => 'Email ou senha não coincidem.'];
            }
        } else {
            return ['status' => false, "msg" => 'Usuário não cadastrado.'];
        }
    }
}
