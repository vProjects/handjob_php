<?php
	session_start();
	//include the DAL library for the method to insert the details
	include('../library/library.DAL.php');
	$manageData = new manageContent_DAL();
	//include the library for uploading the files
	include('../library/class.upload_file.php');
	$uploadFile = new FileUpload();
	//include the media Library
	include('../library/library.media.php');
	$manageMedia = new libraryMedia();
	//table name for the page
	$table_name = "model_info";
	//global variable to store the result
	$result = "";
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$model_name = $_POST['model_name'];
		$description = $_POST['description'];
		$age = $_POST['age'];
		$height = $_POST['height'];
		$weight = $_POST['weight'];
		$measurement = $_POST['measurement'];
		$status = $_POST['status'];
		$photo = $_FILES['photo']['name'];
		
		//get the model id from the input type hidden
		$model_id = $_POST['id'];
		
		//get the thumb name from the input type hidden
		$model_thumb = $_POST['thumb_name'];
	}
	//varriable which will contain the category in string format
	$category_string = ""; 
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
	
	//update the model name
	if( isset($model_name) && !empty($model_name))
	{
		$result = $manageData->updateValueWhere($table_name,"name",$model_name,"id",$model_id);
		if( $result == 1 )
		{
			$_SESSION['result'] = "Update Successful." ;
		}
	}
	
	//update description
	if( isset($description) && !empty($description))
	{
		$result = $manageData->updateValueWhere($table_name,"description",$description,"id",$model_id);
		if( $result == 1 )
		{
			$_SESSION['result'] = "Update Successful." ;
		}
	}
	
	//update age
	if( isset($age) && !empty($age))
	{
		$result = $manageData->updateValueWhere($table_name,"age",$age,"id",$model_id);
		if( $result == 1 )
		{
			$_SESSION['result'] = "Update Successful." ;
		}
	}
	
	//update height
	if( isset($height) && !empty($height))
	{
		$result = $manageData->updateValueWhere($table_name,"height",$height,"id",$model_id);
		if( $result == 1 )
		{
			$_SESSION['result'] = "Update Successful." ;
		}
	}
	//update weight
	if( isset($weight) && !empty($weight))
	{
		$result = $manageData->updateValueWhere($table_name,"weight",$weight,"id",$model_id);
		if( $result == 1 )
		{
			$_SESSION['result'] = "Update Successful." ;
		}
	}
	
	//update status
	if( isset($status) && !empty($status))
	{
		if( $status == "offline")
		{
			$status = 0 ;
		}
		else
		{
			$status = 1 ;
		}
		
		$result = $manageData->updateValueWhere($table_name,"status",$status,"id",$model_id);
		if( $result == 1 )
		{
			$_SESSION['result'] = "Update Successful." ;
		}
	}
	
	//update category
	if( isset($category_string) && !empty($category_string))
	{
		$result = $manageData->updateValueWhere($table_name,"category",$category_string,"id",$model_id);
		if( $result == 1 )
		{
			$_SESSION['result'] = "Update Successful." ;
		}
	}
	
	//paths for image upload
	$temp_path = "../../../temp/thumbs/".$model_thumb ;
	$final_path =  $_SERVER['DOCUMENT_ROOT']."members/images/model_thumb/".$model_thumb;
	
	//update photos
	if( isset($photo) && !empty($photo))
	{
		$model_thumb_name = substr($model_thumb,0,-4);
		$result_upload = $uploadFile->upload_file($model_thumb_name,'photo','../../../temp/thumbs/');
		
		$manageMedia->resizeImage($temp_path,250,377,$final_path) ;
		
		//delete the file
		unlink($temp_path) ;
	}
	
	header('Location: ../../editModel.php?modelId='.$model_id);
?>