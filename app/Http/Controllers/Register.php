<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use GuzzleHttp\Client;

class Register extends Controller
{
   protected $login;
   public function __construct(Login $login)
   {
      $this->login = $login;
   }

   public function index(Request $request)
   {
      $nome = $request->input("nome");
      $email = $request->input("email");
      $confirmar_senha = $request->input("confirmarSenha");
      $senha = $request->input("senha");

      $valida_registro = $this->validate_register($nome, $email, $confirmar_senha, $senha);
      if ($valida_registro['status']) {
         $valida_login = $this->login->validate_login($email, $senha);
         if ($valida_login["status"]) {
            return redirect("/home");
         }
      }
      return $valida_registro['msg'];
   }

   public function validate_register($nome, $email, $confirmar_senha, $senha)
   {

      if ($senha == $confirmar_senha) {
         $user = User::where("email", $email)->first();
         if (empty($user)) {
            $this->createUser($nome, $senha, $email);
            return ['status' => true, "msg" => 'Sucesso. Usuário cadastrado com sucesso!'];
         }
         return ['status' => false, "msg" => 'Usuário já cadastrado.'];
      }
      return ['status' => false, "msg" => 'Senhas não coincidem.'];
   }

   public function createUser($nome, $senha, $email)
   {
      User::create([
         'nome' => $nome,
         'email' => $email,
         'senha' => Hash::make($senha),
      ]);
   }
}
