<?php

namespace App\Controller;

use App\Entity\FicheDegustation;
use App\Entity\User;
use App\Form\FicheDegustationType;
use App\Repository\FicheDegustationRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/fiche/degustation')]
class FicheDegustationController extends AbstractController
{
    #[Route('/', name: 'app_fiche_degustation_index', methods: ['GET'])]
    public function index(FicheDegustationRepository $ficheDegustationRepository): Response
    {
        return $this->render('fiche_degustation/index.html.twig', [
            'fiche_degustations' => $ficheDegustationRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_fiche_degustation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, FicheDegustationRepository $ficheDegustationRepository): Response
    {
        $ficheDegustation = new FicheDegustation();
        $form = $this->createForm(FicheDegustationType::class, $ficheDegustation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ficheDegustationRepository->save($ficheDegustation, true);

            return $this->redirectToRoute('app_fiche_degustation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('fiche_degustation/new.html.twig', [
            'fiche_degustation' => $ficheDegustation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_fiche_degustation_show', methods: ['GET'])]
    public function show(FicheDegustation $ficheDegustation): Response
    {
        return $this->render('fiche_degustation/show.html.twig', [
            'fiche_degustation' => $ficheDegustation,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_fiche_degustation_edit', methods: ['GET', 'POST'])]
    public function edit(
        Request $request,
        FicheDegustation $ficheDegustation,
        FicheDegustationRepository $ficheDegustationRepository,
        UserRepository $user
    ): Response {
        $form = $this->createForm(FicheDegustationType::class, $ficheDegustation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ficheDegustationRepository->save($ficheDegustation, true);

            return $this->redirectToRoute('app_fiche_degustation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('fiche_degustation/edit.html.twig', [
            'fiche_degustation' => $ficheDegustation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_fiche_degustation_delete', methods: ['POST'])]
    public function delete(
        Request $request,
        FicheDegustation $ficheDegustation,
        FicheDegustationRepository $ficheDegustationRepository
    ): Response {
        if ($this->isCsrfTokenValid('delete' . $ficheDegustation->getId(), $request->request->get('_token'))) {
            $ficheDegustationRepository->remove($ficheDegustation, true);
        }

        return $this->redirectToRoute('app_fiche_degustation_index', [], Response::HTTP_SEE_OTHER);
    }
}
