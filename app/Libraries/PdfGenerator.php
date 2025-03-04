<?php

namespace App\Libraries;

use Dompdf\Dompdf;
use Dompdf\Options;

class PdfGenerator
{
    public function generate($html, $filename = 'document')
    {
        // Initialize DomPDF
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        
        $dompdf = new Dompdf($options);
        
        // Load HTML content
        $dompdf->loadHtml($html);
        
        // (Optional) Set Paper Size (A4)
        $dompdf->setPaper('A4', 'portrait');
        
        // Render PDF (first pass)
        $dompdf->render();
        
        // Output the generated PDF (force download)
        $dompdf->stream($filename . '.pdf', array("Attachment" => 1)); // 1 for force download
    }
}
