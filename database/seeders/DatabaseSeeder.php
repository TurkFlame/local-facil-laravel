<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Agiota;
use App\Models\Divida;
use App\Models\Usuario;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Usuario::factory()->create([
            'nome' => 'Braio',
            'email' => 'braio@gmail.com',
            'senha' => '$2y$10$lSkbGHK.2zz8VKwpZ8T1pOUlu0aJOx6RB7lNzv5nWRenjMGhANeiq',
        ]);

        Agiota::factory()->create([
            'nome' => 'Da o pozo',
            'url' => 'https://i.ibb.co/JdWrLxj/da-o-pozo.jpg',
            'estrelas' => 5,
            'favorito' => false,
            'mortes' => 20,
            'emprestimo' => 15,
            'procurado' => True,
        ]);

        Divida::factory()->create([
            'nome' => 'Da o pozo',
            'valor' => '1,23',
            'data_pagamento' => '2024-04-29',
        ]);
    }
}
