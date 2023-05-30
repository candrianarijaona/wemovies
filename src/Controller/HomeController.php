<?php

namespace App\Controller;

use App\Service\MovieDbService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    public function __construct(
        private MovieDbService $movieDbService
    )
    {
    }

    #[Route('/', name: 'app_home')]
    public function index(): JsonResponse
    {

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/MovieDbController.php',
        ]);
    }
}
