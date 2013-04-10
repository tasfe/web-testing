<?php
$db = 'examples';
$host = 'localhost';
$user = 'root';
$pass = '';

$conn = mysql_connect($host, $user, $pass) or die('failed to connect');
mysql_select_db($db,$conn) or die('failed to select');
?>