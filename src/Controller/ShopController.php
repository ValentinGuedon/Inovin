<?php

namespace App\Controller;

use App\Repository\VinRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/shop', name: 'shop_')]
class ShopController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(VinRepository $vinRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $vins = $vinRepository->findAll();

        $articles = $paginator->paginate($vins, $request->query->getInt('page', 1), 3);

        return $this->render('shop/index.html.twig', ['articles' => $articles]);
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

        // Mise a jour du panier
        $this->addFlash('success', 'Votre panier à été mis à jour');
        $panier = $session->set('panier', $panier);

        return $this->redirectToRoute('shop_index', [], Response::HTTP_SEE_OTHER);
    }
}
