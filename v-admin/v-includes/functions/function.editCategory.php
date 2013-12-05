<?php
	session_start();
	//include the DAL library for the method to insert the details
	include('../library/library.DAL.php');
	$manageData = new manageContent_DAL();
	
	//global variable to store the result
	$result = "";
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$type = $_POST["type"] ;
		$id = $_POST["id"] ;
		
		$category_name = $_POST["category_name"] ;
	}
	
	$table_name = "" ;
	//set the table name
	if( isset($type) && !empty($type))
	{
		$table_name = $type ;
	}
	
	//update the name
	if( isset($category_name) && !empty($category_name))
	{
		$result = $manageData->updateValueWhere($table_name,"category",$category_name,"id",$id);
		if( $result == 1 )
		{
			$_SESSION['result'] = "Update Successful." ;
		}
	}
	
	$return_page = "editCategories.php" ;
	
	
	header('Location: ../../'.$return_page.'?type='.$type.'&id='.$id);
?>