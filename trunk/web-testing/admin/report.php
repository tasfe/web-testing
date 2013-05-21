<?php
	session_start();

	if (isset($_SESSION['your_email']))
	{
		if($_SESSION['your_email']!='admin')
		{
			$_SESSION['login']='Nincs jogosultságod megtekinteni ezt az oldalt!';
			header("location:../index.php");
		}
	}
	else
	{
		$_SESSION['login']='Jelentkezz be ahhoz, hogy megtekinthesd ezt az oldalt!';
		header("location:../index.php");
	}
	
	switch ($_POST['submit']) {
		
		case 'Report generálása':
			//echo 'report';
			break;

		case 'Sikeres tesztek':
			$_SESSION['successful']='true';
			break;
	}
	header("location:view_completed_test.php");
	
?>