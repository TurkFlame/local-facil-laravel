<?php
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

    public function login($username, $password)
    {
        try {
            $response = $this->client->post($this->base_url . '/logar', [
                'json' => [
                    'email' => $username,
                    'senha' => $password,
                ]
            ]);
            $body = json_decode($response->getBody(), true);

            return $body;
        } catch (\Exception $e) {
            echo "Erro ao fazer login: " . $e->getMessage();
            return null;
        }
    }
}
