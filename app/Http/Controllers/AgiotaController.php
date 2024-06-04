<?php

namespace App\Http\Controllers;

use App\Models\Agiota;

use Illuminate\Http\Request;

class AgiotaController extends Controller
{
    public function getAgiotas()
    {
        return Agiota::all();
    }

    public function getAgiotasReturnJson()
    {
        $agiotas = Agiota::all();
        return response()->json($agiotas);
    }

    public function cadastrarAgiota(Request $request)
    {
        $nome = $request->input("name");
        $idade = $request->input("age");
        $email = $request->input("email");
        $telefone = $request->input("phone");

        $agiota = Agiota::where("email", $email)->first();
        if (empty($agiota)) {
            Agiota::create([
                'nome' => $nome,
                'idade' => $idade,
                'telefone' => $telefone,
                'email' => $email,
            ]);
            return redirect("/home");
        }
        return redirect("/trabalhe-conosco");
    }
}
