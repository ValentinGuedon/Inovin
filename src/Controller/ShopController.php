<?php

namespace App\Controller;

use App\Service\CartShopService;
use App\Repository\VinRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
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
    public function add(int $id, int $quantity, Request $request, CartShopService $cartShopService): Response
    {
        $cartShopService->addToCart($id, $quantity);

        return $this->redirectToRoute('shop_index', [], Response::HTTP_SEE_OTHER);
    }
}
