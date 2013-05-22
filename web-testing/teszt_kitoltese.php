<?php
session_start();
if (isset($_SESSION['your_email']))
{
	if($_SESSION['your_email']=='admin')
	{
		$_SESSION['login']='Nincs jogosultságod megtekinteni ezt az oldalt!';
		header("location:index.php");
	}
}
else
{
	$_SESSION['login']='Jelentkezz be ahhoz, hogy megtekinthesd ezt az oldalt!';
	header("location:index.php");
}

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

/*$name = explode("/", $_GET['nev']);

$sql = "SELECT `idTesztek` FROM `tesztek` WHERE `TesztNev`= '". $name[1] . "'";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);
$id = $row['idTesztek'];

$sql2 = "UPDATE adatok SET akt_teszt_kitoltes=" . $id . " WHERE `emailcim`='" . $_SESSION['your_email'] . "'";
$result2 = mysql_query($sql2);

if (($_GET["count"] == 1) && isset($_SESSION[$_SESSION['your_email'] . "continue"])) {
	$nowFormat = date('Y-m-d H:i:s');
	$_SESSION[$_SESSION['your_email'] . 'date'] = $nowFormat;
	$sql3 = " INSERT INTO `kitoltotttesztek`(`emailcim`, `idTesztek`, `Datum`) VALUES ('" . $_SESSION['your_email'] . "'," . $id . ",'" . $nowFormat . "')";
	$result3 = mysql_query($sql3);
}*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
<title>Teszt</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=9" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="cookie.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/image_slide.js"></script>
<script type="text/javascript">
function checkTheBox() {
	//obj = document.answers.elements("valasz[]");
	obj = document.getElementsByName("valasz[]");
	for (i = 0; i < obj.length; i++) {
		if (obj[i].checked) {
	        return true;
	        }
        }
    alert("Nem jelöltél be választ!");
    return false;
}

function nextQ() {
	if (checkTheBox())
		document.answers.submit();
}
</script>

</head>

<body>
	<?php
	/*if (!isset($_SESSION[$_SESSION['your_email'] . "p".($_GET["count"])])) {
		if (!isset($_SESSION[$_SESSION['your_email'] . "continue"])) {
			$tesztneve = $_GET['nev'];
		}
	} else if (($_GET["count"] == 1) && isset($_SESSION[$_SESSION['your_email'] . "continue"]))
		$tesztneve = $_GET['nev'];
	else if ($_GET["count"] == 1)
		$tesztneve = "tests/" . $_GET['nev'];
	else
		$tesztneve = $_GET['nev'];

	if (!isset($_SESSION[$_SESSION['your_email'] . "p".($_GET["count"])])) {
		if (!isset($_SESSION[$_SESSION['your_email'] . "continue"])) {
			$tesztneve = $_GET['nev'];
		}
	} else if ($_GET["count"] == 1)
		$tesztneve = "tests/" . $_GET['nev'];
	else*/
	$tesztneve = $_GET['nev'];
	
	$felhasznalo = $_SESSION['your_email'];
	?>


	<div id="site_content" align="center">

		<div id="content">
			<div class="content_item" align="left">
				<form name="answers"
					action="teszt_kitoltese.php?nev=<?php echo $tesztneve;?>&count=<?php echo $_GET["count"]+1 ?>"
					method="post">
					<?php
					include 'readQuestion.php';
					/*if (empty($_POST['q'])) {
					 $reply = readQ(0, $tesztneve);
                      }
                      else {
                      	$reply = readQ($_POST['q']-1, $tesztneve);
                      }*/

					$reply = readQ($_GET["count"]-1, $tesztneve);

					if (!isset($_SESSION[$felhasznalo . "p".($_GET["count"])])) {
                      	if (!isset($_SESSION[$felhasznalo . "continue"])) {
                      		$_SESSION[$felhasznalo . "continue"] = (/*$_GET["count"]+1*/$_SESSION[$felhasznalo . 'q']);
                      		$_SESSION[$felhasznalo . "p" . (/*$_GET["count"]+1*/$_SESSION[$felhasznalo . 'q'])] = 1;
							
                      		$_SESSION[$felhasznalo . "pont_backup"] = 1;
                      	}
                      	?>
					<a href="teszt_kitoltese.php?nev=<?php echo $tesztneve; ?>&count=<?php echo $_SESSION[$felhasznalo . "continue"]; ?>">Teszt
						folytatása</a>

					<?php
                      			} else if ($reply[0] == "ok") {

									$name = explode("/", $_GET['nev']);

									$sql = "SELECT `idTesztek` FROM `tesztek` WHERE `TesztNev`= '". $name[1] . "'";
									$result = mysql_query($sql);
									$row = mysql_fetch_assoc($result);
									$id = $row['idTesztek'];

									$sql2 = "UPDATE adatok SET akt_teszt_kitoltes=" . $id . " WHERE `emailcim`='" . $felhasznalo . "'";
									$result2 = mysql_query($sql2);

									if (($_GET["count"] == 1) && !isset($_SESSION[$felhasznalo . "continue"])) {
										$nowFormat = date('Y-m-d H:i:s');
										$_SESSION[$_SESSION['your_email'] . 'date'] = $nowFormat;
										$sql3 = "	INSERT INTO `kitoltotttesztek`(`emailcim`, `idTesztek`, `Datum`) VALUES ('" . $felhasznalo . "'," . $id . ",'" . $nowFormat . "')";
										$result3 = mysql_query($sql3);
									}

									unset($_SESSION[$felhasznalo . "p".($_GET["count"])]);
									unset($_SESSION[$felhasznalo . "continue"]);
									$_SESSION[$felhasznalo . "p".($_GET["count"]+1)] = 1;
									?>
					<?php

					/*if (empty($_POST['q']))
					 $count = 1;
					else
						$count = $_POST['q'];
						
					$trimmed = $_SESSION[trim("p".($count))];

					if (!isset($trimmed)) {
                      	if (!isset($_SESSION["continue"])) {
                      		$_SESSION["continue"] = ($count+1);
					$_SESSION[trim("p".($count+1))] = 1;
					}
					?>
					<a href="teszt_kitoltese.php?nev=<?php echo $tesztneve; ?>?count=<?php echo $_SESSION["continue"]; ?>">Continue</a>
					<?php
					} else if ($reply[0] == "ok") {
							if ($count != 1)
						unset($_SESSION[trim("p".($count-1))]);
					unset($_SESSION["continue"]);
					$_SESSION[trim("p".($count))] = 1;*/
					// }

                      //if ($reply[0] == "ok") {?>
					<h1>
						Cím:
						<?php
							$_SESSION[$felhasznalo . 'q'] = $_GET['count'];
	      					echo readName($tesztneve); ?>
					</h1>
					<div id="test_information">
						<h3>
							Megjegyzés: Az alábbi teszt kérdéseinek maximum
							<?php
							echo readCorrect($tesztneve); ?>
							helyes válasza lehet!
						</h3>
					</div>
					<!--close information-->

					<div id="menubar">
						<div id="menubar2">
							<ul id="menu">
								<li>Tesztkérdések száma: <?php
								echo readQnumber($tesztneve); ?></li>
								<li>Eddigi kérdések: <?php
								echo $_GET["count"]-1;
								/*if (!empty($_POST['q']))
								 echo $_POST['q']-1;
								else
									echo "0";*/
								?></li>
								<li>Eddig elért pontszám:<?php
								if (isset($_SESSION[$felhasznalo . "pont_backup"])) {
											unset($_SESSION[$felhasznalo . "pont_backup"]);
											$_POST['p'] = $_SESSION[$felhasznalo . "pont"];
											echo $_POST['p'];
										} else if (!empty($_POST['p'])) {

											$pont = 0;
											$helyes = 0;
											$check = readOneCorrectPoint($tesztneve);
											$reply2 = readQ(/*$_POST['q']*/$_GET["count"]-2, $tesztneve);

											$answers = 0;
											foreach ($reply2 as $r)
												$answers++;
											for ($i=3; $i < $answers; $i++) {
												if (($i % 2 == 1) && ($reply2[$i] == "true"))
													$helyes++;
											}
												
											$ab_kimentes = "";
											if(!empty($_POST['valasz'])) {
												foreach($_POST['valasz'] as $bejelolt) {
													$ab_kimentes = $ab_kimentes . $bejelolt . ",";
												}
												
												$sql4 = "UPDATE kitoltotttesztek SET " . ($_GET['count']-1) . "Kerdes ='" . $ab_kimentes . "' WHERE emailcim='" . $felhasznalo . "' AND Datum= '" . $_SESSION[$_SESSION['your_email'] . 'date'] . "'";
												$result4 = mysql_query($sql4);
												
												foreach($_POST['valasz'] as $bejelolt) {
													$index = 3 + 2*$bejelolt;
													if ($reply2[$index] == "true") {
														$pont++;
													}
													else {
														$pont = 0;
														break;
													}
												}
											}

											//echo $ab_kimentes;
												
											if ($helyes == $pont) {
												$pont = $pont*$check[0];
											}
											else {
												if ($check[1] == "igen")
													$pont = $pont*$check[0];
												else
													$pont = 0;
											}

											$_SESSION[$felhasznalo . 'pont'] = $_POST['p'] + $pont;
											echo $_POST['p'] + $pont;
											$_POST['p'] = $_POST['p']+ $pont;
											}
											else
												echo "0";?>/<?php echo readPoints($tesztneve);?>
								</li>
							</ul>
						</div>
					</div>
					<!--close menubar-->
					<br></br>
					<p>
						<font size="6"> <?php /*if (empty($_POST['q'])) {
											echo "1. ";
											echo $reply[1];
											}
											else {
                      		echo $_POST['q'] . ". ";
											echo $reply[1];
											}*/
											 
											echo $_GET["count"] . ". ";
											echo $reply[1];

											?>
						</font>
					</p>


					<p>
						<font size="5"> <?php
						$answers = 0;
						foreach ($reply as $r)
							$answers++;
							
						$j = 0;
						for ($i=2; $i < $answers; $i++) {
												if ($i % 2 == 0) {?> <input type="checkbox" name="valasz[]"
							value="<?php echo $j; $j++; ?>"> <?php echo $reply[$i];?><br>
						<br> <?php } else {
						}
											}
											?> <input type="button" value="Válasz küldése"
							onclick="nextQ();" /> <input type="hidden" name="q"
							value="
											<?php 
											if (!empty($_POST['q'])) echo $_POST['q']+1;
								                      else echo "2";       
								            ?>
											" /> <input type="hidden" name="p"
							value="
											<?php
											if (!empty($_POST['p'])) echo $_POST['p']/*+$pont*/;
													else echo "0";
								            ?>
								 			" /> <input type="hidden" name="d"
							value='
											<?php
											if (!empty($_POST['d'])) echo $_POST['d'];
													else echo $nowFormat;
								            ?>
								 			' />
						</font>
					</p>
				</form>
				<div id="menubar">
					<div id="menubar_test">
						<ul id="menu">
							<li><a href="user/szemelyes_adatok.php">Teszt megszakítása</a></li>
						</ul>
					</div>
				</div>
				<?php 
						}
                      	else {?>
				<br></br> <br></br> <br></br>
				<h1>
					GRATULÁLUNK!!! A(z):
					<?php
	      						echo readName($tesztneve); ?>
					című tesztet sikeresen kitöltötte! :) <br></br>
					<?php

					$sql2 = "UPDATE adatok SET akt_teszt_kitoltes=NULL WHERE `emailcim`='" . $felhasznalo . "'";
					$result2 = mysql_query($sql2);

					//unset($_SESSION["p".($_POST['q'])]);
					unset($_SESSION[$felhasznalo . "p".($_GET["count"])]);
					$pont = 0;
					$helyes = 0;
					$check = readOneCorrectPoint($tesztneve);
					$reply2 = readQ(/*$_POST['q']*/$_GET["count"]-2, $tesztneve);

					$answers = 0;
					foreach ($reply2 as $r)
						$answers++;
					for ($i=3; $i < $answers; $i++) {
												if (($i % 2 == 1) && ($reply2[$i] == "true"))
													$helyes++;
											}

											$ab_kimentes = "";
											if(!empty($_POST['valasz'])) {
												foreach($_POST['valasz'] as $bejelolt) {
													$ab_kimentes = $ab_kimentes . $bejelolt . ",";
												}

												$sql4 = "UPDATE kitoltotttesztek SET " . ($_GET['count']-1) . "Kerdes ='" . $ab_kimentes . "' WHERE emailcim='" . $felhasznalo . "' AND Datum= '" .$_SESSION[$_SESSION['your_email'] . 'date'] . "'";
												$result4 = mysql_query($sql4);

												foreach($_POST['valasz'] as $bejelolt) {
													$index = 3 + 2*$bejelolt;
													if ($reply2[$index] == "true") {
														$pont++;
													}
													else {
														$pont = 0;
														break;
													}
												}
											}

											//echo $ab_kimentes;

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

					A tesztre kapott jegye:
					<?php echo number_format(($_POST['p']+$pont)*10/readPoints($tesztneve), 2, '.', '');

					$sql5 = "UPDATE kitoltotttesztek SET Eredmeny ='" . number_format(($_POST['p']+$pont)*10/readPoints($tesztneve), 2, '.', '') . "' WHERE emailcim='" . $felhasznalo . "' AND Datum= '" .$_SESSION[$_SESSION['your_email'] . 'date'] . "'";
							$result5 = mysql_query($sql5);?>
				</h1>
				<br></br> <br></br>
				<h2>Ha több információt szeretne kapni a tesztkitöltésről vagy
					vissza szeretne térni a saját profiljára, kattintson kérem a
					megfelelő menűpontra!</h2>

				<br></br> <br></br>

				<div id="menubar">
					<div id="menubar_test">
						<ul id="menu">
							<li><a href="szemelyes_adatok.php">Bővebb információ a
									tesztkitöltésről</a></li>
							<li><a href="user/szemelyes_adatok.php">Saját profil</a></li>
							<li><a href="#" onclick="eraseCookie('<?php echo $felhasznalo; ?> '); window.close();">Ablak bezárása</a></li>
						</ul>
					</div>
				</div>

				<?php } ?>

			</div>
			<!--close content_item-->

		</div>
		<!--close content-->

	</div>
	<!--close site_content-->


	<br></br>
	<br></br>


</body>
</html>
