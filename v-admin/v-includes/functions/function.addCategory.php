<?php
	session_start();
	//include the DAL library for the method to insert the details
	include('../library/library.DAL.php');
	$manageData = new manageContent_DAL();
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$category = $_POST['category_name'];
		$tableName = $_POST['page'];
	}
	
	$presentDate = date('Y-m-d');
	
	if(!empty($category) && isset($category))
	{
		$result = $manageData->insertCategory($tableName,$category,$presentDate,0,0);
		//print the output status of the insertion
		if($result == 1)
		{
			$_SESSION['result'] = "Successfully added.";
		}
		else
		{
			$_SESSION['result'] = "Please try again.";
		}
	}
?>