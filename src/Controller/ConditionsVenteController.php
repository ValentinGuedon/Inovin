<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConditionsVenteController extends AbstractController
{
    #[Route('/conditions/vente', name: 'app_conditions_vente')]
    public function index(): Response
    {
        return $this->render('conditions_vente/index.html.twig', [
            'controller_name' => 'ConditionsVenteController',
        ]);
    }
}
