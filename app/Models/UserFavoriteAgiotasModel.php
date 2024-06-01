<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFavoriteAgiotasModel extends Model
{
    use HasFactory;
    protected $table = 'user_favorites_agiotas';
    protected $fillable = [
        'user_id',
        'agiota_id',
        'id',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'agiota_id' => 'integer',
        'id' => 'integer',
    ];
}
