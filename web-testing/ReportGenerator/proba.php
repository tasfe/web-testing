<?php
require('ReportGenerator.php');
$nev = "Kis Pista";

$kerdesek = array("H�ny darab pr�msz�m van?", "A", "B", "C", "D", "F");
$valaszok = "M�g nincs k�sz";
$en_valasz = array("2", "4", "3", "5", "7", "9");
$hely_valasz = array("a", "b", "c", "d", "e", "f");
$general=new ReportGenerator($nev,"dundyvega", "bundy@gmal.com", $kerdesek, $valaszok, $en_valasz, $hely_valasz);
$general->generald(12, 200, 150);
?>