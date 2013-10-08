<?php
	//include dal file
	include('../library/library.DAL.php');
	$manageData = new manageContent_DAL();
	
	//get the value from the post request
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$filename = $_POST['filename'];
		$no_snapshot = $_POST['no_snapshot'];
		$vedio_h = $_POST['vedio_h'];
		$vedio_w = $_POST['vedio_w'];
		$model_name = $_POST['model_name'];
		$category = $_POST['category'];
		
		$l_vedio_h = $_POST['l_vedio_h'];
		$l_vedio_w = $_POST['l_vedio_w'];
		
		$m_vedio_h = $_POST['m_vedio_h'];
		$m_vedio_w = $_POST['m_vedio_w'];
		
		$s_vedio_h = $_POST['s_vedio_h'];
		$s_vedio_w = $_POST['s_vedio_w'];
		
		$no_slicing = $_POST['no_slicing'];
	}
	
	//create a folder with unique name using unique id
	$outputFolder = uniqid();
	mkdir("../../../members/gallery/".$outputFolder,0700);
	
	//take the default path for input file
	$inputFile = $_SERVER['DOCUMENT_ROOT']."/vyrazu/handjob_php/uploads/videos/".$filename;
	
	//store the gallery images in the newly created gallery folder
	$outputPath = "../../../members/gallery/".$outputFolder."/";
	
	$outputFilename = $outputFolder;
	
	//create the output folder for small pics
	mkdir("../../../members/gallery/".$outputFolder."/m",0700);
	
	//create the output folder for medium pics
	mkdir("../../../members/gallery/".$outputFolder."/s",0700);
	
	//get movie duration
	/*$movieDuration = $mediaQuery->getVideoLength($inputFile);
	$movieDuration;*/
	
	//create the output folder for videos
	mkdir("../../../members/videos/".$outputFolder,0700);
	//create the output folder for videos medium
	mkdir("../../../members/videos/".$outputFolder."/m",0700);
	//create the output folder for videos small
	mkdir("../../../members/videos/".$outputFolder."/s",0700);
	
	//output path for video processing
	$outputVideoPath = $_SERVER['DOCUMENT_ROOT']."/vyrazu/handjob_php/members/videos/".$outputFolder."/";
			
	//required vid formats
	$vidFormat_1 = "flv";
	$vidFormat_2 = "avi";
	$vidFormat_3 = "wmv";
	
	//resolution according to the inputs format WxH
	$resolutionLarge = $l_vedio_w."x".$l_vedio_h ;
	$resolutionMedium = $m_vedio_w."x".$m_vedio_h ;
	$resolutionSmall = $s_vedio_w."x".$s_vedio_h ;
	
	$inputVidForConversion = "../../../uploads/videos/".$filename;
	
	//insert the values in the cron table for automated execution by crons job
	$manageData->insertCronGallery($inputVidForConversion,$outputVideoPath,$outputFilename,$vidFormat_1,$vidFormat_2,$vidFormat_3,$resolutionLarge,$resolutionMedium,$resolutionSmall,$inputFile,$no_snapshot,$outputPath,$outputFilename,$vedio_h,$vedio_w,1);	
	
	//return the name of the folder using get request
	//header('Location: ../../uploadVideo.php?galleryId='.$outputFolder);
	
	
?>