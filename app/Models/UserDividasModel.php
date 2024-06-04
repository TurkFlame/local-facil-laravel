<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDividasModel extends Model
{
    use HasFactory;
    protected $table = 'user_dividas';
    protected $fillable = [
        'id' ,
        'user_id',
        'agiota_id' ,
        'valor_total' ,
        'quantidade_parcelas',
        'juros',
        'data_pagamento',
    ];

    protected $cast = [
        'id' => 'integer',
        'user_id' => 'integer',
        'agiota_id' => 'integer',
        'valor_total' => 'integer',
        'quantidade_parcelas' => 'integer',
        'juros' => 'integer',
        'data_pagamento' => 'datetime'
    ];
}
