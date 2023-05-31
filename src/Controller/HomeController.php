<?php

namespace App\Controller;

use App\Service\MovieDbService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    public function __construct(
        private MovieDbService $movieDbService
    )
    {
    }

    #[Route('/', name: 'app_home')]
    public function index()
    {
        return $this->render('home/index.html.twig', []);
    }
}
