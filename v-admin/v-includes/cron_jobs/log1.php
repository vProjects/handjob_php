<?php
	$content = @file_get_contents('../../../logs/convert_log.txt');

	if($content){
		//get duration of source
		preg_match("/Duration: (.*?), start:/", $content, $matches);
	
		$rawDuration = $matches[1];
	
		//rawDuration is in 00:00:00.00 format. This converts it to seconds.
		$ar = array_reverse(explode(":", $rawDuration));
		$duration = floatval($ar[0]);
		if (!empty($ar[1])) $duration += intval($ar[1]) * 60;
		if (!empty($ar[2])) $duration += intval($ar[2]) * 60 * 60;
	
		//get the time in the file that is already encoded
		preg_match_all("/time=(.*?) bitrate/", $content, $matches);
	
		$rawTime = array_pop($matches);
	
		//this is needed if there is more than one match
		if (is_array($rawTime)){$rawTime = array_pop($rawTime);}
	
		//rawTime is in 00:00:00.00 format. This converts it to seconds.
		$ar = array_reverse(explode(":", $rawTime));
		$time = floatval($ar[0]);
		if (!empty($ar[1])) $time += intval($ar[1]) * 60;
		if (!empty($ar[2])) $time += intval($ar[2]) * 60 * 60;
	
		//calculate the progress
		$progress = round(($time/$duration) * 100);
	
		$status = "Running<br/>" ;
		
		/*echo "Duration: " . $duration . "<br>";
		echo "Current Time: " . $time . "<br>";
		echo "Progress: " . $progress . "%";*/
		
		//echo $duration.",".$time.",".$status.",".$progress ;
		$json_array = array(
							"time"	 => $time ,
							"duration" => $duration,
							"status"   => $status ,
							"progress" => $progress
							);
		$json_data = json_encode($json_array) ;
		print_r($json_data);
	}
	else
	{
		$time = "break" ;
		$duration = "Completed" ;
		$progress = "100" ;
		$status = "Completed" ;
		
		$json_array = array(
							"time"	 => $time ,
							"duration" => $duration,
							"status"   => $status ,
							"progress" => $progress
							);
		$json_data = json_encode($json_array) ;
		print_r($json_data);

	}
?>