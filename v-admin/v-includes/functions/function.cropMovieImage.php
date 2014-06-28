<?php
	include('../library/library.media.php');
	$mediaQuery = new libraryMedia();
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$filename = $_POST['filename'] ;
		$folderName = $_POST['foldername'] ;
		$inputPath = "../../../members/gallery/".$folderName."/".$filename ;
		
		//height and width of the input image
		$getImageHW = $mediaQuery->getImageGeometry($inputPath);
		$jpeg_quality = 90;
		$output_h = $getImageHW['height'] ;
		$output_w = $getImageHW['width'] ;
		$src = $inputPath ;
		$img_r = imagecreatefromjpeg($src);
	  	
		$crop_h =  ($_POST['h']/$_POST['Image_h'])*$output_h ;
		$crop_w = ($_POST['w']/$_POST['Image_w'])*$output_w ;
		
		
		$dst_r = ImageCreateTrueColor( $crop_w,$crop_h );
		
		imagecopyresampled($dst_r,$img_r,0,0,($_POST['x']/$_POST['Image_w'])*$output_w,($_POST['y']/$_POST['Image_h'])*$output_h,$crop_w,$crop_h,$crop_w, $crop_h);
	  
		header('Content-type: image/jpeg');
		
		imagejpeg($dst_r,"../../../temp/".$filename,$jpeg_quality);
		
	  
		header('Location: ../../cropMovieImage.php?fileName='.$filename.'&save=answer&folderName='.$folderName);
	}
?>