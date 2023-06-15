<?php

namespace App\Controller;

use App\Repository\VinRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/shop', name: 'shop_')]
class ShopController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(VinRepository $vinRepository): Response
    {
        return $this->render('shop/index.html.twig', ['vins' => $vinRepository->findAll()]);
    }

    #[Route('/add/{id}/{quantity}', name: 'add')]
    public function add(int $id, int $quantity, Request $request, SessionInterface $session): Response
    {
        // Création du panier
        $panier = $session->get('panier', []);

        if (!empty($panier[$id])) {
            $panier[$id] = $panier[$id] + $quantity;
        } else {
            $panier[$id] = $quantity;
        }

            $this->addFlash('success', 'Votre panier à été mis à jour');
             // Mise a jour du panier
            $panier = $session->set('panier', $panier);

        return $this->redirectToRoute('shop_index', [], Response::HTTP_SEE_OTHER);
    }
}
