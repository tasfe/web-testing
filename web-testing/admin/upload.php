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
				<li class="current"><a href="upload.php">Admin</a></li>
				<li><a href="../user/logout.php">Kijelentkezés</a></li>
			</ul>
		</div>
		<!--close menubar-->

		<div id="site_content">

			<div id="site_content">

				<div class="sidebar_container">

					<div class="sidebar">
						<div class="sidebar_item">
							<a href="admin.php"><h2>Kezdő oldal</h2></a>
						</div>
						<!--close sidebar_item-->
					</div>
					<!--close sidebar-->

					<div class="sidebar">
						<div class="sidebar_item">
							<a href="view_test_completing.php"><h2>Jelenlegi tesztkitöltések</h2></a>
							<p>A fenti menüpontot kiválasztva megtekintheted a folyamatban
								levő tesztkitöltéseket.</p>
						</div>
						<!--close sidebar_item-->
					</div>
					<!--close sidebar-->

					<div class="sidebar">
						<div class="sidebar_item">
							<a href="view_completed_test.php"><h2>Kitöltött tesztek</h2></a>
							<p>A fenti menüpontot kiválasztva megtekintheted a kitöltött
								teszteket.</p>
						</div>
						<!--close sidebar_item-->
					</div>
					<!--close sidebar-->

					<div class="sidebar">
						<div class="sidebar_item">
							<a href="test_activate.php"><h2>Teszt aktiválás/inaktiválás</h2></a>
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
				<li class="show">
					<img width="680" height="250" src="../images/home_1.jpg" alt="&quot;Adminisztrátor&quot;" />
				</li>
				<li>
					<img width="680" height="250" src="../images/home_2.jpg" alt="&quot;Adminisztrátor&quot;" /></li>
				</ul>


				<br></br>
				<h2 align="center">Teszt feltöltés</h2>
				<p>Válaszd ki, hogy melyik tesztet szeretnéd feltölteni.</p>
				
				<br></br>
			<?php
				if (isset($_SESSION['upload']))
				{
					echo '<br />';
					echo '<b>'.$_SESSION['upload'].'</b>';
					echo '<br />';
					unset($_SESSION['upload']);
				}
			?>
				
				<form action = "upload_file.php" method = "post"
					enctype="multipart/form-data">
					<label for="file">Fájlnév:</label> <input type="file" name="file" id="file" /> <br /> 
						<br></br>
						<input type="submit" name="submit" value="Feltölt" />
				</form>
			</div>
			<!--close content_item-->
		</div>
		<!--close content-->
	</div>
	<!--site content-->
	
	


    <div id="content_grey">  
	  <br style="clear:both"/>
    </div><!--close content_grey--> 

	<br></br>
	<br></br>


</body>

</html>
