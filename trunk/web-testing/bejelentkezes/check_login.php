<?php
session_start();

$db = 'adatok';
$host = 'localhost';
$user = 'root';
$pass = '';
$table_name = 'adatok';
	
//connection to the database
$dbhandle = mysql_connect($host, $user, $pass);

//select a database to work with
$selected = mysql_select_db($db)
or die("Nem sikerült kapcsolódni az adatbázishoz!");

if (isset($_POST['login_button'])) {
	$your_email= $_POST['your_email']; 
	$your_password= $_POST['your_password']; 
} else if ($_SESSION['your_email'] and $_SESSION['your_password']){
	$your_email=$_SESSION['your_email']; 
	$your_password=$_SESSION['your_password']; 	
}

// To protect MySQL injection (more detail about MySQL injection)
$your_email = stripslashes($your_email);
$your_password = stripslashes($your_password);
$your_email = mysql_real_escape_string($your_email);
$your_password = mysql_real_escape_string($your_password);

if (($your_password == "") || ($your_email == "")){
	$_SESSION['empty_login'] = "Mindkét mezőt ki kell töltened a bejelentkezéshez!";
	header("location:../login.php");
}
else {
	if($your_email=="admin" && $your_password=="admin")
	{
		$_SESSION['your_email'] = $your_email;
		$_SESSION['mypassword'] = $your_password;
		header("location:../admin/admin.php");
	}
	else {
		$sql="SELECT * FROM $table_name WHERE emailcim='$your_email' and jelszo='$your_password'";
		$result=mysql_query($sql);
	
		// Mysql_num_row is counting table row
		$count=mysql_num_rows($result);
	
		// If result matched $your_email and $your_password, table row must be 1 row
		if($count==1){
			$_SESSION['your_email'] = $your_email;
			$_SESSION['mypassword'] = $your_password;
			header("location:../user/szemelyes_adatok.php");
		}
		else {
			$_SESSION['hibas'] = true;
			header("location:../login.php");
		}
	}
}
unset($_POST);
?>