<?php

namespace App\Controller;

use App\Service\TmdbApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class BestMovieController extends AbstractController
{
    public function __construct(protected TmdbApiService $tmdbApiService)
    {
    }

    public function index(): Response
    {
        $video = null;
        if ($bestMovie = $this->tmdbApiService->getFirstTopRated()) {
            $video = $this->tmdbApiService->getVideo($bestMovie['id']);
        }

        return $this->render('movie/_best_movie.html.twig', [
            'bestMovie' => $bestMovie,
            'video' => $video,
        ]);
    }
}
