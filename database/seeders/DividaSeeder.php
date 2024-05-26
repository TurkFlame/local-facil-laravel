<?php

namespace Database\Seeders;

use App\Models\Divida;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DividaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Divida::factory()->create([
            'nome' => 'Da o pozo',
            'valor' => '1,23',
            'data_pagamento' => '2024-04-29',
        ]);
    }
}
