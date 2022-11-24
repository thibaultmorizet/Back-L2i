<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;


class HomeController extends AbstractController
{
    #[Route('/mail', name: 'email')]
    public function sendMail(MailerInterface $mailer): Response
    {
        $mail = (new Email())
            ->from('thibaultmorizet@icloud.com')
            ->to('thibaultmorizet@icloud.com')
            ->subject('Mon beau sujet')
            ->html('<p>Ceci est mon message en HTML</p>');

        $mailer->send($mail);

        return $this->json(
            [
                "success" => true,
                "message" => "the mail is sent"
            ],
            200,
        );
    }
}
