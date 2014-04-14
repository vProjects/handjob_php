<?php
	//include dal file
	include('../library/library.DAL.php');
	$manageData = new manageContent_DAL();
	include('../library/library.media.php');
	$mediaQuery = new libraryMedia();
	
	//get the value from the post request
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$filename = $_POST['filename'];
		$gallery_name = $_POST['gallery_name'];
		$description = $_POST['description'];
		$no_snapshot = $_POST['no_snapshot'];
		$vedio_h = $_POST['vedio_h'];
		$vedio_w = $_POST['vedio_w'];
		$model_name = $_POST['model'];
		
		$l_vedio_h = $_POST['l_vedio_h'];
		$l_vedio_w = $_POST['l_vedio_w'];
		
		$m_vedio_h = $_POST['m_vedio_h'];
		$m_vedio_w = $_POST['m_vedio_w'];
		
		$s_vedio_h = $_POST['s_vedio_h'];
		$s_vedio_w = $_POST['s_vedio_w'];
		
		$no_slicing = $_POST['no_slicing'];
		
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
	
	//take the default path for input file
	$inputFile = $_SERVER['DOCUMENT_ROOT']."uploads/videos/".$filename;
	
	//store the gallery images in the newly created gallery folder
	$outputPath = $_SERVER['DOCUMENT_ROOT']."members/gallery/".$outputFolder."/";
	
	$outputFilename = $outputFolder;
	
	//create the output folder for small pics
	mkdir("../../../members/gallery/".$outputFolder."/m",0777,true);
	
	//create the output folder for medium pics
	mkdir("../../../members/gallery/".$outputFolder."/s",0777,true);
	
	//get movie duration
	$movieDuration = $mediaQuery->getVideoLength($inputFile);
	
	//create the output folder for videos
	mkdir("../../../members/videos/".$outputFolder,0777,true);
	//create the output folder for videos medium
	mkdir("../../../members/videos/".$outputFolder."/m",0777,true);
	//create the output folder for videos small
	mkdir("../../../members/videos/".$outputFolder."/s",0777,true);
	
	//output path for video processing
	$outputVideoPath = $_SERVER['DOCUMENT_ROOT']."members/videos/".$outputFolder."/";
			
	//required vid formats
	$vidFormat_1 = "mp4";
	$vidFormat_2 = "";
	$vidFormat_3 = "";
	
	//resolution according to the inputs format WxH
	$resolutionLarge = $l_vedio_w."x".$l_vedio_h ;
	$resolutionMedium = $m_vedio_w."x".$m_vedio_h ;
	$resolutionSmall = $s_vedio_w."x".$s_vedio_h ;
	
	$inputVidForConversion = $_SERVER['DOCUMENT_ROOT']."uploads/videos/".$filename;
	
	//insert the values in the cron table for automated execution by crons job
	$manageData->insertCronGallery($inputVidForConversion,$gallery_name,$description,$outputVideoPath,$outputFilename,$model_string,$category_string,$vidFormat_1,$vidFormat_2,$vidFormat_3,$resolutionLarge,$resolutionMedium,$resolutionSmall,$inputFile,$no_snapshot,$outputPath,$outputFilename,$vedio_h,$vedio_w,$date,1);	
	
	//check if slicing is required or not
	if(!empty($no_slicing) && isset($no_slicing) && $no_slicing != 0)
	{
		//create a directtory for the sliced videos
		mkdir("../../../members/sliced/".$outputFolder,0777,true);
		//create a directtory for the sliced videos for medium and small resolution
		mkdir("../../../members/sliced/".$outputFolder."/m",0777,true);
		mkdir("../../../members/sliced/".$outputFolder."/s",0777,true);
		
		//path for the sliced videos
		$outputPathSliced = $_SERVER['DOCUMENT_ROOT']."members/sliced/".$outputFolder."/";
		
		//sliced video format
		$sliced_format = "mp4";
		
		//if slicing exists
		if( !empty($no_slicing) && ($no_slicing != 0) )
		{
			//insert the values in the cron table for slicing
			$manageData->insertCronSilce($outputFilename,$gallery_name,$model_string,$category_string,$inputFile,$outputPathSliced,$movieDuration,$no_slicing,$sliced_format,$resolutionLarge,$resolutionMedium,$resolutionSmall,$date,1);
		}
	}
	
	//return the name of the folder using get request
	header('Location: ../../uploadVideo.php?galleryId='.$outputFolder);
	
	
?>