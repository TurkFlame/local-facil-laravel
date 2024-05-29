<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class Register extends Controller
{

   public function validate_register(Request $request)
   {
      $nome = $request->input("nome");
      $email = $request->input("email");
      $confirmar_senha = $request->input("confirmarSenha");
      $senha = $request->input("senha");

      if ($senha == $confirmar_senha) {
         $user = User::where("email", $email)->first();
         if (empty($user)) {
            $this->createUser($nome, $senha, $email);
            return redirect('home'); // Example redirection
         }else{
            return redirect('/register'); // Example redirection
         }
      }
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
