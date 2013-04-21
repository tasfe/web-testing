<?php
function meghivas($kerdesek, $R=0, $G=0, $B=0) {
  require('report.php');
  $generator = new report("valaki", "valami");
  $generator->irdKi($R, $G, $B);
  $num = count($kerdesek);
  for($i = 0; $i <$num; ++$i) {
 	$x = $kerdesek[$i];
 	if($x[0] === 'ok')
 		$generator->ujKerdes($x, $pont[0]);
 	
 }

while (ob_get_level())
	ob_end_clean();
$generator->lezar();
}
?>
