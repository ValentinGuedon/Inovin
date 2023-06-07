<?php

namespace App\Controller;

use App\Repository\VinRepository;
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

    #[Route('/add/{id}', name: 'add')]
    public function add(int $id, SessionInterface $session): Response
    {
        // Création du panier
        $panier = $session->get('panier', []);

        // Alimentation du panier
        if (!empty($panier[$id])) {
            $panier[$id] = $panier[$id] + $_POST['quantite'];
        } else {
            $panier[$id] = $_POST['quantite'];
        }
        // Mise a jour du panier
        $panier = $session->set('panier', $panier);

        $this->addFlash('success', 'Votre panier à été mis à jour');
        return $this->redirectToRoute('shop_index', [], Response::HTTP_SEE_OTHER);
    }
}
