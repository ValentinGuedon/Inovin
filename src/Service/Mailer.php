<?php

namespace App\service;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Dompdf\Dompdf;
use Symfony\Component\HttpFoundation\Response;

class MailerService
{
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendFicheEmail($userEmail, $pdfPaths)
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
}
