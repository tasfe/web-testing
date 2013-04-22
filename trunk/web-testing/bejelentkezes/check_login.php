<?php

$db = 'adatok';
$host = 'localhost';
$user = 'root';
$pass = '';
$table_name = 'adatok';
	
//connection to the database
$dbhandle = mysql_connect($host, $user, $pass)
or die("Unable to connect to MySQL");
echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysql_select_db($db)
or die("Could not select database");


session_start();

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
?>
<script type="text/javascript">
				alert("Nem toltottel ki minden mezot");
</script>
<?php
		 header("../login.html");
}
else {
	$sql="SELECT * FROM $table_name WHERE emailcím='$your_email' and jelszó='$your_password'";
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
?>
		<script type="text/javascript">
			alert("Wrong email or password");
		</script>
<?php 
	}
}
unset($_POST);
?>