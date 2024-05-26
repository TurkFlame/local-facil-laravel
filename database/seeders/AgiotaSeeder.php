<?php

namespace Database\Seeders;

use App\Models\Agiota;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgiotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Agiota::factory()->create([
            'nome' => 'Da o pozo',
            'url' => 'https://i.ibb.co/JdWrLxj/da-o-pozo.jpg',
            'estrelas' => 5,
            'favorito' => false,
            'mortes' => 20,
            'emprestimo' => 15,
            'procurado' => True,
        ]);
    }
}
