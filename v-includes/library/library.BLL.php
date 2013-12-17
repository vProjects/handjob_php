<?php
	include('library.DAL.php');
	
	//create a BLL class to implement the business logic
	//on the UI
	class LIBRARY_BLL
	{
		//create a variable for creating an object of DAL
		private $manageContent ;
		
		//constructor for the class
		function __construct()
		{
			$this->manageContent = new manageContent_DAL();
			return $this->manageContent ;
		}
		
		/*
		- method to get the article for the UI
		- Auth Singh
		*/
		function getArticles($startPoint,$limit)
		{
			$startPoint = $startPoint*$limit ;
			$articles = $this->manageContent->getValue_limit_sorted_current_a('article_info_tour','*',"article_date",$startPoint,$limit);
			
			foreach($articles as $article)
			{
				echo '<div class="row-fluid blog_container">
						<div class="span12 blog_text">
							<h3><a href="#" class="tour_blog_heading">'.$article["article_title"].'</a></h3>
							<p class="tour_blog_author_name"> '.$article["article_author"].'</p>
							<p>'.$article["article_description"].'</p>
							<p>Added- '.$article["article_date"].'</p>
							<p>2 Comments</p>
						</div>
					</div>' ;
			}
		}
		
		/*
		- method to get the models for the model page
		- creates the full UI
		- Auth Singh
		*/
		function getModels($startPoint,$limit,$type)
		{
			$startPoint = $startPoint*$limit ;
			//check the type and fetch the data accordingly
			if( $type == "rated" )
			{
				$sortBy = "rating";
			}
			elseif( $type == "name" )
			{
				//sort by name
				$sortBy = "name" ;
			}
			else
			{
				//for the recent
				$sortBy = "date";
			}
			//get values from the database
			$models = $this->manageContent->getValue_limit_sorted_current('model_info','*',$sortBy,$startPoint,$limit);
			
			//these variables determines the start and the end point for printing row fluid
			$start_point = 0;
			$end_point = 1;
			foreach($models as $model)
			{
				//for models whose status is online
				if($model["status"] == 1)
				{
					//maintain the row fluid with only four models in a row
					if($start_point%4 == 0)
					{
						echo '<div class="row-fluid">';
					}
					//create the UI components
					echo '<div class="span3 section_element">
            				<a href="model_detail.php?model_id='.$model["id"].'&model_name='.$model['name'].'">
							<img class="lazy img_update" data-src="members/images/model_thumb/'.$model["image_thumb"].'"  alt="vdeo">	
							<div class="photo_section_footer">
								<div class="row-fluid">
									<div class="pull-left"><p class="photo_section_heading">'.$model['name'].'</a></b></p></div>
									<div class="pull-right"><p>'.$model["date"].'</p></div>
								</div>
								<p>Rating:';
								
								//logic for displaying stars according to the rating
								if( $model['rating'] == 0 )
								{
									echo '<img class="lazy" data-src="images/star-on.png" src="" alt="star">';
								}		
								for($i = 0 ; $i < $model['rating'] ; $i++)
								{
									echo '<img class="lazy" data-src="images/star-on.png" src="" alt="star">';
								}
								
								echo '</p>
								<p>Views: '.$model["views"].'</p>
							</div>
						</div>' ;
						
					if($end_point%4 == 0)
					{
						echo '</div>';
					}
					
					$start_point++ ;
					$end_point++ ;
				}
				
			}
		}
		
		/*
		- method to get the models for the home page
		- Creates the full UI
		- Auth Singh
		*/
		function getModelsHome($startPoint,$limit,$sortBy)
		{
			//get values from the database
			$models = $this->manageContent->getValue_limit_sorted_current('model_info','*',$sortBy,$startPoint,$limit);
			
			//these variables determines the start and the end point for printing row fluid
			$start_point = 0;
			$end_point = 1;
			foreach($models as $model)
			{
				//for models whose status is online
				if($model["status"] == 1)
				{
					//maintain the row fluid with only four models in a row
					if($start_point%4 == 0)
					{
						echo '<div class="row-fluid">';
					}
					//create the UI components
					echo '<div class="span3 section_element">
            				<a href="model_detail.php?model_id='.$model["id"].'&model_name='.$model['name'].'">
							<img class="lazy img_update" data-src="members/images/model_thumb/'.$model["image_thumb"].'"  alt="vdeo">	
							<div class="photo_section_footer">
								<div class="row-fluid">
									<div class="pull-left"><p class="photo_section_heading">'.$model['name'].'</a></b></p></div>
									<div class="pull-right"><p>'.$model["date"].'</p></div>
								</div>
								<p>Rating:';
								
								//logic for displaying stars according to the rating
								if( $model['rating'] == 0 )
								{
									echo '<img class="lazy" data-src="images/star-on.png" src="" alt="star">';
								}		
								for($i = 0 ; $i < $model['rating'] ; $i++)
								{
									echo '<img class="lazy" data-src="images/star-on.png" src="" alt="star">';
								}
								
								echo '</p>
								<p>Views: '.$model["views"].'</p>
							</div>
						</div>' ;
						
					if($end_point%4 == 0)
					{
						echo '</div>';
					}
					
					$start_point++ ;
					$end_point++ ;
				}
				
			}
		}
		
		/*
		- get the movies for the movies page
		- create the full UI
		- used in both home and movies
		- Auth Singh
		*/
		function getMovies($startPoint,$limit,$type)
		{
			$startPoint = $startPoint*$limit ;
			//check the type and fetch the data accordingly
			if( $type == "rated" )
			{
				$sortBy = "rating";
			}
			elseif( $type == "name" )
			{
				//sort by name
				$sortBy = "movie_name" ;
			}
			else
			{
				//for the recent
				$sortBy = "date";
			}
			//get values from the database
			$movies = $this->manageContent->getValue_limit_sorted_current('movie_info_tour','*',$sortBy,$startPoint,$limit);
			//these variables determines the start and the end point for printing row fluid
			$start_point = 0;
			$end_point = 1;
			foreach($movies as $movie)
			{
				//for models whose status is online
				if($movie["status"] == 1)
					{
					//maintain the row fluid with only four models in a row
					if($start_point%3 == 0)
					{
						echo '<div class="row-fluid">';
					}
					echo '<div class="span4 section_element">
							<img class="lazy img_update" data-src="images/movie_thumb/'.$movie["gallery_id"].'.JPG" src="" alt="vdeo">
							<div class="photo_section_footer">
								<div class="row-fluid">
									<div class="pull-left"><p class="photo_section_heading"><b>'.$movie["movie_name"].'</b></p></div>
									<div class="pull-right"><p>Added: '.$movie["date"].'</p></div>
								</div>
								<p>Rating:';
					//logic for displaying stars according to the rating
					if( $movie['rating'] == 0 )
					{
						echo '<img class="lazy" data-src="images/star-on.png" src="" alt="star">';
					}
					for($i = 0 ; $i < $movie['rating'] ; $i++)
					{
						echo '<img class="lazy" data-src="images/star-on.png" src="" alt="star">';
					}
					echo	'</p><p>Movie- 0min 0sec</p>
								<p>Views: '.$movie["views"].'</p>
							</div>
						</div>' ;
						
					if($end_point%3 == 0)
					{
						echo '</div>';
					}
					
					$start_point++ ;
					$end_point++ ;
				}
				
			}
		}
		
		/*
		- method to get the galleries 
		- create the full UI including the home page
		- Auth Singh
		*/
		function getGallery($startPoint,$limit,$type)
		{
			$startPoint = $startPoint*$limit ;
			//check the type and fetch the data accordingly
			if( $type == "rated" )
			{
				$sortBy = "rating";
			}
			elseif( $type == "name" )
			{
				//sort by name
				$sortBy = "gallery_name" ;
			}
			else
			{
				//for the recent
				$sortBy = "date";
			}
			//get values from the database
			$gallerys = $this->manageContent->getValue_limit_sorted_current('gallery_info_tour','*',$sortBy,$startPoint,$limit);
			//these variables determines the start and the end point for printing row fluid
			$start_point = 0;
			$end_point = 1;
			foreach($gallerys as $gallery)
			{
				if($gallery["status"] == 1)
					{
					//maintain the row fluid with only four models in a row
					if($start_point%4 == 0)
					{
						echo '<div class="row-fluid">';
					}
					//for models whose status is online
					echo '<div class="span3 section_element">
							<img class="lazy img_update" data-src="images/gallery_thumb/'.$gallery["gallery_id"].'.JPG" src="" alt="vdeo">
							<div class="photo_section_footer">
								<div class="row-fluid">
									<div class="pull-left"><p class="photo_section_heading"><b>'.$gallery["gallery_name"].'</b></p></div>
									<div class="pull-right"><p>'.$gallery["date"].'</p></div>
								</div> 
								<p>Rating:';
					
					//logic for displaying stars according to the rating
					if( $gallery['rating'] == 0 )
					{
						echo '<img class="lazy" data-src="images/star-on.png" src="" alt="star">';
					}	
					for($i = 0 ; $i < $gallery['rating'] ; $i++)
					{
						echo '<img class="lazy" data-src="images/star-on.png" src="" alt="star">';
					}
					echo '</p><p>Views:'.$gallery["view"].'</p>
							</div>
						</div>' ;
					if($end_point%4 == 0)
					{
						echo '</div>';
					}
					
					$start_point++ ;
					$end_point++ ;
				}
			}
		}
	}
?>