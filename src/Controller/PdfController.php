<?php

namespace App\Controller;

use App\Entity\Order;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Spipu\Html2Pdf\Html2Pdf;

class PdfController extends AbstractController
{

    #[Route('/pdf', name: 'pdf')]
    public function showPdf(Order $order): Response
    {
        return $template = $this->render('pdf/pdf.html.twig', [
            'order' => $order,
        ]);

      $html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', array(10, 15, 10, 15));

     // return $this->generatePdf($template, "facture");
    }
    
    

}
