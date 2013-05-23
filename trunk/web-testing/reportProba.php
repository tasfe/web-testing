<?php
require("ReportGenerator/meghivas.php");
require("readQuestion.php");
//function meghivas($kerdesek,$pont, $user, $answers, $pontok $R=0, $G=0, $B=0);
 /* A meghivas parameterei:
  * 
  * $kerdesek --> readQuestion.php -ban l�v� atalakitReportTombe - f�ggv�ny �ltal
  * visszat�r�tett t�mb; (k�telez� megadni)
  * pontsz�m --> readOneCorrectPoint($teszt) --> eredm�nye
  * $user --> egy t�mb aminek az elemei:
  * N�v, felhaszn�l�n�v, emailc�m(k�telez� megadni)
  * Az answers egy olyan t�mb, aminek az elemei, a 
  * felhaszn�l� v�laszai a k�rd�sre. M�k�dik egyv�lasztos, �s t�bbv�lasztos
  * k�rd�sek eset�n is. (k�telez� megadni)
  * $R, $G, $B - a sz�veg rgb sz�ne, nem k�telez� megadni
  * P�lda: lennebb  
  * $pontok --> az el�rt pontsz�mot tartalmazza
  */

// k�rd�sek be�l�t�sa
 $kerdesek = atalakitReportTombe('xml/Proba.xml');
 // felhaszn�l� be�l�t�sa
 $felhasznalo = array();
 $felhasznalo[0] = "Vak B�la";
 $felhasznalo[1] = "saito";
 $felhasznalo[2] = "vakbela@gmail.com";
 // v�laszok be�l�t�sa
 $ans = array();
 // egy helyes v�lasz van eset�n:
 $ans[0] = 'a';   // els� k�rd�s, ha egy v�lasz van
 $valasz = array();
 // m�sodik k�rd�s, ha t�bb v�lasz van
 $valasz[0] = 'a';
 $valasz[1] = 'b';
 $ans[1] = $valasz;
 // t�bb helyes v�lasz van eset�n:
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
 // pontsz�m be�l�t�sa:
  $pont = readOneCorrectPoint('xml/Proba.xml');
  // el�rt pontok :
  $pontok = 5;
  // Gener�l�s megh�v�sa:
  
 meghivasR($kerdesek, $pont, $felhasznalo, $ans, $pontok);
 // vagy: 
 //meghivas($kerdesek,$pont, $felhasznalo, $ans, $pontok, 100, 20, 30);
?>