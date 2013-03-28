<?php
require('pdfgen/fpdf.php');
$fname = 'Diploma.pdf';
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',36);
//Kép még nincs berakva
//$pdf->Image(‘img/left1.png’, 10, 10, 35, 35);
$pdf->SetTextColor(0, 255, 0);
$pdf->Text(80, 100, 'Oklevél');
$pdf->Output('Diploma.pdf', 'I');
?>
