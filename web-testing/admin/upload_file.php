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