<?php

namespace App\Controller;

use App\Entity\Recette;
use App\Form\RecetteType;
use App\Repository\RecetteRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mailer\MailerInterface;
use App\Service\MailerService;

#[Route('/recette')]
class RecetteController extends AbstractController
{
    #[Route('/', name: 'app_recette_index', methods: ['GET'])]
    public function index(RecetteRepository $recetteRepository): Response
    {
        return $this->render('recette/index.html.twig', [
            'recettes' => $recetteRepository->findAll(),
        ]);
    }

    #[Route('/visiteur', name: 'app_recette_visiteur', methods: ['GET', 'POST'])]
    public function visiteur(
        Request $request,
        RecetteRepository $recetteRepository,
        Security $security,
        SluggerInterface $slugger,
        MailerService $mailerService,
    ): Response {
        $recette = new Recette();


        $form = $this->createForm(RecetteType::class, $recette);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $slug = $slugger->slug($recette->getNom());
            $recette->setSlug($slug);

            $quantite1 = $recette->getQuantite1();
            $quantite2 = $recette->getQuantite2();
            $quantite3 = $recette->getQuantite3();
            $quantite4 = $recette->getQuantite4();

            $sum = $quantite1 + $quantite2 + $quantite3 + $quantite4;

            if (
                $quantite3 !== null && $recette->getCepage3() === null ||
                $quantite4 !== null && $recette->getCepage4() === null
            ) {
                $this->addFlash('error', 'Vous avez ajouté une quantité sans cépage.');
            } else {
                if ($sum === 750) {
                    if ($quantite1 >= 1 && $quantite2 >= 1) {
                        $user = $this->getUser();
                        $recette->setUser($user);
                        $recetteRepository->save($recette, true);
                        $this->addFlash('sk-alert', 'Merci de votre participation à notre atelier!');

                        //envoi du mail de retex
                        $mailerService->sendRetexEmail($user);
                        // envoi du mail de synhèse du profil
                        $mailerService->sendProfilEmail($user);

                        return $this->redirectToRoute('app_home', [], Response::HTTP_SEE_OTHER);
                    } else {
                        $this->addFlash('error', 'Veuillez renseigner au moins deux champs.');
                    }
                } else {
                    $this->addFlash('error', 'La somme de vos cépages doit être égal à 750ml.
                     Elle est actuellement de: ' . $sum . 'ml');
                }
            }
        }
        return $this->renderForm('recette/visiteur.html.twig', [
        'recette' => $recette,
        'form' => $form,
        ]);
    }

    #[Route('/new', name: 'app_recette_new', methods: ['GET', 'POST'])]
    public function new(Request $request, RecetteRepository $recetteRepository): Response
    {
        $recette = new Recette();
        $form = $this->createForm(RecetteType::class, $recette);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $recetteRepository->save($recette, true);

            return $this->redirectToRoute('app_recette_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('recette/new.html.twig', [
            'recette' => $recette,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_recette_show', methods: ['GET'])]
    public function show(Recette $recette): Response
    {
        return $this->render('recette/show.html.twig', [
            'recette' => $recette,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_recette_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Recette $recette, RecetteRepository $recetteRepository): Response
    {
        $form = $this->createForm(RecetteType::class, $recette);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $recetteRepository->save($recette, true);

            return $this->redirectToRoute('app_recette_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('recette/edit.html.twig', [
            'recette' => $recette,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_recette_delete', methods: ['POST'])]
    public function delete(Request $request, Recette $recette, RecetteRepository $recetteRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $recette->getId(), $request->request->get('_token'))) {
            $recetteRepository->remove($recette, true);
        }

        return $this->redirectToRoute('app_recette_index', [], Response::HTTP_SEE_OTHER);
    }
}
