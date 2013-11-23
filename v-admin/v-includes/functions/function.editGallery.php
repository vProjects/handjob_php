<?php
	session_start();
	//include the DAL library for the method to insert the details
	include('../library/library.DAL.php');
	$manageData = new manageContent_DAL();
	
	//global variable to store the result
	$result = "";
	
	//table name 
	$table_name = "gallery_info" ;
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$gallery_name = $_POST['gallery_name'];
		
		//get the model id from the input type hidden
		$gallery_id = $_POST['id'];
		
		//get the thumb name from the input type hidden
		$type = $_POST['type'];
	}
	//varriable which will contain the category in string format
	$category_string = ""; 
	$model_string = "" ;
	
	if(!empty($GLOBALS['_POST']['category']) && $GLOBALS['_POST'] > 0)
	{
		$category = $GLOBALS['_POST']['category'];
		//convert array to string seperated by commas
		foreach($category as $cate)
		{
			$category_string = $category_string.",".$cate ;
		}
		/*
		- remove the first word from the $category_string sa it
		- it contains a comma
		*/
		
		$category_string = substr($category_string,1);
	}
	
	
	if(!empty($GLOBALS['_POST']['model']) && $GLOBALS['_POST'] > 0)
	{
		$models = $GLOBALS['_POST']['model'];
		//convert array to string seperated by commas
		foreach($models as $model)
		{
			$model_string = $model_string.",".$model ;
		}
		/*
		- remove the first word from the $category_string sa it
		- it contains a comma
		*/
		$model_string = substr($model_string,1);
	}
	
	//update the name
	if( isset($gallery_name) && !empty($gallery_name))
	{
		$result = $manageData->updateValueWhere($table_name,"gallery_name",$gallery_name,"id",$gallery_id);
		if( $result == 1 )
		{
			$_SESSION['result'] = "Update Successful." ;
		}
	}
	
	//update model
	if( isset($model_string) && !empty($model_string))
	{
		$result = $manageData->updateValueWhere($table_name,"model",$model_string,"id",$gallery_id);
		if( $result == 1 )
		{
			$_SESSION['result'] = "Update Successful." ;
		}
	}
	
	
	//update category
	if( isset($category_string) && !empty($category_string))
	{
		$result = $manageData->updateValueWhere($table_name,"category",$category_string,"id",$gallery_id);
		if( $result == 1 )
		{
			$_SESSION['result'] = "Update Successful." ;
		}
	}
	
	
	header('Location: ../../editGallery.php?galleryId='.$gallery_id);
?>