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
	
	$inputPath = $_SERVER['DOCUMENT_ROOT']."members/gallery/".$galleryId."/";
	$outputPath = $_SERVER['DOCUMENT_ROOT']."members/images/movie_thumb/";
	$outputPath_temp = $_SERVER['DOCUMENT_ROOT']."temp/thumbs/";
	
	//if a thumb already exists delete the thumb because Imagick merge image don't overwrite thee file
	if (file_exists("../../../members/images/movie_thumb/".$galleryId.".JPG"))
	{
		//delete the file
		unlink($outputPath.$galleryId.".JPG");
	}
	
	
	$mediaQuery->resizeImage($inputPath.$fileName,317,178,$outputPath_temp.$galleryId.".JPG");
	$mediaQuery->mergeImage($outputPath_temp.$galleryId.".JPG",$outputPath,$galleryId,"JPG");
	unlink($outputPath_temp.$galleryId.".JPG");
	
	header('Location: ../../updateMovie.php?galleryId='.$galleryId);
?>