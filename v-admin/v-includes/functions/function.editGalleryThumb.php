<?php
	//create thumb image for the gallery and videos
	
	//include the media library and also create an object for accessing the methods
	include('../library/library.media.php');
	//create an object of medial library
	$mediaQuery = new libraryMedia();
	//include the library for uploading the files
	include('../library/class.upload_file.php');
	$uploadFile = new FileUpload();
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		//gallery id is also the folder name
		//gallery id will be the name of the thumb image 
		$galleryId = $_POST['gallery_id'];
		$id = $_POST['id'];
		//get the name of the uploaded image 
		$photo = $_FILES['gallery_thumb']['name'];
	}
	
	$outputPath = $_SERVER['DOCUMENT_ROOT']."members/images/gallery_thumb/".$movieId."/";
	$outputPath_temp = $_SERVER['DOCUMENT_ROOT']."temp/thumbs/";
	
	
	//upload the selected thumb image in the templ folder using 
	//file uploader class in the temp folder
	$filename_temp = $uploadFile->upload_file($galleryId,'gallery_thumb',$outputPath_temp);
	
	//convert the file to get the .JPG extension
	$mediaQuery->convertImageFormat($outputPath_temp.$filename_temp,$outputPath_temp.$galleryId,".JPG");
	//delete the previous file
	unlink($outputPath_temp.$filename_temp);
	
	//Open the file for croping in crop page
	
	header('Location: ../../cropGalleryThumb.php?filename='.$galleryId.".JPG".'&save=false&id='.$id);
?>