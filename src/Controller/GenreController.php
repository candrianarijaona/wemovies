<?php

namespace App\Controller;

use App\Service\TmdbApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class GenreController extends AbstractController
{
    public function __construct(protected TmdbApiService $tmdbApiService)
    {
    }

    /**
     * @param string $selectedGenreIds
     * @return Response
     */
    public function index(string $selectedGenreIds = null): Response
    {
        return $this->render('genre/_index.html.twig', [
            'genres' => $this->tmdbApiService->getGenre(),
            'selectedGenreIds' => $selectedGenreIds ? explode(',', $selectedGenreIds) : [],
        ]);
    }
}
