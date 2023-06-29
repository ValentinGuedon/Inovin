<?php

namespace App\Controller;

use App\Entity\Animations;
use App\Form\AnimationsType;
use App\Repository\AnimationsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Service\CartShopService;

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

    #[Route('/new', name: 'app_animation_new', methods: ['GET', 'POST'])]
    public function new(
        Request $request,
        SluggerInterface $slugger,
        AnimationsRepository $animationRepository
    ): Response {
        $animation = new Animations();
        $form = $this->createForm(AnimationsType::class, $animation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $slug = $slugger->slug($animation->getNom());
            $animation->setSlug($slug);
            $animationRepository->save($animation, true);

            return $this->redirectToRoute('app_animations_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('animations/new.html.twig', [
            'animation' => $animation,
            'form' => $form,
        ]);
    }

    #[Route('/{slug}', name: 'app_animation_show', methods: ['GET'])]
    public function show(Animations $animation): Response
    {
        //if (!$animation) {
           // throw $this->createNotFoundException('Atelier non trouvé');
        //}

        return $this->render('animations/show.html.twig', [
        'animation' => $animation,
        ]);
    }

    #[Route('/add/{id}', name: 'add')]
    public function add(int $id, Request $request, CartShopService $cartShopService): Response
    {
        $quantity = $request->request->get('nbPersonnes');
        $cartShopService->addToCart($id, $quantity);

        return $this->redirectToRoute('panier_index', [], Response::HTTP_SEE_OTHER);
    }
}
