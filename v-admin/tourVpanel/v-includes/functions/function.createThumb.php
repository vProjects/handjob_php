<?php
	//create thumb image for the gallery and videos
	
	//include the media library and also create an object for accessing the methods
	include('../library/library.media.php');
	//create an object of medial library
	$mediaQuery = new libraryMedia();
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$fileName = $_POST['thumb_image'];
		//gallery id is also the folder name
		//gallery id will be the name of the thumb image 
		$galleryId = $_POST['gallery_id'];
	}
	
	//get the extension of the file
	$ext = pathinfo($fileName, PATHINFO_EXTENSION);
	
	$inputPath = $_SERVER['DOCUMENT_ROOT']."gallery/".$galleryId."/";
	$outputPath = $_SERVER['DOCUMENT_ROOT']."images/gallery_thumb/";
	
	$mediaQuery->resizeImage($inputPath.$fileName,250,377,$outputPath.$galleryId.".JPG");
	
	header('Location: ../../galleryFromImage.php');
?>