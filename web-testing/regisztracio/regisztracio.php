<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Tesztelő rendszer</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
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
        <li><a href="../index.php">Főoldal</a></li>
        <li class="current"><a href="../login.html">Bejelentkezés</a></li>
      </ul>
    </div><!--close menubar-->
	
	<div id="site_content" align = "center">	     		
	
      <ul class="slideshow">
        <li class="show"><img width="680" height="250" src="../images/home_1.jpg" alt="." /></li>
        <li><img width="680" height="250" src="../images/home_2.jpg" alt="." /></li>
      </ul> 	   

      <br></br>
      <h2 align="center">Regisztráció</h2>
      <p align="center">FONTOS : A *-al jelölt mezőket kötelező módon ki kell töltened!</p>
      
	  <div id="content">
        <div class="content_item">
		  <div class="form_settings"> 
		  <form action = "insert.php" method = "post">
			<table  border="0" cellpadding="2" cellspacing="10" align = "center">
				<tr>
					<td ><span><b>*Családnév:</b></span></td>
					<td><input class="contact" type="text" name="reg_surname" value="" /></td>
				</tr>		
				<tr>
					<td><span><b>*Keresztnév:</b></span></td>
					<td><input class="contact" type="text" name="reg_first_name" value="" /></td>
				</tr>						
				<tr>
					<td><span><b>*Email cím:</b></span></td>
					<td><input class="contact" type="text" name="email" value="" /></td>
				</tr>
				<tr>
					<td><span><b>*Jelszó:</b></span></td>
					<td><input class="contact" type="password" name="your_password" value="" /></td>
				</tr>
				<tr>
					<td><span><b>*Jelszó megerősítése:</b></span></td>
					<td><input class="contact" type="password" name="your_password2" value="" /></td>
				</tr>
				<tr>
					<td><span><b>*Település:</b></span></td>
					<td><input class="contact" type="text" name="city" value="" /></td>
				</tr>
				<tr>
					<td><span><b>*Születési dátum(év.hónap.nap.):</b></span></td>	
					<td><input class="contact" type="date" name="date_of_birth" value="" /></td>
				</tr>
				<tr>
					<td><span><b>Telefonszám:</b></span></td>
					<td><input class="contact" type="text" name="tel_nr" value="" /></td>
				</tr>				
				<tr>
					<td>&nbsp;</td>
					<td style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="registration_form_submitted" value="Mehet" /></td>
				</tr>				
			</table>
			</form>
	      </div><!--close form_settings-->
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--site content-->

    <br></br>
 
    <div id="content_grey">  
      <p>Hasonló weboldalak</p>   
	  <br style="clear:both"/>
    </div><!--close content_grey-->  

    <br></br>
    <br></br>
 
  </div><!--close main-->

</body>
</html>
