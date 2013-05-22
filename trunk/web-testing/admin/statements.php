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
				<li class="current"><a href="admin.html">Admin</a></li>
			</ul>
		</div>
		<!--close menubar-->

		<div id="site_content">

			<div id="site_content">

				<div class="sidebar_container">

					<div class="sidebar">
						<div class="sidebar_item">
							<a href="admin.php"><h2>Személyes adatok</h2> </a>
							<p>A fenti menüpont alatt megtekintheted a regisztrácio során
								megadott adataid.</p>
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
							<h2>Kimutatás</h2>
							<p>A fenti menüpontot kiválasztva megtekinthetsz kimutatásokat.</p>
						</div>
						<!--close sidebar_item-->
					</div>
					<!--close sidebar-->

					<div class="sidebar">
						<div class="sidebar_item">
							<a href="test_activate.php"><h2>Teszt aktiválás/inaktiválás</h2>
							</a>
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
				<h2 align="center">Kimutatások</h2>
				<p>Ide jön a Data grid, ahol meg lesznek jelenítve a megfelelő
					adatok egy táblázatban.</p>
				<br></br> <br></br> <br></br> <br></br> <br></br> <br></br>
				<table border="0" cellpadding="2" cellspacing="10" align="center">
					<tr>
						<td>
							<div class="button_small">
								<a href="#">Letöltés</a>
							</div> <!--close button_small-->
						</td>		
				</table>

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
