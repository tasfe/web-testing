<?php
require("../ReportGenerator/meghivas.php");
require("../readQuestion.php");
	session_start();

	if (isset($_SESSION['your_email']))
	{
		if($_SESSION['your_email']!='admin')
		{
			$_SESSION['login']='Nincs jogosultságod megtekinteni ezt az oldalt!';
			header("location:../index.php");
		}
	}
	else
	{
		$_SESSION['login']='Jelentkezz be ahhoz, hogy megtekinthesd ezt az oldalt!';
		header("location:../index.php");
	}
	
	switch ($_POST['submit']) {
		
		case 'Report generálása':
			$radio = $_POST['radio'];
			
			
			
			
			
			
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
			
			if (isset($_SESSION['successful']))
			{
				unset($_SESSION['successful']);
				$sql="SELECT csaladnev, keresztnev, TesztNev, adatok.emailcim, KerdesSzam, Kategoria, Eredmeny FROM adatok, tesztek, kitoltotttesztek
						WHERE adatok.emailcim = kitoltotttesztek.emailcim and tesztek.idTesztek = kitoltotttesztek.idTesztek
						and kitoltotttesztek.Eredmeny >= 5";
			}
			else
			{
				$sql="SELECT csaladnev, keresztnev, adatok.emailcim, TesztNev, KerdesSzam, Kategoria, Eredmeny FROM adatok, tesztek, kitoltotttesztek
						WHERE adatok.emailcim = kitoltotttesztek.emailcim and tesztek.idTesztek = kitoltotttesztek.idTesztek";
			}
			$result=mysql_query($sql);
			if(!$result)
				die("Sikertelen lekérdezés1!");
			
			$dia = 0;
			$index = 0;
			$felhasznalo = "";
			$tesztneve = "";
			while ($row = mysql_fetch_assoc($result)) {
				if($index != $radio)
					$index ++;
				else {
					$tesztneve = $row['TesztNev'];
					$felhasznalo = $row['emailcim'];
					$dia = 1;
					break;
				}
			}
				
			mysql_free_result($result);
			//mysql_free_result($res);
			//close connection
			mysql_close($dbhandle);
			
			
			
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
				$val[019] = $row['20Kerdes'];
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
			meghivasR($kerdesek, $pont, $felhaszn,$val ,$er);
			break;

		case 'Sikeres tesztek':
			$_SESSION['successful']='true';
			break;
	}
	header("location:view_completed_test.php");
	
?>