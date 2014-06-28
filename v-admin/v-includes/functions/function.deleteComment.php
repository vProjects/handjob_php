<?php
	session_start();
	//include the DAL library for the method to insert the details
	include('../library/library.DAL.php');
	$manageData = new manageContent_DAL();
	
	//intialize the variables
	$comment_table = "" ;
	
	if( $_SERVER["REQUEST_METHOD"] == "GET" )
	{
		$delete_id = $_GET['del_id'];
		
		//get the name from the input type hidden
		$type = $_GET['type'];
	}
	
	//set the table name according to the type
	if( $type == "Movies" )
	{
		$comment_table = "movie_comment" ;
	}
	if( $type == "Photos" )
	{
		$comment_table = "gallery_comment" ;
	}
	if( $type == "Article" )
	{
		$comment_table = "article_comment" ;
	}
	if( $type == "Model" )
	{
		$comment_table = "model_comment" ;
	}
	if( $type == "Sliced" )
	{
		$comment_table = "movie_comment" ;
	}
		
	//delete the database entry
	$result = $manageData->deleteValue($comment_table,"id",$delete_id);
	//set the redirection
	header('Location: ../../listComments.php?type='.$type);
?>