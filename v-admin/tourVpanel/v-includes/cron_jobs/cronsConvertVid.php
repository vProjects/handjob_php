<?php
	#!/usr/local/bin/php
	require_once('/home/sites/handjobstop.com/public_html/v-admin/tourVpanel/v-includes/library/library.mediaAdvanced.php');
	require_once('/home/sites/handjobstop.com/public_html/v-admin/tourVpanel/v-includes/library/library.DAL.php');
	
	$manageMedia = new manageVideos();
	$manageData = new manageContent_DAL();
	
	$cronValues = $manageData->getValue('cron_gallery_tour','*');
	$cronSilceValues = $manageData->getValue('cron_slice_tour','*');
	//print_r($cronSilceValues);
	
	foreach($cronValues as $cronValue)
	{
		if($cronValue['cron_status'] == 1)
		{
			//update the cron_status to 0 => don't execute
			$changeCron_status_1 = $manageData->updateValueWhere('cron_gallery_tour','cron_status',0,'id',$cronValue['id']) ;
			//if the status of the cron has been changed then only exeute it
			if( $changeCron_status_1 == 1 )
			{
				//get snaps of the videos
				$manageMedia->getSnapsAll($cronValue['snap_input'],$cronValue['no_snapshot'],$cronValue['out_snap_path'],$cronValue['out_snap_filename'],$cronValue['snap_w'],$cronValue['snap_h']);
				//convert the videos
				$manageMedia->convertAll($cronValue['input_video'],$cronValue['outVid_path'],$cronValue['out_filename'],$cronValue['vid_format_1'],$cronValue['vid_format_2'],$cronValue['vid_format_3'],$cronValue['resolution_l'],$cronValue['resolution_m'],$cronValue['resolution_s']);
				
				$result = "1";
				
				//insert the appropiate values in the gallery table and movies table
				$manageData->insertVidCapInfo($cronValue['out_filename'],$cronValue['gallery_name'],$cronValue['out_snap_path'],$cronValue['category'],$cronValue['model'],$cronValue['date'],0,0,1);
				
				$manageData->insertMovieInfo($cronValue['out_filename'],$cronValue['gallery_name'],$cronValue['description'],$cronValue['category'],$cronValue['model'],$cronValue['outVid_path'],$cronValue['vid_format_1'],$cronValue['vid_format_2'],$cronValue['vid_format_3'],"",$cronValue['date'],1);
				
				
				//clear the log file
				$fh = fopen( '../../../logs/snaps_tour_log.txt', 'w+' );
				fclose($fh);
				
				//delete the values from cron gallery table
				$manageData->deleteValue('cron_gallery_tour','id',$cronValue['id']);
			}
		}
	}
	
	
	foreach($cronSilceValues as $cronSilceValue)
	{
		//convert to proper input param date('H:i:s', mktime(0, 0, $cronSilceValue['vid_duration']));
		$timeinterval = $cronSilceValue['vid_duration'] / $cronSilceValue['no_slice'] ;
		
		if($cronSilceValue['status'] == 1)
		{
			//update the cron_status to 0 => don't execute
			$changeCron_status = $manageData->updateValueWhere('cron_slice_tour','status',0,'id',$cronSilceValue['id']) ;
			//if the status of the cron has been changed then only exeute it
			if( $changeCron_status == 1 )
			{
				for($i = 0 ; $i < $cronSilceValue['no_slice'] ; $i++ )
				{
					$start_time = date('H:i:s', mktime(0, 0,($i * $timeinterval)));
					$end_time = date('H:i:s', mktime(0, 0,(($i+1) * $timeinterval)));
					//time for capturing thumb
					$thumb_time = date('H:i:s', mktime(0, 0,($i * $timeinterval)+25));
					
					
					//slice the videos
					$manageMedia->sliceVideo($cronSilceValue['input_path'],$cronSilceValue['gallery_name'],$start_time,$timeinterval,$cronSilceValue['output_path'],$cronSilceValue['output_format'],$cronSilceValue['vid_name']."_".$i,$cronSilceValue['resolution_l'],$cronSilceValue['resolution_m'],$cronSilceValue['resolution_s'],$thumb_time);
					
					//insert the appropiate values in the gallery table and movies table
					$manageData->insertSilcedInfo($cronSilceValue['vid_name']."_".$i,$cronSilceValue['vid_name'],$cronSilceValue['gallery_name'],$cronSilceValue['output_path'],$cronSilceValue['model'],$cronSilceValue['category'],$cronSilceValue['date'],0,0);
					
				}
				
				
				//clear the log file
				$fh1 = fopen( '../../../logs/slice_tour_log.txt', 'w+' );
				fclose($fh1);	
					
				//delete the values from cron gallery table
				$manageData->deleteValue('cron_slice_tour','id',$cronSilceValue['id']);
				//once done exit
				exit();
			}
		}
		
	}
	
?>