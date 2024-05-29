<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = "usuarios";
    public $timestamps = false;
    
    protected $hidden = [
        'senha',
    ];
    protected $fillable = ['nome', 'email', 'senha'];

    protected  $cast = [
        'nome' => 'string',
        'email' => 'string',
        'senha' => 'string',
    ];


    public function chamados()
    {
        return $this->hasMany(Divida::class);
    }
}
