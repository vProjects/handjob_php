<?php
	session_start();
	//include the DAL and create object
	include('../library/library.DAL.php');
	
	$manageData = new manageContent_DAL();
	//table name 
	$table_name = "quick_nav" ;
	
	//check the post values and store them
	if( $_SERVER["REQUEST_METHOD"] == "POST" )
	{
		$link_1 = $_POST["link_1"] ;
		$link_2 = $_POST["link_2"] ;
		$link_3 = $_POST["link_3"] ;
		$link_4 = $_POST["link_4"] ;
		$link_5 = $_POST["link_5"] ;
	}
	
	//update the link 1
	if( isset($link_1) && !empty($link_1) )
	{
		$navValue = $manageData->getValueWhere("quick_links","*","id",$link_1);
		
		//update the link and name for the quick nav 
		$result = $manageData->updateValueWhere("quick_nav","link",$navValue[0]["link"],"id",1);
		$result = $manageData->updateValueWhere("quick_nav","name",$navValue[0]["a_name"],"id",1);
		
		if( $result == 1 )
		{
			$_SESSION['result'] = "Update Successful." ;
		}
	}
	
	//update the link 2
	if( isset($link_2) && !empty($link_2) )
	{
		$navValue = $manageData->getValueWhere("quick_links","*","id",$link_2);
		
		//update the link and name for the quick nav 
		$result = $manageData->updateValueWhere("quick_nav","link",$navValue[0]["link"],"id",2);
		$result = $manageData->updateValueWhere("quick_nav","name",$navValue[0]["a_name"],"id",2);
		
		if( $result == 1 )
		{
			$_SESSION['result'] = "Update Successful." ;
		}
	}
	//update the link 3
	if( isset($link_3) && !empty($link_3) )
	{
		$navValue = $manageData->getValueWhere("quick_links","*","id",$link_3);
		
		//update the link and name for the quick nav 
		$result = $manageData->updateValueWhere("quick_nav","link",$navValue[0]["link"],"id",3);
		$result = $manageData->updateValueWhere("quick_nav","name",$navValue[0]["a_name"],"id",3);
		
		if( $result == 1 )
		{
			$_SESSION['result'] = "Update Successful." ;
		}
	}
	//update the link 4
	if( isset($link_4) && !empty($link_4) )
	{
		$navValue = $manageData->getValueWhere("quick_links","*","id",$link_4);
		
		//update the link and name for the quick nav 
		$result = $manageData->updateValueWhere("quick_nav","link",$navValue[0]["link"],"id",4);
		$result = $manageData->updateValueWhere("quick_nav","name",$navValue[0]["a_name"],"id",4);
		
		if( $result == 1 )
		{
			$_SESSION['result'] = "Update Successful." ;
		}
	}
	//update the link 5
	if( isset($link_5) && !empty($link_5) )
	{
		$navValue = $manageData->getValueWhere("quick_links","*","id",$link_5);
		
		//update the link and name for the quick nav 
		$result = $manageData->updateValueWhere("quick_nav","link",$navValue[0]["link"],"id",5);
		$result = $manageData->updateValueWhere("quick_nav","name",$navValue[0]["a_name"],"id",5);
		
		if( $result == 1 )
		{
			$_SESSION['result'] = "Update Successful." ;
		}
	}
	
	header('Location: ../../manageQuickLinks.php');
?>