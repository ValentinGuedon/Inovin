<?php
// phpcs:ignoreFile
namespace App\Controller;

use App\Entity\Atelier;
use App\Entity\Profil;
use App\Entity\Vin;
use App\Entity\User;
use App\Entity\FicheDegustation;
use App\Form\AtelierType;
use App\Form\FicheDegustationType;
use App\Repository\AtelierRepository;
use App\Repository\FicheDegustationRepository;
use App\Repository\UserRepository;
use App\Repository\VinRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use  Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mailer\MailerInterface;
use App\Service\MailerService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

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

    #[Route('/{userSlug}/{vinSlug}', name: 'fiche', methods: ['GET','POST'])]
    #[ParamConverter('user', class: User::class, options: ['mapping' => ['userSlug' => 'slug']])]
    #[ParamConverter('vin', class: Vin::class, options: ['mapping' => ['vinSlug' => 'slug']])]
    public function showFiche(
        AtelierRepository $atelierRepository,
        User $user,
        Vin $vin,
        VinRepository $vinRepository,
        FicheDegustationRepository $ficheDegustationRepository,
        Request $request,
        MailerService $mailerService,
        UserRepository $userRepository
    ): Response {
        // Récupère les informations de l'atelier
        $currentDate = new \DateTime();
        $ficheDegustation = new FicheDegustation();
        $atelier = $atelierRepository->findOneByDate($currentDate);
        $ficheDegustation->setVin($vin);
        $ficheDegustation->setUser($user);
        $ficheDegustation->setDate($currentDate);
        // Récupère les vins de l'atelier
        $vinCollection = $atelier->getvin();
        $vinCollectionId = [];
        foreach ($vinCollection as $vinId) {
            $vinCollectionId[] = $vinId->getId();
        }
        //Vérifie l'existence d'une fiche pour ce vin
        $existingFiche = $ficheDegustationRepository->findOneBy([
            'user' => $user,
            'vin' => $vin,
        ]);
        if ($existingFiche) {
            // Si oui, la met à jour
            $ficheDegustation = $existingFiche;
            $ficheDegustation->setDate($currentDate);
            $form = $this->createForm(FicheDegustationType::class, $ficheDegustation);
            $form->handleRequest($request);
        } else {
            $form = $this->createForm(FicheDegustationType::class, $ficheDegustation);
            $form->handleRequest($request);
        }

        if ($form->isSubmitted() && $form->isValid()) {
            $ficheDegustationRepository->save($ficheDegustation, true);
            // Itère au vin suivant
            $nextVin = $user->getLastFicheDegustation()->getVin()->getId();
            $nextVin = array_search($nextVin, $vinCollectionId);
            $nextVin = $vinCollectionId[$nextVin + 1] ?? null;
            // Si nouveau vin, régénère fiche
            if ($nextVin !== null) {
                return $this->redirectToRoute('fiche', [
                    'userSlug' => $user->getSlug(),
                    'vinSlug' => $vinRepository->find($nextVin)->getSlug()
                ]);

            // Si tous les vins soumis, redirection vers le profil de consommateur
            } else {
                $favoriteFiche =  $user->getFavoriteFicheDegustation();
                $profil = $favoriteFiche->getvin()->getProfil();
                $user->setProfil($profil);
                $userRepository->save($user, true);
                $fiches = $user->getFicheDegustationsFromDate($currentDate);

                // envoi du mail récapitulatif des dégustations
                $userEmail = $user->getEmail();
                $mailerService->sendAtelierEmail($userEmail, $fiches);


                // Trouver la fiche avec la meilleure note
                $bestFiche = null;
                $maxNote = 0;

                foreach ($fiches as $fiche) {
                    $note = $fiche->getNote();
                    if ($note > $maxNote) {
                        $maxNote = $note;
                        $bestFiche = $fiche;
                    }
                }

                // Récupérer les arômes de la meilleure fiche
                $aromes = [];

                if ($bestFiche !== null) {
                    $aromes = $bestFiche->getArome();
                }


                // Génère suggestions aléatoires de vins (performance pas fou si beaucoup de vins dans la boutique)
                $vins = $vinRepository->findAll();
                shuffle($vins);


                // Redirection vers la page de profil de consommateur
                return $this->render('atelier/ficheProfil.html.twig', [
                    'profil' => $profil,
                    'user' => $user,
                    'vin' => $favoriteFiche->getVin(),
                    'aromes' => $aromes,
                    'suggestions' => [$vins[0],$vins[1]],
                ]);
            }
        }
        // Affiche le formulaire de dégustation
        return $this->render('fiche_degustation/FicheDegustation.html.twig', [
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

    #[Route('/{id}', name: 'app_atelier_delete', methods: ['POST'])]
    public function delete(Request $request, Atelier $atelier, AtelierRepository $atelierRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $atelier->getId(), $request->request->get('_token'))) {
            $atelierRepository->remove($atelier, true);
        }

        return $this->redirectToRoute('app_atelier_index', [], Response::HTTP_SEE_OTHER);
    }
}
