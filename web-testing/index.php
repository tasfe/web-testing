<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
<title>Tesztelő rendszer</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
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
						<span>Tesztelő</span> rendszer
					</h1>
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
				<li class="current"><a href="index.php">Főoldal</a></li>
				<?php
					if (isset($_SESSION['your_email']))
					{
						if($_SESSION['your_email']=='admin')
						{
							echo '<li><a href="admin/admin.php">Admin</a></li>';
							echo '<li><a href="user/logout.php">Kijelentkezés</a></li>';
						}
						else 
						{
							echo '<li><a href="user/szemelyes_adatok.php">Személyes adatok</a></li>';
							echo '<li><a href="user/logout.php">Kijelentkezés</a></li>';
						}
					}  
					else
					{
						echo '<li><a href="login.php">Bejelentkezés</a></li>';
					}
				?>		
			</ul>
		</div>
		<!--close menubar-->

		<div id="site_content" align="center">

			<ul class="slideshow">
				<li class="show"><img width="680" height="250"
					src="images/home_1.jpg" alt="&quot;Üdvözlünk az oldalunkon!&quot;" />
				</li>
				<li><img width="680" height="250" src="images/home_2.jpg"
					alt="&quot;Webes tesztelő rendszer&quot;" /></li>
			</ul>

			<div id="content">
				<div class="content_item" align="left">

					<br></br>
					
				<?php
					if (isset($_SESSION['login']))
					{
						echo '<b>'.$_SESSION['login'].'</b>';
						echo '<br />';
						unset($_SESSION['login']);
					}  
				?>	

					<h1>Üdvözlünk az oldalunkon!</h1>
					<p>Az oldal rövid leírása:</p>
					<p>Ez az oldal azon személyek számára készült, akik szeretnék matematikai tudásukat felmérni és folyamatosan bővíteni.
					Amint regisztrált bármikor beléphet és kitöltheti a felkínált tesztek bármelyikét. Minden teszt kitöltése után jegyet
					számolunk az elért pontszám alapján, sőt lehetőség van a teszt kitöltéséről bővebb információt is kérni, ahol részletesen
					megtekintheti, mely válaszai voltak helyesek, a hibás válaszoknál pedig melyik lett volna a helyes válasz.
					Több kategóriából kínálunk fel teszteket és a tesztek többszörös elvégzésére is lehetőséget adunk a fejlődés érdekében.
					</p>

					<div class="content_image" align="left">
						<img src="images/content_image1.jpg" alt="image1" />
					</div>
					<p>Célunk, hogy felhasználóink minél közelebb kerüljenek a matematikához, kedvet kapjanak a tesztek elvégzéséhez és ők maguk
					jöjjenek rá arra, hogy a matematika világa egy csodálatos világ.</p>
					<p>Egyelőre többet nem árulunk el, akit sikerült kiváncsivá tegyünk, az regisztrálhat megadva az e-mailcímét és további személyes adatait
					(regisztrálni a "Bejelentkezés" menüpont alatt lehet).</p>
					<p>Mindenkit szeretettel várunk matekezni!!! :)</p>
					<br style="clear: both" /> <br></br>

					<h1>Elérhetőség</h1>
					<p>Telefonszám: +44 (0)1234 567891</p>
					<p>
						Email: <a href="mailto:info@youremail.co.uk">info@youremail.co.uk</a>
					</p>

				</div>
				<!--close content_item-->
			</div>
			<!--close content-->

		</div>
		<!--close site_content-->

		<div id="content_grey">
			<p>Hasonló weboldalak</p>
			<br style="clear: both" />
		</div>
		<!--close content_grey-->

		<br></br> <br></br>

	</div>
	<!--close main-->

</body>
</html>
