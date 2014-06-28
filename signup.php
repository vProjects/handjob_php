<?php
	session_start();
	
	if( $_SERVER['REQUEST_METHOD'] == "POST" )
	{
		$plan = $_POST['plan'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
	}
	
	$paymentURL = 'https://bill.ccbill.com/jpost/signup.cgi?clientAccnum=909492&clientSubacc=0013&formName=201cc&language=English&allowedTypes='.$plan.'&subscriptionTypeId='.$plan.'&username='.$username.'&email='.$email.'&password='.$password;                                                     
	
	if( isset($plan) && !empty($plan) )
	{
		//redirect to the gateway
		header('Location: '.$paymentURL);
	}
	else
	{
		$_SESSION['result'] = "Please select an option.";
		//redirect to the gateway
		header('Location: join.php');
	}
?>