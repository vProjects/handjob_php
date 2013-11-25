<?php
	session_start();
	//include the DAL library for the method to insert the details
	include('../library/library.DAL.php');
	$manageData = new manageContent_DAL();
	
	//global variable to store the result
	$result = "";
	$return_page = "" ;
	
	if($_SERVER['REQUEST_METHOD'] == 'GET')
	{
		$delete_id = $_GET['del_id'];
		
		//get the name from the input type hidden
		$type = $_GET['type'];
	}
	
	//delete the gallery
	if( $type == "gallery" )
	{
		$table_name = "gallery_info" ;
		
		//delete the gallery files
		$gallery_id = $manageData->getValueWhere($table_name,"gallery_id","id",$delete_id);
		
		//delete the entry from the database
		$manageData->deleteValue($table_name,"id",$delete_id);
		
		//return page
		$return_page = "listGallery.php" ;
	}
	
	//delete the movies
	if( $type == "movie" )
	{
		$table_name = "movie_info" ;
		
		//delete the gallery files
		$gallery_id = $manageData->getValueWhere($table_name,"gallery_id","id",$delete_id);
		
		
		//delete the entry from the database
		$manageData->deleteValue($table_name,"id",$delete_id);
		$manageData->deleteValue("sliced_vids","movie_id",$gallery_id[0]["gallery_id"]);
		
		//return page
		$return_page = "listVideo.php" ;
	}
	
	if( $type == "sliced" )
	{
		echo $table_name = "sliced_vids" ;		
		
		//delete the entry from the database
		$manageData->deleteValue($table_name,"id",$delete_id);
		
		//return page
		$return_page = "listSlicedVid.php" ;
	}
	
	//delete the article
	if( $type == "article" )
	{
		$table_name = "article_info" ;
		//delete the database entry
		$manageData->deleteValue($table_name,"id",$delete_id);
		
		//set the return page
		$return_page = "listBlog.php" ;
	}
	
	//delete model
	if( $type == "model" )
	{
		$table_name = "model_info" ;
		$filename = $manageData->getValueWhere($table_name,"image_thumb","id",$delete_id);
		
		//delete the model thumb
		unlink("../../../members/images/model_thumb/".$filename[0]["image_thumb"]);
		//delete the database entry
		$manageData->deleteValue($table_name,"id",$delete_id);
		
		//set the return page
		$return_page = "listModels.php" ;
	}
	
	
	//set the redirection
	header('Location: ../../'.$return_page);
?>