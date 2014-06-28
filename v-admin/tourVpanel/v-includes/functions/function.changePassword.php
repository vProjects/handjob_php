<?php
	session_start();
	include('../library/library.DAL.php');
	$manageData = new manageContent_DAL();
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$newPassword = $_POST['password'];
		$newPassword1 = $_POST['retype_password'];
		$oldPassword = $_POST['old_password'];
	}
	if($oldPassword != "" && isset($oldPassword) && isset($newPassword) && isset($newPassword1) && $newPassword != "" && $newPassword1 !="")
	{
		$password_db = $manageData->getValueWhere('admin_info','password','id',1);
		
		if($newPassword == $newPassword1)
		{
			if($oldPassword == $password_db[0]['password'])
			{
				$rowCount = $manageData->updateValueWhere('admin_info','password',$newPassword,'id',1);
				if($rowCount == 1)
				{
					echo $_SESSION['result'] = "Password successfully changed";
				}
				else
				{
					echo $_SESSION['result'] = "Password change Failed";
				}
			}
			else
			{
				$_SESSION['result'] = "Wrong Password";
			}
		}
		else
		{
			$_SESSION['result'] = "New passwords don't match.";
		}
	}
	else
	{
		$_SESSION['result'] = "Please fill the form properly";
	}
	
	header('location: ../../changePwd.php');
?>