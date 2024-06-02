<?php

namespace App\Http\Controllers;

use App\Models\AgiotaNotasModel;

class AgiotaNotasController extends Controller
{
    public function getUserRelationedAgiotas($user_id)
    {
        AgiotaNotasModel::select()->where('user_id', $user_id)->get();
    }

    public function getAgiotaGeralInfos($agiota_id)
    {
        AgiotaNotasModel::select()->where('agiota_id', $agiota_id)->get();
    }

    public function getFavoritesAgiotasByUserId($user_id)
    {
        return AgiotaNotasModel::select()->where(['agiota_id' => $user_id, 'favorito' => '1'])->get();
    }
}
