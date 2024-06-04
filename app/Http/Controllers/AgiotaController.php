<?php

namespace App\Http\Controllers;

use App\Models\Agiota;

class AgiotaController extends Controller
{
    public function getAgiotas()
    {
        return Agiota::all();
    }

    public function getAgiotasReturnJson()
    {
        $agiotas = Agiota::all(); // Obtém todos os agiotas do banco de dados
        return response()->json($agiotas); // Retorna os agiotas em formato JSON
    }
}
