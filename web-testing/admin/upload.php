<?php

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
				<li><a href="index.php">Főoldal</a></li>
				<li class="current"><a href="upload.html">Admin</a></li>
				<li><a href="test.html">Tesztek</a></li>
			</ul>
		</div>
		<!--close menubar-->

		<div id="site_content">

			<div id="site_content">

				<div class="sidebar_container">

					<div class="sidebar">
						<div class="sidebar_item">
							<a href="admin.html"><h2>Személyes adatok</h2></a>
							<p>A fenti menüpont alatt megtekintheted a regisztrácio során
								megadott adataid.</p>
						</div>
						<!--close sidebar_item-->
					</div>
					<!--close sidebar-->

					<div class="sidebar">
						<div class="sidebar_item">
							<h2>Jelenlegi tesztkitöltések</h2>
							<p>A fenti menüpontot kiválasztva megtekintheted a folyamatban
								levő tesztkitöltéseket.</p>
						</div>
						<!--close sidebar_item-->
					</div>
					<!--close sidebar-->

					<div class="sidebar">
						<div class="sidebar_item">
							<h2>Kitöltött tesztek</h2>
							<p>A fenti menüpontot kiválasztva megtekintheted a kitöltött
								teszteket.</p>
						</div>
						<!--close sidebar_item-->
					</div>
					<!--close sidebar-->

					<div class="sidebar">
						<div class="sidebar_item">
							<h2>Kimutatás</h2>
							<p>A fenti menüpontot kiválasztva megtekinthetsz kimutatásokat.</p>
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
							<h2>Új teszt feltöltése</h2>
							<p>A fenti menüpontot kiválasztva új teszteket tölthetsz fel.</p>
						</div>
						<!--close sidebar_item-->
					</div>
					<!--close sidebar-->

				</div>
				<!--close sidebar_container-->

				<ul class="slideshow">
					<li class="show"><img width="680" height="250"
						src="../images/home_2.jpg" alt="&quot;Szemelyes adatok&quot;" /></li>
					<li><a href="eredmenyek.php"><img width="680" height="250"
							src="../images/home_2.jpg" alt="&quot;Eredmenyek&quot;" /> </a></li>
					<li><a href="kitoltott_tesztek.php"><img width="680" height="250"
							src="../images/home_2.jpg" alt="&quot;Kitoltott tesztek&quot;" /> </a>
					</li>
					<li><a href="uj_teszt.php"><img width="680" height="250"
							src="../images/home_1.jpg" alt="&quot;Uj teszt kitoltese&quot;" /> </a>
					</li>
				</ul>


				<br></br>
				<h2 align="center">Teszt feltöltés</h2>
				<p>Válszd ki, hogy melyik tesztet szeretnéd feltölteni(egyenlore kepet lehet feltolteni).</p>

				<br></br>
				<form action = "upload_file.php" method = "post"
					enctype="multipart/form-data">
					<label for="file">Fájlnév:</label> <input type="file" name="file"
						id="file" /> <br /> 
						
						<br></br>
						
						<input type="submit" name="submit" value="Feltölt" />
				</form>

				<br></br> <br></br> <br></br> <br></br> <br></br> <br></br>
				<table border="0" cellpadding="2" cellspacing="10" align="center">
					<tr>
						<td>
							<div class="button_small"
								style="visibility: hidden; display: none;">
								<a href="#">Letöltés</a>
							</div> <!--close button_small-->
						</td>
						<td>
							<div class="button_small"
								style="visibility: hidden; display: inline;">
								<a href="#">Sikeres tesztek</a>
							</div> <!--close button_small-->
						</td>
					
					
					<tr>
						<td>
							<div class="button_small"
								style="visibility: hidden; display: none;">
								<a href="#">Report megtekintése</a>
							</div> <!--close button_small-->
						</td>
						<td>
							<div class="button_small"
								style="visibility: hidden; display: none;">
								<a href="#">Kiterjesztett report</a>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="button_small"
								style="visibility: hidden; display: none;">
								<a href="#">Teszt aktiválása</a>
							</div> <!--close button_small-->
						</td>
						<td>
							<div class="button_small"
								style="visibility: hidden; display: none;">
								<a href="#">Teszt inaktiválása</a>
							</div> <!--close button_small-->
						</td>
					</tr>
				</table>

			</div>
			<!--close content_item-->
		</div>
		<!--close content-->
	</div>
	<!--site content-->
	
	


	<div id="content_grey">
		<p>Hasonlo weboldalak</p>
		<br style="clear: both" />
	</div>
	<!--close content_grey-->

	<br></br>
	<br></br>


</body>

</html>
