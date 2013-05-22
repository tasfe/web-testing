
<?php 
// Put this code in first line of web page.
session_start();
$var = $_SESSION['your_email'];

$db = 'adatok';
$host = 'localhost';
$user = 'root';
$pass = '';

//connection to the database
$dbhandle = mysql_connect($host, $user, $pass)
or die("Nem lehet kapcsolódni MySQL-hez!");

//select a database to work with
$selected = mysql_select_db($db)
or die("Nem sikerült kapcsolódni az adatbázishoz!");

$sql = "SELECT Datum FROM `kitoltotttesztek` WHERE emailcim = '" . $_SESSION['your_email'] . "' AND Eredmeny IS NULL";
$result = mysql_query($sql);

while ($row = mysql_fetch_assoc($result)) {
	$sql2 = "DELETE FROM `kitoltotttesztek` WHERE Datum = '" . $row['Datum'] . "'";
	$result2 = mysql_query($sql2);
}

$sql3 = "UPDATE adatok SET akt_teszt_kitoltes=NULL WHERE `emailcim`='" . $_SESSION['your_email'] . "'";
$result3 = mysql_query($sql3);

session_destroy();
?>
<script type="text/javascript" src="../cookie.js"></script>
<script>
eraseCookie('<?php echo $var;?>'); window.location.href = '../login.php';
</script>
<?php

//header("location:../login.php");
?>