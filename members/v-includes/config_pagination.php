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
		//pagination limit
		$limit = $GLOBALS["_GET"]["limit"];
		
		//get the startPoint using the pageNo(p) variable
		$startPoint = $GLOBALS["_GET"]["p"];
	}
	//check whether limit is set or not 
	if(!isset($limit) || empty($limit))
	{
		//set it to default page limit
		$limit = 8 ;
	}
	
	//check whether startPoint is set or not if not set it to 0
	if(!isset($startPoint) || empty($startPoint))
	{
		//set it to default page startPoint = 0
		$startPoint = 0 ;
	}
	
	/***** config for the pagination starts *****/
?>