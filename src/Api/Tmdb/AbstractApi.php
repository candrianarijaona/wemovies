<?php

namespace App\Api\Tmdb;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class AbstractApi implements ApiInterface
{
    public function __construct(protected HttpClientInterface $httpClient)
    {

    }

    public function request(string $method, string $endpoint, array $parameters = []) : array
    {
        return [];
    }

    public function get(string $endpoint, array $parameters = []) : array
    {
        return $this->request('GET', $endpoint, $parameters);
    }

    public function post(string $endpoint, array $parameters = []) : array
    {
        return $this->request('POST', $endpoint, $parameters);
    }
}
