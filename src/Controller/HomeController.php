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
        $parametersAsArray = [];
        if ($content = $request->getContent()) {
            $parametersAsArray = json_decode($content, true);
        }
        $mail = (new TemplatedEmail())
            ->from('thibaultmorizet@icloud.com')
            ->to($parametersAsArray["userMail"])
            ->subject($parametersAsArray["subject"])
            ->htmlTemplate($parametersAsArray["html"])
            ->context([
                'userMail' => $parametersAsArray["userMail"],
                'password' => $parametersAsArray["password"]
            ]);

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
