<?php

namespace App\Controller;

use App\Repository\VinRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/shop', name: 'shop_')]
class ShopController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(VinRepository $vinRepository): Response
    {
        return $this->render('shop/index.html.twig', [
            'vins' => $vinRepository->findAll(),
        ]);
    }

    #[Route('/add/{id}', name: 'add')]
    public function addShop(int $id, RequestStack $requestStack): Response
    {
        $session = $requestStack->getSession();
        $panier = $session->get('paniers', []);

        if (!empty($panier[$id])) {
            $panier[$id] = $panier[$id] + $_GET['quantite'];
        } else {
            $panier[$id] = 1;
        }
        $panier = $session->set('paniers', $panier);

        $this->addFlash('success', 'Votre panier à été mis à jour');
        return $this->redirectToRoute('shop_index', [], Response::HTTP_SEE_OTHER);
    }
}
