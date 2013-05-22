<?php session_start()?>

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
	      <h1><span>Tesztelő</span> rendszer</h1>
	    </div><!--close welcome-->
	    <div id="welcome_slogan">
	      <h1><span>"Szeretnünk és ápolnunk kell a tévedést,</span> mert ő a megismerés anyaöle." (Nietzsche)</h1>
	    </div><!--close welcome_slogan-->
	  </div><!--close banner-->
    </div><!--close header-->

	<div id="menubar">
      <ul id="menu">
        <li><a href="index.php">Főoldal</a></li>
        <li class="current"><a href="login.html">Bejelentkezés</a></li>
      </ul>
    </div><!--close menubar-->
	
	<div id="site_content" align = "center">	     		
	
      <ul class="slideshow">
        <li class="show"><img width="680" height="250" src="images/home_1.jpg" alt="&quot;Üdvözlünk az oldalunkon!&quot;" /></li>
        <li><img width="680" height="250" src="images/home_2.jpg" alt="&quot;Webes tesztelő rendszer&quot;" /></li>
      </ul> 	   

	  <div id="content">
        <div class="content_item">
		  <div class="form_settings"> 
			<table  border="0" cellpadding="2" cellspacing="10" align = "center">
			<form action="bejelentkezes/check_login.php" method="post" >
				<tr>
					<td colspan="2"><h2>Bejelentkezés</h2></td>
				</tr>
				<tr>
					<td><span>Email cím:</span></td>
					<td><input class="contact" type="text" name="your_email" value="" /></td>
				</tr>
				<tr>
					<td><span>Jelszó:</span></td>
					<td><input class="contact" type="password" name="your_password" value="" /></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="login_button" value="Bejelentkezés" /></td>
				</tr>
				</form>
				<tr>
					<td>
					<p><span>Még nem regisztráltál?</span></p>
					<p><span>Itt megteheted:</span></p>
					</td>
					<form action="regisztracio/regisztracio.php" method="post" ><td style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="registration_submitted" value="Regisztráció" /></td></form>		
			</table>
	      </div><!--close form_settings-->
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--site content-->
	
	<br></br>
    <br></br>
 
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
 
  </div><!--close main-->
<?php 
	if(isset($_SESSION['hibas']))
	{
		if($_SESSION['hibas'])
			echo '<script type="text/javascript"> alert("Hibás e-mail cím vagy jelszó!"); </script>';
		unset($_SESSION['hibas']);
	}
	if(isset($_SESSION['empty_login']))
	{
		unset($_SESSION['empty_login']);
		echo '<script type="text/javascript"> alert("Mindkét mezőt ki kell töltened a bejelentkezéshez!"); </script>';
	}
?>
  
</body>
</html>
