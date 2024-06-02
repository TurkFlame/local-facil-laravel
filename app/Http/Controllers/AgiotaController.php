<?php

namespace App\Http\Controllers;

use App\Models\Agiota;

class AgiotaController extends Controller
{
    public function getAgiotas()
    {
        return Agiota::select()->get();
    }

}
