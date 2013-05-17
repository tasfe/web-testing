<?php
session_start();
include '../readQuestion.php';
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
				<li><a href="../index.php">Főoldal</a></li>
				<li class="current"><a href="user.php">Profil</a></li>
				<li><a href="logout.php">Kijelentkezés</a></li>
			</ul>
		</div>
		<!--close menubar-->

		<div id="site_content">

			<div id="site_content">
				<div class="sidebar_container">
					<div class="sidebar">
						<div class="sidebar_item">
							<a href="szemelyes_adatok.php"><h2>Személyes adatok</h2> </a>
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
							<h2>Eddigi eredmények</h2>
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
						src="../images/home_2.jpg" alt="&quot;Kitöltött tesztek&quot;" />
					</li>
					<li><a href="szemelyes_adatok.php"><img width="680" height="250"
							src="../images/home_2.jpg" alt="&quot;Személyes adatok&quot;" />
					</a></li>
					<li><a href="uj_teszt.php"><img width="680" height="250"
							src="../images/home_1.jpg" alt="&quot;Új teszt kitöltése&quot;" />
					</a></li>
					<li><a href="eredmenyek.php"><img width="680" height="250"
							src="../images/home_2.jpg" alt="&quot;Eredmények&quot;" /> </a></li>
				</ul>


				<br></br>
				<h2 align="center">Kitöltött tesztek</h2>
				<p>Itt megtekintheted az eddig kitöltött teszteket és az elért eredményeket.</p>
				
				<?php
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

				$sql="SELECT emailcim, idTesztek, Datum, Eredmeny FROM kitoltotttesztek WHERE emailcim = '" . $_SESSION['your_email'] . "'";
				$result=mysql_query($sql);
				$row = mysql_fetch_assoc($result);
				if(!$row) {
					echo "Még nincs kitöltött teszted!";//die("Sikertelen lekérdezés!");
					}
				else {
					if (isset($_SESSION['activation_result']))
					{
						echo '<br />';
						echo '<b>'.$_SESSION['activation_result'].'</b>';
						echo '<br />';
						unset($_SESSION['activation_result']);
					}
							
					echo '<form action = "activate.php" method = "post">';
					echo '<TABLE BORDER="1" CELLPADDING="4" CELLSPACING="2">';
					echo '<table><th>&emsp;</th><th>Tesztnév</th><th>Tesztre kapott jegy</th><th>Kitöltés dátuma</th>';
					while ($row) {
						$sql2 = "SELECT TesztNev FROM tesztek WHERE idTesztek='" . $row['idTesztek'] . "'";
						$result2=mysql_query($sql2);
						$row2 = mysql_fetch_assoc($result2);
						$cim = readName("../tests/" . $row2['TesztNev']);
						echo '<tr>
						<td><input type=\'radio\' name=\'radio\' VALUE='.$row2['TesztNev'].'"></td>
						<td> '.$cim.' </td>
						<td>'.$row['Eredmeny'].'</td>
						<td>'.$row['Datum'].'</td>';
						$row = mysql_fetch_assoc($result);
					}
					echo '</TABLE><br /><br />';
					echo '<input type="submit" name="submit" value="Report generálása" />&emsp;';
					echo '<br />';
					
					//free the resources associated with the result set
					mysql_free_result($result);
					//close connection
					mysql_close($dbhandle);
				}
			?>
			<br><br>
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

	</div>
	<!-- close main -->

</body>

</html>
