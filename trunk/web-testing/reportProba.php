<?php
header("Content-Type: text/html; charset=utf-8");
?>
<?php
require("ReportGenerator/meghivas.php");
require("readQuestion.php");
//function meghivas($kerdesek,$pont, $user, $answers, $pontok $R=0, $G=0, $B=0);
 /* A meghivas parameterei:
  * 
  * $kerdesek --> readQuestion.php -ban lévõ atalakitReportTombe - függvény által
  * visszatérített tömb; (kötelezõ megadni)
  * pontszám --> readOneCorrectPoint($teszt) --> eredménye
  * $user --> egy tömb aminek az elemei:
  * Név, felhasználónév, emailcím(kötelezõ megadni)
  * Az answers egy olyan tömb, aminek az elemei, a 
  * felhasználó válaszai a kérdésre. Mûködik egyválasztos, és többválasztos
  * kérdések esetén is. (kötelezõ megadni)
  * $R, $G, $B - a szöveg rgb színe, nem kötelezõ megadni
  * Példa: lennebb  
  * $pontok --> az elért pontszámot tartalmazza
  */

// kérdések beálítása
 $kerdesek = atalakitReportTombe('xml/Proba.xml');
 // felhasználó beálítása
 $felhasznalo = array();
 $felhasznalo[0] = "Vak Béla";
 $felhasznalo[1] = "saito";
 $felhasznalo[2] = "vakbela@gmail.com";
 // válaszok beálítása
 $ans = array();
 // egy helyes válasz van esetén:
 $ans[0] = 'a';   // elsõ kérdés, ha egy válasz van
 $valasz = array();
 // második kérdés, ha több válasz van
 $valasz[0] = 'a';
 $valasz[1] = 'b';
 $ans[1] = $valasz;
 // több helyes válasz van esetén:
 /*
  * $valasz1 = array();
  * $valasz1[0] = 'a';
  * $valasz1[1] = 'b';
  * 
  * $valasz2 = array();
  * $valasz2[0] = 'a';
  * $valasz2[1] = 'd';
  *  $ans[0] = $valasz1;
  *  $ans[1] = $valasz2;
  */
 // pontszám beálítása:
  $pont = readOneCorrectPoint('xml/Proba.xml');
  // elért pontok :
  $pontok = 5;
  // Generálás meghívása:
 meghivas($kerdesek, $pont, $felhasznalo, $ans, 5);
 // vagy: 
 //meghivas($kerdesek,$pont, $felhasznalo, $ans, $pontok, 100, 20, 30);
?>