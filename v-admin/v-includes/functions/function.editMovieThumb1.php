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
		$galleryId = $_POST['movie_id'];
		$filename = $_POST['filename'];
		$type = $_POST['type'];
		//get the name of the uploaded image 
		$photo = $_FILES['movie_thumb']['name'];
	}
	
	$outputPath_temp = $_SERVER['DOCUMENT_ROOT']."temp/thumbs/";
	
	
	//upload the selected thumb image in the templ folder using 
	//file uploader class in the temp folder
	$filename_temp = $uploadFile->upload_file($galleryId,'movie_thumb',$outputPath_temp);
	
	
	$file_info = pathinfo($outputPath_temp.$filename_temp);
	$ext = $file_info['extension'] ;
	
	if( $ext != "JPG")
	{
		//convert the file to get the .JPG extension
		$mediaQuery->convertImageFormat($outputPath_temp.$filename_temp,$outputPath_temp.$filename,"");
		
		//delete the previous file
		unlink($outputPath_temp.$filename_temp);
	}
	
	
	
	//Open the file for croping in crop page
	
	header('Location: ../../cropMovieThumb1.php?filename='.$filename.'&type='.$type.'&save=false&galleryId='.$galleryId);
?>