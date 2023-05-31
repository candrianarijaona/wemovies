<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class MovieDbService
{
    protected const LANGUAGE = 'fr';

    public function __construct(
        protected string $apiTmdbBaseUrl,
        protected string $apiTmdbToken,
        protected HttpClientInterface $httpClient
    )
    {
    }

    public function getGenre()
    {
        return $this->callApi('/genre/movie/list');
    }

    public function getList()
    {
        return $this->callApi('/discover/movie');
    }

    protected function callApi($endpoint)
    {
        $endpoint = sprintf('%s/%s?language=%s', $this->apiTmdbBaseUrl, $endpoint, self::LANGUAGE);

        $response = $this->httpClient->request('GET', $endpoint, [
            'headers' => [
                'Authorization' => sprintf('Bearer %s', $this->apiTmdbToken),
                'accept' => 'application/json',
            ]]);

        return json_decode($response->getContent(), true);
    }
}
