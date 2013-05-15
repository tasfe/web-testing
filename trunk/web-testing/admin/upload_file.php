<?php

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
	
	$c = readName($file);
	$k = readCategory($file);
	
	$osszes = array();
	$osszes [] = array(
			'nev' => $file,
			'cim' => $c,
			'kategoria' => $k
	);

	$doc = new DOMDocument();
	$doc->load("../xml/feltoltott_tesztek.xml");
	$doc->formatOutput = true;

	foreach( $osszes as $teszt )
	{
		$b = $doc->createElement( "teszt" );

		$nev = $doc->createElement( "nev" );
		$nev->appendChild(
				$doc->createTextNode( $teszt['nev'] )
		);
		$b->appendChild( $nev );

		$cim = $doc->createElement( "cim" );
		$cim->appendChild(
				$doc->createTextNode( $teszt['cim'] )
		);
		$b->appendChild( $cim );

		$kategoria = $doc->createElement( "kategoria" );
		$kategoria->appendChild(
				$doc->createTextNode( $teszt['kategoria'] )
		);
		$b->appendChild( $kategoria );

		$root = $doc->getElementsByTagName(osszes)->item(0);
		$root->appendChild( $b );
	}

	$doc->save("../xml/feltoltott_tesztek.xml");
	
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
	
	$sql="INSERT INTO tesztek (TesztNev, KerdesSzam, TesztAktivitas) VALUES('UjNev', 8, 0 )";
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
	}
	else
	{
		if (file_exists("../tests/" . $_FILES["file"]["tmp_name"]))
		{
			echo $_FILES["file"]["name"] . " already exists. ";
		}
		else
		{
			echo "<script>alert(\"Hiba!\");</script>";
			echo $_FILES["file"]["tmp_name"];
			if (validate($_FILES["file"]["tmp_name"])) {
				move_uploaded_file($_FILES["file"]["tmp_name"],
				"../tests/" . $_FILES["file"]["name"]);
				refreshList($_FILES["file"]["name"]);
				//adatbazisba is feltolteni az uj tesztet
			} else
				echo "Invalid file";
		}
	}
}
else
{
	echo "Invalid file";
}

header('location:upload.php');
?>