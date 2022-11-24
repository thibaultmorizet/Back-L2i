<?php

namespace App\Controller;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Request;


class HomeController extends AbstractController
{
    #[Route('/mail', name: 'email')]
    public function sendMail(Request $request, MailerInterface $mailer): Response
    {
        var_dump($request->getContent());
        /* $mail = (new TemplatedEmail())
            ->from('thibaultmorizet@icloud.com')
            ->to($userMail)
            ->subject($subject)
            ->htmlTemplate($html)
            ->context([
                'userMail' => $userMail,
                'password' => $password
            ]);

        $mailer->send($mail); */

        return $this->json(
            [
                "success" => true,
                "message" => "the mail is sent"
            ],
            200,
        );
    }

   
}
