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
	//get the date of insertion
	$date = date('Y-m-h');
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
	}
	echo $model_name.','.$description.','.$age.','.$height.','.$weight.','.$measurement.','.$status.','.$photo;
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
	
	$outputFilenameSuffix = uniqid();
	
	//move the uploaded file to the temp/thumbs/ folder
	$result_upload = $uploadFile->upload_file($model_name.$outputFilenameSuffix,'photo','../../../temp/thumbs/');
	
	//absolute the path of the input file 
	$inputPath = "../../../temp/thumbs/".$result_upload ;
	//absolute output path
	$outputPath = $_SERVER['DOCUMENT_ROOT']."members/images/model_thumb/".$result_upload;
	//get H-W ration to prevent Image resterization
	$HWRatio = $manageMedia->getImageAspect($inputPath);
	$HWRatio;
	
	//check whether image is selected or not
	if(!empty($photo))
	{
		//insert the values in the database for model_info table
		if(isset($model_name) && !empty($model_name) && isset($age) && !empty($age) && isset($description) && !empty($description) && isset($height) && !empty($weight) && isset($measurement) && !empty($measurement) && isset($date) && !empty($date) && isset($category_string) && !empty($category_string))
		{
			
			
			echo $model_name.','.$description.','.$age.','.$height.','.$weight.','.$measurement.','.$status.','.$date;
			$result = $manageData->insertModel($model_name,$description,$age,$height,$weight,$category_string,$result_upload,$date,0,'ma',$status);
			echo $result;
			if($result == 1)
			{
				//resize and save images in the location inside the members area
				$manageMedia->resizeImage($inputPath,250,377,$outputPath);
				
				//delete the thumb image from the temp folder
				//unlink($inputPath);
				$result = "Model inserted successfully.";
			}
			else
			{
				$result = "Model insert failed.";
			}
		}
		else
		{
			$result = "Please fill all the fields";
		}
	}
	else
	{
		$result = "Please select a model pic.";
	}
	
	$_SESSION['result'] = $result;
	
	header('Location: ../../addModel.php');
	
?>