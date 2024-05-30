<?php
namespace App\Providers;

use GuzzleHttp\Client;

class Provider
{
    private $client;
    private $base_url;

    public function __construct()
    {
        $this->client = new Client();
        $this->base_url = 'http://127.0.0.1:8080';
    }

    public function login($email, $password)
    {
        try {
            $response = $this->client->post($this->base_url . '/login', [
                'json' => [
                    'email' => $email,
                    'senha' => $password,
                ]
            ]);
            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            return ['status' => false, 'msg' => $e];
        }
    }
}
