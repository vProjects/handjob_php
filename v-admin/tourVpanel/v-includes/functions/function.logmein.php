<?php
	session_start();
	//include the DAL library for the method to insert the details
	include('../library/library.DAL.php');
	$manageData = new manageContent_DAL();
	
	//get the value from the post request
	if( $_SERVER["REQUEST_METHOD"] == "POST" )
	{
		$username = $_POST["u_name"] ;
		$password = $_POST["u_pass"] ;
	}
	
	//check the password and username is set or not
	if( isset($password) && !empty($password) && isset($username) && !empty($username) )
	{
		//get the password from the database
		$db_password = $manageData->getValueWhere('admin_info','password','id',1) ;
		//check the enter password matches or not
		if( $password == $db_password[0]["password"] )
		{
			//set the loged in credentials
			$_SESSION["login_flag"] = "v_pass_@1234" ;
			//send the user to admin.php
			header('Location: ../../admin.php');
		}
		else
		{
			//error wrong username and password
			$_SESSION["error"] = "Invalid Username or Password." ;
			//and send them to login page
			header('Location: ../../index.php');
		}
	}
	else
	{
		//please fill the form properly
		$_SESSION["error"] = "Please Fill the form properly." ;
		//and send them to login page
		header('Location: ../../index.php');
	}
?>