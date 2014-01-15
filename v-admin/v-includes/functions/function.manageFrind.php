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
	//global variable to store the result
	$result = "";
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$name = $_POST['name'];
		$link = $_POST['link'];
		$date = $_POST['date'];
		$photo = $_FILES['photo']['name'];
	}
	
	//check the date whether its empty or not
	if( empty($date) && !isset($date) )
	{
		//get the date of insertion
		$date = date('Y-m-h');		
	}
	
	
	$outputFilenameSuffix = uniqid();
	
	//move the uploaded file to the temp/thumbs/ folder
	$result_upload = $uploadFile->upload_file($name.$outputFilenameSuffix,'photo','../../../temp/thumbs/');
	
	//absolute the path of the input file 
	$inputPath = "../../../temp/thumbs/".$result_upload ;
	//absolute output path
	$outputPath = $_SERVER['DOCUMENT_ROOT']."members/images/friend_thumb/".$result_upload;
	//get H-W ration to prevent Image resterization
	$HWRatio = $manageMedia->getImageAspect($inputPath);
	
	//check whether image is selected or not
	if(!empty($photo))
	{
		//insert the values in the database for model_info table
		if(isset($name) && !empty($name) && isset($link) && !empty($link))
		{
			//insert the value in the datebase
			$result = $manageData->insertFriends($name,$link,$result_upload,$date,1) ;
			if($result == 1)
			{
				//resize and save images in the location inside the members area
				$manageMedia->resizeImage($inputPath,250,377,$outputPath);
				
				//delete the thumb image from the temp folder
				unlink($inputPath);
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
	
	header('Location: ../../manageFriends.php');
	
?>