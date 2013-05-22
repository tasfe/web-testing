<?php
session_start();
if (isset($_SESSION['your_email']))
{
	if($_SESSION['your_email']=='admin')
	{
		$_SESSION['login']='Nincs jogosultságod megtekinteni ezt az oldalt!';
		header("location:index.php");
	}
}
else
{
	$_SESSION['login']='Jelentkezz be ahhoz, hogy megtekinthesd ezt az oldalt!';
	header("location:index.php");
}

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

$sql3 = "SELECT Datum FROM `kitoltotttesztek` WHERE idTesztek = '" . $id . "' AND emailcim = '" . $_SESSION['your_email'] . "'";
$result3 = mysql_query($sql3);
$num = mysql_num_rows($result3);

?>
<html>
<head>
<script type="text/javascript" src="cookie.js"></script>
<script type = "text/javascript">
function askUser() {
	
	var ans = confirm("Már van egy folyamatban levő tesztkitöltésed! Biztos újat kezdesz?");
    if (ans)
        return true;
    else
       	return false;
}

function openWindow(user) {

	if (readCookie(user) == null) {
		createCookie(user, 1);
		window.open('teszt_kitoltese.php?nev=<?php echo "tests/" . $_GET['nev'];?>&count=<?php echo $_GET['count']?>');	
	} else {
		alert("Mar meg van nyitva az ablak!\nHa veletlenul bezartad, akkor zarj be minden ablakot es nyisd meg ujra a tesztet!");		
	}

}
</script>
</head>
<body>
	<div id="site_content" align="center">

		<div id="content">
			<?php include 'readQuestion.php';
			if (readPossibility("tests/" . $_GET['nev']) > $num) { ?>
				<a href="#" onclick="openWindow('<?php echo $_SESSION['your_email']; ?>');">Start</a> 
			<?php 
			$_SESSION[$_SESSION['your_email'] . "p1"] = 0;
			$_SESSION[$_SESSION['your_email'] . "pont"] = 0;
			unset($_SESSION[$_SESSION['your_email'] . "pont_backup"]);
			//unset($_SESSION[$_SESSION['your_email'] . "continue"]);
			} if (readPossibility("tests/" . $_GET['nev']) <= $num) { echo "Ezt a tesztet már nem végezheted el több alkalommal!"; } ?>
		</div>
	</div>

</body>
</html>
