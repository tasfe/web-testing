<?php
	$i = 0;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Teszt</title>  
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
	      <h1>Teszt címe</h1>
	    </div><!--close title-->
	    <div id="test_information">
	      <h3>Megjegyzés: Az alábbi teszt kérdéseinek maximum ... helyes válasza lehet!</h3>
	    </div><!--close information-->
	  </div><!--close banner-->
    </div><!--close header-->

	<div id="menubar">
	<div id="menubar2">
      <ul id="menu">
        <li>Tesztkérdések száma:...</li>
        <li>Eddigi kérdések:...</li>
        <li>Eddig elért pontszám:.../...</li>
      </ul>
      </div>
    </div><!--close menubar-->	
    
	<div id="site_content" align = "center">		  	 
	 
	  <div id="content">
        <div class="content_item" align = "left">
<?php
	$i++;
?>

			<p><font size="6"><?php
                      echo $i;
                    ?>.Kérdés</font></p> <br>
			
			<form>
			<p><font size="5">
			<input type="checkbox" name="valasz[]" value="valasz1"> 1Válasz<br><br>
			<input type="checkbox" name="valasz[]" value="valasz2"> 2Válasz<br><br>
			<input type="checkbox" name="valasz[]" value="valasz3"> 3Válasz<br><br>
			<input type="checkbox" name="valasz[]" value="valasz4"> 4Válasz<br><br>
			<input type="checkbox" name="valasz[]" value="valasz5"> 5Válasz<br><br>
			<input type="submit" value="Válasz küldése"/>
			</font></p>
			</form>
			<?php
				if(!empty($_POST['valasz'])) {
 				   foreach($_POST['valasz'] as $bejelolt) {
            			echo $bejelolt;
            		}
            	}
            ?>
          
					  
		</div><!--close content_item-->
		
		<div id="menubar">
		<div id="menubar_test">
			<ul id="menu">  
      			<!-- <li><a href="teszt_kitoltes.php">Következő kérdés</a></li> -->  
      			<li><a href="szemelyes_adatok.php">Teszt megszakítása</a></li>  
      		</ul>
      		</div>
		</div>
      </div><!--close content-->  
	  
	</div><!--close site_content--> 
    
	
		  
  

	<br></br>
	<br></br>
 
  </div><!--close main-->
 
</body>
</html>