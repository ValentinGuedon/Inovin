<?php

namespace App\Controller;

use App\Entity\Vin;
use App\Entity\Note;
use App\Service\CartShopService;
use App\Repository\VinRepository;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/shop', name: 'shop_')]
class ShopController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET', 'POST'])]
    public function index(VinRepository $vinRepository, Request $request): Response
    {
        $articles = $vinRepository->findAll();
        $notes = $vinRepository->AverageNotesByVin();

        return $this->render('shop/index.html.twig', ['articles' => $articles, 'notes' => $notes]);
    }

    #[Route('/add/{id}/{quantity}', name: 'add', methods: ['GET', 'POST'])]
    public function add(int $id, int $quantity, Request $request, CartShopService $cartShopService): Response
    {
        $cartShopService->addToCart($id, $quantity);

        return $this->redirectToRoute('shop_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/{slug}/watchlist', name: 'watchlist', methods: ['GET', 'POST'])]
    public function addToWatchlist(Vin $vin, UserRepository $userRepository): Response
    {

        /** @var \App\Entity\User */
        $user = $this->getUser();
        if ($user->isInWatchlist($vin)) {
            $user->removeWatchlist($vin);
        } else {
            $user->addWatchlist($vin);
        }
        $userRepository->save($user, true);

        return new JsonResponse([
            'isInWatchlist' => $this->getUser()->isInWatchlist($vin)
        ]);
    }

    #[Route('/{slug}/note', name: 'note', methods: ['GET', 'POST'])]
    public function addNote(Vin $vin, Request $request, UserRepository $userRepository): Response
    {
        /** @var \App\Entity\User */
        $user = $this->getUser();
        if (!$user) {
            $this->addFlash('sk-alert', 'Vous devez être connecté pour attribuer une note.');
        } else {
            $note = new Note();
            $note = $note->setNote((int)$request->query->get('note'));
            $note->setVin($vin);

            if ($user->alreadyNote($vin)) {
                $user->updateNote($note);
                $this->addFlash('sk-alert', 'Votre note à bien été modifiée.');
            } else {
                $user->addNote($note);
                $this->addFlash('sk-alert', 'Votre note à bien été prise en compte.');
            }
            $userRepository->save($user, true);
        }

        return $this->redirectToRoute('shop_index', [], Response::HTTP_SEE_OTHER);
    }
}
