<?php
session_start();
$_SESSION[$_SESSION['your_email'] . "p1"] = 0;
$_SESSION[$_SESSION['your_email'] . "pont"] = 0;
unset($_SESSION[$_SESSION['your_email'] . "pont_backup"]);
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
	      <h1><span>Tesztelő</span> rendszer</h1>
	    </div><!--close welcome-->
	    <div id="welcome_slogan">
	      <h1><span>"Szeretnünk és ápolnunk kell a tévedést,</span> mert ő a megismerés anyaöle." (Nietzsche)</h1>
	    </div><!--close welcome_slogan-->
	  </div><!--close banner-->
    </div><!--close header-->

	<div id="menubar">
      <ul id="menu">
        <li><a href="index2.php">Főoldal</a></li>
        <li><a href="logout.php">Kijelentkezés</a></li>
      </ul>
    </div><!--close menubar-->
    
    <div id="site_content">	     		
	
	<div id="site_content">	
    <div class="sidebar_container">  
        <div class="sidebar">
          <div class="sidebar_item">
            <a href="szemelyes_adatok.php"><h2>Személyes adatok</h2></a>
            <p>A fenti menüpont alatt megtekintheted a regisztráció során megadott adataid. </p>
          </div><!--close sidebar_item--> 
        </div><!--close sidebar-->  
		<div class="sidebar">
          <div class="sidebar_item">
            <h2>Új teszt kitöltése</h2>
            <p>A fenti menüpont alatt kitölthetsz egy tesztet. </p>
          </div><!--close sidebar_item--> 
        </div><!--close sidebar-->     		
		<div class="sidebar">
          <div class="sidebar_item">
            <a href="kitoltott_tesztek.php"><h2>Eddigi eredmények</h2></a>
            <p>A fenti menüpont alatt megnézheted, illetve letöltheted a már kitöltött tesztjeid.</p>         
		  </div><!--close sidebar_item-->
        </div><!--close sidebar--> 		
       </div><!--close sidebar_container-->	
	
      <ul class="slideshow">
        <li class="show"><img width="680" height="250" src="../images/home_1.jpg" alt="&quot;Új teszt kitöltése&quot;" /></li>
        <li><a href="szemelyes_adatok.php"><img width="680" height="250" src="../images/home_2.jpg" alt="&quot;Személyes adatok&quot;" /></a></li>
        <li><a href="kitoltott_tesztek.php"><img width="680" height="250" src="../images/home_2.jpg" alt="&quot;Kitöltött tesztek&quot;" /></a></li>
        <li><a href="eredmenyek.php"><img width="680" height="250" src="../images/home_2.jpg" alt="&quot;Eredmények&quot;" /></a></li>
      </ul> 
      
      <div id="content">
				<div class="content_item" align="center">

					<br></br>

					<p>A teszteket az alábbi kategóriákból választhatod ki.
						Kívánunk hasznos időtöltést és jó tanulást!</p>

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
					
					include '../readTests.php';
					include '../readQuestion.php';?>
					<table  border="0" cellpadding="2" cellspacing="10" align = "center">
						<tr>
							<th rowspan="2" align="center"><img src="../images/algebra_icon.png" alt="image1" height="50"/></th>
						</tr>
						<tr>
							<th align="center">Algebra elmélet</th>
							<td></td>
						</tr>
						<?php
							$sql="SELECT TesztNev FROM tesztek WHERE TesztAktivitas = '1' AND Kategoria='Algebra elmelet'";
							$result=mysql_query($sql);
							if($result) {
								//die("Sikertelen lekérdezés!");
								
							while ($row = mysql_fetch_assoc($result)) {
	
								$sql2 = "SELECT Datum FROM `kitoltotttesztek` WHERE idTesztek = (SELECT idTesztek FROM `tesztek` WHERE TesztNev = '" . $row['TesztNev'] . "') AND emailcim = '" . $_SESSION['your_email'] . "'";
								$result2 = mysql_query($sql2);
								$num = mysql_num_rows($result2);

								$cim = readName("../tests/" . $row['TesztNev']);
								
								if (readPossibility("../tests/" . $row['TesztNev']) > $num) {
									?><tr><td></td><td><a href="../start_test.php?nev=<?php echo $row["TesztNev"];?>&count=1" target="_blank"><?php echo $cim;?></a></td></tr><?php 
								}
								if (readPossibility("../tests/" . $row['TesztNev']) <= $num) {
									?><tr><td></td><td><?php echo $cim;?></td></tr><?php
								}
							}
							}
						?>
						<tr>
							<td></td>
