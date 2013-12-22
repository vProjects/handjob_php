<?php
	#!/usr/local/bin/php
	require_once('/home/sites/handjobstop.com/public_html/v-admin/tourVpanel/v-includes/library/library.mediaAdvanced.php');
	require_once('/home/sites/handjobstop.com/public_html/v-admin/tourVpanel/v-includes/library/library.DAL.php');
	
	$manageMedia = new manageVideos();
	$manageData = new manageContent_DAL();
	
	$cronValues = $manageData->getValue('cron_gallery_tour','*');
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
				//process the sample images
				$manageMedia->convertImages($cronValue['sample_input'],$cronValue['sample_output']) ;
				
				//convert the videos
				$manageMedia->convertAll($cronValue['input_video'],$cronValue['outVid_path'],$cronValue['out_filename'],$cronValue['vid_format_1'],$cronValue['vid_format_2'],$cronValue['vid_format_3'],$cronValue['resolution_l'],$cronValue['resolution_m'],$cronValue['resolution_s']);
				
				$result = "1";
				
				$manageData->insertMovieInfo($cronValue['out_filename'],$cronValue['gallery_name'],$cronValue['description'],$cronValue['category'],$cronValue['model'],$cronValue['outVid_path'],$cronValue['vid_format_1'],$cronValue['vid_format_2'],$cronValue['vid_format_3'],"",$cronValue['date'],1);
				
				
				//clear the log file
				$fh = fopen( '../../../logs/snaps_tour_log.txt', 'w+' );
				fclose($fh);
				
				//delete the values from cron gallery table
				$manageData->deleteValue('cron_gallery_tour','id',$cronValue['id']);
			}
		}
	}
	
?>