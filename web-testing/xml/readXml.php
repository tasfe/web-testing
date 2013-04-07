<?php
$dom = new DOMDocument();
$dom->load('Proba.xml');

$teszt = $dom->getElementsByTagName('teszt');
$jellemzok = $dom->getElementsByTagName('jellemzok');
?>
<ul style="list-style: none;">
	<?php 
	foreach ($teszt as $t) {
?>
	<li><b>Cím:</b> <?php 
	$string = $t->getElementsByTagName('cim')
	->item(0)
	->nodeValue;
	echo mb_convert_encoding($string,'HTML-ENTITIES','utf-8');
?>
	</li>
	<?php
	
	$i=0;
	while(is_object($fel = $dom->getElementsByTagName("feladat")->item($i)))
	{
		foreach($fel->childNodes as $nodename)
		{
			if($nodename->nodeName=='valasz')
			{
				foreach($nodename->childNodes as $subNodes)
				{
					if($subNodes->nodeName=='szoveg')
					{?><li><b>Válasz szövege: </b><?php 
						$string = $subNodes->nodeValue;
						echo mb_convert_encoding($string,'HTML-ENTITIES','utf-8');?></li><?php
					} if ($subNodes->nodeName=="helyes")
					{?><li><b>Helyesség: </b><?php 
						$string = $subNodes->nodeValue;
						echo mb_convert_encoding($string,'HTML-ENTITIES','utf-8');?></li><?php
					}
				}
			}
			if ($nodename->nodeName=="kerdes")
			{?><li></li><li><b>Kérdés: </b><?php 
				$string = $nodename->nodeValue;
				echo mb_convert_encoding($string,'HTML-ENTITIES','utf-8');?></li><?php 
			}
		}
		$i++;
	}?>
	<li></li><li><b>Egy helyes válasz pontszáma:</b> <?php echo $t->getElementsByTagName('egyhelyesvalaszp')
	->item(0)
	->nodeValue; ?>
	</li>
	<li><b>Részpont:</b> <?php
	echo $t->getElementsByTagName('reszpont')
	->item(0)
	->nodeValue; ?>
	</li>
	<li></li>
	<?php 
	foreach ($jellemzok as $j) {
?>
	<li><b>Kategória:</b> <?php $string = $j->getElementsByTagName('kategoria')
	->item(0)
	->nodeValue;
	echo mb_convert_encoding($string,'HTML-ENTITIES','utf-8'); ?>
	</li>
	<li><b>Megengedett kitöltések száma:</b> <?php echo $j->getElementsByTagName('kitoltesszam')
	->item(0)
	->nodeValue; ?>
	</li>
	<li><b>Lehetséges helyes válaszok száma (maximum):</b> <?php echo $j->getElementsByTagName('helyesvalaszszam')
	->item(0)
	->nodeValue; ?>
	</li>
	<?php
}
?>
	<?php
}
?>
</ul>
