<?php
	include('../v-includes/class.DAL.php') ;
	//create the object for the rating insertion
	$manageData = new LIBRARY_DAL() ;
	
	//get the value from the jquery ajax
	if( isset($_REQUEST["status"]) && isset($_REQUEST["user"]) && isset($_REQUEST["type"]) )
	{
		$type = $_REQUEST["type"] ;
		$user = $_REQUEST["user"] ;
		$status = $_REQUEST["status"] ;
		$id = $_REQUEST["id"] ;
		
		/*
		- for model
		*/
		//check the request from the page using the type variable
		if( $type == "model" )
		{
			$allow = 1 ;
			//check whether the user have disliked or liked the comment or not
			
			//get the data from the like table
			$users_db = $manageData->getValueWhere("like_comment_model","member_id","unit_id",$id) ;
			
			//now check for each user for the like or dislike status provided
			foreach( $users_db as $user_db )
			{
				if( $user_db["member_id"] == $user )
				{
					//set allow to 1
					$allow = 0 ;
				}
			}
			//if allowesd when the user have not like it then
			if( $allow == 1 )
			{
				//check like or dislike
				if( $status == "like" )
				{
					//insert the like in the like table to maintain single user
					$manageData->insertLikes("like_comment_model",$id,$user,"like") ;
					//increase the like counter by one
					$manageData->incrementByOne("model_comment","comment_like","id",$id) ;
					echo "Thankyou ".$user." for liking the comment." ;
				}
				else
				{
					//insert the like in the dislike table to maintain single user
					$manageData->insertLikes("like_comment_model",$id,$user,"dislike") ;
					//increase the dislike counter by one
					$manageData->incrementByOne("model_comment","comment_dislike","id",$id) ;
					echo "Thankyou ".$user." for expressing your view on the comment." ;
				}
			}
			else
			{
				echo "You have already provided your views for this comment." ;
			}
		}
		
		/*
		- for gallery
		*/
		//check the request from the page using the type variable
		if( $type == "gallery" )
		{
			$allow = 1 ;
			//check whether the user have disliked or liked the comment or not
			
			//get the data from the like table
			$users_db = $manageData->getValueWhere("like_gallery_comment","member_id","unit_id",$id) ;
			
			//now check for each user for the like or dislike status provided
			foreach( $users_db as $user_db )
			{
				if( $user_db["member_id"] == $user )
				{
					//set allow to 1
					$allow = 0 ;
				}
			}
			//if allowesd when the user have not like it then
			if( $allow == 1 )
			{
				//check like or dislike
				if( $status == "like" )
				{
					//insert the like in the like table to maintain single user
					$manageData->insertLikes("like_gallery_comment",$id,$user,"like") ;
					//increase the like counter by one
					$manageData->incrementByOne("gallery_comment","comment_like","id",$id) ;
					echo "Thankyou ".$user." for expressing your view on the comment." ;
				}
				else
				{
					//insert the like in the dislike table to maintain single user
					$manageData->insertLikes("like_gallery_comment",$id,$user,"dislike") ;
					//increase the dislike counter by one
					$manageData->incrementByOne("gallery_comment","comment_dislike","id",$id) ;
					echo "Thankyou ".$user." for disliking the comment." ;
				}
			}
			else
			{
				echo "You have already provided your views for this comment." ;
			}
		}
		
		/*
		- for movie
		*/
		//check the request from the page using the type variable
		if( $type == "movie" )
		{
			$allow = 1 ;
			//check whether the user have disliked or liked the comment or not
			
			//get the data from the like table
			$users_db = $manageData->getValueWhere("like_movie_comment","member_id","unit_id",$id) ;
			
			//now check for each user for the like or dislike status provided
			foreach( $users_db as $user_db )
			{
				if( $user_db["member_id"] == $user )
				{
					//set allow to 1
					$allow = 0 ;
				}
			}
			//if allowesd when the user have not like it then
			if( $allow == 1 )
			{
				//check like or dislike
				if( $status == "like" )
				{
					//insert the like in the like table to maintain single user
					$manageData->insertLikes("like_movie_comment",$id,$user,"like") ;
					//increase the like counter by one
					$manageData->incrementByOne("movie_comment","comment_like","id",$id) ;
					echo "Thankyou ".$user." for expressing your view on the comment." ;
				}
				else
				{
					//insert the like in the dislike table to maintain single user
					$manageData->insertLikes("like_movie_comment",$id,$user,"dislike") ;
					//increase the dislike counter by one
					$manageData->incrementByOne("movie_comment","comment_dislike","id",$id) ;
					echo "Thankyou ".$user." for disliking the comment." ;
				}
			}
			else
			{
				echo "You have already provided your views for this comment." ;
			}
		}
		
		
		/*
		- for article
		*/
		//check the request from the page using the type variable
		if( $type == "article" )
		{
			$allow = 1 ;
			//check whether the user have disliked or liked the comment or not
			
			//get the data from the like table
			$users_db = $manageData->getValueWhere("like_article_comment","member_id","unit_id",$id) ;
			
			//now check for each user for the like or dislike status provided
			foreach( $users_db as $user_db )
			{
				if( $user_db["member_id"] == $user )
				{
					//set allow to 1
					$allow = 0 ;
				}
			}
			//if allowesd when the user have not like it then
			if( $allow == 1 )
			{
				//check like or dislike
				if( $status == "like" )
				{
					//insert the like in the like table to maintain single user
					$manageData->insertLikes("like_article_comment",$id,$user,"like") ;
					//increase the like counter by one
					$manageData->incrementByOne("article_comment","comment_like","id",$id) ;
					echo "Thankyou ".$user." for liking the comment." ;
				}
				else
				{
					//insert the like in the dislike table to maintain single user
					$manageData->insertLikes("like_article_comment",$id,$user,"dislike") ;
					//increase the dislike counter by one
					$manageData->incrementByOne("article_comment","comment_dislike","id",$id) ;
					echo "Thankyou ".$user." for expressing your view on the comment." ;
				}
			}
			else
			{
				echo "You have already provided your views for this comment." ;
			}
		}
	}
?>