<?php 
	session_start();
?>

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
					<td><input class="contact" type="date1" name="date_of_birth" value="" /></td>
				</tr>
				<tr>
					<td><span><b>Telefonszám:</b></span></td>
					<td><input class="contact" type="text" name="tel_nr" value="" /></td>
				</tr>		
				<tr>
					<td><br /> <img src="CaptchaSecurityImages.php?width=100&height=40&characters=5" /><br />
					</td>
					<td>
					<label for="security_code">*Security Code: </label><input id="security_code" name="security_code" type="text" /><br />
					</td>
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

<?php
if( isset($_SESSION['reg_surname']) || isset($_SESSION['reg_first_name']) 
		|| isset($_SESSION['email']) || isset($_SESSION['your_password'])
		|| isset($_SESSION['your_password2']) || isset($_SESSION['city'])
		|| isset($_SESSION['date_of_birth']) || isset($_SESSION['tel_nr']) 
        || isset($_SESSION['ok'])) {
	if($_SESSION['reg_surname'] != '')
	{
		echo '<script type="text/javascript"> alert("Nem töltötte ki a családnév mezőt vagy nem megengedett karaktereket használt.\n Mező kitöltése kötelező !"); </script>';
		unset($_SESSION['reg_surname']);
	}
	else if($_SESSION['reg_first_name'] != '')
	{
			echo '<script type="text/javascript"> alert("Nem töltötte ki a keresztnév mezőt vagy nem megengedett karaktereket használt.\n Mező kitöltése kötelező !"); </script>';
			unset($_SESSION['reg_first_name']);
	}
		 else if($_SESSION['email'] != '')
		 {
		 		echo '<script type="text/javascript"> alert("Helytelen e-mail cím.\n Mező kitöltése kötelező !"); </script>';
		 		unset($_SESSION['email']);
		 }
		 	  else if($_SESSION['your_password'] != '')
		 	  {
		 			echo '<script type="text/javascript"> alert("A jelszónak legalább 5 karakterből kell állnia.\n Mező kitöltése kötelező !"); </script>';
		 			unset($_SESSION['you_password']);
		 	  }
		 	  else if($_SESSION['your_password2'] != '')
		 	  {
		 	  			echo '<script type="text/javascript"> alert("Helytelen jelszómegerősítés.\n Mező kitöltése kötelező !"); </script>';
		 	  			unset($_SESSION['your_password2']);
		 	  }
		 	  		else if($_SESSION['city'] != '')
		 	  		{
		 	  				echo '<script type="text/javascript"> alert("Helytelenül megadott városnév.\n Mező kitöltése kötelező !"); </script>';
		 	  				unset($_SESSION['city']);
		 	  		}
		 	  			 else if($_SESSION['date_of_birth'] != '')
		 	  			 {
		 	  					echo '<script type="text/javascript"> alert("A születési dátumot a következő formában, adja meg : ÉÉÉÉ.HH.NN. !\n Mező kitöltése kötelező !"); </script>';
		 	  					unset($_SESSION['date_of_birth']);
		 	  			 }
		 	  			 	  else if($_SESSION['tel_nr'] != '')
		 	  			 	  {
		 	  			 			echo '<script type="text/javascript"> alert("Nem megfelelő telefonszám."); </script>';
		 	  			 			unset($_SESSION['tel_nr']);
		 	  			 	  }
		 	  			 	  		else if(!$_SESSION['ok'])
		 	  			 	  		{
		 	  			 	  			echo '<script type="text/javascript"> alert("Helytelen képfelismerés. Probálja újra!"); </script>';
		 	  			 	  			unset($_SESSION['ok']);
		 	  			 	  		}
		 	  			 	  			else if($_SESSION['marvolt'] == 'igen')
		 	  			 	  			{
		 	  			 	  					echo '<script type="text/javascript"> alert("A megadott e-mail cím már használatban van!\n Kérem adjon meg másik e-mail címet!"); </script>';
		 	  			 	  					unset($_SESSION['marvolt']);
		 	  			 	  			}
}
?>

</body>
</html>
