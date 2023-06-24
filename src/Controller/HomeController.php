<?php

namespace App\Controller;

use App\Service\MailerService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }

    #[Route('/mentionsLegales', name: 'mentions')]
    public function showMentionsLegales(): Response
    {
        return $this->render('mentions/mentions.html.twig');
    }
    #[Route('/histoire', name: 'histoire')]
    public function showHistoire(): Response
    {
        return $this->render('histoire/histoire.html.twig');
    }

    #[Route('/contact', name: 'contact')]
    public function contact(MailerService $mailer, Request $request): Response
    {
        // Get the form data
        $data = $request->request->all();

        // Call the mailer service
        $mailer->sendContactEmail($data);

        return $this->redirectToRoute('app_home', [], Response::HTTP_SEE_OTHER);
    }
}
