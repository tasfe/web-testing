<?php

/***********************************************************
*                                                          * 
*   Report Generátor                                       *
*   Horváth Jonathán & Veres Karola                        *
*                                                          *
************************************************************/

class ReportGenerator
{
  var $formatum;  // A report formátuma
  var $name;      // A felhasználó neve
  var $nickName; // felhasználónév
  var $email;   // felhasználó emailcíme
  var $questions; // Kérdések(tömb)
  var $answers;   // Az összes válasz(mátrix)
  var $my_answers; // Az én válaszaim(tömb)
  var $correct_answers; // A helyes válaszok(tömb)
/**************************************************
Kérdések: 1) Hány darab prímszám van?
             a) 1;  b) 5;  c) 100000; d) végtelen.

           2) Hány osztója van a 2-nek?
            a) 1; b) 2; c) 3; d 4.

Akkor a $questions tömbe a következõ elemeket lesznek:
      Hány darab prímszám van?
      Hány osztója van a kettõnek?
Az $answers mátrix így néz ki:
   _                           _
   |                            |
   |  a) 1   b) 5   c) 100000  d) végtelen  "|
   |  a) 1   b) 2   c) 3      d) 4         |
   |_                          _|


A my_answers: 

  Például: 1, 4

A correct_answers:  végtelen, 4
*************************************************/

function ReportGenerator($nev, $fnev, $email, $kerdesek, $valaszok, $en_valasz, $hely_valasz, $formatum='A4') 
{
  // adatok átvétele

  $this->formatum=$formatum;
  $this->name = $nev;
  $this->nickName = $fnev;
  $this->email = $email;
  $this->questions=$kerdesek;
  $this->answers=$valaszok;
  $this->my_answers=$en_valasz;
  $this->correct_answers=$hely_valasz;
}
function kiiratas() 
{
	$hossz=array_count_values($questions);
	for($i = 0; $i < $hossz; ++$i)
	{
		echo questions(i);
	}
	
}
function generald($R=0, $G=0, $B=0, $orientation='P', $unit='mm', $format='A4', $name='Diploma.pdf') 
{
  require('pdfgen/fpdf.php');
  $pdf=new FPDF($orientation, $unit, $format);
  $pdf->AddPage();
  $pdf->Image("valami.jpg", 0, 0, 300, 300);
  $pdf->SetFont('Arial', 'B', 62);
  $pdf->Text(60, 80, 'Oklevél');
  
  $holvagyunk = 100;
  $hossz=count($this->questions);
  $pdf->SetFont('Arial','B', 12);
  $pdf->SetTextColor($R, $G, $B);
  $pdf->Text(10, 30, "A felhasználó neve: " .$this->name);
  $pdf->Text(10, 35, "Felhasználó felhasználóneve: " .$this->nickName);
  $pdf->Text(10, 40, "Felhasználó emailcíme: " .$this->email);
  $pdf->SetTextColor($R, $G, $B);
  for($i = 0; $i < $hossz; ++$i) {
    $pdf->Text(10, $holvagyunk, $this->questions[$i]);
    $holvagyunk = $holvagyunk + 5;
    $pdf->Text(30, $holvagyunk, "A saját válasz, hogy: " .$this->my_answers[$i]);
    $holvagyunk = $holvagyunk + 5;
    $pdf->Text(30, $holvagyunk, "A helyes válasz, hogy: " .$this->correct_answers[$i]);
    //$pdf->write(50, "Ez meg micsoda ");
    $holvagyunk = $holvagyunk + 5;
    if($holvagyunk >= 260) {
     $pdf->addPage();
     $holvagyunk = 30;
   }
  }
   $pdf->Output('Diploma.pdf', 'I');
   
   
}

function generald2($orientation='P', $unit='mm', $format='A4', $name='Diploma.pdf')
{
	require('pdfgen/fpdf.php');
	$pdf=new FPDF($orientation, $unit, $format);
	$pdf->AddPage();
	$pdf->SetFont('Arial', 'B', 36);
	$pdf->write(36, 'Oklevél', '\n');

	$holvagyunk = 130;
	$hossz=count($this->questions);
	$pdf->SetFont('Arial','B', 20);
	$pdf->SetTextColor(255, 100, 100);
	$pdf->write(36, "A felhasználó neve: " .$this->name);
	/*$pdf->write(12, "Felhasználó felhasználóneve: " .$this->nickName);
	$pdf->write(12, "Felhasználó emailcíme: " .$this->email);
	$pdf->SetTextColor(255, 100, 0);
	for($i = 0; $i < $hossz; ++$i) {
		$pdf->write(12, $this->questions[$i]);
		$pdf->write(30, $holvagyunk, "A saját válasz, hogy: " .$this->my_answers[$i]);
		$pdf->write(12, "A helyes válasz, hogy: " .$this->correct_answers[$i]);
		//$pdf->write(50, "Ez meg micsoda ")
		}
		*/
		$pdf->Output('Diploma.pdf', 'I');
	}
	
	 
	 
}
?>