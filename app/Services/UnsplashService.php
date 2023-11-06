<?php

namespace App\Services;


use GuzzleHttp\Client;

class UnsplashService
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = app(Client::class);
    }

    public function getRandomPhoto()
    {
        $response = $this->client->request('GET', 'photos/random', ['verify' => false]);
        $data = json_decode($response->getBody());

        return $data;
    }
}