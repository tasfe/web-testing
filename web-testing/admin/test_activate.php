<?php
session_start();
if (isset($_SESSION['your_email']))
{
	if($_SESSION['your_email']!='admin')
	{
		$_SESSION['login']='Nincs jogosultságod megtekinteni ezt az oldalt!';
		header("location:../index.php");
	}
}  
else
{
	$_SESSION['login']='Jelentkezz be ahhoz, hogy megtekinthesd ezt az oldalt!';
	header("location:../index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>

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
					<h1>Tesztelő rendszer</h1>
				</div>
				<!--close welcome-->
				<div id="welcome_slogan">
					<h1>"Szeretnünk és ápolnunk kell a tévedést, mert ő a megismerés
						anyaöle." (Nietzsche)</h1>
				</div>
				<!--close welcome_slogan-->
			</div>
			<!--close banner-->
		</div>
		<!--close header-->

		<div id="menubar">
			<ul id="menu">
				<li><a href="../index.php">Főoldal</a></li>
				<li class="current"><a href="test_activate.php">Admin</a></li>
				<li><a href="../user/logout.php">Kijelentkezés</a></li>
			</ul>
		</div>
		<!--close menubar-->

		<div id="site_content">

			<div id="site_content">

				<div class="sidebar_container">

					<div class="sidebar">
						<div class="sidebar_item">
							<a href="admin.php"><h2>Kezdő oldal</h2> </a>
						</div>
						<!--close sidebar_item-->
					</div>
					<!--close sidebar-->

					<div class="sidebar">
						<div class="sidebar_item">
							<a href="view_test_completing.php"><h2>Jelenlegi tesztkitöltések</h2>
							</a>
							<p>A fenti menüpontot kiválasztva megtekintheted a folyamatban
								levő tesztkitöltéseket.</p>
						</div>
						<!--close sidebar_item-->
					</div>
					<!--close sidebar-->

					<div class="sidebar">
						<div class="sidebar_item">
							<a href="view_completed_test.php"><h2>Kitöltött tesztek</h2> </a>
							<p>A fenti menüpontot kiválasztva megtekintheted a kitöltött
								teszteket.</p>
						</div>
						<!--close sidebar_item-->
					</div>
					<!--close sidebar-->

					<div class="sidebar">
						<div class="sidebar_item">
							<h2>Teszt aktiválás/inaktiválás</h2>
							<p>A fenti menüpontot kiválasztva lehetőséged van teszteket
								aktiválni és inaktiválni.</p>
						</div>
						<!--close sidebar_item-->
					</div>
					<!--close sidebar-->

					<div class="sidebar">
						<div class="sidebar_item">
							<a href="upload.php"><h2>Új teszt feltöltése</h2> </a>
							<p>A fenti menüpontot kiválasztva új teszteket tölthetsz fel.</p>
						</div>
						<!--close sidebar_item-->
					</div>
					<!--close sidebar-->

				</div>
				<!--close sidebar_container-->

				<ul class="slideshow">
					<li class="show"><img width="680" height="250"
						src="../images/home_1.jpg" alt="&quot;Adminisztrátor&quot;" />
					</li>
					<li><img width="680" height="250" src="../images/home_2.jpg"
						alt="&quot;Adminisztrátor&quot;" /></li>
				</ul>


				<br></br>
				<h2 align="center">Tesztek aktiválása, inaktiválása és törlése</h2>
				
				
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

				$sql="SELECT idTesztek, TesztNev, KerdesSzam, TesztAktivitas, Kategoria FROM tesztek";
				$result=mysql_query($sql);
				if(!$result)
					die("Sikertelen lekérdezés!");

				if (isset($_SESSION['activation_result']))
				{
					echo '<br />';
					echo '<b>'.$_SESSION['activation_result'].'</b>';
					echo '<br />';
					unset($_SESSION['activation_result']);
				}
							
				echo '<form action = "activate.php" method = "post">';
				echo '<TABLE BORDER="1" CELLPADDING="4" CELLSPACING="2">';
				echo '<table><th>&emsp;</th><th>Tesztnév</th><th>Kérdések száma</th><th>Teszt aktivitása</th><th>Kategória</th>';
				while ($row = mysql_fetch_assoc($result)) {
					echo '<tr>
					<td><input type=\'radio\' name=\'radio\' VALUE="'.$row['idTesztek'].'"></td>
					<td>'.$row['TesztNev'].'</td>
					<td>'.$row['KerdesSzam'].'</td>';
					if($row['TesztAktivitas'] == 0)
						echo '<td>inaktív</td>';
					else 
						echo '<td>aktív</td>';
					echo '<td>'.$row['Kategoria'].'</td></tr>';
				}
				echo '</TABLE><br /><br />';
				echo '<input type="submit" name="submit" value="Teszt aktiválása vagy inaktiválása" />&emsp;';
				echo '<br />';
				echo '<br />';
				
				//free the resources associated with the result set
				mysql_free_result($result);
				//close connection
				mysql_close($dbhandle);

			?>

			</div>
			<!--close content_item-->
		</div>
		<!--close content-->
	</div>
	<!--site content-->


    <div id="content_grey">  
      <h2>Hasonló weboldalak</h2> 
      <table align="center">
      <tr>
      	<td>
      		<div class="readmore">
		  		<a href="http://realika.educatio.hu/ctrl.php/unregistered/preview/coursecs?c=43&pbka=0&pbk=%2Fctrl.php%2Funregistered%2Fcourses">Interaktív matematika</a>
			</div><!--close readmore-->  
		</td>
		<td>
      		<div class="readmore">
		  		<a href="http://www.ementor.hu/?q=node/39">Tanulni sohasem késő</a>
			</div><!--close readmore-->  
		</td>
		<td>
      		<div class="readmore">
		  		<a href="http://www.mathematika.hu/news.php">Minden, ami matematika</a>
			</div><!--close readmore-->  
		</td>
	  </tr>
	  </table>  
	  <br style="clear:both"/>
    </div><!--close content_grey--> 

	<br></br>
	<br></br>


</body>

</html>
