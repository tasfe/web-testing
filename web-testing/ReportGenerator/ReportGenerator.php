<?php

/***********************************************************
*                                                          * 
*   Report Gener�tor                                       *
*   Horv�th Jonath�n & Veres Karola                        *
*                                                          *
************************************************************/

class ReportGenerator
{
  var $formatum;  // A report form�tuma
  var $name;      // A felhaszn�l� neve
  var $nickName; // felhaszn�l�n�v
  var $email;   // felhaszn�l� emailc�me
  var $questions; // K�rd�sek(t�mb)
  var $answers;   // Az �sszes v�lasz(m�trix)
  var $my_answers; // Az �n v�laszaim(t�mb)
  var $correct_answers; // A helyes v�laszok(t�mb)
/**************************************************
K�rd�sek: 1) H�ny darab pr�msz�m van?
             a) 1;  b) 5;  c) 100000; d) v�gtelen.

           2) H�ny oszt�ja van a 2-nek?
            a) 1; b) 2; c) 3; d 4.

Akkor a $questions t�mbe a k�vetkez� elemeket lesznek:
      H�ny darab pr�msz�m van?
      H�ny oszt�ja van a kett�nek?
Az $answers m�trix �gy n�z ki:
   _                           _
   |                            |
   |  a) 1   b) 5   c) 100000  d) v�gtelen  "|
   |  a) 1   b) 2   c) 3      d) 4         |
   |_                          _|


A my_answers: 

  P�ld�ul: 1, 4

A correct_answers:  v�gtelen, 4
*************************************************/

function ReportGenerator($nev, $fnev, $email, $kerdesek, $valaszok, $en_valasz, $hely_valasz, $formatum='A4') 
{
  // adatok �tv�tele

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
  $pdf->Text(60, 80, 'Oklev�l');
  
  $holvagyunk = 100;
  $hossz=count($this->questions);
  $pdf->SetFont('Arial','B', 12);
  $pdf->SetTextColor($R, $G, $B);
  $pdf->Text(10, 30, "A felhaszn�l� neve: " .$this->name);
  $pdf->Text(10, 35, "Felhaszn�l� felhaszn�l�neve: " .$this->nickName);
  $pdf->Text(10, 40, "Felhaszn�l� emailc�me: " .$this->email);
  $pdf->SetTextColor($R, $G, $B);
  for($i = 0; $i < $hossz; ++$i) {
    $pdf->Text(10, $holvagyunk, $this->questions[$i]);
    $holvagyunk = $holvagyunk + 5;
    $pdf->Text(30, $holvagyunk, "A saj�t v�lasz, hogy: " .$this->my_answers[$i]);
    $holvagyunk = $holvagyunk + 5;
    $pdf->Text(30, $holvagyunk, "A helyes v�lasz, hogy: " .$this->correct_answers[$i]);
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
	$pdf->write(36, 'Oklev�l', '\n');

	$holvagyunk = 130;
	$hossz=count($this->questions);
	$pdf->SetFont('Arial','B', 20);
	$pdf->SetTextColor(255, 100, 100);
	$pdf->write(36, "A felhaszn�l� neve: " .$this->name);
	/*$pdf->write(12, "Felhaszn�l� felhaszn�l�neve: " .$this->nickName);
	$pdf->write(12, "Felhaszn�l� emailc�me: " .$this->email);
	$pdf->SetTextColor(255, 100, 0);
	for($i = 0; $i < $hossz; ++$i) {
		$pdf->write(12, $this->questions[$i]);
		$pdf->write(30, $holvagyunk, "A saj�t v�lasz, hogy: " .$this->my_answers[$i]);
		$pdf->write(12, "A helyes v�lasz, hogy: " .$this->correct_answers[$i]);
		//$pdf->write(50, "Ez meg micsoda ")
		}
		*/
		$pdf->Output('Diploma.pdf', 'I');
	}
	
	 
	 
}
?>