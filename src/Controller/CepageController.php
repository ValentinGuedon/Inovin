<?php

namespace App\Controller;

use App\Entity\Cepage;
use App\Form\CepageType;
use App\Repository\CepageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/cepage')]
class CepageController extends AbstractController
{
    #[Route('/', name: 'app_cepage_index', methods: ['GET'])]
    public function index(CepageRepository $cepageRepository): Response
    {
        return $this->render('cepage/index.html.twig', [
            'cepages' => $cepageRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_cepage_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CepageRepository $cepageRepository): Response
    {
        $cepage = new Cepage();
        $form = $this->createForm(CepageType::class, $cepage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cepageRepository->save($cepage, true);

            return $this->redirectToRoute('app_cepage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cepage/new.html.twig', [
            'cepage' => $cepage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cepage_show', methods: ['GET'])]
    public function show(Cepage $cepage): Response
    {
        return $this->render('cepage/show.html.twig', [
            'cepage' => $cepage,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_cepage_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Cepage $cepage, CepageRepository $cepageRepository): Response
    {
        $form = $this->createForm(CepageType::class, $cepage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cepageRepository->save($cepage, true);

            return $this->redirectToRoute('app_cepage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cepage/edit.html.twig', [
            'cepage' => $cepage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cepage_delete', methods: ['POST'])]
    public function delete(Request $request, Cepage $cepage, CepageRepository $cepageRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $cepage->getId(), $request->request->get('_token'))) {
            $cepageRepository->remove($cepage, true);
        }

        return $this->redirectToRoute('app_cepage_index', [], Response::HTTP_SEE_OTHER);
    }
}
