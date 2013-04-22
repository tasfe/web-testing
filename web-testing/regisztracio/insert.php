<?php

function reg_check(){

	global $hibak;
	$hibak = array();
	//csaladnev pipa
	//echo strlen($_POST['reg_surname']);
	if(strlen($_POST['reg_surname']) < 3)
	{
		echo "A csal�dn�v legal�bb 3 bet�s legyen, kit�lt�se pedig k�telez� ! <br/>";
		$hibak['reg_surname'] = 'A csal�dn�v legal�bb 3 bet�s legyen, kit�lt�se pedig k�telez�';
	}
	else if (!preg_match('/[-a-zA-Z����������������������ª�]*/', $_POST['reg_surname']))
	{
		echo "A csal�dn�vben csak a magyar �s rom�n �b�c� kis - �s nagybet�i enged�lyezettek!<br/>";
		$hibak['reg_surname'] = 'A csal�dn�vben csak a magyar �b�c� kis - �s nagybet�i enged�lyezettek';
	}
	
	//keresztnev pipa
	if(strlen($_POST['reg_first_name']) < 3)
	{
		echo "A keresztn�v legal�bb 3 bet�s legyen, kit�lt�se pedig k�telez�<br/>";
		$hibak['reg_first_name'] = 'A keresztn�v legal�bb 3 bet�s legyen, kit�lt�se pedig k�telez�';
	}
	else if (!preg_match('/[-a-zA-Z����������������������ª�]*/', $_POST['reg_first_name']))
	{
		echo "A keresztn�vben csak a magyar �s rom�n �b�c� kis - �s nagybet�i enged�lyezettek!<br/>";
		$hibak['reg_first_name'] = 'A keresztn�vben csak a magyar �b�c� kis - �s nagybet�i enged�lyezettek';
		$szam=$szam+1;
	}
	
	//e-mail cim pipa
	if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/', $_POST['email']))
	{
		echo "Hib�s e-mail c�m �s az e-mail kit�lt�se k�telez�!<br/>";
		$hibak['email'] = 'Hib�s e-mail c�m �s az e-mail kit�lt�se k�telez�!';
	}

	//jelszo1 pipa
	if (strlen($_POST['your_password']) < 5)
	{
		echo "A jelsz�nak legal�bb 5 karakterb�l kell �llnia, es kit�lt�se k�telez�!<br/>";
		$hibak['your_password'] = 'A jelsz�nak legal�bb 5 karakterb�l kell �llnia, es kit�lt�se k�telez�!';
		
	}
	
	//jelszo2 pipa
	if (strcmp($_POST['your_password'],$_POST['your_password2']) != 0)
	{
		echo "Helytelen jelsz� meger�s�t�s.<br/>";
		$hibak['your_password2'] = 'Helytelen jelsz� meger�s�t�s.';
	}
	
	//telepules pipa
	if(strlen($_POST['city']) < 3)
	{
		echo "A telep�l�s neve legal�bb 4 bet�s legyen, kit�lt�se pedig k�telez�!<br/>";
		$hibak['city'] = 'A telep�l�s neve legal�bb 4 bet�s legyen, kit�lt�se pedig k�telez�';
	}
	else if (!preg_match('/[-a-zA-Z����������������������ª�]*/', $_POST['city']))
	//else if (!preg_match('/^[[:alpha:]]+$/', $_POST['city']))
	{
		echo "A v�ros nev�ben csak a magyar �s rom�n �b�c� kis - �s nagybet�i enged�lyezettek!<br/>";
		$hibak['city'] = 'A v�ros nev�ben csak a magyar �b�c� kis - �s nagybet�i enged�lyezettek';
	}
	//szuletesi d�tum pipa
	if(!preg_match('/^(19|20)\d\d[- \.](0[1-9]|1[012])[- \.](0[1-9]|[12][0-9]|3[01])[\.]$/',$_POST['date_of_birth']))
	{
		echo "A sz�let�si d�tumot a k�vetkez� form�ban adja meg : �v.h�nap.nap. !<br/>";
		$hibak['date_of_birth'] = 'A sz�let�si d�tumot a k�vetkez� form�ban adja meg : �v.h�nap.nap. ';
	}
	//telefonszam pipa
	if(strlen($_POST['tel_nr']) > 0)
		if (!preg_match('/^[0-9\+]{10,14}$/', $_POST['tel_nr']))
		{
			echo "Hibas telefonszam!<br/>";
			$hibak['tel_nr'] = 'Hibas telefonszam!';
		}
		
	if ($hibak)
		return $hibak;
	else
		return "igaz";
}

if(reg_check() == "igaz") {

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
	
	$select = mysql_query("SELECT adatok.emailc�m FROM adatok WHERE adatok.emailc�m = '$_POST[email]'");
	if(mysql_num_rows($select) > 0 ) { //check if there is already an entry for that username
		echo "Ezzel az e-mail cimmel mar valaki regisztralt. Kerem probalja meg egy masik hasznalatat! <br/>";
	} else {
		mysql_query("TRUNCATE adatok.idadatok");
		mysql_query("INSERT INTO adatok VALUES (0,'$_POST[email]','$_POST[your_password]','$_POST[reg_surname]','$_POST[reg_first_name]','$_POST[date_of_birth]','$_POST[city]','$_POST[tel_nr]')");
	}
}
else {
	echo 'Nem megfelel� adatok! K�rem ellen�rizze �ket!';
	//header('location:regisztracio.php');
}


?>