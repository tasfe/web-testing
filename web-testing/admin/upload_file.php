<?php
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

function validate($file) {

	$xml = new DOMDocument();
	$xml->load($file);

	chdir("../xml");
	if (!$xml->schemaValidate("TesztSema.xsd")) {
		return false;
	}
	else {
		return true;
	}
}


function refreshList($file) {

	include '../readQuestion.php';
	
	//$c = readName($file);
	$k = readCategory("../tests/" . $file);
	
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
	
	$q_nb = readQnumber($file);
	$sql="INSERT INTO tesztek (TesztNev, KerdesSzam, TesztAktivitas, Kategoria) VALUES('$file', $q_nb, 0, '$k' )";
	$result=mysql_query($sql);
	if(!$result)
		die("Sikertelen lekérdezés!");
	
	//free the resources associated with the result set
	mysql_free_result($result);
	//close connection
	mysql_close($dbhandle);
}

if ($_FILES["file"]["type"] == "text/xml") {
	if ($_FILES["file"]["error"] > 0)
	{
		echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
		$_SESSION['upload']='Sikertelen feltöltés.';
	}
	else
	{
		if (file_exists("../tests/" . $_FILES["file"]["tmp_name"]))
		{
			echo $_FILES["file"]["name"] . " already exists. ";
			$_SESSION['upload']='Ilyen teszt már létezik.';
		}
		else
		{
			//echo "<script>alert(\"Hiba!\");</script>";
			echo $_FILES["file"]["tmp_name"];
			if (validate($_FILES["file"]["tmp_name"])) {
				move_uploaded_file($_FILES["file"]["tmp_name"],
				"../tests/" . $_FILES["file"]["name"]);
				refreshList($_FILES["file"]["name"]);
				$_SESSION['upload']='Sikeres feltöltés.';
			} else {
				echo "Invalid file";
				$_SESSION['upload']='Nem létező file név.';
			}
		}
	}
}
else
{
	echo "Invalid file";
	$_SESSION['upload']='Nem megfelelő file típus. Csak text/xml fileok tölthetők fel.';
}

header('location:upload.php');
?>