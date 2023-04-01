<?php

namespace App\Controller;

use phpDocumentor\Reflection\Types\Boolean;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Spipu\Html2Pdf\Html2Pdf;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Uid\UuidV6;
use Symfony\Component\Filesystem\Filesystem;

class InvoiceController extends AbstractController
{

    /**
     * @throws Html2PdfException
     */
    #[Route('/generate_invoice', name: 'generateInvoice')]
    public function showInvoice(Request $request): Response
    {

        $parametersAsArray = [];
        if ($content = $request->getContent()) {
            $parametersAsArray = json_decode($content, true);
        }

        $logo = getcwd()."/assets/logo/logo-l2i.png";

        $template = $this->render('invoice/invoice.html.twig', [
            'order' => $parametersAsArray,
            'logo' => $logo
        ]);

        $html2pdf = new Html2Pdf(margins: array(10, 15, 10, 15));

        $html2pdf->writeHTML($template);



        $uuid = new UuidV6();

        $html2pdf->output(getcwd() . "/assets/invoice/" . $uuid . ".pdf", "F");

        return $this->json(
            [
                "success" => true,
                "message" => "Invoice created",
                "invoice_path" => "https://thibaultmorizet.fr/assets/invoice/" . $uuid . ".pdf"
            ],
            200,
        );
    }

    #[Route('/invoice_is_exist', name: 'invoiceIsExist')]
    public function invoiceIsExist(Request $request): Response
    {

        $parametersAsArray = [];
        if ($content = $request->getContent()) {
            $parametersAsArray = json_decode($content, true);
        }

        if (array_key_exists("invoice_path", $parametersAsArray) === false) {
            return $this->json(
                [
                    "success" => false,
                ],
                200,
            );
        }


        $assets_path_pos_in_global_path = strpos($parametersAsArray["invoice_path"], "/assets");
        $invoice_path = getcwd() . substr($parametersAsArray["invoice_path"], $assets_path_pos_in_global_path);

        $fileSystem = new Filesystem();
        $isExist = $fileSystem->exists($invoice_path);


        return $this->json(
            [
                "success" => $isExist,
            ],
            200,
        );
    }
}
