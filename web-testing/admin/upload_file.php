<?php
	if ((($_FILES["file"]["type"] == "image/gif")
			|| ($_FILES["file"]["type"] == "image/pjpeg"))) {
		if ($_FILES["file"]["error"] > 0)
		{
			echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
		}
		else
		{
			if (file_exists("../tests/" . $_FILES["file"]["name"]))
			{
				echo $_FILES["file"]["name"] . " already exists. ";
			}
			else
			{
				move_uploaded_file($_FILES["file"]["tmp_name"],
				"../tests/" . $_FILES["file"]["name"]);
				
			}
		}
	}
	else
	{
		echo "Invalid file";
	}
	
	header('location:upload.php');
?>