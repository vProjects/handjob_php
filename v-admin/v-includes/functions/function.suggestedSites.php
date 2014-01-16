<?php
	session_start();
	//include the DAL and create object
	include('../library/library.DAL.php');
	
	$manageData = new manageContent_DAL();
	$table_name = "suggested_info" ;
	
	//check the post values and store them
	if( $_SERVER["REQUEST_METHOD"] == "POST" )
	{
		$link_1 = $_POST["link_1"] ;
		$link_2 = $_POST["link_2"] ;
		$link_3 = $_POST["link_3"] ;
		$link_4 = $_POST["link_4"] ;
	}
	
	//update the link 1
	if( isset($link_1) && !empty($link_1) )
	{
		//update the link and name for the suggested sites 
		$result = $manageData->updateValueWhere($table_name,"suggested_site_id",$link_1,"id",1);
		
		if( $result == 1 )
		{
			$_SESSION['result'] = "Update Successful." ;
		}
	}
	
	//update the link 2
	if( isset($link_2) && !empty($link_2) )
	{
		//update the link and name for the suggested sites 
		$result = $manageData->updateValueWhere($table_name,"suggested_site_id",$link_2,"id",2);
		
		if( $result == 1 )
		{
			$_SESSION['result'] = "Update Successful." ;
		}
	}
	//update the link 3
	if( isset($link_3) && !empty($link_3) )
	{
		//update the link and name for the suggested sites 
		$result = $manageData->updateValueWhere($table_name,"suggested_site_id",$link_3,"id",3);
		
		if( $result == 1 )
		{
			$_SESSION['result'] = "Update Successful." ;
		}
	}
	//update the link 4
	if( isset($link_4) && !empty($link_4) )
	{
		//update the link and name for the suggested sites 
		$result = $manageData->updateValueWhere($table_name,"suggested_site_id",$link_4,"id",4);
		
		if( $result == 1 )
		{
			$_SESSION['result'] = "Update Successful." ;
		}
	}
	
	header('Location: ../../manageSuggestedSites.php');
?>