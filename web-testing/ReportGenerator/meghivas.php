<?php
header("Content-Type: text/html; charset=utf-8");
?>
<?php
require("report.php");
function meghivasR($kerdesek,$pont, $user, $answers, $pontok, $R = 0, $G = 0, $B = 0) {
  $generator = new report();
  $generator->irdKi($user, $R, $G, $B);
  $num = count($kerdesek);
  for($i = 0; $i <$num; ++$i) {
 	$x = $kerdesek[$i];
 	if($x[0] === 'ok') {
 		$generator->ujKerdes($x, $pont[0]);
 		$generator->enValaszaim($answers[$i]);
 	}
 	
 }
 $generator->pontokSzama($pontok);

while (ob_get_level())
	ob_end_clean();
$generator->lezar();
}
?>
