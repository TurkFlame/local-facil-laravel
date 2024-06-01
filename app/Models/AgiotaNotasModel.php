<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgiotaNotasModel extends Model
{
    use HasFactory;
    protected $table = 'agiota_notas';
    protected $fillable = [
        'user_id',
        'agiota_id',
        'id',
        'nota' => 'integer'
    ];

    protected $casts = [
        'user_id' => 'integer',
        'agiota_id' => 'integer',
        'id' => 'integer',
        'nota' => 'integer'
    ];
}
