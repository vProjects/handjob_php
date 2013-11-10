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
		-Auth Singh
		*/
		function getModels()
		{
			//get values from the database
			$models = $this->manageContent->getValue('model_info','*');
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
							<h4 class="red_text"><a href="model_detail.php?model_id='.$model["id"].'">'.$model['name'].'</h4>
							<img class="lazy" data-src="images/model_thumb/'.$model["image_thumb"].'" src="" alt="vdeo"></a>
							<p>Added :'.$model["date"].'<br />Views: '.$model["views"].'</p>';
					//logic for displaying stars according to the rating		
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
		- get galleries from the database
		-Auth Singh
		*/
		function getGallery()
		{
			//get values from the database
			$gallerys = $this->manageContent->getValue('gallery_info','*');
			//these variables determines the start and the end point for printing row fluid
			$start_point = 0;
			$end_point = 1;
			foreach($gallerys as $gallery)
			{
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
							<h4 class="red_text"><a href="full_gallery.php?galleryId='.$gallery['gallery_id'].'">'.$gallery["gallery_name"].'</h4>
							<img class="lazy" data-src="images/gallery_thumb/'.$gallery["gallery_id"].'.JPG" src=""></a>
							<p>Added :'.$gallery["date"].'<br />Views: '.$gallery["view"].'</p>';
					//logic for displaying stars according to the rating		
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
		- get model details for a specific model
		- Auth Singh
		*/
		function getModelDetails($model_id)
		{
			$modelDetails = $this->manageContent->getValueWhere("model_info","*","id",$model_id);
			
			//these codes creates the UI output
			echo '<div class="row-fluid">
					<h3 class="site_heading red_text">'.$modelDetails[0]["name"].'</h3>
				  </div>
				  <div class="row-fluid model_detail">
					<div class="span3">
						<img src="images/model_thumb/'.$modelDetails[0]["image_thumb"].'" width="250">
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
		
		/*
		- gallery builder for the UI
		- Auth Singh
		*/
		function getFullGallery($gallery_id)
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
				if(!is_dir($galleryPath.$filename))
				{
					//maintain the row fluid with only four models in a row
					if($start_point%4 == 0)
					{
						echo '<div class="row-fluid">';
					}
					//create the UI components
					echo '<div class="span3 element">
							<a href="'.$imageLocation.$filename.'" target="_blank">
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
		
		/*
		- get the articles from the database
		- generate the UI for the design
		- Auth Singh
		*/
		function getArticles()
		{
			$articles = $this->manageContent->getValue('article_info','*');
			
			foreach($articles as $article)
			{
				echo '<div class="row-fluid blog_container">
						<div class="span12">
							<h4><a href="#" class="blog_heading">'.$article["article_title"].'</a></h4>
							<p class="blog_author_name"> '.$article["article_author"].'</p>
							<p>'.$article["article_description"].'</p>
							<p> Added :'.$article["article_date"].'</p>
							<p> 2 Comments</p>
						</div>
					</div>';
			}
		}
		
		/*
		- get videos from the database
		-Auth Singh
		*/
		function getVideos()
		{
			//get values from the database
			$movies = $this->manageContent->getValue('movie_info','*');
			//these variables determines the start and the end point for printing row fluid
			$start_point = 0;
			$end_point = 1;
			foreach($movies as $movie)
			{
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
							<h4 class="red_text"><a href="full_gallery.php?galleryId='.$movie['gallery_id'].'">'.$movie["movie_name"].'</h4>
							<img class="lazy" data-src="images/gallery_thumb/'.$movie["gallery_id"].'.JPG" src=""></a>
							<p>Added :'.$movie["date"].'<br />Views: '.$movie["view"].'</p>';
					//logic for displaying stars according to the rating		
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
?>