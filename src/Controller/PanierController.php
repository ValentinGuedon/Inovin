<?php

namespace App\Controller;

use App\Repository\VinRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/panier', name: 'panier_')]
class PanierController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(SessionInterface $session, VinRepository $vinRepository): Response
    {
        // Récupère le panier
        $panier = $session->get('panier', []);

        // Création d'un tableau avec les informations de vin Entity
        $panierWithData = [];
        foreach ($panier as $id => $quantity) {
            $panierWithData[] = [
                'product' => $vinRepository->find($id),
                'quantity' => $quantity
            ];
        }
            // Calcul somme total du panier
            $total = 0;
        foreach ($panierWithData as $item) {
            $totalItem = $item['product']->getPrix() * $item['quantity'];
            $total += $totalItem;
        }

        return $this->render('shop/shopCart.html.twig', ['items' => $panierWithData, 'total' => $total]);
    }

    #[Route('/remove/{id}', name: 'remove')]
    public function remove(int $id, SessionInterface $session): Response
    {
        $panier = $session->get('panier', []);

        if (!empty($panier[$id])) {
            unset($panier[$id]);
        }
        // Mise à jour du panier
        $session->set('panier', $panier);

        return $this->redirectToRoute('panier_index', [], Response::HTTP_SEE_OTHER);
    }
}
