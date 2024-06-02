<?php

namespace App\Http\Controllers;

use App\Models\UserDividasModel;
use Illuminate\Http\Request;

class UserDividasController extends Controller
{
    public function criarDivida(Request $request)
    {
        $validatedData = $request->validate([
            'agiota_id' => 'required|exists:agiotas,id',
            'valor_total' => 'required|numeric',
            'quant_parcelas' => 'required|integer|min:1',
            'juros' => 'nullable|numeric',
            'data_pagamento' => 'required|date'
        ]);

        $data = $this->createDataPattern($validatedData['agiota_id'], $validatedData['valor_total'], $validatedData['quant_parcelas'], $validatedData['juros'], $validatedData['data_pagamento']);
        $this->createOrUpdateDivida($data);
    }

    public function createOrUpdateDivida(array $data)
    {
        UserDividasModel::updateOrCreate(
            ['user_id' => $data['user_id'], 'agiota_id' => $data['agiota_id']],
            $data
        );
    }

    protected function createDataPattern($agiota_id, $valor_total, $quant_parcelas, $juros, $data_pagamento)
    {
        // Directly return the data array without generating an 'id'. Let Eloquent handle ID generation.
        return [
            'id' => UserDividasModel::all()->max('id') + 1,
            'user_id' => session()->get('id'),
            'agiota_id' => $agiota_id,
            'valor_total' => $valor_total,
            'quantidade_parcelas' => $quant_parcelas,
            'juros' => $juros,
            'data_pagamento' => $data_pagamento
        ];
    }
}
