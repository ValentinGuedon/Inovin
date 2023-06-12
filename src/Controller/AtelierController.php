<?php

namespace App\Controller;

use App\Entity\Atelier;
use App\Entity\Vin;
use App\Entity\User;
use App\Entity\FicheDegustation;
use App\Form\AtelierType;
use App\Form\FicheDegustationType;
use App\Repository\AtelierRepository;
use App\Repository\FicheDegustationRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

#[Route('/atelier')]
class AtelierController extends AbstractController
{
    #[Route('/', name: 'app_atelier_index', methods: ['GET'])]
    public function index(AtelierRepository $atelierRepository): Response
    {
        return $this->render('atelier/index.html.twig', [
            'ateliers' => $atelierRepository->findAll(),
        ]);
    }

    #[Route('/{atelier}/{user}/{vin}', name: 'fiche', methods: ['GET','POST'])]
    public function showFiche(
        Atelier $atelier,
        User $user,
        Vin $vin,
        FicheDegustationRepository $ficheDegustationRepository,
        Request $request,
        SessionInterface $session
    ): Response {
        $ficheDegustation = new FicheDegustation();
        $vin = $atelier->getvin()->first();
        $ficheDegustation->setVin($vin);
        $ficheDegustation->setUser($user);
        $i = $session->get('form_iteration', 0);

        $form = $this->createForm(FicheDegustationType::class, $ficheDegustation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $i++;
            $ficheDegustationRepository->save($ficheDegustation, true);
            $vinCollection = $atelier->getvin();
            $vin = $vinCollection[$i] ?? null;
            $session->set('form_iteration', $i);
            if ($vin !== null) {
                $form = $this->createForm(FicheDegustationType::class, $ficheDegustation);
                return $this->renderForm('fiche_degustation/FicheDegustation.html.twig', [
                    'atelier' => $atelier,
                    'user' => $user,
                    'vin' => $vin,
                    'form' => $form
                ]);
            } else {
                return $this->redirectToRoute('app_atelier_index');
            }
        }
        return $this->renderForm('fiche_degustation/FicheDegustation.html.twig', [
            'atelier' => $atelier,
            'user' => $user,
            'vin' => $vin,
            'form' => $form
        ]);
    }


    #[Route('/new', name: 'app_atelier_new', methods: ['GET', 'POST'])]
    public function new(
        Request $request,
        AtelierRepository $atelierRepository,
        UserRepository $userRepository
    ): Response {
        $atelier = new Atelier();
        $form = $this->createForm(AtelierType::class, $atelier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $atelierRepository->save($atelier, true);


            return $this->redirectToRoute('app_atelier_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('atelier/new.html.twig', [
            'atelier' => $atelier,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_atelier_show', methods: ['GET'])]
    public function show(Atelier $atelier): Response
    {
        return $this->render('atelier/show.html.twig', [
            'atelier' => $atelier,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_atelier_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Atelier $atelier, AtelierRepository $atelierRepository): Response
    {
        $form = $this->createForm(AtelierType::class, $atelier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $atelierRepository->save($atelier, true);

            return $this->redirectToRoute('app_atelier_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('atelier/edit.html.twig', [
            'atelier' => $atelier,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_atelier_delete', methods: ['POST'])]
    public function delete(Request $request, Atelier $atelier, AtelierRepository $atelierRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $atelier->getId(), $request->request->get('_token'))) {
            $atelierRepository->remove($atelier, true);
        }

        return $this->redirectToRoute('app_atelier_index', [], Response::HTTP_SEE_OTHER);
    }
}
