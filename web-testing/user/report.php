<?php
header("Content-Type: text/html; charset=utf-8");
?>
<?php
require_once("../ReportGenerator/report.php");
require_once("../readQuestion.php");
session_start();
// teszt neve a Get-ből
$tesztneve = $_POST['radio'];
//felhasználó neve a Session-ból
$felhasznalo = $_SESSION['your_email'];


$db = 'adatok';
$host = 'localhost';
$user = 'root';
$pass = '';
//connection to the database
$dbhandle = mysql_connect($host, $user, $pass)
or die("Nem lehet kapcsolódni MySQL-hez!");

//select a database to work with
$selected = mysql_select_db($db)
or die("Nem sikerült kapcsolódni az adatbázishoz!");


$felhasznal = $sql = "SELECT `csaladnev`,`keresztnev` FROM `adatok` WHERE `emailcim`= '". $felhasznalo . "'";
// felhasználó válaszainak lekérdezése
$valaszok ="SELECT max(`Datum`), `1Kerdes`, `2Kerdes`, `3Kerdes`, `4Kerdes`, `5Kerdes`, `6Kerdes`, `7Kerdes`, `9Kerdes`,`8Kerdes`, `10Kerdes`, `11Kerdes`,`12Kerdes`,`13Kerdes`, `14Kerdes`, `15Kerdes`,`16Kerdes`, `17Kerdes`, `18Kerdes`, `19Kerdes`, `20Kerdes`, `Eredmeny`
 FROM `kitoltotttesztek`, `tesztek` WHERE tesztek.idTesztek= kitoltotttesztek.idTesztek and `emailcim`= '". $felhasznalo . "' and `TesztNev` = '". $tesztneve . "'";
// felhasználó adatainak átálítása tömbé
$result=mysql_query($felhasznal);
if (!$result)
	die("Sikertelen lekérdezés!2");
$felhaszn = array();
while ($row = mysql_fetch_assoc($result)) {
	$felhaszn[0] = $row['csaladnev'] . "  " . $row['keresztnev'];
	$felhaszn[1] ="";
	$felhaszn[2] = $felhasznalo;
}
// felhasználó válaszainak átálítása tömbé
$res = mysql_query($valaszok);
if (!$res)
	die("Sikertelen lekérdezés!3");
$val = array();
$er = "";
while ($row = mysql_fetch_assoc($res)) {
	$val[0] = $row['1Kerdes'];
	$val[1] = $row['2Kerdes'];
	$val[2] = $row['3Kerdes'];
	$val[3] = $row['4Kerdes'];
	$val[4] = $row['5Kerdes'];
	$val[5] = $row['6Kerdes'];
	$val[6] = $row['7Kerdes'];
	$val[7] = $row['8Kerdes'];
	$val[8] = $row['9Kerdes'];
	$val[9] = $row['10Kerdes'];
	$val[10] = $row['11Kerdes'];
	$val[11] = $row['12Kerdes'];
	$val[12] = $row['13Kerdes'];
	$val[13] = $row['14Kerdes'];
	$val[14] = $row['15Kerdes'];
	$val[15] = $row['16Kerdes'];
	$val[16] = $row['17Kerdes'];
	$val[17] = $row['18Kerdes'];
	$val[18] = $row['19Kerdes'];
	$val[19] = $row['20Kerdes'];
	$er = $row['Eredmeny'];
}
//kérdések lekérdezése
$tsz = "../tests/" . $tesztneve;
$kerdesek = atalakitReportTombe($tsz);
$pont = readOneCorrectPoint($tsz);
//free the resources associated with the result set
mysql_free_result($result);
mysql_free_result($res);
//close connection
mysql_close($dbhandle);

$generator = new report();
$generator->irdKi($felhaszn, $R, $G, $B);
$num = count($kerdesek);
for($i = 0; $i <$num; ++$i) {
	$x = $kerdesek[$i];
	if($x[0] === 'ok') {
		$generator->ujKerdes($x, $pont[0]);
		$generator->enValaszaim($val[$i]);
	}
		
}
$generator->pontokSzama($er);
	
while (ob_get_level())
	ob_end_clean();
$generator->lezar();


?>