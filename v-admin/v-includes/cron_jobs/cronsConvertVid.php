<?php
	require_once('../library/library.mediaAdvanced.php');
	require_once('../library/library.DAL.php');
	
	$manageMedia = new manageVideos();
	$manageData = new manageContent_DAL();
	
	$cronValues = $manageData->getValue('cron_gallery','*');
	print_r($cronValues);
	
	foreach($cronValues as $cronValue)
	{
		if($cronValue['cron_status'] == 1)
		{
			//get snaps of the videos
			//$manageMedia->getSnapsAll($cronValue['snap_input'],$cronValue['no_snapshot'],$cronValue['out_snap_path'],$cronValue['out_snap_filename'],$cronValue['snap_w'],$cronValue['snap_h']);
			
			//convert the videos
			$manageMedia->convertAll($cronValue['input_video'],$cronValue['outVid_path'],$cronValue['out_filename'],$cronValue['vid_format_1'],$cronValue['vid_format_2'],$cronValue['vid_format_3'],$cronValue['resolution_l'],$cronValue['resolution_m'],$cronValue['resolution_s']);
		}
	}
	
?>