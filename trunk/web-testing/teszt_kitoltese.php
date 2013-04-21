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
	<?php
		$tesztneve = "xml/Proba.xml"; 
	?>

    
	<div id="site_content" align = "center">		  	 
	 
	  <div id="content">
        <div class="content_item" align = "left">
        <form action="teszt_kitoltese.php" method="post">
						<?php
						include 'readQuestion.php';
                      if (empty($_POST['q'])) {
                      	$reply = readQ(0, $tesztneve);
                      }
                      else {
                      	$reply = readQ($_POST['q']-1, $tesztneve);
                      } 
                      if ($reply[0] == "ok") {?>
						<h1> Cím: <?php
	      					echo readName($tesztneve); ?>
						</h1>
	    				<div id="test_information">
	      					<h3>Megjegyzés: Az alábbi teszt kérdéseinek maximum <?php
	      					echo readCorrect($tesztneve); ?> helyes válasza lehet!</h3>
	    				</div><!--close information-->

						<div id="menubar">
							<div id="menubar2">
      							<ul id="menu">
        							<li>Tesztkérdések száma: <?php
	      								echo readQnumber($tesztneve); ?></li>
        							<li>Eddigi kérdések: <?php
                      					if (!empty($_POST['q'])) 
                      						echo $_POST['q']-1;
                      					else 
                      						echo "0";
                    				?></li>
                                   <li>Eddig elért pontszám:<?php 
        								if (!empty($_POST['p'])) {

											$pont = 0;
											$helyes = 0;
											$check = readOneCorrectPoint($tesztneve);
											$reply2 = readQ($_POST['q']-2, $tesztneve);
										
											$answers = 0;
											foreach ($reply2 as $r)
												$answers++;
											for ($i=3; $i < $answers; $i++) {
												if (($i % 2 == 1) && ($reply2[$i] == "true"))
													$helyes++;
											}
										
											if(!empty($_POST['valasz'])) {
												foreach($_POST['valasz'] as $bejelolt) {
													$index = 3 + 2*$bejelolt;
													if ($reply2[$index] == "true") {
														$pont++;
													}
												}
											}
										
											if ($helyes == $pont) {
												$pont = $pont*$check[0];
											} 
											else {
												if ($check[1] == "igen")
													$pont = $pont*$check[0];
												else
													$pont = 0;
											}
										
											echo $_POST['p']+$pont;
											}
                      					else 
                      						echo "0";?>/<?php echo readPoints($tesztneve);?></li>
      							</ul>
      						</div>
    					</div><!--close menubar-->
    					<br></br>
    					<p><font size="6">	
                      	<?php if (empty($_POST['q'])) {
                      		echo "1. ";
                      		echo $reply[1];
                      	}
                      	else {
                      		echo $_POST['q'] . ". ";
                      		echo $reply[1];
                      		}
                      		?>
                      	</font></p>
   
					
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
											<div id="menubar">
												<div id="menubar_test">
													<ul id="menu">    
      													<li><a href="szemelyes_adatok.php">Teszt megszakítása</a></li>  
      												</ul>
      											</div>
											</div> 
											<?php 
						}
                      	else {?> 
                      		<br></br>
	      					<br></br>
	      					<br></br>
	      					<h1> GRATULÁLUNK!!! Az: <?php
	      						echo readName($tesztneve); ?>
	      						című tesztet sikeresen kitöltötte! :)
	      					<br></br>
	      					
	      					<?php
											$pont = 0;
											$helyes = 0;
											$check = readOneCorrectPoint($tesztneve);
											$reply2 = readQ($_POST['q']-2, $tesztneve);
										
											$answers = 0;
											foreach ($reply2 as $r)
												$answers++;
											for ($i=3; $i < $answers; $i++) {
												if (($i % 2 == 1) && ($reply2[$i] == "true"))
													$helyes++;
											}
										
											if(!empty($_POST['valasz'])) {
												foreach($_POST['valasz'] as $bejelolt) {
													$index = 3 + 2*$bejelolt;
													if ($reply2[$index] == "true") {
														$pont++;
													}
												}
											}
										
											if ($helyes == $pont) {
												$pont = $pont*$check[0];
											} 
											else {
												if ($check[1] == "igen")
													$pont = $pont*$check[0];
												else
													$pont = 0;
											}
										?>
	      					
	      					A tesztre kapott jegye: <?php echo number_format(($_POST['p']+$pont)*10/readPoints($tesztneve), 2, '.', '');?>
							</h1>
							<br></br>
							<br></br>
							<h2>
								Ha több információt szeretne kapni a tesztkitöltésről vagy vissza szeretne térni a saját profiljára, kattintson kérem a megfelelő menűpontra!
							</h2>
							
							<br></br>
							<br></br>
							
							<div id="menubar">
								<div id="menubar_test">
									<ul id="menu">  
      									<li><a href="szemelyes_adatok.php">Bővebb információ a tesztkitöltésről</a></li>  
      									<li><a href="szemelyes_adatok.php">Saját profil</a></li>  
      								</ul>
      							</div>
							</div>		
                   
                 <?php } ?>
					  
		</div><!--close content_item-->
		
      </div><!--close content-->  
	  
	</div><!--close site_content--> 
  

	<br></br>
	<br></br>
 
 
</body>
</html>