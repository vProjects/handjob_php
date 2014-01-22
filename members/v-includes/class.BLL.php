<?php
	//include the DAL library to use the model layer methods
	include('class.DAL.php');
	
	
	//class to apply the business layer logics
	class LIBRARY_BLL
	{
		private $manageContent;
		//contructor of the class
		function __construct()
		{
			$this->manageContent = new LIBRARY_DAL();
			return $this->manageContent;
		}
		/*
		- this is the gallery builder
		- creates the UI output for the user END
		- @param the gallerId(folder name)
		-Auth Singh
		*/
		function galleryBuilder($gallery_id)
		{
			//get the values for the information about a gallery
			$galleryValues = $this->manageContent->getValueWhere("gallery_info","*","gallery_id",$gallery_id);
			print_r($galleryValues);	
		}
		
		/*
		- get models from the database
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
					echo '<div class="span3 element">
							<h4 class="red_text"><a href="model_detail.php?model_id='.$model["id"].'&model_name='.$model['name'].'">'.$model['name'].'</h4>
							<img class="lazy" data-src="images/model_thumb/'.$model["image_thumb"].'" src="" style="width:100%;"  alt="vdeo"></a>
							<p>Added :'.$model["date"].'<br />Views: '.$model["views"].'</p>';
					//logic for displaying stars according to the rating
					if( $model['rating'] == 0 )
					{
						echo '<img class="lazy" data-src="images/star-on.png" src="" alt="star">';
					}		
					for($i = 0 ; $i < $model['rating'] ; $i++)
					{
						echo '<img class="lazy" data-src="images/star-on.png" src="" alt="star">';
					}
					echo '</div>';
					
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
		- get models from the database
		- for home page
		- Auth Singh
		*/
		function getModelsHome($startPoint,$limit,$type)
		{
			$startPoint = $startPoint*$limit ;
			//check the type and fetch the data accordingly
			if( $type == "rated" )
			{
				$sortBy = "rating";
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
				if($model["status"] == 1)
				{
					//maintain the row fluid with only four models in a row
					if($start_point%3 == 0)
					{
						echo '<div class="row-fluid">';
					}
					//for models whose status is online
					
					{
						//create the UI components
						echo '<div class="span4 element">
								<h4 class="red_text"><a href="model_detail.php?model_id='.$model["id"].'&model_name='.$model['name'].'">'.$model['name'].'</h4>
								<img class="lazy" data-src="images/model_thumb/'.$model["image_thumb"].'" src="" style="width:100%;"  alt="vdeo"></a>
								<p>Added :'.$model["date"].'<br />Views: '.$model["views"].'</p>';
						//logic for displaying stars according to the rating
						if( $model['rating'] == 0 )
						{
							echo '<img class="lazy" data-src="images/star-on.png" src="" alt="star">';
						}		
						for($i = 0 ; $i < $model['rating'] ; $i++)
						{
							echo '<img class="lazy" data-src="images/star-on.png" src="" alt="star">';
						}
						echo '</div>';
					}
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
		- get galleries from the database
		-Auth Singh
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
			$gallerys = $this->manageContent->getValue_limit_sorted_current('gallery_info','*',$sortBy,$startPoint,$limit);
			//these variables determines the start and the end point for printing row fluid
			$start_point = 0;
			$end_point = 1;
			foreach($gallerys as $gallery)
			{
				//get the total no of images for each gallery
				$total_no_images = $this->total_no_images($gallery['gallery_id']) ;
				
				//get the model for particular gallery
				$model_name = $this->manageContent->getValueWhere("gallery_info","model","gallery_id",$gallery['gallery_id']) ;
				$model_name = $model_name[0]["model"] ;
				
				//get the single model name
				$model_name = substr($model_name.",",0,( strpos($model_name.",",",") )) ;

				//maintain the row fluid with only four models in a row
				if($start_point%4 == 0)
				{
					echo '<div class="row-fluid">';
				}
				//for models whose status is online
				if($gallery["status"] == 1)
				{
					//create the UI components
					echo '<div class="span3 element">
							<h4 class="red_text"><a href="full_gallery.php?model='.$model_name.'&galleryId='.$gallery['gallery_id'].'&index=10&page=0&element=10">'.$gallery["gallery_name"].'</h4>
							<img class="lazy" data-src="images/gallery_thumb/'.$gallery["gallery_id"].'.JPG" style="width:100%;" src=""></a>
							<p>Added :'.$gallery["date"].'<br />Photos: '.$total_no_images.'<br />Views: '.$gallery["view"].'</p>';
					//logic for displaying stars according to the rating
					if( $gallery['rating'] == 0 )
					{
						echo '<img class="lazy" data-src="images/star-on.png" src="" alt="star">';
					}	
					for($i = 0 ; $i < $gallery['rating'] ; $i++)
					{
						echo '<img class="lazy" data-src="images/star-on.png" src="" alt="star">';
					}
					echo '</div>';
				}
				if($end_point%4 == 0)
				{
					echo '</div>';
				}
				
				$start_point++ ;
				$end_point++ ;
				
			}
		}
		
		
		/*
		- get galleries from the database
		- for home page
		- Auth Singh
		*/
		function getGalleryHome($startPoint,$limit,$type)
		{
			$startPoint = $startPoint*$limit ;
			//check the type and fetch the data accordingly
			if( $type == "rated" )
			{
				$sortBy = "rating";
			}
			else
			{
				//for the recent
				$sortBy = "date";
			}
			//get values from the database
			$gallerys = $this->manageContent->getValue_limit_sorted_current('gallery_info','*',$sortBy,$startPoint,$limit);
			//these variables determines the start and the end point for printing row fluid
			$start_point = 0;
			$end_point = 1;
			foreach($gallerys as $gallery)
			{
				//get the total no of images
				$total_images = $this->total_no_images($gallery['gallery_id']) ;
				
				//get the model for particular gallery
				$model_name = $this->manageContent->getValueWhere("gallery_info","model","gallery_id",$gallery['gallery_id']) ;
				$model_name = $model_name[0]["model"] ;
				
				//get the single model name
				$model_name = substr($model_name.",",0,( strpos($model_name.",",",") )) ;
				
				//maintain the row fluid with only four models in a row
				if($start_point%3 == 0)
				{
					echo '<div class="row-fluid">';
				}
				//for models whose status is online
				if($gallery["status"] == 1)
				{
					//create the UI components
					echo '<div class="span4 element">
							<h4 class="red_text"><a href="full_gallery.php?model='.$model_name.'&galleryId='.$gallery['gallery_id'].'&index=10&page=0&element=10">'.$gallery["gallery_name"].'</h4>
							<img class="lazy" data-src="images/gallery_thumb/'.$gallery["gallery_id"].'.JPG" style="width:100%;" src=""></a>
							<p>Added :'.$gallery["date"].'<br />Photos : '.$total_images.'<br />Views: '.$gallery["view"].'</p>';
					//logic for displaying stars according to the rating
					if( $gallery['rating'] == 0 )
					{
						echo '<img class="lazy" data-src="images/star-on.png" src="" alt="star">';
					}	
					for($i = 0 ; $i < $gallery['rating'] ; $i++)
					{
						echo '<img class="lazy" data-src="images/star-on.png" src="" alt="star">';
					}
					echo '</div>';
				}
				if($end_point%3 == 0)
				{
					echo '</div>';
				}
				
				$start_point++ ;
				$end_point++ ;
				
			}
		}
		
		/*
		- get model details for a specific model
		- Auth Singh
		*/
		function getModelDetails($model_id)
		{
			$modelDetails = $this->manageContent->getValueWhere("model_info","*","id",$model_id);
			if( $modelDetails == 0 )
			{
				$modelDetails = $this->manageContent->getValueWhere("model_info","*","name",$model_id);
			}
			if( $modelDetails != 0 )
			{
				//these codes creates the UI output
				echo '<div class="row-fluid">
						<h3 class="site_heading red_text">'.$modelDetails[0]["name"].'</h3>
					  </div>
					  <div class="row-fluid model_detail">
						<div class="span3">
							<a href="model_detail.php?model_id='.$model_id.'&model_name='.$modelDetails[0]["name"].'">
								<img src="images/model_thumb/'.$modelDetails[0]["image_thumb"].'" width="250">
							</a>
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
								
					for($i = 0 ;$i < $modelDetails[0]["rating"] ; $i++)
					{
						echo '<img class="lazy" data-src="images/star-on.png" src="" alt="star">';
					}
								
					echo	'</div>
						</div>
					</div>
				</div>';
			}
		}
		
		/*
		- gallery builder for the UI
		- Auth Singh
		*/
		function getFullGallery($gallery_id,$page,$elements)
		{
			$galleryPath = "gallery/".$gallery_id."/";
			//image location will change according to the large,small and medium requests
			$imageLocation = "gallery/".$gallery_id."/";
			
			//get the gallery details from the database
			$model_name = $this->manageContent->getValueWhere("gallery_info","model","gallery_id",$gallery_id) ;
			
			//these variables determines the start and the end point for printing row fluid
			$start_point = 0;
			$end_point = 1;
			
			//get fileNames from the gallery folder
			$filenames = scandir($galleryPath);
			$filenames = array_slice($filenames,2);
			$filenames = array_slice($filenames,$page,$elements) ;
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
						echo '<div class="span3 element">
								<a href="showImage.php?mode=gallery&type=low&model='.$model_name[0]["model"].'&galleryId='.$gallery_id.'&filename='.$filename.'">
									<img class="lazy" data-src="'.$galleryPath."s/".$filename.'" src=""></a>
								</a>';
						echo '</div>';
						
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
		- get the total number of pics for a gallery
		- returns int value of num of images
		- Auth Singh
		*/
		function getNumberOfGalleryImages($gallery_id)
		{
			$galleryPath = "gallery/".$gallery_id."/";
			//image location will change according to the large,small and medium requests
			$imageLocation = "gallery/".$gallery_id."/";
			
			//get the gallery details from the database
			$model_name = $this->manageContent->getValueWhere("gallery_info","model","gallery_id",$gallery_id) ;
			
			//these variables determines the start and the end point for printing row fluid
			$no_of_images = 0;
			
			//get fileNames from the gallery folder
			$filenames = scandir($galleryPath);
			$filenames = array_slice($filenames,2) ;
			foreach($filenames as $filename)
			{
				//to remove the zip files from the UI
				$ext = pathinfo($galleryPath.$filename);
				
				if( $ext["extension"] != "zip")
				{
					if(!is_dir($galleryPath.$filename))
					{
						$no_of_images++ ;
					}
				}
			}
			
			return $no_of_images ;				
		}
		
		/*
		- get the articles from the database
		- generate the UI for the design
		- Auth Singh
		*/
		function getArticles($startPoint,$limit)
		{
			$startPoint = $startPoint*$limit ;
			$articles = $this->manageContent->getValue_limit_sorted_current_a('article_info','*',"article_date",$startPoint,$limit);
			
			foreach($articles as $article)
			{
				echo '<div class="row-fluid blog_container">
						<div class="span12">
							<h4>'.$article["article_title"].'</h4>
							<p class="blog_author_name"> '.$article["article_author"].'</p>
							<p>'.$article["article_description"].'</p>
							<p> Added :'.$article["article_date"].'</p>
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
				echo		'<p> Comments</p>
						</div>';
					
				//get the comments for the blog
				$this->getComments("article",$article["id"],0) ;
				
				//comment box
				echo '<div class="row-fluid">	
						<div class="span12">
							<form class="form-horizontal" action="functions/function.comment.php" method="post">
								<div class="control-group">
									<div class="controls">
										<textarea rows="4" style="width: 50%" name="comment"></textarea>
									</div>
									<div class="controls">
										<input type="hidden" value="'.$article["id"].'" name="id" />
										<input type="hidden" value="article" name="type" />
										<input type="hidden" value="';
				echo $_SESSION['user'].'" name="member" />
										<input type="submit" class="btn" value="Submit">
									</div>			    		
								</div>
							</form>
						</div>
					</div>' ;
					
				//get the rating box for the article
				echo '<div class="row-fluid">
						<div class="span12">
							<div class="offset2 span7 rating">
								Rate Me:' ;
				//get the stars for the rating box
				//1
				echo '<img class="rateme" src="images/white-star.png" alt="star" onclick="rate(1,';
				echo "'".$_SESSION["user"]."','".$article["id"]."','article')" ;
				echo '">' ;
				//2
				echo '<img class="rateme" src="images/white-star.png" alt="star" onclick="rate(2,';
				echo "'".$_SESSION["user"]."','".$article["id"]."','article')" ;
				echo '">' ;
				//3
				echo '<img class="rateme" src="images/white-star.png" alt="star" onclick="rate(3,';
				echo "'".$_SESSION["user"]."','".$article["id"]."','article')" ;
				echo '">' ;
				//4
				echo '<img class="rateme" src="images/white-star.png" alt="star" onclick="rate(4,';
				echo "'".$_SESSION["user"]."','".$article["id"]."','article')" ;
				echo '">' ;
				//5
				echo '<img class="rateme" src="images/white-star.png" alt="star" onclick="rate(5,';
				echo "'".$_SESSION["user"]."','".$article["id"]."','article')" ;
				echo '">' ;
				
				echo '</div>
					</div>
				</div>' ;	
				echo '</div>' ;
			}
		}
		
		/*
		- get videos from the database
		-Auth Singh
		*/
		function getVideos($startPoint,$limit,$type)
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
			$movies = $this->manageContent->getValue_limit_sorted_current('movie_info','*',$sortBy,$startPoint,$limit);
			//these variables determines the start and the end point for printing row fluid
			$start_point = 0;
			$end_point = 1;
			foreach($movies as $movie)
			{
				//get the videos durtion
				$videoDuration = $this->getVideoLength("/home/sites/handjobstop.com/public_html/members/videos/".$movie['gallery_id']."/".$movie['gallery_id'].".".$movie['vid_format_1']) ;
				
				//get the model for particular gallery
				$model_name = $this->manageContent->getValueWhere("movie_info","model","gallery_id",$movie['gallery_id']) ;
				$model_name = $model_name[0]["model"] ;
				
				//get the single model name
				$model_name = substr($model_name.",",0,( strpos($model_name.",",",") )) ;
				
				//maintain the row fluid with only four models in a row
				if($start_point%4 == 0)
				{
					echo '<div class="row-fluid">';
				}
				//for models whose status is online
				if($movie["status"] == 1)
				{
					//create the UI components
					echo '<div class="span3 element">
							<h4 class="red_text"><a href="playing_movie.php?model='.$model_name.'&movieId='.$movie['gallery_id'].'&gallery_id=0&type=low">'.$movie["movie_name"].'</h4>
							<img class="lazy" data-src="images/movie_thumb/'.$movie["gallery_id"].'.JPG" style="width:100%;" src=""></a>
							<p>Added :'.$movie["date"].'<br />Duration: '.$videoDuration.'<br />Views: '.$movie["views"].'</p>';
					//logic for displaying stars according to the rating
					if( $movie['rating'] == 0 )
					{
						echo '<img class="lazy" data-src="images/star-on.png" src="" alt="star">';
					}
					for($i = 0 ; $i < $movie['rating'] ; $i++)
					{
						echo '<img class="lazy" data-src="images/star-on.png" src="" alt="star">';
					}
					echo '</div>';
				}
				if($end_point%4 == 0)
				{
					echo '</div>';
				}
				
				$start_point++ ;
				$end_point++ ;
				
			}
		}
		
		/*
		- get videos from the database
		- for home page
		- Auth Singh
		*/
		function getVideosHome($startPoint,$limit,$type)
		{
			$startPoint = $startPoint*$limit ;
			//check the type and fetch the data accordingly
			if( $type == "rated" )
			{
				$sortBy = "rating";
			}
			else
			{
				//for the recent
				$sortBy = "date";
			}
			//get values from the database
			$movies = $this->manageContent->getValue_limit_sorted_current('movie_info','*',$sortBy,$startPoint,$limit);
			//these variables determines the start and the end point for printing row fluid
			$start_point = 0;
			$end_point = 1;
			foreach($movies as $movie)
			{
				//get the videos durtion
				$videoDuration = $this->getVideoLength("/home/sites/handjobstop.com/public_html/members/videos/".$movie['gallery_id']."/".$movie['gallery_id'].".".$movie['vid_format_1']) ;
				
				//get the model for particular gallery
				$model_name = $this->manageContent->getValueWhere("movie_info","model","gallery_id",$movie['gallery_id']) ;
				$model_name = $model_name[0]["model"] ;
				
				//get the single model name
				$model_name = substr($model_name.",",0,( strpos($model_name.",",",") )) ;
				
				//maintain the row fluid with only four models in a row
				if($start_point%3 == 0)
				{
					echo '<div class="row-fluid">';
				}
				//for models whose status is online
				if($movie["status"] == 1)
				{
					//create the UI components
					echo '<div class="span4 element">
							<h4 class="red_text"><a href="playing_movie.php?model='.$model_name.'&movieId='.$movie['gallery_id'].'&gallery_id=0&type=low">'.$movie["movie_name"].'</h4>
							<img class="lazy" data-src="images/movie_thumb/'.$movie["gallery_id"].'.JPG" style="width:100%;" src=""></a>
							<p>Added :'.$movie["date"].'<br />Duration: '.$videoDuration.'<br />Views: '.$movie["views"].'</p>';
					//logic for displaying stars according to the rating
					if( $movie['rating'] == 0 )
					{
						echo '<img class="lazy" data-src="images/star-on.png" src="" alt="star">';
					}
					for($i = 0 ; $i < $movie['rating'] ; $i++)
					{
						echo '<img class="lazy" data-src="images/star-on.png" src="" alt="star">';
					}
					echo '</div>';
				}
				if($end_point%3== 0)
				{
					echo '</div>';
				}
				
				$start_point++ ;
				$end_point++ ;
				
			}
		}
		
		/*
		- get sliced movies of the same movie
		- Auth Singh
		*/
		function getSlicedMovie($movieId)
		{
			//get values from the database
			$slicedMovies = $this->manageContent->getValueWhere("sliced_vids","*","movie_id",$movieId);
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
				//get the format from the respective movie table
				$format = $this->manageContent->getValueWhere("movie_info","vid_format_1","gallery_id",$slicedMovie['movie_id']);
				
				//get the model for particular gallery
				$model_name = $this->manageContent->getValueWhere("sliced_vids","model","gallery_id",$slicedMovie['gallery_id']) ;
				$model_name = $model_name[0]["model"] ;
				
				//get the single model name
				$model_name = substr($model_name.",",0,( strpos($model_name.",",",") )) ;
				
				//get the videos durtion
				$videoDuration = $this->getVideoLength("/home/sites/handjobstop.com/public_html/members/sliced/".$slicedMovie['movie_id']."/".$slicedMovie['gallery_id'].".".$format[0]["vid_format_1"]) ;
				
				//maintain the row fluid with only four models in a row
				if($start_point%4 == 0)
				{
					echo '<div class="row-fluid">';
				}
				//for models whose status is online
				
				{
					//create the UI components
					echo '<div class="span3 element">
							<h4 class="red_text"><a href="playing_movie.php?model='.$model_name.'&movieId='.$slicedMovie['movie_id'].'&gallery_id='.$slicedMovie["gallery_id"].'&type=low">'.$slicedMovie["movie_name"].' Part '.$part_no.'</h4>
							<img class="lazy" data-src="images/movie_thumb/'.$slicedMovie["gallery_id"].'.JPG" style="width:100%;" src=""></a>
							<p>Added :'.$slicedMovie["date"].'<br />Duration: '.$videoDuration.'<br />Views: '.$slicedMovie["view"].'</p>';
					//logic for displaying stars according to the rating
					if( $slicedMovie['rating'] == 0 )
					{
						echo '<img class="lazy" data-src="images/star-on.png" src="" alt="star">';
					}
					for($i = 0 ; $i < $slicedMovie['rating'] ; $i++)
					{
						echo '<img class="lazy" data-src="images/star-on.png" src="" alt="star">';
					}
					echo '</div>';
				}
				if($end_point%4 == 0)
				{
					echo '</div>';
				}
				
				$start_point++ ;
				$end_point++ ;
				$part_no++ ;
				
			}
		}
		
		/*
		- check if the vid cap is avialable in the vidcaps_info table
		- Auth Singh 
		*/
		function getVidCapLink($movieId)
		{
			$vidCapGallery = $this->manageContent->getValueWhere("vidcaps_info","*","gallery_id",$movieId);
			if(isset($vidCapGallery) && !empty($vidCapGallery))
			{
				echo '<a href="full_gallery.php?galleryId='.$vidCapGallery[0]['gallery_id'].'&index=10&page=0&element=10"><button class="btn btn-large btn-danger">Vid Caps</button></a>';
			}
		}
		
		/*
		- check if there is a zip file is present or not if yes 
		- provide the download link
		- Auth Singh 
		*/
		function getZipLinks($movieId)
		{
			$zipFilePath = "gallery/".$movieId."/";
			if(file_exists($zipFilePath."h.zip"))
			{
				echo '<a href="'.$zipFilePath."h.zip".'"><button class="btn btn-large btn-danger">High Zip</button></a>';
			}
			if(file_exists($zipFilePath."m.zip"))
			{
				echo '<a href="'.$zipFilePath."m.zip".'"><button class="btn btn-large btn-danger">Med Zip</button></a>';
			}
			if(file_exists($zipFilePath."s.zip"))
			{
				echo '<a href="'.$zipFilePath."s.zip".'"><button class="btn btn-large btn-danger">Low Zip</button></a>';
			}
		}
		
		/*
		- search the database using the search keyword letter to get the
		- UI of search model directory page
		- Auth Singh
		*/
		function searchModelDirectory($searchKeyword,$type,$startPoint,$limit)
		{
			$startPoint = $startPoint*$limit ;
			//check the type and fetch the data accordingly
			if( $type == "rated" )
			{
				$sortBy = "rating";
			}
			else
			{
				//for the recent
				$sortBy = "date";
			}
			$models = $this->manageContent->getSearchModelDirectory("model_info","*","name",$searchKeyword,$sortBy,$startPoint,$limit);
			//these variables determines the start and the end point for printing row fluid
			$start_point = 0;
			$end_point = 1;
			foreach($models as $model)
			{
				//maintain the row fluid with only four models in a row
				if($start_point%4 == 0)
				{
					echo '<div class="row-fluid">';
				}
				//for models whose status is online
				if($model["status"] == 1)
				{
					//create the UI components
					echo '<div class="span3 element">
							<h4 class="red_text"><a href="model_detail.php?model_id='.$model["id"].'&model_name='.$model["name"].'">'.$model['name'].'</h4>
							<img class="lazy" data-src="images/model_thumb/'.$model["image_thumb"].'" src="" style="width:100%;"  alt="vdeo"></a>
							<p>Added :'.$model["date"].'<br />Views: '.$model["views"].'</p>';
					//logic for displaying stars according to the rating
					if( $model['rating'] == 0 )
					{
						echo '<img class="lazy" data-src="images/star-on.png" src="" alt="star">';
					}		
					for($i = 0 ; $i < $model['rating'] ; $i++)
					{
						echo '<img class="lazy" data-src="images/star-on.png" src="" alt="star">';
					}
					echo '</div>';
				}
				if($end_point%4 == 0)
				{
					echo '</div>';
				}
				
				$start_point++ ;
				$end_point++ ;
				
			}
		}
		
		/*
		- get models movies 
		- Auth Singh
		*/
		function getMoviesByModel($modelName)
		{
			$ModelMovies = $this->manageContent->getSearchValue("movie_info","*","model",$modelName);
			//these variables determines the start and the end point for printing row fluid
			$start_point = 0;
			$end_point = 1;
				
			if($ModelMovies != 0)
			{
				echo '<div class="row-fluid">
						<div id="mainBar" class="span12">
								<h4>Model Video</h4>
						</div>
					</div>';
				foreach($ModelMovies as $movie)
				{
					//get the videos durtion
					$videoDuration = $this->getVideoLength("/home/sites/handjobstop.com/public_html/members/videos/".$movie['gallery_id']."/".$movie['gallery_id'].".".$movie["vid_format_1"]) ;
					
					//get the model for particular gallery
					$model_name = $this->manageContent->getValueWhere("movie_info","model","gallery_id",$movie['gallery_id']) ;
					$model_name = $model_name[0]["model"] ;
					
					//get the single model name
					$model_name = substr($model_name.",",0,( strpos($model_name.",",",") )) ;
					
					//maintain the row fluid with only four models in a row
					if($start_point%4 == 0)
					{
						echo '<div class="row-fluid">';
					}
					//for models whose status is online
					if($movie["status"] == 1)
					{
						//create the UI components
						echo '<div class="span3 element">
								<h4 class="red_text"><a href="playing_movie.php?model='.$model_name.'&movieId='.$movie['gallery_id'].'">'.$movie["movie_name"].'</h4>
								<img class="lazy" data-src="images/movie_thumb/'.$movie["gallery_id"].'.JPG" style="width:100%;" src=""></a>
								<p>Added :'.$movie["date"].'<br />Duration: '.$videoDuration.'<br />Views: '.$movie["views"].'</p>';
						//logic for displaying stars according to the rating
						if( $movie['rating'] == 0 )
						{
							echo '<img class="lazy" data-src="images/star-on.png" src="" alt="star">';
						}
						for($i = 0 ; $i < $movie['rating'] ; $i++)
						{
							echo '<img class="lazy" data-src="images/star-on.png" src="" alt="star">';
						}
						echo '</div>';
					}
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
		- get models Gallery
		- Auth Singh
		*/
		function getGalleryByModel($modelName,$modelId)
		{
			$modelGallerys = $this->manageContent->getSearchValue("gallery_info","*","model",$modelName);
			//these variables determines the start and the end point for printing row fluid
			$start_point = 0;
			$end_point = 1;
				
			if($modelGallerys != 0)
			{
				echo '<div class="row-fluid">
						<div id="mainBar" class="span12">
								<h4>Model Gallery</h4>
						</div>
					</div>';
				foreach($modelGallerys as $gallery)
				{
					//get the total no of images
					$total_images = $this->total_no_images($gallery['gallery_id']) ;
					
					//get the model for particular gallery
					$model_name = $this->manageContent->getValueWhere("gallery_info","model","gallery_id",$gallery['gallery_id']) ;
					$model_name = $model_name[0]["model"] ;
					
					//get the single model name
					$model_name = substr($model_name.",",0,( strpos($model_name.",",",") )) ;
					
					//maintain the row fluid with only four models in a row
					if($start_point%4 == 0)
					{
						echo '<div class="row-fluid">';
					}
					//for models whose status is online
					if($gallery["status"] == 1)
					{
						//create the UI components
						echo '<div class="span3 element">
								<h4 class="red_text"><a href="full_gallery.php?model='.$model_name.'&galleryId='.$gallery['gallery_id'].'&model_id='.$modelId.'&index=10&page=0&element=10">'.$gallery["gallery_name"].'</h4>
								<img class="lazy" data-src="images/gallery_thumb/'.$gallery["gallery_id"].'.JPG" style="width:100%;" src=""></a>
								<p>Added :'.$gallery["date"].'<br />Photos : '.$total_images.'<br />Views: '.$gallery["view"].'</p>';
						//logic for displaying stars according to the rating
						if( $gallery['rating'] == 0 )
						{
							echo '<img class="lazy" data-src="images/star-on.png" src="" alt="star">';
						}	
						for($i = 0 ; $i < $gallery['rating'] ; $i++)
						{
							echo '<img class="lazy" data-src="images/star-on.png" src="" alt="star">';
						}
						echo '</div>';
					}
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
			$lastIndex = $this->manageContent->getTotalRows($tableName) ;
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
				echo '<div class="row-fluid">
						<div class="span12 blank">
							<div class="pagination pagination-small center">
							  <ul>';
				//logic for setting the prev button
				//condition for escaping the -ve page index when $page = 0
				
				if( ($page-1) < 0 && $page != 0 )
				{
					echo '<li><a href="'.$PageUrl.'?p=0&type='.$type;
					if ( isset($keyword) && !empty($keyword) )
					{
						echo '&keyword='.$keyword;
					}
					echo '">Prev</a></li>';
				}
				elseif( $page != 0 )
				{
					echo '<li><a href="'.$PageUrl.'?p='.($page-1);
					if ( isset($keyword) && !empty($keyword) )
					{
						echo '&keyword='.$keyword;
					}
					echo '">Prev</a></li>';
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
					echo '<li><a href="'.$PageUrl.'?p='.($page + 1).'&type='.$type;
					if ( isset($keyword) && !empty($keyword) )
					{
						echo '&keyword='.$keyword;
					}
					echo '">Next</a></li>' ;
				}
				//for the last button
				//echo '<li><a href="'.$PageUrl.'?p='.($no_page - 1).'&limit='.$limit.'">Last</a></li>' ;
				echo	 '</ul>
						</div>
					</div>
				</div>';
			}
			
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
				$this->manageContent->incrementByOne("gallery_info","view","gallery_id",$inputValue);
			}
			//views for model
			if( $pageName == "movie" )
			{
				$this->manageContent->incrementByOne("movie_info","views","gallery_id",$inputValue);
			}
		}
		
		/*
		- UI generator for the home page 
		- right sidebar
		- Auth Singh
		*/
		function getRightSidebar_model()
		{
			//for the recent
			$sortBy = "rating";
			//get values from the database
			$models = $this->manageContent->getValue_limit_sorted_current('model_info','*',$sortBy,0,7);
			
			//for the large pic
			echo '<div class="row-fluid">
                        <div class="mostPopular span12">
							<a href="model_detail.php?model_id='.$models[0]["id"].'&model_name='.$models[0]['name'].'">
								<img class="lazy" data-src="images/model_thumb/'.$models[0]["image_thumb"].'" src="" alt="most popular model"> 
								<h5>'.$models[0]["name"].'</h5>
							</a>
                        </div>
                    </div>' ;
					
			//for the smaller pics		
			echo '<div class="row-fluid">
                        <div class="mostPopular span6">
							<a href="model_detail.php?model_id='.$models[1]["id"].'&model_name='.$models[1]['name'].'">
								<img class="lazy" data-src="images/model_thumb/'.$models[1]["image_thumb"].'" src="" alt="most popular model"> 
								<h5>'.$models[1]["name"].'</h5>
							</a>
                        </div>
                        <div class="mostPopular span6">
							<a href="model_detail.php?model_id='.$models[2]["id"].'&model_name='.$models[2]['name'].'">
								<img class="lazy" data-src="images/model_thumb/'.$models[2]["image_thumb"].'" src="" alt="most popular model"> 
								<h5>'.$models[2]["name"].'</h5>
							</a>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="mostPopular span6">
							<a href="model_detail.php?model_id='.$models[3]["id"].'&model_name='.$models[3]['name'].'">
								<img class="lazy" data-src="images/model_thumb/'.$models[3]["image_thumb"].'" src="" alt="most popular model"> 
								<h5>'.$models[3]["name"].'</h5>
							</a>
                        </div>
                        <div class="mostPopular span6">
							<a href="model_detail.php?model_id='.$models[4]["id"].'&model_name='.$models[4]['name'].'">
								<img class="lazy" data-src="images/model_thumb/'.$models[4]["image_thumb"].'" src="" alt="most popular model"> 
								<h5>'.$models[4]["name"].'</h5>
							</a>	
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="mostPopular span6">
							<a href="model_detail.php?model_id='.$models[5]["id"].'&model_name='.$models[5]['name'].'">
								<img class="lazy" data-src="images/model_thumb/'.$models[5]["image_thumb"].'" src="" alt="most popular model"> 
								<h5>'.$models[5]["name"].'</h5>
							</a>
                        </div>
                        <div class="mostPopular span6">
							<a href="model_detail.php?model_id='.$models[6]["id"].'&model_name='.$models[6]['name'].'">
								<img class="lazy" data-src="images/model_thumb/'.$models[6]["image_thumb"].'" src="" alt="most popular model"> 
								<h5>'.$models[6]["name"].'</h5>
							</a>
                        </div>
                    </div>';		
			
			
		}
		
		/*
		- get the right sidebar most viewed
		- Auth Singh
		*/
		function getMostViewed_sidebar()
		{
			//get most viewed from the database
			$models = $this->manageContent->getValue_limit_sorted_current('model_info','*',"views",0,4);
			$movies = $this->manageContent->getValue_limit_sorted_current('movie_info','*',"views",0,4);
			$gallerys = $this->manageContent->getValue_limit_sorted_current('gallery_info','*',"view",0,4);
			
			echo '<div class="row-fluid social">
                	<ul>
                    	<h5> Most Viewed Movies</h5>' ;
			foreach( $movies as $movie )
			{
				echo '<li><a href="playing_movie.php?movieId='.$movie['gallery_id'].'" class="link">'.$movie["movie_name"].'</a></li>' ;
			}
			echo '</ul>
                	<ul>
                    	<h5> Most Viewed Photos</h5>' ;
			foreach( $gallerys as $gallery )
			{
				echo '<li><a href="full_gallery.php?galleryId='.$gallery['gallery_id'].'" class="link">'.$gallery["gallery_name"].'</a></li>' ;
			}
			echo '</ul>
                	<ul>
                    	<h5> Most Viewed Models</h5>' ;
			
			foreach( $models as $model )
			{
				echo '<li><a href="model_detail.php?model_id='.$model["id"].'&model_name='.$model['name'].'" class="link">'.$model["name"].'</a></li>' ;
			}
			echo '</ul>
                </div>' ;
		}
		
		/*
		- get the right sidebar most viewed
		- Auth Singh
		*/
		function getMostPopular_sidebar()
		{
			//get most viewed from the database
			$models = $this->manageContent->getValue_limit_sorted_current('model_info','*',"rating",0,4);
			$movies = $this->manageContent->getValue_limit_sorted_current('movie_info','*',"rating",0,4);
			$gallerys = $this->manageContent->getValue_limit_sorted_current('gallery_info','*',"rating",0,4);
			
			echo '<div class="row-fluid social">
                	<ul>
                    	<h5> Most Viewed Movies</h5>' ;
			foreach( $movies as $movie )
			{
				echo '<li><a href="playing_movie.php?movieId='.$movie['gallery_id'].'" class="link">'.$movie["movie_name"].'</a></li>' ;
			}
			echo '</ul>
                	<ul>
                    	<h5> Most Viewed Photos</h5>' ;
			foreach( $gallerys as $gallery )
			{
				echo '<li><a href="full_gallery.php?galleryId='.$gallery['gallery_id'].'" class="link">'.$gallery["gallery_name"].'</a></li>' ;
			}
			echo '</ul>
                	<ul>
                    	<h5> Most Viewed Models</h5>' ;
			
			foreach( $models as $model )
			{
				echo '<li><a href="model_detail.php?model_id='.$model["id"].'&model_name='.$model['name'].'" class="link">'.$model["name"].'</a></li>' ;
			}
			echo '</ul>
                </div>' ;
		}
		
		/*
		- get file names for the Images
		- for the image slider
		- @param galleryId
		- Auth Singh
		*/
		function getFilenamesImages($gallery_id)
		{
			$galleryPath = "gallery/".$gallery_id."/";
			
			//get fileNames from the gallery folder
			$filenames = scandir($galleryPath);
			$filenames = array_slice($filenames,2);
			echo '<ul style="display:none;">' ;
			foreach($filenames as $filename)
			{
				//to remove the zip files from the UI
				$ext = pathinfo($galleryPath.$filename);
				
				if( $ext["extension"] != "zip")
				{
					if(!is_dir($galleryPath.$filename))
					{
						echo '<li class="imagelist">'.$galleryPath.$filename.'</li>';
					}
				}
			}
			echo '</ul>' ;
		}
		
		/*
		- function to get the limit value for pagination
		- table pagination_into
		- Auth Singh
		*/
		function getLimit_pagination()
		{
			$limit = $this->manageContent->getValue("pagination_info","*");
			return $limit[0]["limit"] ;
		}
		
		/*
		- movie nav for the quality of video
		- Auth Singh
		*/
		function getQuality_movie($movie_id,$gallery_id,$type)
		{
			echo '<a href="playing_movie.php?movieId='.$movie_id.'&gallery_id='.$gallery_id.'&type=low"><button class="btn btn-large btn-danger ';
			
			if( $type == "low" )
			{
				echo 'active' ;
			}
			
			echo '">Low</button></a>
                <a href="playing_movie.php?movieId='.$movie_id.'&gallery_id='.$gallery_id.'&type=medium"><button class="btn btn-large btn-danger ';
				
			if( $type == "medium" )
			{
				echo 'active' ;
			}
			
			echo '">Medium</button></a>
                <a href="playing_movie.php?movieId='.$movie_id.'&gallery_id='.$gallery_id.'&type=high"><button class="btn btn-large btn-danger ';
				
			if( $type == "high" )
			{
				echo 'active' ;
			}
			
			echo '">High</button></a>' ;
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
			
			$sortBy = "id" ;
			
			//get the data from the database
			$comments = $this->manageContent->getValueWhere_latest($table_name,"*","unit_id",$id,$sortBy) ;
			
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
							<p><i class="icon-glass"></i><span class="commentstatus" onclick="status('."'like','".$comment["id"]."','".$_SESSION["user"]."','".$type."'".')"> Like </span><span class="badge badge-success">'.$comment["comment_like"].'</span> <i class="icon-remove-sign"></i><span class="commentstatus" onclick="status('."'dislike','".$comment["id"]."','".$_SESSION["user"]."','".$type."'".')"> Dislike </span><span class="badge badge-inverse">'.$comment["comment_dislike"].'</span> </p>
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
		
		
		/*
		- method to take the video and return video duration
		- @param absolute path of input video
		- Auth Singh
		*/
		function getVideoLength($inputVideo)
		{
			$movie = new ffmpeg_movie($inputVideo,0) ;
			$movieDuration = $movie->getDuration() ;
			$movieDuration = date('H:i:s', mktime(0, 0,$movieDuration));
			return $movieDuration ;
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
		
		
		/*
		- codes for getting members favorite
		- generates complete UI
		- Auth Singh
		*/
		function membersFavourite($startPoint,$limit,$output_type,$no_rows)
		{
			//control span
			if( $no_rows == 3 )
			{
				$span = 4 ;
			}
			else
			{
				$span = 3 ;
			}
			//create the UI for the header
			echo '<div class="row-fluid">
						<div id="mainBar" class="span12">
								<h4>Members Favorite</h4>
						</div>
					</div>';
			
			//generate if the output is movie
			if( $output_type == "movie" )
			{
				//get values from the database
				$movies = $this->manageContent->getValue_limit_sorted_random('movie_info','*',$startPoint,$limit);
				//these variables determines the start and the end point for printing row fluid
				$start_point = 0;
				$end_point = 1;
				foreach($movies as $movie)
				{
					//get the videos durtion
					$videoDuration = $this->getVideoLength("/home/sites/handjobstop.com/public_html/members/videos/".$movie['gallery_id']."/".$movie['gallery_id'].".".$movie['vid_format_1']) ;
					
					//get the model for particular gallery
					$model_name = $this->manageContent->getValueWhere("movie_info","model","gallery_id",$movie['gallery_id']) ;
					$model_name = $model_name[0]["model"] ;
					
					//get the single model name
					$model_name = substr($model_name.",",0,( strpos($model_name.",",",") )) ;
					
					//maintain the row fluid with only four models in a row
					if($start_point%$no_rows == 0)
					{
						echo '<div class="row-fluid">';
					}
					//for models whose status is online
					if($movie["status"] == 1)
					{
						//create the UI components
						echo '<div class="span'.$span.' element">
								<h4 class="red_text"><a href="playing_movie.php?model='.$model_name.'&movieId='.$movie['gallery_id'].'&gallery_id=0&type=low">'.$movie["movie_name"].'</h4>
								<img class="lazy" data-src="images/movie_thumb/'.$movie["gallery_id"].'.JPG" style="width:100%;" src=""></a>
								<p>Added :'.$movie["date"].'<br />Duration: '.$videoDuration.'<br />Views: '.$movie["views"].'</p>';
						//logic for displaying stars according to the rating
						if( $movie['rating'] == 0 )
						{
							echo '<img class="lazy" data-src="images/star-on.png" src="" alt="star">';
						}
						for($i = 0 ; $i < $movie['rating'] ; $i++)
						{
							echo '<img class="lazy" data-src="images/star-on.png" src="" alt="star">';
						}
						echo '</div>';
					}
					if($end_point%$no_rows == 0)
					{
						echo '</div>';
					}
					
					$start_point++ ;
					$end_point++ ;
				}
			}
			//generate if output is photos
			else
			{
				//get values from the database
				$gallerys = $this->manageContent->getValue_limit_sorted_random('gallery_info','*',$startPoint,$limit);
				//these variables determines the start and the end point for printing row fluid
				$start_point = 0;
				$end_point = 1;
				foreach($gallerys as $gallery)
				{
					//get the total no of images for each gallery
					$total_no_images = $this->total_no_images($gallery['gallery_id']) ;
					
					//get the model for particular gallery
					$model_name = $this->manageContent->getValueWhere("gallery_info","model","gallery_id",$gallery['gallery_id']) ;
					$model_name = $model_name[0]["model"] ;
					
					//get the single model name
					$model_name = substr($model_name.",",0,( strpos($model_name.",",",") )) ;
	
					//maintain the row fluid with only four models in a row
					if($start_point%$no_rows == 0)
					{
						echo '<div class="row-fluid">';
					}
					//for models whose status is online
					if($gallery["status"] == 1)
					{
						//create the UI components
						echo '<div class="span'.$span.' element">
								<h4 class="red_text"><a href="full_gallery.php?model='.$model_name.'&galleryId='.$gallery['gallery_id'].'&index=10&page=0&element=20">'.$gallery["gallery_name"].'</h4>
								<img class="lazy" data-src="images/gallery_thumb/'.$gallery["gallery_id"].'.JPG" style="width:100%;" src=""></a>
								<p>Added :'.$gallery["date"].'<br />Photos: '.$total_no_images.'<br />Views: '.$gallery["view"].'</p>';
						//logic for displaying stars according to the rating
						if( $gallery['rating'] == 0 )
						{
							echo '<img class="lazy" data-src="images/star-on.png" src="" alt="star">';
						}	
						for($i = 0 ; $i < $gallery['rating'] ; $i++)
						{
							echo '<img class="lazy" data-src="images/star-on.png" src="" alt="star">';
						}
						echo '</div>';
					}
					if($end_point%$no_rows == 0)
					{
						echo '</div>';
					}
					
					$start_point++ ;
					$end_point++ ;
					
				
					}
		
			}
		}
		
		/*
		- get the description
		- create full UI of the description for the field
		- Auth Singh
		*/
		function getDescription($field_id,$type)
		{
			//get the table name according to the page
			if( $type == "movie" )
			{
				$title = "Movie" ;
				$table_name = "movie_info" ;
				$field_where = "gallery_id" ;
			}
			if( $type == "gallery" )
			{
				$title = "Gallery" ;
				$table_name = "gallery_info" ;
				$field_where = "gallery_id" ;
			}
			
			$description = $this->manageContent->getValueWhere($table_name,"description",$field_where,$field_id) ;
			
			if( $description != 0 )
			{
				//create full UI
				echo '<div class="row-fluid">
						<div class="span12">
							<h3 class="movie_description_heading">'.$title.' Description</h3>
							<p class="movie_description">'.$description[0]["description"].'</p>
							</div>	
					   </div>' ;
			}
		}
		
		/*
		- method of getting the friend list of the page
		- create the full UI
		- Auth Singh
		*/
		function getFriends($startPoint,$limit)
		{
			$startPoint = $startPoint*$limit ;
			//check the type and fetch the data accordingly
			
			//for the recent
			$sortBy = "date";
				
			//get values from the database
			$friends = $this->manageContent->getValue_limit_sorted_current('friends','*',$sortBy,$startPoint,$limit);
			//these variables determines the start and the end point for printing row fluid
			$start_point = 0;
			$end_point = 1;
			foreach($friends as $friend)
			{
				//maintain the row fluid with only four models in a row
				if($start_point%4 == 0)
				{
					echo '<div class="row-fluid">';
				}
				//for models whose status is online
				if($friend["status"] == 1)
				{
					//create the UI components
					echo '<div class="span3 element">
							<h4 class="red_text"><a href="'.$friend['link'].'" target="_blank">'.$friend['name'].'</h4>
							<img class="lazy" data-src="images/friend_thumb/'.$friend['friend_thumb'].'" style="width:100%;" src=""></a></div>';
							
				}
				if($end_point%4 == 0)
				{
					echo '</div>';
				}
				
				$start_point++ ;
				$end_point++ ;
				
			}
		}
		
		/*
		- method to get the suggested sites
		- create the full UI
		- Auth Singh
		*/
		function getSuggested_sites()
		{
			//output is the id of the friends table
			$sites = $this->manageContent->getValue("suggested_info","*") ;
			echo '<div class="row-fluid popularmodels">' ;
			$start_point = 0 ;
			$end_point = 1 ;
			foreach( $sites as $site )
			{
				//get the values from the table
				$site_info = $this->manageContent->getValueWhere("friends","*","id",$site['suggested_site_id']) ;
				if($start_point%2 == 0)
				{
					echo '<div class="row-fluid">';
				}
				//create single sugested site with the links
				echo '<div class="mostPopular span6">
						<a href="'.$site_info[0]['link'].'" target="_blank">
                    		<img class="lazy" data-src="images/friend_thumb/'.$site_info[0]['friend_thumb'].'" src="" alt="suggested"> 
                        	<h5>'.$site_info[0]['name'].'</h5>
						</a>
                    </div>' ;
				if($end_point%2 == 0)
				{
					echo '</div>';
				}
				
				$start_point++ ;
				$end_point++ ;
			}
			echo '</div>' ;
		}
		
		/*
		- get the rating for the particular element
		- @param table name
		- @return rating value
		- Auth Singh
		*/
		function getRating($element_type,$element_id)
		{
			if( $element_type == "movie" )
			{
				$rating = $this->manageContent->getValueWhere("movie_info","rating","gallery_id",$element_id) ;
			}
			if( $element_type == "sliced" )
			{
				$rating = $this->manageContent->getValueWhere("sliced_vids","rating","gallery_id",$element_id) ;
			}
			if( $element_type == "gallery" )
			{
				$rating = $this->manageContent->getValueWhere("gallery_info","rating","gallery_id",$element_id) ;
			}
			if( $element_type == "model" )
			{
				$rating = $this->manageContent->getValueWhere("model_info","rating","id",$element_id) ;
				//if returns 0 then check by name
				if( $rating == 0 )
				{
					$rating = $this->manageContent->getValueWhere("model_info","rating","name",$element_id) ;
				}
			}
			return ( intval( $rating[0]['rating'] ) + 1 ) ;
		}
	}
?>