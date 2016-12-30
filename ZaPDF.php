<?php
require('./fpdf181/fpdf.php');
            ob_start();
            $usluge_xml = simplexml_load_file('./xml/usluge.xml');
            $usluge = $usluge_xml->usluga;
 
            $pdf= new FPDF();
            $pdf->SetAuthor('Anisa Hadzibulic');
            $pdf->SetTitle('FPDF tutorial');

            $pdf->SetFont('Helvetica','B',20);
            $pdf->SetTextColor(50,60,100);

            $pdf->AddPage('P'); 
            $pdf->SetDisplayMode('real','default');
           
 
            for ($i=0; $i < count($usluge) ; $i++) { 
            // $pdf->Write(5, "ja mala");
      
            // $pdf->Write(5, $usluge[$i]->naziv);
            // $pdf->Write(5, $usluge[$i]->opis);
            
            $pdf->Cell(190,5, $usluge[$i]->naziv,0,1);
             $pdf->Cell(190,5, $usluge[$i]->opis,0,1);

            }
             $pdf->Output("I","tmp/example3.pdf");
            ob_end_flush(); 
?>