<?php

namespace App\Service;

use Dompdf\Dompdf;
use Twig\Environment;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;

class MailerService
{
    private MailerInterface $mailer;
    private Environment $twig;

    public function __construct(MailerInterface $mailer, Environment $twig)
    {
        $this->mailer = $mailer;
        $this->twig = $twig;
    }

    public function sendFicheEmail(string $userEmail, array $pdfPaths): void
    {
        $email = (new Email())
            ->from('your_email@example.com')
            ->to($userEmail)
            ->subject('Form Submission PDF')
            ->html('<p>Attached are the PDF renders of your form submissions.</p>');

        foreach ($pdfPaths as $pdfPath) {
            $email->attachFromPath($pdfPath);
        }

        $this->mailer->send($email);
    }

    public function sendContactEmail($data): void
    {
        $email = (new Email())
        ->from(new Address($data['email'], $data['name']))
        ->to('inovinstrasbourg@gmail.com')
        ->subject('Formulaire de contact')
        ->html($this->twig->render('newContactMail.html.twig', ['data' => $data]));

        $this->mailer->send($email);
    }
}
