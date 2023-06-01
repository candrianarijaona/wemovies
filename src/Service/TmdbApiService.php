<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class TmdbApiService
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
        return $this->get('/genre/movie/list');
    }

    public function getList($parameters = [])
    {
        return $this->get('/discover/movie', $parameters);
    }

    public function getMovie($movieId)
    {
        return $this->get(sprintf('movie/%s', $movieId));
    }

    public function getTopRated()
    {
        return $this->get('/movie/top_rated', ['page' => 1]);
    }

    public function getFirstTopRated()
    {
        $movies = $this->getTopRated();
        return $movies['results'][0] ?? null;
    }

    public function getVideo($movieId)
    {
        $videos = $this->get(sprintf('movie/%s/videos', $movieId));

        return $videos['results'][0] ?? null;
    }

    protected function get(string $endpoint, array $parameters = [])
    {
        return $this->callApi('GET', $endpoint, $parameters);
    }

    protected function post(string $endpoint, array $parameters = [])
    {
        return $this->callApi('POST', $endpoint, $parameters);
    }

    protected function callApi(string $method, string $endpoint, array $parameters = [])
    {
        $endpoint = sprintf('%s/%s?language=%s', $this->apiTmdbBaseUrl, $endpoint, self::LANGUAGE);

        $response = $this->httpClient->request($method, $endpoint, [
            'headers' => [
                'Authorization' => sprintf('Bearer %s', $this->apiTmdbToken),
                'accept' => 'application/json',
            ],
            'query' => $parameters
        ]);

        return json_decode($response->getContent(), true);
    }
}
