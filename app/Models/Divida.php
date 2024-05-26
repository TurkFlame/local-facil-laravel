<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divida extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'valor', 'data_pagamento'];

    public function cliente()
    {
        return $this->belongsTo(User::class);
    }
}
