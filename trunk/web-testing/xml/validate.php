<?php

$xml = new DOMDocument(); 
$xml->load('./Proba.xml');

if (!$xml->schemaValidate('./TesztSema.xsd')) { 
   echo "invalid<p/>";
} 
else { 
   echo "validated<p/>"; 
} 

?>