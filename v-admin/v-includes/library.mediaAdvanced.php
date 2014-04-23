<?php
	require_once('/home/sites/handjobstop.com/public_html/v-admin/tourVpanel/v-includes/library/library.media.php');
	require_once('/home/sites/handjobstop.com/public_html/v-admin/tourVpanel/v-includes/library/library.zip.php');
	require_once('/home/sites/handjobstop.com/public_html/v-admin/tourVpanel/v-includes/library/library.DAL.php');
	
	class manageVideos
	{
		private $mediaQuery;
		private $_manageData ;
		private $zipFiles;
		
		function __construct()
		{
			$this->mediaQuery = new libraryMedia() ;
			$this->zipFiles = new zip_library();
			$this->_manageData = new manageContent_DAL() ;
			return $this->mediaQuery ;
		}
		
		/*
		- convert the input video into three formats and three three resolution 
		- of each format
		- Auth Singh
		*/
		function convertAll($inputVidForConversion,$outputVideoPath,$outputFilename,$vidFormat_1,$vidFormat_2,$vidFormat_3,$resolutionLarge,$resolutionMedium,$resolutionSmall)
		{
			//array to store the movie thumb name for db
			$thumb_array = array() ;
			//max no thumb according to the db
			$max_thumb = 8 ;
			//output path for the thumbnail
			$outputPathThumb_temp =  '/home/sites/handjobstop.com/public_html/temp/thumbs/';
			$outputPathThumb =  '/home/sites/handjobstop.com/public_html/images/movie_thumb/';
			//thumb image format
			$thumbFormat = "JPG";
			//startTime variable is time after which we take a snap
			$startTime = "00:00:25";
			//get the total time of the video
			$movie_duration = $this->mediaQuery->getVideoLength($inputVidForConversion) ;
			$snaps_interval = $movie_duration/($max_thumb+1) ;
			//get the main thumb
			//get thumbnail for the video
			$this->mediaQuery->getThumbs($inputVidForConversion,$startTime,"900x507",$outputPathThumb,$outputFilename,$thumbFormat);
			//get multiple thumbnail for the video
			for( $i = 0 ; $i < $max_thumb ; $i++ )
			{
				$this->mediaQuery->getThumbs($inputVidForConversion,$snaps_interval*($i+1),"317x178",$outputPathThumb,$outputFilename."_v_".$i,$thumbFormat);
				//create array from the names of the thumb for the database the database
				array_push(
								$thumb_array ,
								$outputFilename."_v_".$i.".".$thumbFormat 
							) ;
			}
			
			//insert the array into db
			$this->_manageData->insertMovieThumb($outputFilename, $thumb_array[0], $thumb_array[1], $thumb_array[2], $thumb_array[3], $thumb_array[4], $thumb_array[5], $thumb_array[6], $thumb_array[7]) ;
			
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
		
		/*
		- method to convert the images to get the output
		- as processed sample images
		- Auth Singh
		*/
		function convertImages($inputFilePath,$outputPath)
		{
			//grab the image file from the folder
			$filenames = scandir($inputFilePath);
			$filenames = array_slice($filenames,2);
			//get the files and then resize and save it in the output folder
			foreach($filenames as $filename)
			{
				//get the HW ratio of the image to maintain the aspect ratio
				$HWRatio = $this->mediaQuery->getImageAspect($inputFilePath.$filename) ;
				if( $HWRatio < 1 )
				{
					$this->mediaQuery->resizeImage($inputFilePath.$filename,3000,3000*$HWRatio,$outputPath.$filename);
					$this->mediaQuery->resizeImage($inputFilePath.$filename,1600,1600*$HWRatio,$outputPath."m/".$filename);
					$this->mediaQuery->resizeImage($inputFilePath.$filename,1024,1024*$HWRatio,$outputPath."s/".$filename);
				}
				else
				{
					$this->mediaQuery->resizeImage($inputFilePath.$filename,2000,2000*$HWRatio,$outputPath.$filename);
					$this->mediaQuery->resizeImage($inputFilePath.$filename,1064,1064*$HWRatio,$outputPath."m/".$filename);
					$this->mediaQuery->resizeImage($inputFilePath.$filename,682,682*$HWRatio,$outputPath."s/".$filename);
				}
			}
		}
	}
?>