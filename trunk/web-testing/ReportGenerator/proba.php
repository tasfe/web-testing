<?php
require('ReportGenerator.php');
$nev = "Kis Pista";

$kerdesek = array("Hány darab primszám van", "A", "B", "C", "D", "F");
$valaszok = "Még nincs kész";
$en_valasz = array("2", "4", "3", "5", "7", "9");
$hely_valasz = array("a", "b", "c", "d", "e", "f");
$general=new ReportGenerator($nev,"dundyvega", "bundy@gmal.com", $kerdesek, $valaszok, $en_valasz, $hely_valasz);
$general->generald();
?>