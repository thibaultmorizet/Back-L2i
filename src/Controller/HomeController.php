<?php

namespace App\Controller;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use SplFileInfo;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Filesystem\Filesystem;


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
    #[Route('/add_image', name: 'addImage')]
    public function addImage(Request $request): Response
    {
        $parametersAsArray = [];
        if ($content = $request->getContent()) {
            $parametersAsArray = json_decode($content, true);
        }

        $pictureFile = $parametersAsArray['data'];
        $pictureUrl = $parametersAsArray['url'];

        $pictureName = $parametersAsArray['productId'] . strrchr($pictureUrl, '.');
        $spl = new SplFileInfo($pictureName);

        $extension = strtolower($spl->getExtension());

        if ($extension != "jpeg" and $extension != "png" and $extension != "jpg") {

            return $this->json(
                [
                    "success" => false,
                    "error" => "Bad extension"
                ],
                Response::HTTP_BAD_REQUEST
            );
        } else {

            $fileSystem = new Filesystem();

            $current_dir_path = getcwd() . "/assets/product-images/";
            $decodePicture = base64_decode($pictureFile);

            $fileSystem->dumpFile($current_dir_path . $pictureName, $decodePicture);

            return $this->json(
                [
                    "success" => true,
                    "message" => "the image is upload"
                ],
                200,
            );
        }
    }

    #[Route('/delete_image', name: 'deleteImage')]
    public function deleteImage(Request $request): Response
    {
        $parametersAsArray = [];
        if ($content = $request->getContent()) {
            $parametersAsArray = json_decode($content, true);
        }

        unlink($parametersAsArray['imageUrl']);

        return $this->json(
            [
                "success" => true,
                "message" => "the image is deleted"
            ],
            200,
        );
    }
}
