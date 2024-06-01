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
            'nome' => 'Hulk Agiota',
            'url' => 'https://www.google.com/imgres?q=Hulk%20agiota&imgurl=https%3A%2F%2Fpbs.twimg.com%2Fprofile_images%2F1262625600835072002%2FkBpmiFX4_400x400.jpg&imgrefurl=https%3A%2F%2Ftwitter.com%2FHulkAgiota666&docid=w5Z2AXBLCWTNuM&tbnid=SHw6-xOWGyB7MM&vet=12ahUKEwi-upubkruGAxWKpZUCHep0DZUQM3oECGMQAA..i&w=315&h=315&hcb=2&ved=2ahUKEwi-upubkruGAxWKpZUCHep0DZUQM3oECGMQAA',
            'mortes' => 20,
            'emprestimo' => 15,
            'procurado' => True,
        ]);

        Agiota::create([
            'nome' => 'Mario Agiota',
            'url' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Ftwitter.com%2Fmeagiotamario&psig=AOvVaw0675KDR_R55OEjvq0Zdly8&ust=1717356673735000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCNCAsaWSu4YDFQAAAAAdAAAAABAE',
            'mortes' => 20,
            'emprestimo' => 15,
            'procurado' => True,
        ]);

        Agiota::create([
            'nome' => 'Kuririn Agiota',
            'url' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.pinterest.com%2Fpin%2F730146158336417395%2F&psig=AOvVaw0fE4lKtv96nqCOEubzHsCx&ust=1717356762471000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCPDwlc-Su4YDFQAAAAAdAAAAABAE',
            'mortes' => 20,
            'emprestimo' => 15,
            'procurado' => True,
        ]);

        Agiota::create([
            'nome' => 'Cebolinha Agiota',
            'url' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fbr.ifunny.co%2Fpicture%2Fcebolinha-agiota-jmMeuAqA8&psig=AOvVaw0rkAlDdoppf11ZVXgMufyk&ust=1717356756449000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCNCtqsySu4YDFQAAAAAdAAAAABAY',
            'mortes' => 20,
            'emprestimo' => 15,
            'procurado' => True,
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
