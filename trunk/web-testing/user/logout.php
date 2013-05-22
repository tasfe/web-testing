
<?php 
// Put this code in first line of web page.
session_start();
$var = $_SESSION['your_email'];
session_destroy();
?>
<script type="text/javascript" src="../cookie.js"></script>
<script>
eraseCookie('<?php echo $var;?>'); window.location.href = '../login.php';
</script>
<?php

//header("location:../login.php");
?>