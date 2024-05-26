<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'nome' => 'Braio',
            'email' => 'braio@gmail.com',
            'senha' => '$2y$10$lSkbGHK.2zz8VKwpZ8T1pOUlu0aJOx6RB7lNzv5nWRenjMGhANeiq',
        ]);
    }
}
