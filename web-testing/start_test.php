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

$sql3 = "SELECT `keresztnev` FROM `adatok` WHERE `emailcim`='" . $_SESSION['your_email'] . "'";
$result3 = mysql_query($sql3);
$row3 = mysql_fetch_assoc($result3);
$keresztnev = $row3['keresztnev'];

include 'readQuestion.php';
$tesztcim = readName("tests/" . $_GET['nev']);

if (is_null($working))
	$ok = true;
else
	$ok = false;

$sql3 = "SELECT Datum FROM `kitoltotttesztek` WHERE idTesztek = '" . $id . "' AND emailcim = '" . $_SESSION['your_email'] . "'";
$result3 = mysql_query($sql3);
$num = mysql_num_rows($result3);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

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
		window.close();
	} else {
		alert("Már meg van nyitva az ablak!\nHa véletlenül bezártad, akkor jelentkezz ki és jelentkezz be újra!");		
	}

}
</script>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Tesztelő rendszer</title>
<meta http-equiv="X-UA-Compatible" content="IE=9" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/image_slide.js"></script>
</head>

<body>

	<div id="main">

		<div id="header">
			<div id="banner">
				<div id="welcome">
					<h1>
						Kedves <?php echo $keresztnev ?>,
					</h1>
				</div>
				<!--close welcome-->
				<div id = welcome_slogan>
				<h2>
						A Start gombra kattintva a(z)
						"<?php echo $tesztcim ?>" című teszt
						 kitöltésére van lehetőséged. <br>
					</h2>
					<h2>Sok sikert! :)</h2>
				</div>
				<!--close welcome_slogan-->
				
			</div>
			<!--close banner-->
		</div>
		<!--close header-->

		<br><br>
		
		<div id="menubar">
			<ul id="menu">
				<li><a href="index.php">Főoldal</a></li>
				<li><a href="user/logout.php">Kijelentkezés</a></li>
			</ul>
		</div>
		<!--close menubar-->

		<br><br>
					
		<div id="site_content" align="center">

		<div id="content">
			<?php
			if (readPossibility("tests/" . $_GET['nev']) > $num) { ?>
				<a href="#" onclick="openWindow('<?php echo $_SESSION['your_email']; ?>');"><h2>Start</h2></a> 
			<?php 
			$_SESSION[$_SESSION['your_email'] . "p1"] = 0;
			$_SESSION[$_SESSION['your_email'] . "pont"] = 0;
			unset($_SESSION[$_SESSION['your_email'] . "pont_backup"]);
			//unset($_SESSION[$_SESSION['your_email'] . "continue"]);
			} if (readPossibility("tests/" . $_GET['nev']) <= $num) { echo "Ezt a tesztet már nem végezheted el több alkalommal!"; } ?>
		</div>
		
		<div class="sidebar_container">
			<div class="sidebar">
				<div class="sidebar_item">
					<a href="user/szemelyes_adatok.php"><h2>Személyes adatok</h2> </a>
					<p>A fenti menüpont alatt megtekintheted a regisztráció során
								megadott adataid.</p>
				</div>
				<!--close sidebar_item-->
			</div>
			<!--close sidebar-->
			<!--close sidebar-->
			<div class="sidebar">
				<div class="sidebar_item">
					<a href="user/kitoltott_tesztek.php"><h2>Eddigi eredmények</h2> </a>
					<p>A fenti menüpont alatt megnézheted, illetve letöltheted a már
								kitöltött tesztjeid.</p>
				</div>
				<!--close sidebar_item-->
			</div>
			<!--close sidebar-->
		</div>
		<!--close sidebar_container-->
	</div>
	<!--site content-->

	<div id="content_grey">
		<p>Hasonló weboldalak</p>
		<br style="clear: both" />
	</div>
	<!--close content_grey-->

	<br></br>
	<br></br>

	<!-- close main -->

</body>

</html>
	
