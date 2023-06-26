<?php

namespace App\Controller;

use App\Service\MailerService;
use App\Form\ContactForm;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
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
    public function contact(MailerService $mailer, Request $request, ValidatorInterface $validator): Response
    {
        // Create a ContactForm object
        $form = new ContactForm();
        $form->setName($request->request->get('name'));
        $form->setEmail($request->request->get('email'));
        $form->setContent($request->request->get('content'));

        // Validate the form
        $errors = $validator->validate($form);

        // check if there are any errors
        if (count($errors) > 0) {
            foreach ($errors as $error) {
                $this->addFlash('error', $error->getMessage());
            }

            return $this->redirectToRoute('app_home', [], Response::HTTP_SEE_OTHER);
        }

        // Call the mailer service
        $message = $mailer->sendContactEmail($form->toArray());

        $this->addFlash('success', $message);

        return $this->redirectToRoute('app_home', [], Response::HTTP_SEE_OTHER);
    }
}
