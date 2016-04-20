<?php
session_start();
$_SESSION = array();
session_destroy();

setcookie('login', '');
setcookie('pass_hache', '');
	 
header('Location: ../index.php');
exit();
?>