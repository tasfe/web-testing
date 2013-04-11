<?php

function validate($file) {

	$xml = new DOMDocument();
	$xml->load($file);

	chdir("../xml");
	if (!$xml->schemaValidate("TesztSema.xsd")) {
		return false;
	}
	else {
		return true;
	}
}

	if ((($_FILES["file"]["type"] == "text/xml")
			|| ($_FILES["file"]["type"] == "image/jpg"))) {
		if ($_FILES["file"]["error"] > 0)
		{
			echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
		}
		else
		{
			if (file_exists("../tests/" . $_FILES["file"]["tmp_name"]))
			{
				echo $_FILES["file"]["name"] . " already exists. ";
			}
			else
			{
				echo $_FILES["file"]["tmp_name"];
				if (validate($_FILES["file"]["tmp_name"])) {
					move_uploaded_file($_FILES["file"]["tmp_name"],
					"../tests/" . $_FILES["file"]["name"]);
				} else
					echo "Invalid file";
			}
		}
	}
	else
	{
		echo "Invalid file";
	}
	
	header('location:upload.php');
?>