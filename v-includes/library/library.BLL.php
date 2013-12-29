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
			$articles = $this->manageContent->getValue_limit_sorted_current_a('article_info','*',"article_date",$startPoint,$limit);
			
			foreach($articles as $article)
			{
				echo '<div class="row-fluid blog_container">
						<div class="span12 blog_text">
							<h3><a href="#" class="tour_blog_heading">'.$article["article_title"].'</a></h3>
							<p class="tour_blog_author_name"> '.$article["article_author"].'</p>
							<p>'.$article["article_description"].'</p>
							<p>Added- '.$article["article_date"].'</p>
							<p> Rating : ' ;
				//get the ratings for the blog
				if( $article['rating'] == 0 )
				{
					echo '<img class="lazy" data-src="images/star-on.png" src="" alt="star">';
				}		
				for($i = 0 ; $i < $article['rating'] ; $i++)
				{
					echo '<img class="lazy" data-src="images/star-on.png" src="" alt="star">';
				}			
				echo		'<p> Comments</p>';
				
				//get the comments for the blog
				$this->getComments("article",$article["id"],0) ;
					
				echo '</div></div>' ;
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
		- method to get the models for the model page
		- creates the full UI
		- Auth Singh
		*/
		function searchModelDirectory($startPoint,$limit,$type,$searchKeyword)
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
			$models = $this->manageContent->getSearchModelDirectory("model_info","*","name",$searchKeyword,$sortBy,$startPoint,$limit);
			
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
		function getModelsHome($startPoint,$limit,$type)
		{
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
							<a href="playing_movie.php?movie_id='.$movie["gallery_id"].'&gallery_id=0">
							<img class="lazy img_update" data-src="images/movie_thumb/'.$movie["gallery_id"].'.JPG" src="" alt="vdeo">
							<div class="photo_section_footer">
								<div class="row-fluid">
									<div class="pull-left"><p class="photo_section_heading"><b>'.$movie["movie_name"].'</b></p></div></a>
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
		- get sliced movies of the same movie
		- Auth Singh
		*/
		function getSlicedMovie($movieId)
		{
			//get values from the database
			$slicedMovies = $this->manageContent->getValueWhere("sliced_vids_tour","*","movie_id",$movieId);
			//these variables determines the start and the end point for printing row fluid
			$start_point = 0;
			$end_point = 1;
			
			echo '<div class="row-fluid">
						<div id="searchBar" class="span12 pull-left">
								<h4>WATCH IN PARTS</h4>
						</div>
				   </div>';
			
			$part_no = 1 ;
			   
			foreach($slicedMovies as $slicedMovie)
			{
				//maintain the row fluid with only four models in a row
				if($start_point%3 == 0)
				{
					echo '<div class="row-fluid">';
				}
				
				//for models whose status is online
				echo '<div class="span4 section_element">
							<a href="playing_movie.php?movie_id='.$movieId.'&gallery_id='.$slicedMovie["gallery_id"].'">
							<img class="lazy img_update" data-src="images/movie_thumb/'.$slicedMovie["gallery_id"].'.JPG" src="" alt="vdeo">
							<div class="photo_section_footer">
								<div class="row-fluid">
									<div class="pull-left"><p class="photo_section_heading"><b>'.$slicedMovie["movie_name"]." Part ".$part_no.'</b></p></div></a>
									<div class="pull-right"><p>Added: '.$slicedMovie["date"].'</p></div>
								</div>
								<p>Rating:';
					//logic for displaying stars according to the rating
					if( $slicedMovie['rating'] == 0 )
					{
						echo '<img class="lazy" data-src="images/star-on.png" src="" alt="star">';
					}
					for($i = 0 ; $i < $slicedMovie['rating'] ; $i++)
					{
						echo '<img class="lazy" data-src="images/star-on.png" src="" alt="star">';
					}
					echo	'</p><p>Movie- 0min 0sec</p>
								<p>Views: '.$slicedMovie["views"].'</p>
							</div>
						</div>' ;
						
				if($end_point%3 == 0)
				{
					echo '</div>';
				}
				
				$start_point++ ;
				$end_point++ ;
				$part_no++ ;
				
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
					//get the total number of images
					$total_no_images = $this->total_no_images($gallery["gallery_id"]) ;
					
					//maintain the row fluid with only four models in a row
					if($start_point%4 == 0)
					{
						echo '<div class="row-fluid">';
					}
					
					//for models whose status is online
					echo '<div class="span3 section_element">
						<a href="full_gallery.php?gallery_id='.$gallery["gallery_id"].'&model='.$gallery['model'].'">
							<img class="lazy img_update" data-src="images/gallery_thumb/'.$gallery["gallery_id"].'.JPG" src="" alt="vdeo">
							<div class="photo_section_footer">
								<div class="row-fluid">
									<div class="pull-left"><p class="photo_section_heading"><b>'.$gallery["gallery_name"].'</b></p></div></a>
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
						  <p>Photos :'.$total_no_images.'</p>
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
		- method to get the model details
		- @param model_id
		-Auth Singh
		*/
		function getModel_Details($model_id)
		{
			$modelDetails = $this->manageContent->getValueWhere('model_info','*','id',$model_id);
			
			//create the UI using the details from the database
			echo '<!-- model detail starts here -->
				<div class="row-fluid model_detail">
					<div class="row-fluid">
						<div class="span12">
							<h3>'.$modelDetails[0]["name"].'</h3>
						</div>
					</div>
					<div class="span3">
						<img class="model_image_details" src="members/images/model_thumb/'.$modelDetails[0]["image_thumb"].'" width="250">
					</div>
					<div class="span8">
						<div class="row-fluid model_detail_part">
							<div class="span3 model_info_topic">Age:</div>
							<div class="span8 model_info_description">'.$modelDetails[0]["age"].'</div>
						</div>
						<div class="row-fluid model_detail_part">
							<div class="span3 model_info_topic">Height:</div>
							<div class="span8 model_info_description">'.$modelDetails[0]["height"].'</div>
						</div>
						<div class="row-fluid model_detail_part">
							<div class="span3 model_info_topic">Weight:</div>
							<div class="span8 model_info_description">'.$modelDetails[0]["weight"].'</div>
						</div>
						<div class="row-fluid model_detail_part">
							<div class="span3 model_info_topic">Measurement:</div>
							<div class="span8 model_info_description">24/36/24</div>
						</div>
						<div class="row-fluid model_detail_part">
							<div class="span3 model_info_topic">Category:</div>
							<div class="span8 model_info_description">'.$modelDetails[0]["category"].'</div>
						</div>
						<div class="row-fluid model_detail_part">
							<div class="span3 model_info_topic">Description:</div>
							<div class="span8 model_info_description">'.$modelDetails[0]["description"].'</div>
						</div>
						<div class="row-fluid model_detail_part">
							<div class="span3 model_info_topic">Rating:</div>
							<div class="span8 model_info_description">';
			if( $modelDetails[0]["rating"] == 0 )
			{
				echo '<img class="lazy" data-src="images/star-on.png" src="" alt="star">' ;
			}
			else
			{
				for( $i = 0 ; $i < $modelDetails[0]["rating"] ; $i++ )
				{
					echo '<img class="lazy" data-src="images/star-on.png" src="" alt="star">' ;
				}
			}
			echo			'</div>
						</div>
					</div>
				</div>' ;
		}
		
		/*
		- method to get the model details
		- @param model_id
		-Auth Singh
		*/
		function getModel_Details_byName($model)
		{
			$modelDetails = $this->manageContent->getValueWhere('model_info','*','name',$model);
			
			//create the UI using the details from the database
			echo '<!-- model detail starts here -->
				<div class="row-fluid model_detail">
					<div class="row-fluid">
						<div class="span12">
							<h3>'.$modelDetails[0]["name"].'</h3>
						</div>
					</div>
					<div class="span3">
						<img class="model_image_details" src="members/images/model_thumb/'.$modelDetails[0]["image_thumb"].'" width="250">
					</div>
					<div class="span8">
						<div class="row-fluid model_detail_part">
							<div class="span3 model_info_topic">Age:</div>
							<div class="span8 model_info_description">'.$modelDetails[0]["age"].'</div>
						</div>
						<div class="row-fluid model_detail_part">
							<div class="span3 model_info_topic">Height:</div>
							<div class="span8 model_info_description">'.$modelDetails[0]["height"].'</div>
						</div>
						<div class="row-fluid model_detail_part">
							<div class="span3 model_info_topic">Weight:</div>
							<div class="span8 model_info_description">'.$modelDetails[0]["weight"].'</div>
						</div>
						<div class="row-fluid model_detail_part">
							<div class="span3 model_info_topic">Measurement:</div>
							<div class="span8 model_info_description">24/36/24</div>
						</div>
						<div class="row-fluid model_detail_part">
							<div class="span3 model_info_topic">Category:</div>
							<div class="span8 model_info_description">'.$modelDetails[0]["category"].'</div>
						</div>
						<div class="row-fluid model_detail_part">
							<div class="span3 model_info_topic">Description:</div>
							<div class="span8 model_info_description">'.$modelDetails[0]["description"].'</div>
						</div>
						<div class="row-fluid model_detail_part">
							<div class="span3 model_info_topic">Rating:</div>
							<div class="span8 model_info_description">';
			if( $modelDetails[0]["rating"] == 0 )
			{
				echo '<img class="lazy" data-src="images/star-on.png" src="" alt="star">' ;
			}
			else
			{
				for( $i = 0 ; $i < $modelDetails[0]["rating"] ; $i++ )
				{
					echo '<img class="lazy" data-src="images/star-on.png" src="" alt="star">' ;
				}
			}
			echo			'</div>
						</div>
					</div>
				</div>' ;
		}
		
		
		/*
		- method to get movies by model name
		- @param model_name
		- Auth Singh
		*/
		function getMoviesByModel($modelName)
		{
			$ModelMovies = $this->manageContent->getSearchValue("movie_info_tour","*","model",$modelName);
			//these variables determines the start and the end point for printing row fluid
			$start_point = 0;
			$end_point = 1;
				
			if($ModelMovies != 0)
			{
				echo '<div class="row-fluid photo_update">
						<div class="span12">
								<h3 class="site_heading"> Model Movies</h3>
						 	</div>
						 </div>';
						 
						 
				foreach($ModelMovies as $movie)
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
		}
		
		/*
		- method to get gallery by model name
		- @param model_name
		- Auth Singh
		*/
		function getGalleryByModel($modelName)
		{
			$gallerys = $this->manageContent->getSearchValue("gallery_info_tour","*","model",$modelName);
			//these variables determines the start and the end point for printing row fluid
			$start_point = 0;
			$end_point = 1;
			if( $gallerys != 0 )
			{
				echo '<div class="row-fluid photo_update">
						<div class="span12">
								<h3 class="site_heading"> Model Gallery</h3>
							</div>
						 </div>';
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
		
		/*
		- method to get the full gallery images
		- create the full UI
		- Auth Singh
		*/
		function getGalleryFull($gallery_id,$model)
		{
			$galleryPath = "gallery/".$gallery_id."/";
			//image location will change according to the large,small and medium requests
			$imageLocation = "gallery/".$gallery_id."/";
			//these variables determines the start and the end point for printing row fluid
			$start_point = 0;
			$end_point = 1;
			
			//get fileNames from the gallery folder
			$filenames = scandir($galleryPath);
			$filenames = array_slice($filenames,2);
			foreach($filenames as $filename)
			{
				//to remove the zip files from the UI
				$ext = pathinfo($galleryPath.$filename);
				
				if( $ext["extension"] != "zip")
				{
					if(!is_dir($galleryPath.$filename))
					{
						//maintain the row fluid with only four models in a row
						if($start_point%4 == 0)
						{
							echo '<div class="row-fluid">';
						}
						//create the UI components
						echo '<div class="span3 section_element_image">
								<a href="showImage.php?mode=galley&type=low&gallery_id='.$gallery_id.'&model='.$model.'&filename='.$filename.'">
									<img class="lazy img_update" data-src="'.$galleryPath.$filename.'"src="" alt="vdeo">
								</a>
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
		
		/*
		- method to get the full sapmle images of vids
		- create the full UI
		- Auth Singh
		*/
		function getSamplVideoImage($gallery_id)
		{
			//get the model name for the video
			$model  = $this->manageContent->getValueWhere("movie_info_tour","model","gallery_id",$gallery_id) ;
			$galleryPath = "videos_sample_image/".$gallery_id."/";
			//image location will change according to the large,small and medium requests
			$imageLocation = "videos_sample_image/".$gallery_id."/";
			//these variables determines the start and the end point for printing row fluid
			$start_point = 0;
			$end_point = 1;
			
			//get fileNames from the gallery folder
			$filenames = scandir($galleryPath);
			$filenames = array_slice($filenames,2);
			if( $filenames != "" )
			{
				echo '<div class="row-fluid">
						<div id="searchBar" class="span12 pull-left">
								<h4>Sample Video Images</h4>
						</div>
				   </div>';
				foreach($filenames as $filename)
				{
					//to remove the zip files from the UI
					$ext = pathinfo($galleryPath.$filename);
					
					if( $ext["extension"] != "zip")
					{
						if(!is_dir($galleryPath.$filename))
						{
							//maintain the row fluid with only four models in a row
							if($start_point%4 == 0)
							{
								echo '<div class="row-fluid">';
							}
							//create the UI components
							echo '<div class="span3 section_element_image">
									<a href="showImage.php?mode=movie&type=low&gallery_id='.$gallery_id.'&model='.$model[0]["model"].'&filename='.$filename.'">
										<img class="lazy img_update" data-src="'.$galleryPath.$filename.'"src="" alt="vdeo">
									</a>
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
		}
		
		/*
		- check if there is a zip file is present or not if yes 
		- provide the download link
		- Auth Singh 
		*/
		function getZipLinks($galler_id)
		{
			$zipFilePath = "gallery/".$galler_id."/";
			if(file_exists($zipFilePath."h.zip"))
			{
				echo '<a href="'.$zipFilePath."h.zip".'"><button class="btn btn-danger">High Zip</button></a>';
			}
			if(file_exists($zipFilePath."m.zip"))
			{
				echo '<a href="'.$zipFilePath."m.zip".'"><button class="btn btn-danger">Med Zip</button></a>';
			}
			if(file_exists($zipFilePath."s.zip"))
			{
				echo '<a href="'.$zipFilePath."s.zip".'"><button class="btn btn-danger">Low Zip</button></a>';
			}
		}
		
		/*
		- get the files for the image slider
		- @param gallery_id
		- retuns an array in which first elements contains a json object of filename
		- second element contains total no. of elements of the array
		- Auth Singh
		*/
		function getSliderImage($gallery_id,$parent_folder)
		{
			//image location will change according to the large,small and medium requests
			$galleryPath = $parent_folder."/".$gallery_id."/s/";
			
			//get fileNames from the gallery folder
			$filenames = scandir($galleryPath);
			$filenames = array_slice($filenames,2);
			
			//index of array starts from 0
			$index_no = 0 ;
			$filename_array = "" ;
			
			foreach($filenames as $filename)
			{
				//to remove the zip files from the UI
				$ext = pathinfo($galleryPath.$filename);
				
				if( $ext["extension"] != "zip")
				{
					if(!is_dir($galleryPath.$filename))
					{
						//create the array elements
						$filename_array[$index_no] = $filename ;
						//increase the index no
						$index_no++ ;
					}
				}
			}
			
			//convert the filename array into an json object
			$filename_array = json_encode($filename_array) ;
			
			$filename_array_return[0] = $filename_array ;
			$filename_array_return[1] = $index_no ;
			
			return $filename_array_return ;
		}
		
		
		/*
		- update the views according to the hits
		- Auth Singh
		*/
		function manageViews($pageName,$inputValue)
		{
			//views for models
			if( $pageName == "model" )
			{
				$result = $this->manageContent->incrementByOne("model_info","views","id",$inputValue);
			}
			//views for model
			if( $pageName == "gallery" )
			{
				$this->manageContent->incrementByOne("gallery_info_tour","view","gallery_id",$inputValue);
			}
			//views for model
			if( $pageName == "movie" )
			{
				$this->manageContent->incrementByOne("movie_info_tour","views","gallery_id",$inputValue);
			}
		}
		
		/*
		- get the value of the pagination
		- according to the startPoint also max page display 10
		- both front startPoint = 0 and startPoint = end present
		- Auth Singh
		*/
		function pagination($page,$PageUrl,$max_no_index,$tableName,$type,$keyword,$limit)
		{ 
			//used in the db for getting o/p
			$startPoint = $page*$limit ;
			//get the search 
			//total number of rows of the db_table
			$lastIndex = $this->manageContent->getTotalRows($tableName,$keyword) ;
			//echo $lastIndex = $lastIndex[0]['count(*)'];
			//no of page to be displayed
			$no_page = $lastIndex[0]['count(*)']/$limit ;
			//show pagination when there is more than one page is there
			if($no_page > 1)
			{
				$no_page = intval($no_page) + 1;
				//set no of index to be displayed
				$no_index = 1 ;
				
				//generate the pagination UI
				echo '<div class="pagination pagination-small pageno_nav pull-right">
            			<ul>';
				//logic for setting the prev button
				//condition for escaping the -ve page index when $page = 0
				
				if( ($page-1) < 0 && $page != 0 )
				{
					echo '<li class="pageno_nav_viewall"><a class="btn-danger" href="'.$PageUrl.'?p=0&type='.$type;
					if ( isset($keyword) && !empty($keyword) )
					{
						echo '&keyword='.$keyword;
					}
					echo '">&lt; Previous</a></li>';
				}
				elseif( $page != 0 )
				{
					echo '<li class="pageno_nav_viewall"><li><a class="btn-danger" href="'.$PageUrl.'?p='.($page-1);
					if ( isset($keyword) && !empty($keyword) )
					{
						echo '&keyword='.$keyword;
					}
					echo '">&lt; Previous</a></li>';
				}
				/*for the indexes*/
				//index initilization variable
				if( ( $page + 1 ) >= ( $no_page - $max_no_index + 1))
				{
					$inti_i = $no_page - $max_no_index + 1 ;
				}
				else
				{
					$inti_i = $page + 1 ;
				}
				for( $i = $inti_i ; $i <= $no_page ; $i++ )
				{
					if( $i > 0 )
					{
						echo '<li><a href="'.$PageUrl.'?p='.($i-1).'&type='.$type;
						if ( isset($keyword) && !empty($keyword) )
						{
							echo '&keyword='.$keyword;
						}
						if( $page+1 == $i )
						{
							echo '" class="btn-danger center_1st';
						}
						echo '">'.$i.'</a></li>' ;
						//increment the index no by 1
						$no_index++ ;
						if( $no_index > $max_no_index )
						{
							break ;
						}
					}
				}
				if( $page != ( $no_page - 1 ) )
				{
					//for the next button
					echo '<li class="pageno_nav_viewall"><li><a class="btn-danger" href="'.$PageUrl.'?p='.($page + 1).'&type='.$type;
					if ( isset($keyword) && !empty($keyword) )
					{
						echo '&keyword='.$keyword;
					}
					echo '">Next &gt;</a></li>' ;
				}
				//for the last button
				//echo '<li><a href="'.$PageUrl.'?p='.($no_page - 1).'&limit='.$limit.'">Last</a></li>' ;
				echo	 '</ul>
					</div>';
			}
			
		}
		
		
		/*
		- function to get the limit value for pagination
		- table pagination_into
		- Auth Singh
		*/
		function getLimit_pagination($page)
		{
			if( $page == "Movies" )
			{
				$limit = $this->manageContent->getValueWhere("pagination_info_tour","*","page","movie");
			}
			else
			{
				$limit = $this->manageContent->getValueWhere("pagination_info_tour","*","page","other");
			}
			
			return $limit[0]["limit"] ;
		}
		
		/*
		- codes for getting members favorite
		- generates complete UI
		- Auth Singh
		*/
		function membersFavourite($startPoint,$limit,$output_type)
		{
			//generate if the output is movie
			if( $output_type == "movie" )
			{
				//get values from the database
				$movies = $this->manageContent->getValue_limit_sorted_random('movie_info_tour','*',$startPoint,$limit);
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
								<a href="playing_movie.php?movie_id='.$movie["gallery_id"].'&gallery_id=0">
								<img class="lazy img_update" data-src="images/movie_thumb/'.$movie["gallery_id"].'.JPG" src="" alt="vdeo">
								<div class="photo_section_footer">
									<div class="row-fluid">
										<div class="pull-left"><p class="photo_section_heading"><b>'.$movie["movie_name"].'</b></p></div></a>
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
			//generate if output is photos
			else
			{
				//get values from the database
				$gallerys = $this->manageContent->getValue_limit_sorted_random('gallery_info_tour','*',$startPoint,$limit);
				//these variables determines the start and the end point for printing row fluid
				$start_point = 0;
				$end_point = 1;
				foreach($gallerys as $gallery)
				{
					if($gallery["status"] == 1)
					{
						//get the total no of images
						$total_no_images = $this->total_no_images($gallery["gallery_id"]) ;
						
						//maintain the row fluid with only four models in a row
						if($start_point%4 == 0)
						{
							echo '<div class="row-fluid">';
						}
						//for models whose status is online
						echo '<div class="span3 section_element">
							<a href="full_gallery.php?gallery_id='.$gallery["gallery_id"].'&model='.$gallery['model'].'">
								<img class="lazy img_update" data-src="images/gallery_thumb/'.$gallery["gallery_id"].'.JPG" src="" alt="vdeo">
								<div class="photo_section_footer">
									<div class="row-fluid">
										<div class="pull-left"><p class="photo_section_heading"><b>'.$gallery["gallery_name"].'</b></p></div></a>
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
							  <p>Photos :'.$total_no_images.'</p>
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
		
		
		/*
		- get the comments for the respective entity
		- create the comment UI
		- Auth Singh
		*/
		function getComments($type,$id,$isSliced)
		{
			//initialize table name variable
			$table_name = "" ;
			
			//check for the type for setting the table for the comments
			if( $type == "gallery" )
			{
				//table name for the gallery comment
				$table_name = "gallery_comment" ;
			}
			if( $type == "movie" )
			{
				//table name for the movie comment
				$table_name = "movie_comment" ;
			}
			if( $type == "model" )
			{
				//table name for the model comment
				$table_name = "model_comment" ;
			}
			
			//for the special case of gallery 
			if( $isSliced != 0 )
			{
				//because is sliced contains the sliced movie id
				$id = $isSliced ;
			}
			//get the comments for the articles
			if( $type == "article" )
			{
				//table name for the article comment
				$table_name = "article_comment" ;
			}
			
			//get the data from the database
			$comments = $this->manageContent->getValueWhere($table_name,"*","unit_id",$id) ;
			
			foreach( $comments as $comment )
			{
				echo '<div class="row-fluid">
						<div class="span12">
							<h4>'.$comment["member"].'</h4>
						</div>
					</div>
					<div class="row-fluid comments">
						<div class="span2"><img src="http://placehold.it/100x100/" alt="userimage"></div>
						<div class="span10">
							<p>'.$comment["comment"].'</p>
							<p><i class="icon-glass"></i><span class="commentstatus"> Like </span><span class="badge badge-success">'.$comment["comment_like"].'</span> <i class="icon-remove-sign"></i><span class="commentstatus"> Dislike </span><span class="badge badge-inverse">'.$comment["comment_dislike"].'</span> </p>
						</div>
					</div>' ;
			}
		}
		
		
		/*
		- method for getting the no of images
		- retutn the integer value of no. of images
		- Auth Singh
		*/
		function total_no_images($gallery_id)
		{
			$galleryPath = "gallery/".$gallery_id."/";
			
			//variable to calculate the total no of images
			$total_images = 0 ;
			
			//get fileNames from the gallery folder
			$filenames = scandir($galleryPath);
			$filenames = array_slice($filenames,2);
			foreach($filenames as $filename)
			{
				//to remove the zip files from the UI
				$ext = pathinfo($galleryPath.$filename);
				
				if( $ext["extension"] != "zip")
				{
					if(!is_dir($galleryPath.$filename))
					{
						//increase the value by one
						$total_images++ ;
					}
				}
			}
			
			return $total_images ;				
		}
	}
?>