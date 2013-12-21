<?php
	require_once('/home/sites/handjobstop.com/public_html/v-admin/tourVpanel/v-includes/library/library.media.php');
	require_once('/home/sites/handjobstop.com/public_html/v-admin/tourVpanel/v-includes/library/library.zip.php');
	
	class manageVideos
	{
		private $mediaQuery;
		
		private $zipFiles;
		
		function __construct()
		{
			$this->mediaQuery = new libraryMedia() ;
			$this->zipFiles = new zip_library();
			return $this->mediaQuery ;
		}
		
		/*
		- convert the input video into three formats and three three resolution 
		- of each format
		- Auth Singh
		*/
		function convertAll($inputVidForConversion,$outputVideoPath,$outputFilename,$vidFormat_1,$vidFormat_2,$vidFormat_3,$resolutionLarge,$resolutionMedium,$resolutionSmall)
		{
			//output path for the thumbnail
			$outputPathThumb_temp =  '/home/sites/handjobstop.com/public_html/temp/thumbs/';
			$outputPathThumb =  '/home/sites/handjobstop.com/public_html/images/movie_thumb/';
			//thumb image format
			$thumbFormat = "JPG";
			//startTime variable is time after which we take a snap
			$startTime = "00:00:25";
			//get thumbnail for the video
			$this->mediaQuery->getThumbs($inputVidForConversion,$startTime,"317x178",$outputPathThumb_temp,$outputFilename,$thumbFormat);
			//get the image from the temp file and convert it into thumb with play image
			$this->mediaQuery->mergeImage($outputPathThumb_temp.$outputFilename.".".$thumbFormat,$outputPathThumb,$outputFilename,$thumbFormat);
			//delete the temp file
			unlink($outputPathThumb_temp.$outputFilename.".".$thumbFormat);
			
			
			//convert videos in all the three formats Large
			$this->mediaQuery->convertVideo($inputVidForConversion,$outputVideoPath,$vidFormat_1,$outputFilename.".".$vidFormat_1,$resolutionLarge);
			//$this->mediaQuery->convertVideo($inputVidForConversion,$outputVideoPath,$vidFormat_2,$outputFilename.".".$vidFormat_2,$resolutionLarge);
			//$this->mediaQuery->convertVideo($inputVidForConversion,$outputVideoPath,$vidFormat_2,$outputFilename.".".$vidFormat_3,$resolutionLarge);
		
			//convert videos in all the three formats Medium
			$this->mediaQuery->convertVideo($inputVidForConversion,$outputVideoPath."m/",$vidFormat_1,$outputFilename.".".$vidFormat_1,$resolutionMedium);
			//$this->mediaQuery->convertVideo($inputVidForConversion,$outputVideoPath."m/",$vidFormat_2,$outputFilename.".".$vidFormat_2,$resolutionMedium);
			//$this->mediaQuery->convertVideo($inputVidForConversion,$outputVideoPath."m/",$vidFormat_2,$outputFilename.".".$vidFormat_3,$resolutionMedium);
			
			//convert videos in all the three formats Small
			$this->mediaQuery->convertVideo($inputVidForConversion,$outputVideoPath."s/",$vidFormat_1,$outputFilename.".".$vidFormat_1,$resolutionSmall);
			//$this->mediaQuery->convertVideo($inputVidForConversion,$outputVideoPath."s/",$vidFormat_2,$outputFilename.".".$vidFormat_2,$resolutionSmall);
			//$this->mediaQuery->convertVideo($inputVidForConversion,$outputVideoPath."s/",$vidFormat_2,$outputFilename.".".$vidFormat_3,$resolutionSmall);
			
			//clear the log file
			$fh = fopen( '../../../../logs/convert_tour_log.txt', 'w+' );
			fclose($fh);
		}
		
		/*
		- get the snaps in three sizes
		-Auth Singh
		*/
		function getSnapsAll($inputFile,$no_snapshot,$outputPath,$outputFilename,$vedio_w,$vedio_h)
		{
			//output path for the thumbnail
			$outputPathThumb =  '/home/sites/handjobstop.com/public_html/images/gallery_thumb/';
			//thumb image format
			$thumbFormat = "JPG";
			//startTime variable is time after which we take a snap
			$startTime = "00:00:25";
			//get thumbnail for the video
			$this->mediaQuery->getThumbs($inputFile,$startTime,"250x377",$outputPathThumb,$outputFilename,$thumbFormat);
			
			
			//resolution for medium images
			$imageWidthMedium = 1600 ;
			$imageHeightMedium = 1064 ;
			
			//resolution for small images
			$imageWidthSmall = 1024 ;
			$imageHeightSmall = 682 ;
			
			//run the method of media library for geting the snapshots
			$this->mediaQuery->getSnaps($inputFile,$no_snapshot,$vedio_w,$vedio_h,$outputPath,$outputFilename);
			//create a zip for high res gallery
			$this->zipFiles->createZip($outputPath,$outputPath,"h.zip");
			 
			//get snapshots medium
			$this->mediaQuery->getSnaps($inputFile,$no_snapshot,$imageWidthMedium,$imageHeightMedium,$outputPath."m/",$outputFilename);
			//create a zip for med res gallery
			$this->zipFiles->createZip($outputPath."m/",$outputPath,"m.zip");
			
			//get snapshots small
			$this->mediaQuery->getSnaps($inputFile,$no_snapshot,$imageWidthSmall,$imageHeightSmall,$outputPath."s/",$outputFilename);
			//create a zip for low res gallery
			$this->zipFiles->createZip($outputPath."s/",$outputPath,"s.zip");
		}
		
		/*
		- method to slice the video in n parts
		- @param time format hh:mm:ss
		- Auth Singh
		*/
		function sliceVideo($inputFile,$gallery_name,$startTime,$interval,$outPath,$outputFormat,$outputFilename,$resolution_l,$resolution_m,$resolution_s,$thumb_time)
		{
			//output path for the thumbnail
			$outputPathThumb_temp =  '/home/sites/handjobstop.com/public_html/temp/thumbs/';
			$outputPathThumb =  '/home/sites/handjobstop.com/public_html/images/movie_thumb/';
			//thumb image format
			$thumbFormat = "JPG";
			//get thumbnail for the video
			$this->mediaQuery->getThumbs($inputFile,$thumb_time,"317x178",$outputPathThumb_temp,$outputFilename,$thumbFormat);
			
			//get the image from the temp file and convert it into thumb with play image
			$this->mediaQuery->mergeImage($outputPathThumb_temp.$outputFilename.".".$thumbFormat,$outputPathThumb,$outputFilename,$thumbFormat);
			//delete the temp file
			unlink($outputPathThumb_temp.$outputFilename.$thumbFormat);
			
			
			$outputFilename = $outputFilename.".".$outputFormat;
			//slice the video -->large
			$this->mediaQuery->sliceVideo($inputFile,$startTime,$interval,$outPath,$outputFormat,$outputFilename,$resolution_l);
			//slice the video -->medium
			$this->mediaQuery->sliceVideo($inputFile,$startTime,$interval,$outPath."m/",$outputFormat,$outputFilename,$resolution_m);
			//slice the video -->small
			$this->mediaQuery->sliceVideo($inputFile,$startTime,$interval,$outPath."s/",$outputFormat,$outputFilename,$resolution_s);
			
		}
	}
?>