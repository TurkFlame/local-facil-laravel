<?php

namespace App\Http\Controllers;

use App\Models\UserFavoriteAgiotasModel;

class UserFavoriteAgiotasController extends Controller
{
    public function getUserRelationedAgiotas($user_id)
    {
        UserFavoriteAgiotasModel::select()->where('user_id', $user_id)->get();
    }

    public function getAgiotaGeralInfos($agiota_id)
    {
        UserFavoriteAgiotasModel::select()->where('agiota_id', $agiota_id)->get();
    }

    public function getFavoritesAgiotasByUserId($user_id)
    {
        return UserFavoriteAgiotasModel::select()->where(['user_id' => $user_id])->get();
    }

    public function desfavoritarAgiota($user_id, $agiota_id)
    {
        return UserFavoriteAgiotasModel::where(['user_id' => $user_id, 'agiota_id' => $agiota_id])->delete();
    }

}
