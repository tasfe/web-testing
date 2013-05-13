<?php
	session_start();
	switch ($_POST['submit']) {
		
		case 'Report generálása':
			//echo 'report';
			break;
			
		case 'Kiterjesztett report generálása':
			//echo 'kiterjesztett report';
			break;
	
		case 'Sikeres tesztek':
			$_SESSION['successful']='true';
			break;
	}
	header("location:view_completed_test.php");
	
?>