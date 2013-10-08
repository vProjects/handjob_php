<?php
	//include the media library
	include('../library/library.media.php');
	
	//create an object of medial library
	$mediaQuery = new libraryMedia();
	
	//get the value from the post request
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$foldername = $_POST['foldername'];
		$model_name = $_POST['model_name'];
		$category = $_POST['category'];
	}
	
	//create a folder with unique name using unique id
	$outputFolder = uniqid();
	mkdir("../../../members/gallery/".$outputFolder,0700);
	
	//store the gallery images in the newly created gallery folder
	$outputPath = $_SERVER['DOCUMENT_ROOT']."/vyrazu/handjob_php/members/gallery/".$outputFolder."/";
	
	//take the default path for input images from folder
	$inputFilePath = $_SERVER['DOCUMENT_ROOT']."/vyrazu/handjob_php/uploads/images/".$foldername."/";
	
	//grab the image file from the folder
	$filenames = scandir($inputFilePath);
	$filenames = array_slice($filenames,2);
	print_r($filenames);
	
	//get the files and then resize and save it in the output folder
	foreach($filenames as $filename)
	{
		//$mediaQuery->resizeImage($inputFilePath.$filename,1366,758,$outputPath.$filename);
		copy($inputFilePath.$filename,$outputPath.$filename);
	}
	
	//return the name of the folder using get request
	header('Location: ../../galleryFromImage.php?galleryId='.$outputFolder);
?>