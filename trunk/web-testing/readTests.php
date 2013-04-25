<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body>
<?php

function readTestName($kategoria) {
	$dom = new DOMDocument();
	$dom->load("../xml/feltoltott_tesztek.xml");
	$teszt = $dom->getElementsByTagName('teszt');
	
	$i = 1;
	
	foreach ($teszt as $t) {
		$temp = $t->getElementsByTagName('kategoria')
		->item(0)
		->nodeValue;
		
		if ($temp == $kategoria) {
			
			$temp2 = $t->getElementsByTagName('nev')
			->item(0)
			->nodeValue;
			$reply[$i] = $temp2;
				
			$i++;
			
			$temp2 = $t->getElementsByTagName('cim')
			->item(0)
			->nodeValue;
			$reply[$i] = $temp2;
				
			$i++;
			
		}
	}
	if ($i > 1)
		$reply[0] = "ok";
	else
		$reply[0] = "hiba";
					

	return $reply;
}

?>

</body>
</html>