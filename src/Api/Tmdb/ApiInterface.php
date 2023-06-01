<?php

namespace App\Api\Tmdb;

interface ApiInterface
{
    public function request(string $method, string $endpoint, array $parameters = []) : array;
}
