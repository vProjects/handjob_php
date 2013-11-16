<?php
	/*
	- get values are set from the pagination method of 
	- BLL library
	- Auth Singh
	*/

	/***** config for the type starts *****/
	
	$type = "";
	if( $GLOBALS["_GET"] > 0 )
	{ 
		//pagination limit
		$type = $GLOBALS["_GET"]["type"];
		
	}
	//check whether limit is set or not 
	if(!isset($type) || empty($type))
	{
		//set it to default page limit
		$type = "recent" ;
	}
	
	/***** config for the pagination starts *****/
?>