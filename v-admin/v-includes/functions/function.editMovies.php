<?php
	session_start();
	//include the DAL library for the method to insert the details
	include('../library/library.DAL.php');
	$manageData = new manageContent_DAL();
	
	//global variable to store the result
	$result = "";
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$movie_name = $_POST['movie_name'];
		
		//get the model id from the input type hidden
		$movie_id = $_POST['id'];
		
		//get the thumb name from the input type hidden
		$type = $_POST['type'];
		
		$description = $_POST['description'];
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
	
	$table_name = "" ;
	
	//set the table name according to the type
	if( $type == "movie" )
	{
		//table name for the page
		$table_name = "movie_info";
	}
	elseif( $type == "sliced" )
	{
		//table name for the page
		$table_name = "sliced_vids";
	}
	
	//update the name
	if( isset($movie_name) && !empty($movie_name))
	{
		$result = $manageData->updateValueWhere($table_name,"movie_name",$movie_name,"id",$movie_id);
		if( $result == 1 )
		{
			$_SESSION['result'] = "Update Successful." ;
		}
	}
	
	//update model
	if( isset($model_string) && !empty($model_string))
	{
		$result = $manageData->updateValueWhere($table_name,"model",$model_string,"id",$movie_id);
		if( $result == 1 )
		{
			$_SESSION['result'] = "Update Successful." ;
		}
	}
	
	
	//update category
	if( isset($category_string) && !empty($category_string))
	{
		$result = $manageData->updateValueWhere($table_name,"category",$category_string,"id",$movie_id);
		if( $result == 1 )
		{
			$_SESSION['result'] = "Update Successful." ;
		}
	}
	
	
	//update description
	if( isset($description) && !empty($description))
	{
		$result = $manageData->updateValueWhere($table_name,"description",$description,"id",$movie_id);
		if( $result == 1 )
		{
			$_SESSION['result'] = "Update Successful." ;
		}
	}
	
	header('Location: ../../editMovies.php?movieId='.$movie_id.'&type='.$type);
?>