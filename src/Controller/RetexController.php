<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use  Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Form\RetexType;

class RetexController extends AbstractController
{
    #[Route('/{userSlug}/retours', name: 'retex', methods: ['GET','POST'])]
    #[ParamConverter('user', class: User::class, options: ['mapping' => ['userSlug' => 'slug']])]

    public function retex(User $user, UserRepository $userRepository, Request $request): Response
    {

        $form = $this->createForm(RetexType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $userRepository->save($user, true);
            $this->addFlash('success', 'Merci pour votre retour !');
            return $this->redirectToRoute('app_home', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('retex.html.twig', [
        'form' => $form
        ]);
    }
}