<!-- 							<td><a href="../alg_elm.html" ><font size="3">További tesztek...</font><img src="../images/arrow_brown2.png" alt="image1" height="20"/></a></td> -->
							<td></td>
						</tr>
						</table>
						<hr>
					<table  border="0" cellpadding="2" cellspacing="10" align = "center">
						<tr>
							<th rowspan="2" align="center"><img src="../images/algebra_icon.png" alt="image1" height="50"/></th>
						</tr>
						<tr>
							<th align="center">Algebra gyakorlat</th>
							<td></td>
						</tr><?php
							$sql="SELECT TesztNev FROM tesztek WHERE TesztAktivitas = '1' AND Kategoria='Algebra gyakorlat'";
							$result=mysql_query($sql);
							if($result) {
								//die("Sikertelen lekérdezés!");
								
								while ($row = mysql_fetch_assoc($result)) {
	
								$sql2 = "SELECT Datum FROM `kitoltotttesztek` WHERE idTesztek = (SELECT idTesztek FROM `tesztek` WHERE TesztNev = '" . $row['TesztNev'] . "') AND emailcim = '" . $_SESSION['your_email'] . "'";
								$result2 = mysql_query($sql2);
								$num = mysql_num_rows($result2);

								$cim = readName("../tests/" . $row['TesztNev']);
								
								$_SESSION['1Kerdes'] = 1; //beallitom, hogy az elso kerdes kitoltese kovetkezik
								
								if (readPossibility("../tests/" . $row['TesztNev']) > $num) {
									?><tr><td></td><td><a href="../start_test.php?nev=<?php echo $row["TesztNev"];?>&count=1" target="_blank"><?php echo $cim;?></a></td></tr><?php 
								}
								if (readPossibility("../tests/" . $row['TesztNev']) <= $num) {
									?><tr><td></td><td><?php echo $cim;?></td></tr><?php
								}
							}
							}
						?>
						<tr>
							<td></td>
<!-- 							<td><a href="../alg_gyak.html"><font size="3">További tesztek...</font><img src="../images/arrow_brown2.png" alt="image1" height="20"/></a></td> -->
							<td></td>
						</tr>
						</table>
						<hr>
					<table  border="0" cellpadding="2" cellspacing="10" align = "center">
						<tr>
							<th rowspan="2" align="center"><img src="../images/geom_icon.png" alt="image1" height="50"/></th>
						</tr>
						<tr>
							<th align="center">Mértan elmélet</th>
							<td></td>
						</tr><?php
							$sql="SELECT TesztNev FROM tesztek WHERE TesztAktivitas = '1' AND Kategoria='Mertan elmelet'";
							$result=mysql_query($sql);
							if($result) {
								//die("Sikertelen lekérdezés!");
								
							while ($row = mysql_fetch_assoc($result)) {
	
								$sql2 = "SELECT Datum FROM `kitoltotttesztek` WHERE idTesztek = (SELECT idTesztek FROM `tesztek` WHERE TesztNev = '" . $row['TesztNev'] . "') AND emailcim = '" . $_SESSION['your_email'] . "'";
								$result2 = mysql_query($sql2);
								$num = mysql_num_rows($result2);

								$cim = readName("../tests/" . $row['TesztNev']);
								
								if (readPossibility("../tests/" . $row['TesztNev']) > $num) {
									?><tr><td></td><td><a href="../start_test.php?nev=<?php echo $row["TesztNev"];?>&count=1" target="_blank"><?php echo $cim;?></a></td></tr><?php 
								}
								if (readPossibility("../tests/" . $row['TesztNev']) <= $num) {
									?><tr><td></td><td><?php echo $cim;?></td></tr><?php
								}
							}
							}
						?>
						<tr>
							<td></td>
