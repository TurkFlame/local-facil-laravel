<?php

namespace App\Http\Controllers;

use App\Models\UserDividasModel;
use Illuminate\Http\Request;

class UserDividasController extends Controller
{
    public function criarDivida(Request $request)
    {
        $request_data = [
            'agiota_id' => $request->input('agiota_id'),
            'valor_total' => $request->input('valor_total'),
            'quant_parcelas' => $request->input('quant_parcelas'),
            'juros' => $request->input('juros'),
            'data_pagamento' => $request->input('data_pagamento')
        ];

        $data = $this->createDataPattern($request_data['agiota_id'], $request_data['valor_total'], $request_data['quant_parcelas'], $request_data['juros'], $request_data['data_pagamento']);
        $this->createDivida($data);
        return redirect('/debitos');
    }

    public function createDivida($data)
    {
        UserDividasModel::create(
            $data
        );
    }

    public function createOrUpdateDivida($data)
    {
        UserDividasModel::updateOrCreate(
            ['user_id' => $data['user_id'], 'agiota_id' => $data['agiota_id']],
            $data
        );
    }

    public function getDividasByUserId($user_id)
    {
        return UserDividasModel::select()->where('user_id', $user_id)->get();
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
