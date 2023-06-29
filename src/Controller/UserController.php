<?php

namespace App\Controller;

use App\Entity\Vin;
use App\Entity\User;
use App\Form\UserType;
use App\Entity\Atelier;
use App\Repository\VinRepository;
use App\Repository\UserRepository;
use App\Repository\AtelierRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/user')]
class UserController extends AbstractController
{
    #[Route('/', name: 'app_user_index', methods: ['GET'])]
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    // Cal to remove vin in watchlist in user profil
    #[Route('/profil/{slug}', name: 'app_profil_delete_watchlist', methods: ['GET'])]
    public function removeWatchlist(
        string $slug,
        UserRepository $userRepository,
        VinRepository $vinRepository
    ): Response {
        $user = $this->getUser();
        $vin = $vinRepository->findOneBy(['slug' => $slug]);

        if (!$vin) {
            throw $this->createNotFoundException('Vin non trouvé.');
        }

        $user->removeWatchlist($vin);
        $userRepository->save($user, true);

        return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
    }

    /** @SuppressWarnings("PHPMD")*/
    #[Route('/profil', name: 'app_user_index', methods: ['GET'])]
    public function showProfil(Security $security, AtelierRepository $atelierRepository): Response
    {
        $user = $security->getUser();
        $currentDate = new \DateTime();
        $atelier = $atelierRepository->findOneByDate($currentDate);

        if ($atelier !== null) {
            $vin = $atelier->getvin()->first();
        } else {
            $vin = 0;
        }

        return $this->render('profil/profil.html.twig', [
            'user' => $user,
            'atelier' => $atelier,
            'vin' => $vin
        ]);
    }

    #[Route('/new', name: 'app_user_new', methods: ['GET', 'POST'])]
    public function new(Request $request, UserRepository $userRepository): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userRepository->save($user, true);

            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/new.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_user_show', methods: ['GET'])]
    public function show(User $user): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_user_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, User $user, UserRepository $userRepository): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userRepository->save($user, true);

            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_user_delete', methods: ['POST'])]
    public function delete(Request $request, User $user, UserRepository $userRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $user->getId(), $request->request->get('_token'))) {
            $userRepository->remove($user, true);
        }

        return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
    }
}
