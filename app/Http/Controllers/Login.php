<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Authorizor;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Hash;


class Login extends Controller
{
    protected $authorizor;
    protected $sessionController;

    public function __construct(Authorizor $authorizor, SessionController $sessionController)
    {
        $this->authorizor = $authorizor;
        $this->sessionController = $sessionController;
    }

    public function index(Request $request)
    {
        $email = $request->input('email');
        $senha = $request->input('senha');
        $valida_login = $this->validate_login($email, $senha);
        if ($valida_login['status']) {
            $user = User::where("email", $email)->first();
            $this->sessionController->createUserSession($email, $user->nome);
            return redirect('/home');
        }
        return $valida_login;
    }

    public function validate_login($email, $senha)
    {
        $user = User::where("email", $email)->first();

        if ($user) {
            if (Hash::check($senha, $user->senha)) {
                $this->authorizor->authorizeCurrentUser($user);
                return ['status' => true, "msg" => 'Sucesso. Seja bem vindo!'];
            }
            return ['status' => false, "msg" => 'Email ou senha não coincidem.'];
        }
        return ['status' => false, "msg" => 'Usuário não cadastrado.'];
    }

}
