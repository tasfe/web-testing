<?php
require('ReportGenerator.php');
$nev = "Kis Pista";

$kerdesek = array("H�ny darab pr�msz�m van?", 
		"H�ny darab pozit�v oszt�ja van a kett�nek", 
		"H�ny darab eg�sz oszt�ja van a n�gynek");
$valaszok = "M�g nincs k�sz";
$en_valasz = array("v�gtelen", "1", "10");
$hely_valasz = array("v�gtelen", "2", "6");
$general=new ReportGenerator($nev,"dundyvega", "bundy@gmal.com", $kerdesek, $valaszok, $en_valasz, $hely_valasz);
$general->generald2(255, 0, 100);
?>