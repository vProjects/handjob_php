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
								<a href="showImage.php?type=low&gallery_id='.$gallery_id.'&model='.$model.'&filename='.$filename.'">
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
		function getSliderImage($gallery_id)
		{
			//image location will change according to the large,small and medium requests
			$galleryPath = "gallery/".$gallery_id."/s/";
			
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
	}
?>