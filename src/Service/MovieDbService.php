<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class MovieDbService
{

    public function __construct(
        protected string $apiTheMovieDbBaseUrl,
        protected string $apiTheMovieDbKey,
        protected HttpClientInterface $httpClient
    )
    {
    }

    public function getGenre()
    {
        $endpoint = sprintf('%s/%s', $this->apiTheMovieDbBaseUrl, '/genre/movie/list?language=fr');

        $response = $this->httpClient->request('GET', $endpoint, [
            'headers' => [
                'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIzYzZkNzczYjQ3NmY4MDVlMTg2NmYyMWQzMTE4NjQwOCIsInN1YiI6IjY0NzYyZDZlOTI0Y2U2MDExNmM2NjNlOCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.pJdP_88Zvs9Qc-b5o74ZieBUfS3LbqVdR5YzmAHChDA',
                'accept' => 'application/json',
            ]]);

        return json_decode($response->getContent(), true);
    }
}
