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
function irdKi($user, $R=0, $G=0, $B=0) {
		require('pdfgen/fpdf.php');
		$this->pdf=new FPDF();
		$this->pdf->AddPage();
		
		 $this->pdf->SetFont('Arial', '', 12);
		$this->pdf->SetTextColor($R, $G, $B);
	 	$this->pdf->write(5, "A felhasználó neve: ". $user[0]."\n");
    	$this->pdf->write(5, "Felhasználó felhasználóneve: ".$user[1]."\n");
	     $this->pdf->write(5, "Felhasználó emailcíme: ".$user[2]."\n\n\n\n");	
	
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
function envalaszaim($ans) {
	$this->pdf->write(10, "Ezt(ezeket) válaszolta: \n");
	$num = count($ans);
	for($i = 0; $i < $num; ++$i) 
		$this->pdf->write(5, $ans[$i] . ",    ");
	$this->pdf->write(10, "\n");
} 
function pontokSzama($pontok) {
	$this->pdf->write(10, "Az elért pontjaidnak a száma: " .$pontok);
}
function lezar() {
	$this->pdf->Output('Diploma.PDF', 'I');
}
} 
?>