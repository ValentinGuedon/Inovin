<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }

    #[Route('/mentionsLegales', name: 'mentions')]
    public function showMentionsLegales(): Response
    {
        return $this->render('mentions/mentions.html.twig');
    }
    #[Route('/histoire', name: 'histoire')]
    public function showHistoire(): Response
    {
        return $this->render('histoire/histoire.html.twig');
    }
}
