<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminWelcomeController extends AbstractController
{
    #[Route('/admin/welcome', name: 'app_admin_welcome')]
    public function index(): Response
    {
        return $this->render('admin_welcome/index.html.twig', [
            'controller_name' => 'AdminWelcomeController',
        ]);
    }
}
