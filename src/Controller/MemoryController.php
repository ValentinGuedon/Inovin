<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MemoryController extends AbstractController
{
    #[Route('/memory', name: 'app_memory')]
    public function index(): Response
    {
        return $this->render('memory/index.html.twig');
    }
}
