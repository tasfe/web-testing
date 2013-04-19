<?php
class meghivas {
function meghivas($teszt, $R=0, $G=0, $B=0) {
  require('readQuestion.php');
  require('report.php');
  $generator = new report("valaki", "valami");
  $generator->irdKi($R, $G, $B);
  $pont = readOneCorrectPoint($teszt);
  $num = readQnumber($teszt);
  for($i = 0; $i <$num; ++$i) {
 	$x = readQ($i, $teszt);
 	if($x[0] === 'ok')
 		$generator->ujKerdes($x, $pont[0]);
 	
 }

while (ob_get_level())
	ob_end_clean();
$generator->lezar();
}
}
?>
