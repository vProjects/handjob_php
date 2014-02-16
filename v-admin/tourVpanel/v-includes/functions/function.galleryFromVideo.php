<?php
	//include dal file
	include('../library/library.DAL.php');
	$manageData = new manageContent_DAL();
	include('../library/library.media.php');
	$mediaQuery = new libraryMedia();
	
	//get the value from the post request
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		//sample video folder
		$filename = $_POST['filename'];
		
		$gallery_name = $_POST['gallery_name'];
		$description = $_POST['description'];
		//samle image folder
		$sample_image = $_POST['sample_image'];
		
		$l_vedio_h = $_POST['l_vedio_h'];
		$l_vedio_w = $_POST['l_vedio_w'];
		
		$m_vedio_h = $_POST['m_vedio_h'];
		$m_vedio_w = $_POST['m_vedio_w'];
		
		$s_vedio_h = $_POST['s_vedio_h'];
		$s_vedio_w = $_POST['s_vedio_w'];
		
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
	$outputFilename = $outputFolder ;
	
	//take the default path for input file
	$inputVidForConversion = $_SERVER['DOCUMENT_ROOT']."uploads/tour/videos/".$filename;

	//input file for the sample video images
	$input_sample_video_image =  $_SERVER['DOCUMENT_ROOT']."uploads/tour/video_sample_image/".$sample_image."/" ;
		
	//get movie duration
	$movieDuration = $mediaQuery->getVideoLength($inputVidForConversion);
	
	//create the output folder for videos
	mkdir("../../../../videos/".$outputFolder,0777,true);
	//create the output folder for videos medium
	mkdir("../../../../videos/".$outputFolder."/m",0777,true);
	//create the output folder for videos small
	mkdir("../../../../videos/".$outputFolder."/s",0777,true);
	
	//create the folders for sample video images
	mkdir("../../../../videos_sample_image/".$outputFolder,0777,true);
	//create the folders for sample video images medium
	mkdir("../../../../videos_sample_image/".$outputFolder."/m",0777,true);
	//create the folders for sample video images small
	mkdir("../../../../videos_sample_image/".$outputFolder."/s",0777,true);
	
	//output path for video processing
	$outputVideoPath = $_SERVER['DOCUMENT_ROOT']."videos/".$outputFolder."/";
	$outputVideo_sample_image = $_SERVER['DOCUMENT_ROOT']."videos_sample_image/".$outputFolder."/";
			
	//required vid formats
	$vidFormat_1 = "mp4";
	$vidFormat_2 = "";
	$vidFormat_3 = "";
	
	//resolution according to the inputs format WxH
	$resolutionLarge = $l_vedio_w."x".$l_vedio_h ;
	$resolutionMedium = $m_vedio_w."x".$m_vedio_h ;
	$resolutionSmall = $s_vedio_w."x".$s_vedio_h ;
	
	//insert the values in the cron table for automated execution by crons job
	$result = $manageData->insertCronGallery($inputVidForConversion,$gallery_name,$description,$outputVideoPath,$outputFilename,$model_string,$category_string,$vidFormat_1,$vidFormat_2,$vidFormat_3,$resolutionLarge,$resolutionMedium,$resolutionSmall,$input_sample_video_image,$outputVideo_sample_image,$date,1);	
	
	//return the name of the folder using get request
	header('Location: ../../uploadVideo.php?galleryId='.$outputFolder);
	
	
?>