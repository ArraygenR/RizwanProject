<?php 
	session_start();
	session_destroy();
	// below code is used to redirect users to codescracker.php page
	header("location: ../index.php");

?>
