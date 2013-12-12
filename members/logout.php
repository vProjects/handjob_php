<?php
	session_start();
	//unset the login pass session variable
	unset($_SESSION["login_flag"]) ;
	//destroy the session
	session_destroy();
	//redirect to the login page
	header('Location: ../tour.php');
?>