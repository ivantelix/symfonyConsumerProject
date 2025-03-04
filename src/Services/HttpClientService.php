<?php

namespace App\Services;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class HttpClientService
{
    private HttpClientInterface $client;
    private string $url;

    public function __construct(HttpClientInterface $client) {
        $this->client = $client;
        $this->url = $_ENV['CSV_API_URL'];
    }

    public function fetchCsvData(): string
    {
        $response = $this->client->request('GET', $this->url, [
            'auth_basic' => [$_ENV['CSV_API_USERNAME'], $_ENV['CSV_API_PASSWORD']]
        ]);

        return $response->getContent();
    }
}