<?php
session_start();
$_SESSION[$_SESSION['your_email'] . "p1"] = 0;
$_SESSION[$_SESSION['your_email'] . "pont"] = 0;
unset($_SESSION[$_SESSION['your_email'] . "pont_backup"]);

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

$sql = "SELECT `idTesztek` FROM `tesztek` WHERE `TesztNev`= '". $_GET['nev'] . "'";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);
$id = $row['idTesztek'];

$sql2 = "SELECT `akt_teszt_kitoltes` FROM `adatok` WHERE `emailcim`='" . $_SESSION['your_email'] . "'";
$result2 = mysql_query($sql2);
$row2 = mysql_fetch_assoc($result2);
$working = $row2['akt_teszt_kitoltes'];

if (is_null($working))
	$ok = true;
else
	$ok = false;

?>
<html>
<head>
<script type = "text/javascript">
function askUser() {
	
	var ans = confirm("Már van egy folyamatban levő tesztkitöltésed! Biztos újat kezdesz?");
    if (ans)
        return true;
    else
       	return false;
}
</script>
</head>
<body>
	<div id="site_content" align="center">

		<div id="content">
			<form name="start" method="post" action="teszt_kitoltese.php?nev=<?php echo $_GET['nev'];?>&count=<?php echo $_GET['count']?>">
				<?php if ($ok) { ?>
				<input type="submit" value="Start"/>
				<?php } else { ?>
				<input type="submit" value="Start" onclick="return askUser();"/>
				<?php } ?>
			</form>
		</div>
	</div>

</body>
</html>
