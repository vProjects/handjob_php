<?php
	include('../v-includes/class.DAL.php') ;
	//create the object for the rating insertion
	$manageData = new LIBRARY_DAL() ;
	
	//get the value from the jquery ajax
	if( $_REQUEST["rate"] && $_REQUEST["user"] && $_REQUEST["type"] )
	{
		$type = $_REQUEST["type"] ;
		$user = $_REQUEST["user"] ;
		$rate = $_REQUEST["rate"] ;
		
		if( $type == "model" )
		{
			//get the model id
			$model_id = $_REQUEST["id"] ;
			$user_exists = 0 ;
			$users_db = $manageData->getValueWhere("rate_model","member_id","unit_id",$model_id) ;
			if( $users_db != 0 )
			{
				foreach( $users_db as $user_db )
				{
					//check whether the user has provided the rating to the model or not
					if( $user_db["member_id"] == $user )
					{
						$user_exists = 1 ;
					}	
				}
				if( $user_exists == 0 )
				{
					//insert the value in the rate table model
					$manageData->insertRating("rate_model",$user,$model_id) ;
					//get the present rating from the database
					$rate_present = $manageData->getValueWhere("model_info","rating","id",$model_id) ;
					$rate_calc = ( $rate + $rate_present[0]["rating"] )/2 ;
					//update the rating for the particular model
					$manageData->updateValueWhere("model_info","rating",$rate_calc,"id",$model_id) ;
					$result = "Thanks for providing the rating." ;
					print_r($result) ;
				}
				else
				{
					$result = "Rating is previously provided by you on this model.Thank you." ;
					print_r($result) ;
				}
				
			}
			else
			{
				//insert the value in the rate table model
				$manageData->insertRating("rate_model",$user,$model_id) ;
				//get the present rating from the database
				$rate_present = $manageData->getValueWhere("model_info","rating","id",$model_id) ;
				$rate_calc = ( $rate + $rate_present[0]["rating"] )/2 ;
				//update the rating for the particular model
				$manageData->updateValueWhere("model_info","rating",$rate_calc,"id",$model_id) ;
				$result = "Thanks for providing the rating." ;
				print_r($result) ;
			}
		}
		
		//for movies
		if( $type == "movie" )
		{
			//get the model id
			$movie_id = $_REQUEST["id"] ;
			$users_exists = 0 ;
			
			$users_db = $manageData->getValueWhere("rate_movie","member_id","unit_id",$movie_id) ;
			if( $users_db != 0 )
			{
				foreach( $users_db as $user_db )
				{
					//check whether the user has provided the rating to the model or not
					if( $user_db["member_id"] == $user )
					{
						$user_exists = 1 ;
					}
				}
				if($user_exists == 0 )
				{
					//insert the value in the rate table model
					$manageData->insertRating("rate_movie",$user,$movie_id) ;
					//get the present rating from the database
					$rate_present = $manageData->getValueWhere("movie_info","rating","gallery_id",$movie_id) ;
					$rate_calc = ( $rate + $rate_present[0]["rating"] )/2 ;
					//update the rating for the particular model
					$manageData->updateValueWhere("movie_info","rating",$rate_calc,"gallery_id",$movie_id) ;
					$result = "Thanks for providing the rating." ;
					print_r($result) ;
				}
				else
				{
					$result = "Rating is previously provided by you on this model.Thank you." ;
					print_r($result) ;
				}
			}
			else
			{
				//insert the value in the rate table model
				$manageData->insertRating("rate_movie",$user,$movie_id) ;
				//get the present rating from the database
				$rate_present = $manageData->getValueWhere("movie_info","rating","gallery_id",$movie_id) ;
				$rate_calc = ( $rate + $rate_present[0]["rating"] )/2 ;
				//update the rating for the particular model
				$manageData->updateValueWhere("movie_info","rating",$rate_calc,"gallery_id",$movie_id) ;
				$result = "Thanks for providing the rating." ;
				print_r($result) ;
			}
		}
		
		//for gallery
		if( $type == "gallery" )
		{
			//get the model id
			$gallery_id = $_REQUEST["id"] ;
			$user_exists = 0 ;
			
			$users_db = $manageData->getValueWhere("rate_gallery","member_id","unit_id",$gallery_id) ;
			if( $users_db != 0 )
			{
				foreach( $users_db as $user_db )
				{
					//check whether the user has provided the rating to the model or not
					if( $user_db["member_id"] == $user )
					{
						$user_exists = 1 ;
					}
				}
				if( $user_exists == 0 )
				{
					//insert the value in the rate table model
					$manageData->insertRating("rate_gallery",$user,$gallery_id) ;
					//get the present rating from the database
					$rate_present = $manageData->getValueWhere("gallery_info","rating","gallery_id",$gallery_id) ;
					$rate_calc = ( $rate + $rate_present[0]["rating"] )/2 ;
					//update the rating for the particular model
					$manageData->updateValueWhere("gallery_info","rating",$rate_calc,"gallery_id",$gallery_id) ;
					$result = "Thanks for providing the rating." ;
					print_r($result) ;
				}
				else
				{
					$result = "Rating is previously provided by you on this model.Thank you." ;
					print_r($result) ;
				}
			}
			else
			{
				//insert the value in the rate table model
				$manageData->insertRating("rate_gallery",$user,$gallery_id) ;
				//get the present rating from the database
				$rate_present = $manageData->getValueWhere("gallery_info","rating","gallery_id",$gallery_id) ;
				$rate_calc = ( $rate + $rate_present[0]["rating"] )/2 ;
				//update the rating for the particular model
				$manageData->updateValueWhere("gallery_info","rating",$rate_calc,"gallery_id",$gallery_id) ;
				$result = "Thanks for providing the rating." ;
				print_r($result) ;
			}
		}
		
		//for sliced movies
		if( $type == "sliced" )
		{
			//get the model id
			$movie_id = $_REQUEST["id"] ;
			$user_exists = 0 ;
			
			$users_db = $manageData->getValueWhere("rate_movie","member_id","unit_id",$movie_id) ;
			
			if( $users_db != 0 )
			{
				foreach( $users_db as $user_db )
				{
					//check whether the user has provided the rating to the model or not
					if( $user_db["member_id"] == $user )
					{
						$user_exists = 1 ;
					}
				}
				if( $user_exists == 0 )
				{
					//insert the value in the rate table model
					$manageData->insertRating("rate_movie",$user,$movie_id) ;
					//get the present rating from the database
					$rate_present = $manageData->getValueWhere("sliced_vids","rating","gallery_id",$movie_id) ;
					$rate_calc = ( $rate + $rate_present[0]["rating"] )/2 ;
					//update the rating for the particular model
					$manageData->updateValueWhere("sliced_vids","rating",$rate_calc,"gallery_id",$movie_id) ;
					$result = "Thanks for providing the rating." ;
					print_r($result) ;
				}
				else
				{
					$result = "Rating is previously provided by you on this model.Thank you." ;
					print_r($result) ;
				}
			}
			else
			{
				//insert the value in the rate table model
				$manageData->insertRating("rate_movie",$user,$movie_id) ;
				//get the present rating from the database
				$rate_present = $manageData->getValueWhere("sliced_vids","rating","gallery_id",$movie_id) ;
				$rate_calc = ( $rate + $rate_present[0]["rating"] )/2 ;
				//update the rating for the particular model
				$manageData->updateValueWhere("sliced_vids","rating",$rate_calc,"gallery_id",$movie_id) ;
				$result = "Thanks for providing the rating." ;
				print_r($result) ;
			}
		}
		
		//for article
		if( $type == "article" )
		{
			//get the model id
			$article_id = $_REQUEST["id"] ;
			$user_exists = 0 ;
			
			$users_db = $manageData->getValueWhere("rate_article","member_id","unit_id",$article_id) ;
			if( $users_db != 0 )
			{
				foreach( $users_db as $user_db )
				{
					//check whether the user has provided the rating to the model or not
					if( $user_db["member_id"] == $user )
					{
						$user_exists = 1 ;
					}
				}
				if( $user_exists == 0 )
				{
					//insert the value in the rate table model
					$manageData->insertRating("rate_article",$user,$article_id) ;
					//get the present rating from the database
					$rate_present = $manageData->getValueWhere("article_info","rating","id",$article_id) ;
					$rate_calc = ( $rate + $rate_present[0]["rating"] )/2 ;
					//update the rating for the particular model
					$manageData->updateValueWhere("article_info","rating",$rate_calc,"id",$article_id) ;
					$result = "Thanks for providing the rating." ;
					print_r($result) ;
				}
				else
				{
					$result = "Rating is previously provided by you on this model.Thank you." ;
					print_r($result) ;
				}
			}
			else
			{
				//insert the value in the rate table model
				$manageData->insertRating("rate_article",$user,$article_id) ;
				//get the present rating from the database
				$rate_present = $manageData->getValueWhere("article_info","rating","id",$article_id) ;
				$rate_calc = ( $rate + $rate_present[0]["rating"] )/2 ;
				//update the rating for the particular model
				$manageData->updateValueWhere("article_info","rating",$rate_calc,"id",$article_id) ;
				$result = "Thanks for providing the rating." ;
				print_r($result) ;
			}
		}
	}
?>