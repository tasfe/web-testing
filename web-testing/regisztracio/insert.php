<?php

function reg_check(){

	global $hibak;
	$hibak = array();
	//csaladnev pipa
	//echo strlen($_POST['reg_surname']);
	if(strlen($_POST['reg_surname']) < 3)
	{
		echo "A családnév legalább 3 betûs legyen, kitöltése pedig kötelezõ ! <br/>";
		$hibak['reg_surname'] = 'A családnév legalább 3 betûs legyen, kitöltése pedig kötelezõ';
	}
	else if (!preg_match('/[-a-zA-ZáéíóöüóûãîâºşÁÉÍÓÖÜÕÛÃÎÂªŞ]*/', $_POST['reg_surname']))
	{
		echo "A családnévben csak a magyar és román ábécé kis - és nagybetûi engedélyezettek!<br/>";
		$hibak['reg_surname'] = 'A családnévben csak a magyar ábécé kis - és nagybetûi engedélyezettek';
	}
	
	//keresztnev pipa
	if(strlen($_POST['reg_first_name']) < 3)
	{
		echo "A keresztnév legalább 3 betûs legyen, kitöltése pedig kötelezõ<br/>";
		$hibak['reg_first_name'] = 'A keresztnév legalább 3 betûs legyen, kitöltése pedig kötelezõ';
	}
	else if (!preg_match('/[-a-zA-ZáéíóöüóûãîâºşÁÉÍÓÖÜÕÛÃÎÂªŞ]*/', $_POST['reg_first_name']))
	{
		echo "A keresztnévben csak a magyar és román ábécé kis - és nagybetûi engedélyezettek!<br/>";
		$hibak['reg_first_name'] = 'A keresztnévben csak a magyar ábécé kis - és nagybetûi engedélyezettek';
		$szam=$szam+1;
	}
	
	//e-mail cim pipa
	if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/', $_POST['email']))
	{
		echo "Hibás e-mail cím és az e-mail kitöltése kötelezõ!<br/>";
		$hibak['email'] = 'Hibás e-mail cím és az e-mail kitöltése kötelezõ!';
	}

	//jelszo1 pipa
	if (strlen($_POST['your_password']) < 5)
	{
		echo "A jelszónak legalább 5 karakterbõl kell állnia, es kitöltése kötelezõ!<br/>";
		$hibak['your_password'] = 'A jelszónak legalább 5 karakterbõl kell állnia, es kitöltése kötelezõ!';
		
	}
	
	//jelszo2 pipa
	if (strcmp($_POST['your_password'],$_POST['your_password2']) != 0)
	{
		echo "Helytelen jelszó megerõsítés.<br/>";
		$hibak['your_password2'] = 'Helytelen jelszó megerõsítés.';
	}
	
	//telepules pipa
	if(strlen($_POST['city']) < 3)
	{
		echo "A település neve legalább 4 betûs legyen, kitöltése pedig kötelezõ!<br/>";
		$hibak['city'] = 'A település neve legalább 4 betûs legyen, kitöltése pedig kötelezõ';
	}
	else if (!preg_match('/[-a-zA-ZáéíóöüóûãîâºşÁÉÍÓÖÜÕÛÃÎÂªŞ]*/', $_POST['city']))
	//else if (!preg_match('/^[[:alpha:]]+$/', $_POST['city']))
	{
		echo "A város nevében csak a magyar és román ábécé kis - és nagybetûi engedélyezettek!<br/>";
		$hibak['city'] = 'A város nevében csak a magyar ábécé kis - és nagybetûi engedélyezettek';
	}
	//szuletesi dátum pipa
	if(!preg_match('/^(19|20)\d\d[- \.](0[1-9]|1[012])[- \.](0[1-9]|[12][0-9]|3[01])[\.]$/',$_POST['date_of_birth']))
	{
		echo "A születési dátumot a következõ formában adja meg : év.hónap.nap. !<br/>";
		$hibak['date_of_birth'] = 'A születési dátumot a következõ formában adja meg : év.hónap.nap. ';
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
	
	$select = mysql_query("SELECT adatok.emailcím FROM adatok WHERE adatok.emailcím = '$_POST[email]'");
	if(mysql_num_rows($select) > 0 ) { //check if there is already an entry for that username
		echo "Ezzel az e-mail cimmel mar valaki regisztralt. Kerem probalja meg egy masik hasznalatat! <br/>";
	} else {
		mysql_query("TRUNCATE adatok.idadatok");
		mysql_query("INSERT INTO adatok VALUES (0,'$_POST[email]','$_POST[your_password]','$_POST[reg_surname]','$_POST[reg_first_name]','$_POST[date_of_birth]','$_POST[city]','$_POST[tel_nr]')");
	}
}
else {
	echo 'Nem megfelelõ adatok! Kérem ellenõrizze õket!';
	//header('location:regisztracio.php');
}


?>