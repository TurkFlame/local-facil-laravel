<?php

namespace App\Http\Controllers;

use App\Models\Agiota as ModelsAgiota;
use Illuminate\Http\Request;

class Agiota extends Controller
{
    public function index()
    {
        $products = ModelsAgiota::all();
        return view('products.index', compact('agiotas'));
    }
}
