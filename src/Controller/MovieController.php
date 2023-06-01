<?php

namespace App\Controller;

use App\Service\TmdbApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{
    public function __construct(protected TmdbApiService $tmdbApiService)
    {
    }

    #[Route('/movie/detail/{movieId}', name: 'app_movie_detail')]
    public function detail($movieId)
    {
        $video = null;
        if ($movie = $this->tmdbApiService->getMovie($movieId)) {
            $video = $this->tmdbApiService->getVideo($movie['id']);
        }

        return $this->json([
            'content' => $this->renderView('movie/detail.html.twig', [
                'movie' => $movie,
                'video' => $video,
            ])
        ]);
    }
}
