<?php
session_start();
if(!isset( $_SESSION['your_email'] )){
	header("location:../login.html");
}
?>

<html>
<body>
Login Successful
</body>
</html>