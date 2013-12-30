<?php
	session_start() ;
	//include the DAL file
	include('../library/library.DAL.php');
	$manageData = new manageContent_DAL();
	
	//get the value from the post request
	if( $_SERVER["REQUEST_METHOD"] == "POST" )
	{
		$about_handjob = $_POST["about_handjob"] ;
		$movie_update = $_POST["movie_update"] ;
		$model_update = $_POST["model_update"] ;
		$photo_update = $_POST["gallery_update"] ;
		$members_fav = $_POST["members_fav"] ;
	}
	
	//check and update $about_handjob
	if( isset($about_handjob) && !empty($about_handjob) )
	{
		$result = $manageData->updateValueWhere("content_tour","content",$about_handjob,"topic","about_handjob");
		
		if( $result == 1 )
		{
			$_SESSION['result'] = "Update Successful." ;
		}
	}
	//check and update $movie_update
	if( isset($movie_update) && !empty($movie_update) )
	{
		$result = $manageData->updateValueWhere("content_tour","content",$movie_update,"topic","movie_update");
		
		if( $result == 1 )
		{
			$_SESSION['result'] = "Update Successful." ;
		}
	}
	//check and update $model_update
	if( isset($model_update) && !empty($model_update) )
	{
		$result = $manageData->updateValueWhere("content_tour","content",$model_update,"topic","model_update");
		
		if( $result == 1 )
		{
			$_SESSION['result'] = "Update Successful." ;
		}
	}
	//check and update $photo_update
	if( isset($photo_update) && !empty($photo_update) )
	{
		$result = $manageData->updateValueWhere("content_tour","content",$photo_update,"topic","photo_update");
		
		if( $result == 1 )
		{
			$_SESSION['result'] = "Update Successful." ;
		}
	}
	//check and update $members_fav
	if( isset($members_fav) && !empty($members_fav) )
	{
		$result = $manageData->updateValueWhere("content_tour","content",$members_fav,"topic","members_fav");
		
		if( $result == 1 )
		{
			$_SESSION['result'] = "Update Successful." ;
		}
	}
	
	header('Location: ../../manageConentHome.php');
?>