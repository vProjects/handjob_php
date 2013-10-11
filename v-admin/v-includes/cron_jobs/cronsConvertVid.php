<?php
	require_once('../library/library.mediaAdvanced.php');
	require_once('../library/library.DAL.php');
	
	$manageMedia = new manageVideos();
	$manageData = new manageContent_DAL();
	
	$cronValues = $manageData->getValue('cron_gallery','*');
	$cronSilceValues = $manageData->getValue('cron_slice','*');
	//print_r($cronSilceValues);
	
	//get the present date for the article insertion
	$date = date('Y-m-d');
	
	foreach($cronValues as $cronValue)
	{
		if($cronValue['cron_status'] == 1)
		{
			//get snaps of the videos
			$manageMedia->getSnapsAll($cronValue['snap_input'],$cronValue['no_snapshot'],$cronValue['out_snap_path'],$cronValue['out_snap_filename'],$cronValue['snap_w'],$cronValue['snap_h']);
			
			//convert the videos
			$manageMedia->convertAll($cronValue['input_video'],$cronValue['outVid_path'],$cronValue['out_filename'],$cronValue['vid_format_1'],$cronValue['vid_format_2'],$cronValue['vid_format_3'],$cronValue['resolution_l'],$cronValue['resolution_m'],$cronValue['resolution_s']);
			
			$result = "1";
			
			//insert the appropiate values in the gallery table and movies table
			$manageData->insertGalleryInfo($cronValue['out_filename'],$cronValue['out_snap_path'],$cronValue['category'],$cronValue['model'],$date,0,0,1);
			$manageData->insertMovieInfo($cronValue['out_filename'],$cronValue['category'],$cronValue['model'],$cronValue['outVid_path'],$cronValue['vid_format_1'],$cronValue['vid_format_2'],$cronValue['vid_format_3'],"",$date,1);
			
			//delete the values from cron gallery table
			$manageData->deleteValue('cron_gallery','id',$cronValue['id']);
		}
	}
	
	
	foreach($cronSilceValues as $cronSilceValue)
	{
		//convert to proper input param date('H:i:s', mktime(0, 0, $cronSilceValue['vid_duration']));
		$timeinterval = $cronSilceValue['vid_duration'] / $cronSilceValue['no_slice'] ;
		
		if($cronSilceValue['status'] == 1)
		{
			for($i = 0 ; $i < $cronSilceValue['no_slice'] ; $i++ )
			{
				$start_time = date('H:i:s', mktime(0, 0,($i * $timeinterval))) ;
				$end_time = date('H:i:s', mktime(0, 0,(($i+1) * $timeinterval)));
				
				
				//slice the videos
				$manageMedia->sliceVideo($cronSilceValue['input_path'],$start_time,$timeinterval,$cronSilceValue['output_path'],$cronSilceValue['output_format'],$cronSilceValue['vid_name']."_".$i,$cronSilceValue['resolution_l'],$cronSilceValue['resolution_m'],$cronSilceValue['resolution_s']);
				
			}
			
			//insert the appropiate values in the gallery table and movies table
			$manageData->insertSilcedInfo($cronSilceValue['vid_name'],$cronSilceValue['output_path'],$cronSilceValue['model'],$cronSilceValue['category'],$date,0,0);
				
			//delete the values from cron gallery table
			$manageData->deleteValue('cron_slice','id',$cronSilceValue['id']);
		}
		
	}
	
?>