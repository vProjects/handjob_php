<?php
	session_start();
	//include the DAL library for the method to insert the details
	include('../library/library.DAL.php');
	$manageData = new manageContent_DAL();
	//include the library for uploading the files
	include('../library/class.upload_file.php');
	$uploadFile = new FileUpload();
	//include the media Library
	include('../library/library.media.php');
	$manageMedia = new libraryMedia();
	//table name for the page
	$table_name = "friends";
	//global variable to store the result
	$result = "";
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$name = $_POST['name'];
		$link = $_POST['link'];
		$date = $_POST['date'];
		$status = $_POST['status'];
		$photo = $_FILES['photo']['name'];
		
		$id = $_POST['id'] ;
		$friend_thumb = $_POST['friend_thumb'] ;
	}
	
	//update the name
	if( isset($name) && !empty($name))
	{
		$result = $manageData->updateValueWhere($table_name,"name",$name,"id",$id);
		if( $result == 1 )
		{
			$_SESSION['result'] = "Update Successful." ;
		}
	}
	
	//update the link
	if( isset($link) && !empty($link))
	{
		$result = $manageData->updateValueWhere($table_name,"link",$link,"id",$id);
		if( $result == 1 )
		{
			$_SESSION['result'] = "Update Successful." ;
		}
	}
	
	//update date
	if( isset($date) && !empty($date))
	{
		$result = $manageData->updateValueWhere($table_name,"date",$date,"id",$id);
		if( $result == 1 )
		{
			$_SESSION['result'] = "Update Successful." ;
		}
	}
	
	
	//update status
	if( isset($status) && !empty($status))
	{
		if( $status == "offline")
		{
			$status = 0 ;
		}
		else
		{
			$status = 1 ;
		}
		
		$result = $manageData->updateValueWhere($table_name,"status",$status,"id",$id);
		if( $result == 1 )
		{
			$_SESSION['result'] = "Update Successful." ;
		}
	}
	
	//paths for image upload
	$temp_path = "../../../temp/thumbs/".$friend_thumb ;
	$final_path =  $_SERVER['DOCUMENT_ROOT']."members/images/friend_thumb/".$friend_thumb;
	
	//update photos
	if( isset($photo) && !empty($photo))
	{
		$friend_thumb_name = substr($friend_thumb,0,-4);
		$result_upload = $uploadFile->upload_file($friend_thumb_name,'photo','../../../temp/thumbs/');
		
		$manageMedia->resizeImage($temp_path,250,377,$final_path) ;
		
		//insert the file into db
		$result = $manageData->updateValueWhere($table_name,"friend_thumb",$result_upload,"id",$id);
		
		//delete the file
		unlink($temp_path) ;
	}
	
	header('Location: ../../editFriend.php?id='.$id);
?>