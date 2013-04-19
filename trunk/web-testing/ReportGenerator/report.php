<?php
class report
{
var $user;
var $answers;
var $points;
var $kerds = 1;
/*************************************************/

function report($us, $ans) {
	$this->user = $us;
	$this->answers = $ans;
}
function irdKi($R=0, $G=0, $B=0) {
		require('pdfgen/fpdf.php');
		$this->pdf=new FPDF();
		$this->pdf->AddPage();
		
		 $this->pdf->SetFont('Arial', '', 12);
		$this->pdf->SetTextColor($R, $G, $B);
	 	$this->pdf->write(5, "A felhasználó neve: ?"."\n");
    	$this->pdf->write(5, "Felhasználó felhasználóneve: ?"."\n");
	     $this->pdf->write(5, "Felhasználó emailcíme: ?"."\n\n\n\n");	
	
		$this->pdf->SetFont('Arial', 'B', 54);
		$this->pdf->SetTextColor(0, 0, 0);
		$this->pdf->write(50, '           Oklevél'."\n");
	
		$this->pdf->SetFont('Arial','', 12);
		$this->pdf->SetTextColor($R, $G, $B);
	}
function ujKerdes($kerdes, $pt) {
	$leng = count($kerdes);
	$this->pdf->write(5, $this->kerds . ") ".$kerdes[1]. "   (".$pt . "pont)"."\n\n");
	$i = 2;
	$betu = 'a';
	while($i < $leng) {
		if($kerdes[$i+1] === 'true')
			$this->pdf->SetFont('Arial','U', 12);
		$this->pdf->write(5, " ".$betu.") ".$kerdes[$i] ."\n");
		$i = $i + 2;
		$betu++;
		$this->pdf->SetFont('Arial','', 12);
	}
	$this->pdf->write(5, "\n\n\n");
	$this->kerds++;
	
}	
function lezar() {
	$this->pdf->Output('Diploma.PDF', 'I');
}
} 
?>