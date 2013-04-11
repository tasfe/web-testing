<?php


function reg_check(){

	$hibak = array();
	$szam=0;
	if(strlen('$_POST[reg_surname]') < 3)
	{
		$hibak['reg_surname'] = 'A családnév legalább 4 betûs legyen, kitöltése pedig kötelezõ';
		$szam=$szam+1;
	}
	else if (!preg_match('[a-zA-ZáéíóöüóûÁÉÍÓÖÜÕÛ]', '$_POST[reg_surname]'))
	{
		$hibak['reg_surname'] = 'A családnévben csak a magyar ábécé kis - és nagybetûi engedélyezettek';
		$szam=$szam+1;
	}

	if ($szam!=0)
		return false;
	else
		return true;
}

if(reg_check() == true) {

	$db = 'adatok';
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	
	//connection to the database
	$dbhandle = mysql_connect($host, $user, $pass)
	or die("Unable to connect to MySQL");
	echo "Connected to MySQL<br>";
	
	//select a database to work with
	$selected = mysql_select_db($db)
	or die("Could not select database");
	
	//mysql_query("INSERT INTO `adatok` VALUES (0,'laszlorenata@yahoo.com',1234,'laszlo', 'renata','1991.06.14.','Kolozsvar','0751617904' )");
	
	mysql_query("INSERT INTO adatok VALUES (0,'$_POST[email]','$_POST[your_password]','$_POST[reg_surname]','$_POST[reg_first_name]','$_POST[date_of_birth]','$_POST[city]','$_POST[tel_nr]')");
}
else {
	echo "Nem megfelelo adatok";
}

?>