<?php
session_start();

if(isset($_POST['radio']))
{
	// store session data
	$_SESSION['activation_result']='ok';
	
	$selected_radio = $_POST['radio'];
	//print $selected_radio;
	
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
	
	$akt="SELECT TesztAktivitas FROM  `tesztek` WHERE idTesztek ='$selected_radio'";
	
	if($akt==0)
	{
		$sql="UPDATE tesztek SET TesztAktivitas=1 WHERE idTesztek='$selected_radio'";	
	}
	else
	{
		$sql="UPDATE tesztek SET TesztAktivitas=1 WHERE idTesztek='$selected_radio'";
	}
	
	$result=mysql_query($sql);
	if (!$result) {
		die();
		$_SESSION['activation_result']='Sikertelen módosítás.';
	}
	else 
	{
		$_SESSION['activation_result']='A módosítás megtörtént.';
		//free the resources associated with the result set
		mysql_free_result($result);
		//close connection
		mysql_close($dbhandle);
	}
}
else 
{
	// store session data
	$_SESSION['activation_result']='Válassz ki egy tesztet, aminek módosítani szeretnéd az aktivitását.';
}
header("location:test_activate.php");

?>