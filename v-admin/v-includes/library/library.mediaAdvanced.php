<?php
	require_once('/home/sites/handjobstop.com/public_html/v-admin/v-includes/library/library.media.php');
	
	class manageVideos
	{
		private $mediaQuery;
		
		function __construct()
		{
			$this->mediaQuery = new libraryMedia() ;
			return $this->mediaQuery ;
		}
		
		/*
		- convert the input video into three formats and three three resolution 
		- of each format
		- Auth Singh
		*/
		function convertAll($inputVidForConversion,$outputVideoPath,$outputFilename,$vidFormat_1,$vidFormat_2,$vidFormat_3,$resolutionLarge,$resolutionMedium,$resolutionSmall)
		{
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
		}
		
		/*
		- get the snaps in three sizes
		-Auth Singh
		*/
		function getSnapsAll($inputFile,$no_snapshot,$outputPath,$outputFilename,$vedio_w,$vedio_h)
		{
			//resolution for medium images
			$imageWidthMedium = 1600 ;
			$imageHeightMedium = 1064 ;
			
			//resolution for small images
			$imageWidthSmall = 1024 ;
			$imageHeightSmall = 682 ;
			
			//run the method of media library for geting the snapshots
			$this->mediaQuery->getSnaps($inputFile,$no_snapshot,$vedio_w,$vedio_h,$outputPath,$outputFilename);
			
			//get snapshots medium
			$this->mediaQuery->getSnaps($inputFile,$no_snapshot,$imageWidthMedium,$imageHeightMedium,$outputPath."m/",$outputFilename);
			
			//get snapshots small
			$this->mediaQuery->getSnaps($inputFile,$no_snapshot,$imageWidthSmall,$imageHeightSmall,$outputPath."s/",$outputFilename);
		}
		
		/*
		- method to slice the video in n parts
		- @param time format hh:mm:ss
		- Auth Singh
		*/
		function sliceVideo($inputFile,$startTime,$interval,$outPath,$outputFormat,$outputFilename,$resolution_l,$resolution_m,$resolution_s)
		{
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