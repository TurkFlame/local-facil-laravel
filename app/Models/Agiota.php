<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agiota extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'url',
        'estrelas',
        'favorito',
        'mortes',
        'emprestimo',
        'procurado'
    ];

    protected $casts = [
        'nome' => "string",
        'url' => "string",
        'estrelas' => 'int',
        'favorito' => "boolean",
        'mortes' => "int",
        'emprestimo' => "float",
        'procurado' => "boolean"
    ];
}
