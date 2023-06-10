<?php

namespace App\Controller;

use App\Repository\AnimationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/animations')]
class AnimationsController extends AbstractController
{
    #[Route('/', name: 'app_animations_index', methods: ['GET'])]
    public function index(AnimationsRepository $animationRepository): Response
    {
        return $this->render('animations/index.html.twig', [
            'animations' => $animationRepository->findAll(),
        ]);
    }

    #[Route('/animation/{id}', name: 'app_animation_show', methods: ['GET'])]
    public function show(int $id, AnimationsRepository $animationRepository): Response
    {
        $animation = $animationRepository->find($id);

        if (!$animation) {
            throw $this->createNotFoundException('Atelier non trouvé');
        }

        return $this->render('animations/show.html.twig', [
        'animation' => $animation,
        ]);
    }
}