<!-- 							<td><a href="../geo_elm.html"><font size="3">További tesztek...</font><img src="../images/arrow_brown2.png" alt="image1" height="20"/></a></td> -->
							<td></td>
						</tr>
						</table>
						<hr>
					<table  border="0" cellpadding="2" cellspacing="10" align = "center">
						<tr>
							<th rowspan="2" align="center"><img src="../images/geom_icon.png" alt="image1" height="50"/></th>
						</tr>
						<tr>
							<th align="center">Mértan gyakorlat</th>
							<td></td>
						</tr><?php
							$sql="SELECT TesztNev FROM tesztek WHERE TesztAktivitas = '1' AND Kategoria='Mertan gyakorlat'";
							$result=mysql_query($sql);
							if($result) {
								//die("Sikertelen lekérdezés!");
								
							while ($row = mysql_fetch_assoc($result)) {
	
								$sql2 = "SELECT Datum FROM `kitoltotttesztek` WHERE idTesztek = (SELECT idTesztek FROM `tesztek` WHERE TesztNev = '" . $row['TesztNev'] . "') AND emailcim = '" . $_SESSION['your_email'] . "'";
								$result2 = mysql_query($sql2);
								$num = mysql_num_rows($result2);

								$cim = readName("../tests/" . $row['TesztNev']);
								
								if (readPossibility("../tests/" . $row['TesztNev']) > $num) {
									?><tr><td></td><td><a href="../start_test.php?nev=<?php echo $row["TesztNev"];?>&count=1" target="_blank"><?php echo $cim;?></a></td></tr><?php 
								}
								if (readPossibility("../tests/" . $row['TesztNev']) <= $num) {
									?><tr><td></td><td><?php echo $cim;?></td></tr><?php
								}
							}
							}
						?>
						<tr>
							<td></td>
<!-- 							<td><a href="../geo_gyak.html"><font size="3">További tesztek...</font><img src="../images/arrow_brown2.png" alt="image1" height="20"/></a></td> -->
							<td></td>
						</tr>
						</table>
						<hr>
					<table  border="0" cellpadding="2" cellspacing="10" align = "center">
						<tr>
							<th rowspan="2" align="center"><img src="../images/osszef_icon.png" alt="image1" height="50"/></th>
						</tr>
						<tr>
							<th align="center">Összefoglalók</th>
							<td></td>
						</tr><?php
							$sql="SELECT TesztNev FROM tesztek WHERE TesztAktivitas = '1' AND Kategoria='Osszefoglalok'";
							$result=mysql_query($sql);
							if($result) {
								//die("Sikertelen lekérdezés!");
								
							while ($row = mysql_fetch_assoc($result)) {
	
								$sql2 = "SELECT Datum FROM `kitoltotttesztek` WHERE idTesztek = (SELECT idTesztek FROM `tesztek` WHERE TesztNev = '" . $row['TesztNev'] . "') AND emailcim = '" . $_SESSION['your_email'] . "'";
								$result2 = mysql_query($sql2);
								$num = mysql_num_rows($result2);

								$cim = readName("../tests/" . $row['TesztNev']);
								
								if (readPossibility("../tests/" . $row['TesztNev']) > $num) {
									?><tr><td></td><td><a href="../start_test.php?nev=<?php echo $row["TesztNev"];?>&count=1" target="_blank"><?php echo $cim;?></a></td></tr><?php 
								}
								if (readPossibility("../tests/" . $row['TesztNev']) <= $num) {
									?><tr><td></td><td><?php echo $cim;?></td></tr><?php
								}
							}
							}
						?>
						<tr>
							<td></td>
<!-- 							<td><a href="../osszef.html"><font size="3">További tesztek...</font><img src="../images/arrow_brown2.png" alt="image1" height="20"/></a></td> -->
							<td></td>
						</tr>
						</table>

					<br></br>
	      
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--site content-->

 
    <div id="content_grey">  
      <p>Hasonló weboldalak</p>   
	  <br style="clear:both"/>
    </div><!--close content_grey-->  

    <br></br>
    <br></br>
    
  </div><!-- close main -->

</body>
</html>