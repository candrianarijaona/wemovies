<?php

namespace App\Controller;

use App\Service\TmdbApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BestMovieController extends AbstractController
{
    public function __construct(protected TmdbApiService $tmdbApiService)
    {
    }

    public function index()
    {
        return $this->render('movie/_best_movie.html.twig', [
            'bestMovie' => $this->tmdbApiService->bestMovie(),
        ]);
    }
}
