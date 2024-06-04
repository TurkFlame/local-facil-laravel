<?php

namespace Database\Seeders;

use App\Models\Agiota;
use App\Models\User;
use App\Models\UserDividasModel;
use App\Models\UserFavoriteAgiotasModel;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'nome' => 'teste1',
            'email' => 'teste1@gmail.com',
            'senha' => Hash::make('123'),
        ]);

        User::create([
            'nome' => 'teste2',
            'email' => 'teste2@gmail.com',
            'senha' => Hash::make('123'),
        ]);

        User::create([
            'nome' => 'teste3',
            'email' => 'teste3@gmail.com',
            'senha' => Hash::make('123'),
        ]);

        Agiota::create([
            'nome' => 'Ciro gomez',
            'url' => 'https://i.ibb.co/YyGYdrp/didilha.jpg',
            'mortes' => 20,
            'emprestimo' => 15,
            'procurado' => True,
            'telefone' => "42 98868-1488",
            'email' => "agiota@email.com",
            'idade' => 22,
        ]);

        Agiota::create([
            'nome' => 'Ivis',
            'url' => 'https://i.ibb.co/r2BwLxB/ivis.jpg',
            'mortes' => 20,
            'emprestimo' => 15,
            'procurado' => True,
            'telefone' => "42 98868-1488",
            'email' => "agiota@email.com",
            'idade' => 22,
        ]);

        Agiota::create([
            'nome' => 'Superpao',
            'url' => 'https://i.ibb.co/JdWrLxj/da-o-pozo.jpg',
            'mortes' => 20,
            'emprestimo' => 15,
            'procurado' => True,
            'telefone' => "42 98868-1488",
            'email' => "agiota@email.com",
            'idade' => 22,
        ]);

        Agiota::create([
            'nome' => 'Kataguiri',
            'url' => 'https://i.ibb.co/5TnjTxX/enrique.jpg',
            'mortes' => 20,
            'emprestimo' => 15,
            'procurado' => True,
            'telefone' => "42 98868-1488",
            'email' => "agiota@email.com",
            'idade' => 22,
        ]);

        UserFavoriteAgiotasModel::create([
            'user_id' => 1,
            'agiota_id' => 1,
            'id' => 1
        ]);
        UserFavoriteAgiotasModel::create([
            'user_id' => 2,
            'agiota_id' => 2,
            'id' => 2
        ]);

        UserFavoriteAgiotasModel::create([
            'user_id' => 3,
            'agiota_id' => 3,
            'id' => 3
        ]);

        UserDividasModel::create([
            'id' => 1,
            'user_id' => 1,
            'agiota_id' => 1,
            'valor_total' => 1000,
            'quantidade_parcelas' => 2,
            'juros' => 10,
            'data_pagamento' => Carbon::now()
        ]);
    }
}
