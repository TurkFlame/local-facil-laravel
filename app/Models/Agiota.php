<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Agiota extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nome',
        'url',
        'mortes',
        'emprestimo',
        'procurado',
        'telefone',
        'email',
        'idade',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'id' => 'integer',
        'nome' => 'string',
        'url' => 'string',
        'mortes' => 'integer',
        'emprestimo' => 'integer',
        'procurado' => 'boolean',
        'telefone' => 'string',
        'email' => 'string',
        'idade' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function getAgiotaById($agiota_id)
    {
        return self::select()->where('id', '=', $agiota_id)->first();
    }
}
