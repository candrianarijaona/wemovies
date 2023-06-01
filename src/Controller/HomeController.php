<?php

namespace App\Controller;

use App\Service\TmdbApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    public function __construct(protected TmdbApiService $tmdbApiService)
    {
    }

    #[Route('/', name: 'app_home')]
    public function index(Request $request)
    {
        $parameters = [];
        if ($request->query->get('genreId')) {
            $parameters['with_genres'] = $request->query->get('genreId');
        }
//dd($this->tmdbApiService->getList($parameters));
        return $this->render('home/index.html.twig', $this->tmdbApiService->getList($parameters));
    }
}
