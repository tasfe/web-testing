<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body>
	<?php

	//teszt cime
	function readName($teszt) {
		$dom = new DOMDocument();
		$dom->load($teszt);
		$tt = $dom->getElementsByTagName('teszt');
		
		foreach ($tt as $t) {
			$string = $t->getElementsByTagName('cim')
			->item(0)
			->nodeValue;
		}
		
		return $string;
	}
	
	//helyes valaszok maximalis szama
	function readCorrect($teszt) {
		$dom = new DOMDocument();
		$dom->load($teszt);
		$jellemzok = $dom->getElementsByTagName('jellemzok');
	
		foreach ($jellemzok as $j) {
			$string = $j->getElementsByTagName('helyesvalaszszam')
			->item(0)
			->nodeValue;
		}
		
		return $string;
	}
	
	//hany helyes valasz van a tesztben
	function readTrues($teszt) {
		$dom = new DOMDocument();
		$dom->load($teszt);
		$feladat = $dom->getElementsByTagName('feladat');
		
		$helyesek = 0;
		foreach ($feladat as $f)
		{
			foreach($f->childNodes as $nodename)
			{
				if($nodename->nodeName=='valasz')
				{
					foreach($nodename->childNodes as $subNodes)
					{
					 if ($subNodes->nodeName=="helyes")
					 {
					 	$string = $subNodes->nodeValue;
					 	if ($string == "true")
					 		$helyesek++;
					 }
					}
				}
			}
		}
		return $helyesek;
	}
	
	//osszegyujtheto pontok szama
	function readPoints($teszt) {
		$dom = new DOMDocument();
		$dom->load($teszt);
		$tt = $dom->getElementsByTagName('teszt');
		
		$kerdesek_szama = readQnumber($teszt);
		
		foreach ($tt as $t) {
			$helyes_pont = $t->getElementsByTagName('egyhelyesvalaszp')
			->item(0)
			->nodeValue;
		
			$reszpont = $t->getElementsByTagName('reszpont')
			->item(0)
			->nodeValue;
		
			$kerdesek_szam = readQnumber($teszt);
			$helyesek = readTrues($teszt);
			
			if ($reszpont == "igen") {
				$osszpontszam = $helyes_pont*$helyesek;
			} else {
				$osszpontszam = $helyes_pont*$kerdesek_szama;
			}
		}
		
		return $osszpontszam;
	}
	
	//egy helyes valasznak a pontszama
	function readOneCorrectPoint($teszt) {
		$dom = new DOMDocument();
		$dom->load($teszt);
		$tt = $dom->getElementsByTagName('teszt');
		
		foreach ($tt as $t) {
			$helyes_pont = $t->getElementsByTagName('egyhelyesvalaszp')
			->item(0)
			->nodeValue;
			$response[0] = $helyes_pont;
			
			$reszpont = $t->getElementsByTagName('reszpont')
			->item(0)
			->nodeValue;
			$response[1] = $reszpont;
		}
		
		return $response;
	}
	
	//kerdesek szama
	function readQnumber($teszt) {
		$dom = new DOMDocument();
		$dom->load($teszt);
		$feladat = $dom->getElementsByTagName('feladat');
		
		$kerdesek_szama=0;
		foreach ($feladat as $f)
		{
			$kerdesek_szama++;
		}
		
		return $kerdesek_szama;
	}
	
	//az i. kerdes es valaszai
	function readQ($i, $teszt) {
		$dom = new DOMDocument();
		$dom->load($teszt);

		$j=2;
		if (is_object($fel = $dom->getElementsByTagName("feladat")->item($i)))
		{
			foreach($fel->childNodes as $nodename)
			{
				if($nodename->nodeName=='valasz')
				{
					foreach($nodename->childNodes as $subNodes)
					{
						if($subNodes->nodeName=='szoveg')
						{
							//valasz szovege
							$string = $subNodes->nodeValue;
							$reply[$j]=$string;
							$j++;
						} if ($subNodes->nodeName=="helyes")
						  {
							//helyesseg
							$string = $subNodes->nodeValue;
							$reply[$j]=$string;
							$j++;
							}
						}
						}
						if ($nodename->nodeName=="kerdes")
						{
							//kerdes
							$string = $nodename->nodeValue;
							$reply[0]="ok";
							$reply[1]=$string;
						}
					}
				} else {
						$reply[0]="hiba";
				}
	
	return $reply;
}
// az összes kérdés egybokorban
function atalakitReportTombe($teszt) {
	$num = readQnumber($teszt);
	$tomb = array();
	for($i = 0; $i < $num; ++$i)
		$tomb[$i] = readQ($i, $teszt);
	return $tomb;
}

//echo readName("Proba.xml");

//echo readCorrect("Proba.xml");

//echo readQnumber("Proba.xml");

//echo readPoints("Proba.xml");

// $rep = readQ(1, "Proba.xml");
// foreach($rep as $r)
// 	echo $r . " ";
?>

</body>
</html>
