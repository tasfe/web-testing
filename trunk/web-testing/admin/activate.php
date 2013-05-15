<?php
session_start();

if(isset($_POST['radio']))
{
	
	$selected_radio = $_POST['radio'];
	
	$db = 'adatok';
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	
	//connection to the database
	$dbhandle = mysql_connect($host, $user, $pass)
	or die("Nem lehet kapcsol�dni MySQL-hez!");
	echo 'Kapcsolódva a MySQL-hez <br>';
	
	//select a database to work with
	$selected = mysql_select_db($db)
	or die("Nem sikerült kapcsolódni az adatbázishoz!");
	
	switch ($_POST['submit']) {
	
		case 'Teszt törlése':
			
			$sql = "DELETE FROM tesztek WHERE idTesztek=$selected_radio";
			$result = mysql_query($sql);

			if (!$result)
			{
				$_SESSION['activation_result']='Sikertelen törlés.';
				die('Invalid query: ' . mysql_error());
			}
			else
			{
				$_SESSION['activation_result']='A törlés megtörtént.';
				//close connection
				mysql_close($dbhandle);
			}
			
			break;
				
		case 'Teszt aktiválása vagy inaktiválása':
	
			$sql="SELECT * FROM  tesztek WHERE idTesztek=$selected_radio";
			$akt = mysql_query($sql); 
	
			while ($row = mysql_fetch_assoc($akt))
			{
				$a = $row['TesztAktivitas'];	
			}
	
			if($a==0)
			{
				$sql="UPDATE tesztek SET TesztAktivitas=1 WHERE idTesztek=$selected_radio";	
				//echo 'beleptem 0';
			}
			if($a==1)
			{
				$sql="UPDATE tesztek SET TesztAktivitas=0 WHERE idTesztek=$selected_radio";
				//echo 'beleptem 1';
			}
	
			$result=mysql_query($sql);
			if (!$result) 
			{
				$_SESSION['activation_result']='Sikertelen módosítás.';
				die('Invalid query: ' . mysql_error());
			}
			else 
			{
				$_SESSION['activation_result']='A módosítás megtörtént.';
				//close connection
				mysql_close($dbhandle);
			}
		
		break;
	}	//end switch
}
else 
{
	// store session data
	$_SESSION['activation_result']='Válassz ki egy tesztet!';
}

header("location:test_activate.php");

?>