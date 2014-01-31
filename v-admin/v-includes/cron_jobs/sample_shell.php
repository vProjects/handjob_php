<?php
	require_once('../library/library.DAL.php');
	
	$manageData = new manageContent_DAL();
	/*$inputVidForConversion = "/home/sites/handjobstop.com/public_html/uploads/videos/aa.mp4";
	$outputFilename = "output";
	$thumbFormat = "jpg";
	//output path for the thumbnail
	$outputPathThumb =  '/home/sites/handjobstop.com/public_html/members/images/movie_thumb/';
	//startTime variable is time after which we take a snap
	$startTime = "00:00:25";
	//get thumbnail for the video
	$mediaQuery->getThumbs($inputVidForConversion,$startTime,"377x250",$outputPathThumb,$outputFilename,$thumbFormat);*/

//exec("/usr/local/bin/ffmpeg -i /home/sites/handjobstop.com/public_html/uploads/videos/aa.mp4 -s 1920x1080 -f flv /home/sites/handjobstop.com/public_html/members/videos/anand/526824ee70cb3.flv 2> /home/sites/handjobstop.com/public_html/log/log.txt");

//exec("/usr/local/bin/ffmpeg -ss 00:00:25 -i /home/sites/handjobstop.com/public_html/uploads/videos/aa.mp4 -s 377x250 -frames:v 1 /home/sites/handjobstop.com/public_html/temp/out.jpg    2> /home/sites/handjobstop.com/public_html/logs/thumb_log.txt");
/*	$path = "/home/sites/handjobstop.com/public_html/members/images/";
	$thumb = new Imagick($path."movie_thumb/527ff8f36db2aaa.JPG");
	$play_sym = new Imagick($path."play_sym.png");
	
	$thumb->compositeImage($play_sym , Imagick::COMPOSITE_DEFAULT, 0, 0 );
	
	header('Content-type: image/JPG');
	$thumb->writeImage($path."movie_thumb/527ff8f36db2a.JPG");
	echo $thumb;
	echo "done";*/
	for( $i = 0 ; $i < 8 ; $i++ )
	{
		//$this->mediaQuery->getThumbs($inputVidForConversion,$snaps_interval*($i+1),"317x178",$outputPathThumb,$outputFilename."_".$i,$thumbFormat);
		//create array from the names of the thumb for the database the database
		
	}
	
	

?>
