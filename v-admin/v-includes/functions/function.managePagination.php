<?php
	session_start();
	//include the DAL library for the method to insert the details
	include('../library/library.DAL.php');
	$manageData = new manageContent_DAL();
	
	//get the value from the post request
	if( $_SERVER["REQUEST_METHOD"] == "POST" )
	{
		$limit = $_POST["pagination"] ;
	}
	
	//check and update $limit
	if( isset($limit) && !empty($limit) )
	{
		$result = $manageData->updateValueWhere("pagination_info","limit",$limit,"id",1);
		
		if( $result == 1 )
		{
			$_SESSION['result'] = "Update Successful." ;
		}
	}
	
	header('Location: ../../managePagination.php');
?>