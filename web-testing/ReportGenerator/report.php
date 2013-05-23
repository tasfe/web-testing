<?php
header("Content-Type: text/html; charset=utf-8");
?>
<?php
class report
{
var $user;
var $answers;
var $points;
var $kerds = 1;
/*************************************************/

function report() {

}
function irdKi($user, $R = 0, $G = 0, $B = 0) {
		require('tcpdf/tcpdf.php');
		$this->pdf=new TCPDF();
		$this->pdf->AddPage();
		
		 $this->pdf->SetFontSize(12);
		$this->pdf->SetTextColor($R, $G, $B);
	 	$this->pdf->write(5, "A felhasználó neve: ". $user[0]."\n");
	     $this->pdf->write(5, "Felhasználó emailcíme: ".$user[2]."\n\n\n\n");	
	
		$this->pdf->SetFontSize(54);
		$this->pdf->SetTextColor(0, 0, 0);
		$this->pdf->write(50, '           Oklevél'."\n");
	
		$this->pdf->SetFontSize(12);
		$this->pdf->SetTextColor($R, $G, $B);
	}
function ujKerdes($kerdes, $pt) {
	$leng = count($kerdes);
	$this->pdf->write(5, $this->kerds . ") ".$kerdes[1]. "   (".$pt . "pont)"."\n\n");
	$i = 2;
	$betu = 'a';
	$helyesvalasz = "";
	while($i < $leng) {
		if($kerdes[$i+1] === 'true')
			$helyesvalasz = $helyesvalasz . "     " . $kerdes[$i];
		$this->pdf->write(5, " ".$betu.") ".$kerdes[$i] ."\n");
		$i = $i + 2;
		$betu++;
		$this->pdf->SetFontSize(12);
	}
	$this->pdf->write(5, "A helyes válasz(ok): \n" . "  " .$helyesvalasz);
	$this->pdf->write(5, "");
	$this->kerds++;
	
}	
function envalaszaim($ans) {
	$this->pdf->write(10, "\nA felhasználó ezt(ezeket) választotta: \n");
	$num = count($ans);
	$this->pdf->write(5, "    ");
	for($i = 0; $i < $num; ++$i) 
		$this->pdf->write(5, $ans[$i] . ",    ");
	$this->pdf->write(10, "\n\n\n\n");
} 
function pontokSzama($pontok) {
	$this->pdf->write(10, "Az elért jegy: " .$pontok);
}
function lezar() {
	$this->pdf->Output('Diploma.PDF', 'I');
}
} 
?>