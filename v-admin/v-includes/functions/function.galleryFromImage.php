<?php
	//include the media library
	include('../library/library.media.php');
	include("../library/library.DAL.php");
	include("../library/library.zip.php");
	
	//create an object for the data access layer
	$manageData = new manageContent_DAL();
	
	//create an object of medial library
	$mediaQuery = new libraryMedia();
	
	//create the object for the zip files
	$zipFiles = new zip_library();
	
	//get the value from the post request
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$foldername = $_POST['foldername'];
		$gallery_name = $_POST['gallery_name'];
		$description = $_POST['description'];
		
		$status = $_POST['status'];
		
		$date = $_POST['date'];
	}
	
	$category_string = "" ;
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
	
	//check if date isset or not
	if( !isset($date) && empty($date) )
	{
		//set the date to todays date
		$date = date('Y-m-d');
	}
	
	//create a folder with unique name using unique id
	$outputFolder = uniqid();
	mkdir("../../../members/gallery/".$outputFolder,0777,true);
	//create directory for small and medium images
	mkdir("../../../members/gallery/".$outputFolder."/m",0777,true);
	mkdir("../../../members/gallery/".$outputFolder."/s",0777,true);
	
	//store the gallery images in the newly created gallery folder
	$outputPath = $_SERVER['DOCUMENT_ROOT']."members/gallery/".$outputFolder."/";
	
	//take the default path for input images from folder
	$inputFilePath = $_SERVER['DOCUMENT_ROOT']."uploads/images/".$foldername."/";
	
	//grab the image file from the folder
	$filenames = scandir($inputFilePath);
	$filenames = array_slice($filenames,2);
	//print_r($filenames);
	
	//get the files and then resize and save it in the output folder
	foreach($filenames as $filename)
	{
		//get the HW ratio of the image to maintain the aspect ratio
		$HWRatio = $mediaQuery->getImageAspect($inputFilePath.$filename);
		
		if( $HWRatio < 1 )
		{
			$mediaQuery->resizeImage($inputFilePath.$filename,3000,3000*$HWRatio,$outputPath.$filename);
			$mediaQuery->resizeImage($inputFilePath.$filename,1600,1600*$HWRatio,$outputPath."m/".$filename);
			$mediaQuery->resizeImage($inputFilePath.$filename,1024,1024*$HWRatio,$outputPath."s/".$filename);
		}
		else
		{
			$mediaQuery->resizeImage($inputFilePath.$filename,2000,2000*$HWRatio,$outputPath.$filename);
			$mediaQuery->resizeImage($inputFilePath.$filename,1064,1064*$HWRatio,$outputPath."m/".$filename);
			$mediaQuery->resizeImage($inputFilePath.$filename,682,682*$HWRatio,$outputPath."s/".$filename);
		}
	}
	
	//create the zip files
	$zipFiles->createZip($outputPath,$outputPath,"h.zip");
	$zipFiles->createZip($outputPath."m/",$outputPath,"m.zip");
	$zipFiles->createZip($outputPath."s/",$outputPath,"s.zip");

	//insert the values in the database for the gallery
	$manageData->insertGalleryInfo($outputFolder,$gallery_name,$description,$outputPath,$category_string,$model_string,$date,0,5,$status);
	
	//return the name of the folder using get request
	header('Location: ../../galleryFromImage.php?galleryId='.$outputFolder);
?>