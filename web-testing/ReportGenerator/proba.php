<?php
require('ReportGenerator.php');
$nev = "Kis Pista";

$kerdesek = array("Hány darab prímszám van?", 
		"Hány darab pozitív osztója van a kettõnek", 
		"Hány darab egész osztója van a négynek");
$valaszok = "Még nincs kész";
$en_valasz = array("végtelen", "1", "10");
$hely_valasz = array("végtelen", "2", "6");
$general=new ReportGenerator($nev,"dundyvega", "bundy@gmal.com", $kerdesek, $valaszok, $en_valasz, $hely_valasz);
$general->generald2(255, 0, 100);
?>