<?php
	/*
	- get values are set from the pagination method of 
	- BLL library
	- Auth Singh
	*/


	/***** config for the pagination starts *****/
	
	$limit = "";
	$startPoint = "";
	if( $GLOBALS["_GET"] > 0 )
	{
		if( isset($GLOBALS["_GET"]["limit"]) && !empty($GLOBALS["_GET"]["limit"]) )
		{ 
			//pagination limit
			$limit = $GLOBALS["_GET"]["limit"];
		}
		if( isset($GLOBALS["_GET"]["p"]) && !empty($GLOBALS["_GET"]["p"]))
		{ 		
			//get the startPoint using the pageNo(p) variable
			$startPoint = $GLOBALS["_GET"]["p"];
		}
		if( isset($GLOBALS["_GET"]["type"]) && !empty($GLOBALS["_GET"]["type"]) )
		{ 
			//pagination limit
			$type = $GLOBALS["_GET"]["type"];
			
		}
	}
	//check whether limit is set or not 
	if(!isset($limit) || empty($limit))
	{
		//set it to default page limit
		$limit = 15 ;
	}
	
	//check whether startPoint is set or not if not set it to 0
	if(!isset($startPoint) || empty($startPoint))
	{
		//set it to default page startPoint = 0
		$startPoint = 0 ;
	}
	
	/***** config for the pagination starts *****/
	
	/***** config for the type starts *****/
	
	$type = "";
	
	//check whether limit is set or not 
	if(!isset($type) || empty($type))
	{
		//set it to default page limit
		$type = "recent" ;
	}
	
	$keyword = "" ;
	/***** config ends *****/
?>