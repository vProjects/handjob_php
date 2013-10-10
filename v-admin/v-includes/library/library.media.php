<?php
	/*
	- Requires GD Module
	- Requires ffmpeg Module
	- Requires Imagick Module
	*/
	class libraryMedia
	{
		/*
		- variable to store the path the ffmpeg
		*/
		private $ffmpeg;
		
		function __construct()
		{
			//absolute path for the ffmpeg.exe file
			$this->ffmpeg = $_SERVER['DOCUMENT_ROOT']."/vyrazu/handjob_php/v-admin/v-includes/library/ffmpeg/bin/ffmpeg.exe";
		}
		
		/*
		- method of ffmpeg to take the snapshot
		- Auth Singh
		*/
		function getSnaps($moviePath,$no_snapshots,$video_h,$video_w,$output_path,$output_fileName)
		{
			$movie = new ffmpeg_movie($moviePath,0);
			$movieDuration = $movie->getDuration();
			//duration in milisecond
			$movieDuration = ($movieDuration/60)*1000;
			$interval = $movieDuration/$no_snapshots ;
			for($i=100;$i<$movieDuration;$i=$i+$interval)
			{
				$a = intval($i);
				//echo $a." ==>success<br/>";
				$movie_frames = $movie->getFrame($i);
				$movie_frames->resize($video_h,$video_w,0,0,0,0);
				$movie_frames_jpg = imagejpeg($movie_frames->toGDImage(),$output_path.($output_fileName.$a).".jpg");
			}
		}
		
		/*
		- method to convert the video to a particular format
		- @param $resolution example "320x240"
		- Auth Singh
		*/
		function convertVideo($inputFile,$outPath,$outputFormat,$outputFilename,$resolution)
		{
			exec("$this->ffmpeg -i $inputFile -b:a 128k -b:v 1600k -vcodec h264 -s $resolution -f $outputFormat $outPath".$outputFilename);
			return "1";
		}
		
		/*
		- method to slice the video
		- @param time format tt:hh:ss
		- @param resoltution format example 1200x768
		- Auth Singh
		*/
		function sliceVideo($inputFile,$startTime,$interval,$outPath,$outputFormat,$outputFilename,$resolution)
		{
			exec("$this->ffmpeg -ss $startTime -i $inputFile -t $interval -acodec copy -vcodec h264 -s $resolution -async 1 $outPath".$outputFilename);
		}
		
		/*
		- method to resize the image
		- @param absolute path of both input and output files
		- Auth Singh
		*/
		function resizeImage($inputFile,$imageWidth,$imageHeight,$outputFile)
		{
			$tempImage = new Imagick($inputFile);
			$tempImage->resizeImage($imageWidth,$imageHeight,Imagick::FILTER_LANCZOS,1);
			$tempImage->writeImage($outputFile);
		
			$tempImage->destroy(); 
		}
		
		/*
		- method to take the image and retutn width/height for aspect 
		- ratio calculation
		- @param absolute path of both input
		- Auth Singh
		*/
		function getImageAspect($inputFile)
		{
			$tempImage = new Imagick($inputFile) ;
			$imageGeometry = $tempImage->getImageGeometry() ;
			return $imageGeometry['height']/$imageGeometry['width'] ;
		}
		
		/*
		- method to take the video and return video duration
		- @param absolute path of input video
		- Auth Singh
		*/
		function getVideoLength($inputVideo)
		{
			$movie = new ffmpeg_movie($inputVideo,0) ;
			$movieDuration = $movie->getDuration() ;
			return $movieDuration ;
		}
		
	}

?>