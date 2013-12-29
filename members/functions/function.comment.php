<?php
	//start the session for the session variable result display
	session_start() ;
	//include the DAL file
	include('../v-includes/class.DAL.php') ;
	//create an object for the DAL class
	$manageData = new LIBRARY_DAL() ;
	
	if( $_SERVER['REQUEST_METHOD'] == 'POST' )
	{
		$comment = $_POST['comment'] ;
		$type = $_POST['type'] ;
		$id = $_POST['id'] ;
		$member = $_POST['member'] ;
	}
	
	$returnPath = "" ;
	//initialize the table name variable
	$table_name = "not_set" ;
	
	//check for the type for setting the table for the comments
	if( $type == "gallery" )
	{
		//table name for the gallery comment
		$table_name = "gallery_comment" ;
		
		//return path
		$returnPath = "full_gallery.php?galleryId=".$id ;
	}
	if( $type == "movie" )
	{
		//table name for the movie comment
		$table_name = "movie_comment" ;
		
		//get the extra variable required
		$gallery_id = $_POST["gallery_id"] ;
		
		//return path
		$returnPath = "playing_movie.php?movieId=".$id."&gallery_id=".$gallery_id."&type=low" ;
		
		if( $gallery_id != 0 )
		{
			$id = $gallery_id ;
		}
	}
	if( $type == "model" )
	{
		//table name for the model comment
		$table_name = "model_comment" ;
		
		//get the extra variable required
		$model_name = $_POST["model_name"] ;
		
		//return path
		$returnPath = "model_detail.php?model_id=".$id."&model_name=".$model_name ;
	}
	if( $type == "article" )
	{
		//table name for the movie comment
		$table_name = "article_comment" ;
		
		//return path
		$returnPath = "blog_list.php" ;
	}
	//check whether all the variable are set or not
	if( isset($type) && !empty($type) && isset($id) && !empty($id) && isset($member) && !empty($member) )
	{
		//if the table name is equal to not_set then don't execute the database query
		if( $table_name != "not_set" )
		{
			//insert the data into the database for the gallery
			$value = $manageData->insertComment($table_name,$id,$member,$comment,0,0) ;
			//set the result or status of the insertion
			$_SESSION['result'] = "Comment successfully submitted" ;
		}
	}
	else
	{
		$_SESSION['result'] = "Please write a comment and then submit." ;
	}
	
	
	//redirect the page
	header('location: ../'.$returnPath );
?>