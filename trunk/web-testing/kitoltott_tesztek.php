<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Tesztelo rendszer</title>
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
	      <h1><span>Tesztelo</span> rendszer</h1>
	    </div><!--close welcome-->
	    <div id="welcome_slogan">
	      <h1><span>"Szeretnunk es apolnunk kell a tevedest,</span> mert o a megismeres anyaole." (Nietzsche)</h1>
	    </div><!--close welcome_slogan-->
	  </div><!--close banner-->
    </div><!--close header-->

	<div id="menubar">
      <ul id="menu">
        <li><a href="index.php">Fooldal</a></li>
        <li class="current"><a href="user.php">Profil</a></li>
        <li><a href="logout.php">Kijelentkezes</a></li>
      </ul>
    </div><!--close menubar-->
    
    <div id="site_content">	     		
	
	<div id="site_content">	
    <div class="sidebar_container"> 
    	<div class="sidebar">
          <div class="sidebar_item">
            <a href="szemelyes_adatok.php"><h2>Szemelyes adatok</h2></a>
            <p>A fenti menupont alatt megtekintheted a regisztracio soran megadott adataid. </p>
          </div><!--close sidebar_item--> 
        </div><!--close sidebar-->       
		<div class="sidebar">
          <div class="sidebar_item">
            <a href="uj_teszt.php"><h2>Uj teszt kitoltese</h2></a>
            <p>A fenti menupont alatt kitolthetsz egy tesztet. </p>
            <p>FIGYELEM: Minden tesztet maximum 3-szor tolthetsz ki.</p>
          </div><!--close sidebar_item--> 
        </div><!--close sidebar-->     		
		<div class="sidebar">
          <div class="sidebar_item">
            <h2>Kitoltott tesztett</h2>
            <p>A fenti menupont alatt megnezheted, illetve letoltheted a mar kitoltott tesztjeid.</p>         
		  </div><!--close sidebar_item--> 
        </div><!--close sidebar--> 		
        <div class="sidebar">
          <div class="sidebar_item">
            <a href="eredmenyek.php"><h2>Eredmenyek</h2></a>
            <p>A fenti menupont alatt megnezheted az eddig elert eredmenyeid</p>
          </div><!--close sidebar_item--> 
        </div><!--close sidebar-->
       </div><!--close sidebar_container-->	
	
      <ul class="slideshow">
      	<li class="show"><img width="680" height="250" src="images/home_2.jpg" alt="&quot;Kitoltott tesztek&quot;" /></li>
      	<li><a href="szemelyes_adatok.php"><img width="680" height="250" src="images/home_2.jpg" alt="&quot;Szemelyes adatok&quot;" /></a></li>
        <li><a href="uj_teszt.php"><img width="680" height="250" src="images/home_1.jpg" alt="&quot;Uj teszt kitoltese&quot;" /></a></li>
        <li><a href="eredmenyek.php"><img width="680" height="250" src="images/home_2.jpg" alt="&quot;Eredmenyek&quot;" /></a></li>
      </ul> 

      
	  <br></br>
			<h2 align="center">Kitoltott tesztek</h2>     
			  <p>Itt megtekintheted az eddig kitoltott teszteket. </p>
			  <p>Valassz egy temat a felsoroltak kozul:</p>
				 	<ul>
				 		<li>Algebra</li>
				 		<li>Geometria</li>
				 		<li>Trigonometria</li>
				 	</ul>
	      
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--site content-->

 
    <div id="content_grey">  
      <p>Hasonlo weboldalak</p>   
	  <br style="clear:both"/>
    </div><!--close content_grey-->  

    <br></br>
    <br></br>
    
  </div><!-- close main -->

</body>

</html>