<?php
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
	      <h1> Cím: <?php
	      		include 'readQuestion.php';
	      		echo readName("tests/AlgebraelmH.xml"); ?>
		</h1>
	    </div><!--close title-->
	    <div id="test_information">
	      <h3>Megjegyzés: Az alábbi teszt kérdéseinek maximum <?php
	      		echo readCorrect("tests/AlgebraelmH.xml"); ?> helyes válasza lehet!</h3>
	    </div><!--close information-->
	  </div><!--close banner-->
    </div><!--close header-->

	<div id="menubar">
	<div id="menubar2">
      <ul id="menu">
        <li>Tesztkérdések száma: <?php
	      		echo readQnumber("tests/AlgebraelmH.xml"); ?></li>
        <li>Eddigi kérdések: <?php
                      if (!empty($_POST['q'])) echo $_POST['q']-1;
                      else echo "0";
                    ?></li>
        <li>Eddig elért pontszám:<?php 
        							if (!empty($_POST['p'])) {

										$pont = 0;
										$helyes = 0;
										$check = readOneCorrectPoint("tests/AlgebraelmH.xml");
										$reply = readQ($_POST['q']-2, "tests/AlgebraelmH.xml");
										
										$answers = 0;
										foreach ($reply as $r)
											$answers++;
										for ($i=3; $i < $answers; $i++) {
											if (($i % 2 == 1) && ($reply[$i] == "true"))
												$helyes++;
										}
										
										if(!empty($_POST['valasz'])) {
											foreach($_POST['valasz'] as $bejelolt) {
												$index = 3 + 2*$bejelolt;
												//echo $bejelolt;
												//echo $reply[$index];
												if ($reply[$index] == "true") {
													$pont++;
												}
											}
										}
										
										if ($helyes == $pont) {
											$pont = $pont*$check[0];
										} else {
											if ($check[1] == "igen")
												$pont = $pont*$check[0];
											else
												$pont = 0;
										}
										
										echo $_POST['p']+$pont;
										}
                      				else echo "0";?>/<?php echo readPoints("tests/AlgebraelmH.xml");?></li>
      </ul>
      </div>
    </div><!--close menubar-->	
    
	<div id="site_content" align = "center">		  	 
	 
	  <div id="content">
        <div class="content_item" align = "left">
			<p><font size="6"><?php			
                      if (!empty($_POST['q'])) {
                      	$reply = readQ($_POST['q']-1, "tests/AlgebraelmH.xml");
                      		if ($reply[0] == "ok")
							 echo $_POST['q'] . ".";
						}
                      else {
							$reply = readQ(0, "tests/AlgebraelmH.xml");
							echo "1.";
							} echo $reply[1];?> </font></p> <br>
			
			<form action="teszt_kitoltes.php" method="post">
			<p><font size="5">
			
			<?php 
			$answers = 0;
			foreach ($reply as $r)
				$answers++;
			
			$j = 0;
			for ($i=2; $i < $answers; $i++) {
				if ($i % 2 == 0) {?>
			<input type="checkbox" name="valasz[]" value="<?php echo $j; $j++; ?>"> <?php echo $reply[$i];?><br><br>
			<?php } else {
			}	
			}
			?>
<!-- 			<input type="checkbox" name="valasz[]" value="valasz1"> 1Válasz<br><br> -->
<!-- 			<input type="checkbox" name="valasz[]" value="valasz2"> 2Válasz<br><br> -->
<!-- 			<input type="checkbox" name="valasz[]" value="valasz3"> 3Válasz<br><br> -->
<!-- 			<input type="checkbox" name="valasz[]" value="valasz4"> 4Válasz<br><br> -->
<!-- 			<input type="checkbox" name="valasz[]" value="valasz5"> 5Válasz<br><br> -->
			<input type="submit" value="Válasz küldése"/>
			<input type="hidden" name="q" value="
			<?php 
			
			
			if (!empty($_POST['q'])) echo $_POST['q']+1;
                      else echo "2";
            ?>
			"/>
			<input type="hidden" name="p" value="
			<?php
			if (!empty($_POST['p'])) echo $_POST['p']+$pont;
					else echo "0";
            ?>
 			"/>
			</font></p>
			</form>          
					  
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