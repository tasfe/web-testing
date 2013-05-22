<?php 

session_start();
if (isset($_SESSION['your_email']))
{
	if($_SESSION['your_email']=='admin')
	{
		$_SESSION['login']='Nincs jogosultságod megtekinteni ezt az oldalt!';
		header("location:../index.php");
	}
}
else
{
	$_SESSION['login']='Jelentkezz be ahhoz, hogy megtekinthesd ezt az oldalt!';
	header("location:index.php");
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Tesztelő rendszer</title>
<meta http-equiv="X-UA-Compatible" content="IE=9" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/image_slide.js"></script>
</head>

<body>

	<div id="main">

		<div id="header">
			<div id="banner">
				<div id="welcome">
					<h1>
						<span>Tesztelő</span> rendszer
					</h1>
				</div>
				<!--close welcome-->
				<div id="welcome_slogan">
					<h1>
						<span>"Szeretnünk és ápolnunk kell a tévedést,</span> mert ő a
						megismerés anyaöle." (Nietzsche)
					</h1>
				</div>
				<!--close welcome_slogan-->
			</div>
			<!--close banner-->
		</div>
		<!--close header-->

		<div id="menubar">
			<ul id="menu">
				<li><a href="index2.php">Főoldal</a></li>
				<li><a href="logout.php">Kijelentkezés</a></li>
			</ul>
		</div>
		<!--close menubar-->

		<div id="site_content">

			<div id="site_content">
				<div class="sidebar_container">
					<div class="sidebar">
						<div class="sidebar_item">
							<h2>Személyes adatok</h2>
							<p>A fenti menüpont alatt megtekintheted a regisztráció során
								megadott adataid.</p>
						</div>
						<!--close sidebar_item-->
					</div>
					<!--close sidebar-->
					<div class="sidebar">
						<div class="sidebar_item">
							<a href="uj_teszt.php"><h2>Új teszt kitöltése</h2> </a>
							<p>A fenti menüpont alatt kitölthetsz egy tesztet.</p>
						</div>
						<!--close sidebar_item-->
					</div>
					<!--close sidebar-->
					<div class="sidebar">
						<div class="sidebar_item">
							<a href="kitoltott_tesztek.php"><h2>Eddigi eredmények</h2> </a>
							<p>A fenti menüpont alatt megnézheted, illetve letöltheted a már
								kitöltött tesztjeid.</p>
						</div>
						<!--close sidebar_item-->
					</div>
					<!--close sidebar-->
				</div>
				<!--close sidebar_container-->

				<ul class="slideshow">
					<li class="show"><img width="680" height="250"
						src="../images/home_2.jpg" alt="&quot;Személyes adatok&quot;" /></li>
					<li><a href="eredmenyek.php"><img width="680" height="250"
							src="../images/home_2.jpg" alt="&quot;Eredmények&quot;" /> </a></li>
					<li><a href="kitoltott_tesztek.php"><img width="680" height="250"
							src="../images/home_2.jpg" alt="&quot;Kitöltött tesztek&quot;" />
					</a></li>
					<li><a href="uj_teszt.php"><img width="680" height="250"
							src="../images/home_1.jpg" alt="&quot;Új teszt kitöltése&quot;" />
					</a></li>
				</ul>


				<br></br>
				<h2 align="center">Személyes adatok</h2>
				<p>Itt megtekintheted a regisztrációnál megadott adataid.</p>

<?php
$db = 'adatok';
$host = 'localhost';
$user = 'root';
$pass = '';
$table_name = 'adatok';

	//connection to the database
	$dbhandle = mysql_connect($host, $user, $pass)
	or die("Nem lehet kapcsolódni MySQL-hez!");
	//echo 'Kapcsolódva a MySQL-hez <br>';
	//select a database to work with
	$selected = mysql_select_db($db)
	or die("Nem sikerült kapcsolódni az adatbázishoz!");
	$sql = "SELECT * FROM $table_name WHERE `emailcim` = '".$_SESSION['your_email'] ."'";
	$result=mysql_query($sql);

	// Mysql_num_row is counting table row
	$count=mysql_num_rows($result);
	if($count==1){
	//echo 'jo';
	}
	else {
	?>
	<script type="text/javascript">
	alert("Több ilyen felhasználó létezik az adatbázisban.");
	</script>
	<?php 
	}
	
	
	//oszlopnev:adat
	echo '<table border="1" align="center">';
	while ($row = mysql_fetch_assoc($result)) {
	echo '<tr>
	<td>E-mail cím:</td>
	<td>'.$row['emailcim'].'</td>
	</tr>
	<tr>
	<td>Csaladnév:</td>
	<td>'.$row['csaladnev'].'</td>
	</tr>
	<tr>
	<td>Keresztnév:</td>
	<td>'.$row['keresztnev'].'</td>
	</tr>
	<tr>
	<td>Születési dátum:</td>
	<td>'.$row['szuletesi_datum'].'</td>
	</tr>
	<tr>
	<td>Település:</td>
	<td>'.$row['telepules'].'</td>
	</tr>
	<tr>
	<td>Telefonszám:</td>
	<td>'.$row['telefonszam'].'</td>
	</tr>';
	}
	echo '</table>';
?><br><br>
				
			</div>
			<!--close content_item-->
		</div>
		<!--close content-->
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
