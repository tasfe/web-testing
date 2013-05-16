<?php

function reg_check(){

	global $hibak;
	$hibak = array();
	//csaladnev pipa
	if(strlen($_POST['reg_surname']) < 3)
	{
		echo "A családnév legalább 3 betűs legyen, kitöltése pedig kötelező ! <br/>";
		$hibak['reg_surname'] = 'A családnév legalább 3 betűs legyen, kitöltése pedig kötelező';
	}
	else if (!preg_match('/[-a-zA-ZáéíóúüöűőÁÉÍÚŰŐÓÜÖşţăîâŞŢĂÎÂ]*/', $_POST['reg_surname']))
	{
		echo "A családnévben csak a magyar és román ábécé kis - és nagybetűi engedélyezettek!<br/>";
		$hibak['reg_surname'] = 'A családnévben csak a magyar ábécé kis - és nagybetűi engedélyezettek';
	}
	
	//keresztnev pipa
	if(strlen($_POST['reg_first_name']) < 3)
	{
		echo "A keresztnév legalább 3 betűs legyen, kitöltése pedig kötelező<br/>";
		$hibak['reg_first_name'] = 'A keresztnév legalább 3 betűs legyen, kitöltése pedig kötelező';
	}
	else if (!preg_match('/[-a-zA-ZáéíóúüöűőÁÉÍÚŰŐÓÜÖşţăîâŞŢĂÎÂ]*/', $_POST['reg_first_name']))
	{
		echo "A keresztnévben csak a magyar és román ábécé kis - és nagybetűi engedélyezettek!<br/>";
		$hibak['reg_first_name'] = 'A családnévben csak a magyar ábécé kis - és nagybetűi engedélyezettek';
		$szam=$szam+1;
	}
	
	//e-mail cim pipa
	if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/', $_POST['email']))
	{
		echo "Hibás e-mail cím és az e-mail kitöltése kötelező!<br/>";
		$hibak['email'] = 'Hibás e-mail cím és az e-mail kitöltése kötelező!';
	}

	//jelszo1 pipa
	if (strlen($_POST['your_password']) < 5)
	{
		echo "A jelszónak legalább 5 karakterből kell állnia, es kitöltése kötelező!<br/>";
		$hibak['your_password'] = 'A jelszónak legalább 5 karakterből kell állnia, és kitöltése kötelező!';
		
	}
	
	//jelszo2 pipa
	if (strcmp($_POST['your_password'],$_POST['your_password2']) != 0)
	{
		echo "Helytelen jelszó megerősítés.<br/>";
		$hibak['your_password2'] = 'Helytelen jelszó megerősítés.';
	}
	
	//telepules pipa
	if(strlen($_POST['city']) < 3)
	{
		echo "A település neve legalább 4 betűs legyen, kitöltése pedig kötelező!<br/>";
		$hibak['city'] = 'A település neve legalább 4 betűs legyen, kitöltése pedig kötelező!';
	}
	else if (!preg_match('/[-a-zA-ZáéíóúüöűőÁÉÍÚŰŐÓÜÖşţăîâŞŢĂÎÂ]*/', $_POST['city']))
	//else if (!preg_match('/^[[:alpha:]]+$/', $_POST['city']))
	{
		echo "A város nevében csak a magyar és román ábécé kis - és nagybetűi engedélyezettek!<br/>";
		$hibak['city'] = 'A város nevében csak a magyar és román ábécé kis - és nagybetűi engedélyezettek!';
	}
	//szuletesi d�tum pipa
	if(!preg_match('/^(19|20)\d\d[- \.](0[1-9]|1[012])[- \.](0[1-9]|[12][0-9]|3[01])[\.]$/',$_POST['date_of_birth']))
	{
		echo "A születési dátumot a következő formában adja meg : év.hónap.nap. !<br/>";
		$hibak['date_of_birth'] = 'A születési dátumot a következő formában adja meg : év.hónap.nap. ';
	}
	//telefonszam pipa
	if(strlen($_POST['tel_nr']) > 0)
		if (!preg_match('/^[0-9\+]{10,14}$/', $_POST['tel_nr']))
		{
			echo "Hibás telefonszám!<br/>";
			$hibak['tel_nr'] = 'Hibás telefonszám!';
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
	or die("Nem lehet kapcslodni MySQL-hez!");
	echo "Kapcsolódva a MySQL-hez<br>";
	
	//select a database to work with
	$selected = mysql_select_db($db)
	or die("Nem sikerült kapcsolódni az adatbázishoz!");
	
	$select = mysql_query("SELECT adatok.emailcim FROM adatok WHERE adatok.emailcim='$_POST[email]'");
	if(!$select) {
		die('Nem megfelelő lekérdezés: '.mysql_error());
	}
	if(mysql_num_rows($select) == 1 ) { //check if there is already an entry for that username
		echo "Ezzel az e-mail címmel már valaki regisztrált. Kérem próbálja meg egy másik e-mail cím használatát! <br/>";
	} else {
		//mysql_query("TRUNCATE adatok.idadatok");
		mysql_query("INSERT INTO adatok VALUES ('$_POST[email]','$_POST[your_password]','$_POST[reg_surname]','$_POST[reg_first_name]','$_POST[date_of_birth]','$_POST[city]','$_POST[tel_nr]',false,NULL)");
	}
	header('location:../login.html');
}
else {
	echo 'Nem megfelelő adatok! Kérem ellenőrizze őket!';
	//header('location:regisztracio.php');
}

?>