<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Spipu\Html2Pdf\Html2Pdf;
use Symfony\Component\HttpFoundation\Request;

class InvoiceController extends AbstractController
{

    #[Route('/generate_invoice', name: 'generateInvoice')]
    public function showInvoice(Request $request): Response
    {
        $parametersAsArray = [];
        if ($content = $request->getContent()) {
            $parametersAsArray = json_decode($content, true);
        }

        return $template = $this->render('invoice/invoice.twig.html', [
            'order' => $parametersAsArray,
        ]);

    //   $html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', array(10, 15, 10, 15));

     // return $this->generatePdf($template, "facture");
    }
    
    

}
