<?php

session_start();

unset($_SESSION['reg_surname']);
unset($_SESSION['reg_first_name']);
unset($_SESSION['email']);
unset($_SESSION['your_password']);
unset($_SESSION['your_password2']);
unset($_SESSION['city']);
unset($_SESSION['date_of_birth']);
unset($_SESSION['tel_nr']);
unset($_SESSION['marvolt']);
unset($_SESSION['ok']);

function reg_check(){

	$hibak = true;
	if(strlen($_POST['reg_surname']) < 3)
	{
		$hibak = false;
		$_SESSION['reg_surname'] = 'A családnév legalább 3 betűs legyen, kitöltése pedig kötelező';
	}
	else if (!preg_match('/[-a-zA-ZáéíóúüöűőÁÉÍÚŰŐÓÜÖşţăîâŞŢĂÎÂ]*/', $_POST['reg_surname']))
	{
		$hibak = false;
		$_SESSION['reg_surname'] = 'A családnévben csak a magyar ábécé kis - és nagybetűi engedélyezettek';
	}
	
	if(strlen($_POST['reg_first_name']) < 3)
	{
		$hibak = false;
		$_SESSION['reg_first_name'] = 'A keresztnév legalább 3 betűs legyen, kitöltése pedig kötelező';
	}
	else if (!preg_match('/[-a-zA-ZáéíóúüöűőÁÉÍÚŰŐÓÜÖşţăîâŞŢĂÎÂ]*/', $_POST['reg_first_name']))
	{
		$hibak = false;
		$_SESSION['reg_first_name'] = 'A családnévben csak a magyar ábécé kis - és nagybetűi engedélyezettek';
		$szam=$szam+1;
	}

	if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/', $_POST['email']))
	{
		$hibak = false;
		$_SESSION['email'] = 'Hibás e-mail cím és az e-mail kitöltése kötelező!';
	}

	if (strlen($_POST['your_password']) < 5)
	{
		$hibak = false;
		$_SESSION['your_password'] = 'A jelszónak legalább 5 karakterből kell állnia, és kitöltése kötelező!';
		
	}
	
	if (strcmp($_POST['your_password'],$_POST['your_password2']) != 0)
	{
		$hibak = false;
		$_SESSION['your_password2'] = 'Helytelen jelszó megerősítés.';
	}
	
	if(strlen($_POST['city']) < 3)
	{
		$hibak = false;
		$_SESSION['city'] = 'A település neve legalább 4 betűs legyen, kitöltése pedig kötelező!';
	}
	else if (!preg_match('/[-a-zA-ZáéíóúüöűőÁÉÍÚŰŐÓÜÖşţăîâŞŢĂÎÂ]*/', $_POST['city']))
	{
		$hibak = false;
		$_SESSION['city'] = 'A város nevében csak a magyar és román ábécé kis - és nagybetűi engedélyezettek!';
	}

	if(!preg_match('/^(19|20)\d\d[- \.](0[1-9]|1[012])[- \.](0[1-9]|[12][0-9]|3[01])[\.]$/',$_POST['date_of_birth']))
	{
		$hibak = false;
		$_SESSION['date_of_birth'] = 'A születési dátumot a következő formában adja meg : év.hónap.nap. ';
	}
	if(strlen($_POST['tel_nr']) > 0)
		if (!preg_match('/^[0-9\+]{10,14}$/', $_POST['tel_nr']))
		{
			$hibak = false;
			$_SESSION['tel_nr'] = 'Hibás telefonszám!';
		}
		
	if ($hibak)
		return "igaz";
	else
		return "hamis";
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
	
	if( $_SESSION['security_code'] == $_POST['security_code'] && !empty($_SESSION['security_code'] ) ) {
		unset($_SESSION['security_code']);
		$_SESSION['ok'] = true;
	} else {
		$_SESSION['ok'] = false;
	}
	
	if(mysql_num_rows($select) == 1) { //megnezem, hogy volt-e mar hasznalva az adott emailcim
		$_SESSION['marvolt'] = 'igen';
	} else {
		mysql_query("INSERT INTO adatok VALUES ('$_POST[email]','$_POST[your_password]','$_POST[reg_surname]','$_POST[reg_first_name]','$_POST[date_of_birth]','$_POST[city]','$_POST[tel_nr]',false,NULL)");
	}
	
	
	header('location:../login.php');
}
else {
	echo 'Nem megfelelő adatok! Kérem ellenőrizze őket!';
	header('location:regisztracio.php');
}
?>