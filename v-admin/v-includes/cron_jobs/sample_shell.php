<?php
	/*require_once('/home/sites/handjobstop.com/public_html/v-admin/v-includes/library/library.media.php');
	
	$mediaQuery = new libraryMedia() ;
	$inputVidForConversion = "/home/sites/handjobstop.com/public_html/uploads/videos/aa.mp4";
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

	echo $timeA = strtotime("00:00:30");
	echo "</br>";
	echo $start_time = date('H:i:s', mktime(0, 0,($timeA)))
?>
