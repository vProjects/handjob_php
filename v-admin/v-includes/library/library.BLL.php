<?php
	//include the library for DAL
	include('library.DAL.php');
	
	class manageContent_BLL
	{
		private $manageContent;
		//contructor of the class
		function __construct()
		{
			$this->manageContent = new manageContent_DAL();
			return $this->manageContent;
		}
		
		/*
		- function to get the value of article table sorted by date
		- auth Singh
		*/
		function getArticleList()
		{
			$articles = $this->manageContent->getValue_latest('article_info','*','article_date');
			foreach($articles as $article)
			{
				echo '<tbody>
                        <tr>
                            <td>'.$article['article_title'].'</td>
							<td>'.$article['article_author'].'</td>
                            <td>'.$article['article_description'].'</td>
                            <td><button class="btn btn-warning" type="button">
								<span class="icon-pencil"></span>&nbsp;&nbsp;EDIT</button>
							</td>
                            <td><a href="v-includes/functions/function.deleteEntity.php?del_id='.$article['id'].'&type=article" >
									<button class=" btn btn-danger" type="button">
									<span class=" icon-trash"></span>&nbsp;&nbsp;DELETE</button>
								</a>
							</td>
                        </tr>
                    </tbody>';
			}
		}
		
		/*
		- function to get gallery using galleryId
		- auth Singh
		*/
		function getGallery($galleryId)
		{
			$filenames = scandir("../members/gallery/".$galleryId."/s");
			$filenames = array_slice($filenames,2);
			//create a form for selecting gallery thumb
			echo '<form action="v-includes/functions/function.createThumb.php" method="post">';
			foreach($filenames as $filename)
			{
				if(!empty($filename))
				{
					if(!is_dir("../members/gallery/".$galleryId."/s/".$filename))
					{
						echo '<div class="span3 gallery_img">
								<a href="cropGalleryImageProccessed.php?folderName='.$galleryId.'&save=false&fileName='.$filename.'">
									<img src="../members/gallery/'.$galleryId.'/s/'.$filename.'" />
								</a>
								<label class="radio radio_v">
									<input type="hidden" value="'.$galleryId.'" name="gallery_id"/>
									<input type="radio" value="'.$filename.'" name="thumb_image"/>
									Make this Gallery Thumbnail
									<a href="v-includes/functions/function.deleteGalleryImage.php?galleryId='.$galleryId.'&fileName='.$filename.'"><span style="color:red;float:right;"><i class="icon-trash"></i>Delete</span></a>
								</label>
							</div>';
						echo '';
					}
				}
			}
			echo '<input type="submit" value="Create Thumb" class="btn btn-large btn-warning btn_2"/>
				</form>';
		}
		
		/*
		- function to get movie using galleryId
		- auth Singh
		*/
		function updateMovies($galleryId)
		{
			$filenames = scandir("../members/gallery/".$galleryId."/s");
			$filenames = array_slice($filenames,2);
			//create a form for selecting gallery thumb
			echo '<form action="v-includes/functions/function.createThumbMovie.php" method="post">';
			foreach($filenames as $filename)
			{
				if(!empty($filename))
				{
					if(!is_dir("../members/gallery/".$galleryId."/s/".$filename))
					{
						echo '<div class="span3 gallery_img">
								<a href="cropMovieImage.php?folderName='.$galleryId.'&fileName='.$filename.'&save=false">
									<img src="../members/gallery/'.$galleryId.'/s/'.$filename.'" />
								</a>
								<label class="radio radio_v">
									<input type="hidden" value="'.$galleryId.'" name="gallery_id"/>
									<input type="radio" value="'.$filename.'" name="thumb_image"/>
									Make this Gallery Thumbnail
									<a href="v-includes/functions/function.deleteGalleryImage.php?galleryId='.$galleryId.'&fileName='.$filename.'"><span style="color:red;float:right;"><i class="icon-trash"></i>Delete</span></a>
								</label>
							</div>';
						echo '';
					}
				}
			}
			echo '<input type="submit" value="Create Thumb" class="btn btn-large btn-warning btn_2"/>
				</form>';
		}
		
		/*
		- function to get sliced movie using galleryId
		- auth Singh
		*/
		function updateSlicedMovies($galleryId,$movieId)
		{
			$filenames = scandir("../members/gallery/".$movieId."/s");
			$filenames = array_slice($filenames,2);
			//create a form for selecting gallery thumb
			echo '<form action="v-includes/functions/function.createThumbSliced.php" method="post">';
			foreach($filenames as $filename)
			{
				if(!empty($filename))
				{
					if(!is_dir("../members/gallery/".$movieId."/s/".$filename))
					{
						echo '<div class="span3 gallery_img">
								<a href="cropSlicedMovieImage.php?folderName='.$movieId.'&fileName='.$filename.'&save=false&galleryId='.$galleryId.'">
									<img src="../members/gallery/'.$movieId.'/s/'.$filename.'" />
								</a>
								<label class="radio radio_v">
									<input type="hidden" value="'.$movieId.'" name="movie_id"/>
									<input type="radio" value="'.$filename.'" name="thumb_image"/>
									Make this Gallery Thumbnail
									<a href="v-includes/functions/function.deleteGalleryImage.php?galleryId='.$movieId.'&fileName='.$filename.'"><span style="color:red;float:right;"><i class="icon-trash"></i>Delete</span></a>
								</label>
							</div>';
						echo '';
					}
				}
			}
			echo '<input type="hidden" name="gallery_id" value="'.$galleryId.'"/>
					<input type="submit" value="Create Thumb" class="btn btn-large btn-warning btn_2"/>
				</form>';
		}
		
		/*
		- function to get all the models
		- auth Singh
		*/
		function getModelList($startPoint,$limit,$keyword)
		{
			$startPoint = $startPoint*$limit ;
			
			$models = $this->manageContent->getValue_limit_sorted('model_info','*',"date",$startPoint,$limit,"name",$keyword);
			foreach($models as $model)
			{
				echo '<tbody>
                        <tr>
							<td class="span1 model_thumb"><img src="../members/images/model_thumb/'.$model['image_thumb'].'"/></td>
                            <td>'.$model['name'].'</td>
							<td>'.$model['age'].'</td>
							<td>'.$model['height'].'</td>
							<td>'.$model['weight'].'</td>
                            <td>'.$model['date'].'</td>
							<td>'.$model['category'].'</td>
                            <td><a href="editModel.php?modelId='.$model['id'].'" >
									<button class="btn btn-warning" type="button">
									<span class="icon-pencil"></span>&nbsp;&nbsp;EDIT</button>
								</a>
							</td>
                            <td><a href="v-includes/functions/function.deleteEntity.php?del_id='.$model['id'].'&type=model" >
									<button class=" btn btn-danger" type="button">
									<span class=" icon-trash"></span>&nbsp;&nbsp;DELETE</button>
								</a>
							</td>
                        </tr>
                    </tbody>';
			}
		}
		
		/*
		- get the list of the gallery and create UI
		- using the gallery_info table
		- Auth Singh
		*/
		function getGalleryList($startPoint,$limit,$keyword)
		{
			$startPoint = $startPoint*$limit ;
			
			$gallerys = $this->manageContent->getValue_limit_sorted('gallery_info','*',"date",$startPoint,$limit,'gallery_name',$keyword);
			foreach($gallerys as $gallery)
			{
				echo '<tbody>
                        <tr>
							<td class="span1 model_thumb"><img src="../members/images/gallery_thumb/'.$gallery['gallery_id'].'.JPG"/></td>
                            <td><a href="galleryFromImage.php?galleryId='.$gallery['gallery_id'].'">'.$gallery['gallery_id'].'</a></td>
							<td>'.$gallery['gallery_name'].'</td>
							<td>'.$gallery['model'].'</td>
							<td>'.$gallery['category'].'</td>
                            <td>'.$gallery['date'].'</td>
                            <td><a href="editGallery.php?galleryId='.$gallery['id'].'" >
									<button class="btn btn-warning" type="button">
									<span class="icon-pencil"></span>&nbsp;&nbsp;EDIT</button>
								</a>
							</td>
                            <td><a href="v-includes/functions/function.deleteEntity.php?del_id='.$gallery['id'].'&type=gallery" >
									<button class=" btn btn-danger" type="button">
									<span class=" icon-trash"></span>&nbsp;&nbsp;DELETE</button>
								</a>
							</td>
                        </tr>
                    </tbody>';
			}
			if( $gallerys == "" )
			{
				echo '<td>No result found.</td>';
			}
		}
		
		/*
		- get the names of the files from the uploads directory
		- @param the name of the folder of uploads folder
		- auth Singh
		*/
		function getFiles($uploadFolder)
		{
			$filenames = scandir("../uploads/".$uploadFolder);
			$filenames = array_slice($filenames,2);
			foreach($filenames as $filename)
			{
				echo '<option value="'.$filename.'">'.$filename.'</option>';
			}
		}
		
		/*
		- get folders names from the uploads/images directory 
		- for creating image gallery
		- Auth Singh 
		*/
		function getFolders()
		{
			$folderNames = scandir("../uploads/images/");
			$folderNames = array_slice($folderNames,2);
			foreach($folderNames as $folderName)
			{
				if(is_dir("../uploads/images/".$folderName))
				{
					echo '<option value="'.$folderName.'">'.$folderName.'</option>';
				}
			}
		}
		
		/*
		- get the values from the cron table
		-Auth Singh
		*/
		function getCronVaues(){
			$cronGallery = $this->manageContent->getValue("cron_gallery","*");
			$cronSliced = $this->manageContent->getValue("cron_slice","*");
			foreach($cronGallery as $cronValue)
			{
				echo '<p class="green_text">'.$cronValue['input_video'].'&nbsp;&nbsp;&nbsp;-------- WAITING FOR CONVERSION</p>';
			}
			foreach($cronSliced as $cronValueSlice)
			{
				echo '<p class="green_text">'.$cronValueSlice['input_path'].'&nbsp;&nbsp;&nbsp;-------- WAITING FOR SLICING</p>';
			}
		}
		
		/*
		- category list used to get the total categories present
		- @param table name for the category
		- Auth Singh
		*/
		function getCategoryList($tableName)
		{
			$categorys = $this->manageContent->getValue($tableName,"*");
			foreach($categorys as $category)
			{
				echo '<tr>';
				echo '<td>'.$category['category'].'</td>';
                echo '<td>'.$category['date'].'</td>';
				echo '<td><button class="btn btn-warning" type="button">
						<span class="icon-pencil"></span>&nbsp;&nbsp;EDIT</button>
					</td>
					<td><button class=" btn btn-danger" type="button">
						<span class=" icon-trash"></span>&nbsp;&nbsp;DELETE</button>
					</td></tr/>';
				
			}
		}
		
		/*
		- category list used to get the total categories present for the select box
		- @param table name for the category
		- Auth Singh
		*/
		function getCategoryListSelectBox($tableName)
		{
			$sortBy = "category" ;
			$categorys = $this->manageContent->getValue_sorted_asc($tableName,"*",$sortBy);
			foreach($categorys as $category)
			{
				echo '<option value="'.$category['category'].'">'.$category['category'].'</option>';
			}
		}
		
		/*
		- get model names for the select box
		- Auth Singh
		*/
		function getModelNames()
		{
			$modelNames = $this->manageContent->getValue_sorted_asc("model_info","name","name");
			foreach($modelNames as $modelName)
			{
				echo '<option value="'.$modelName['name'].'">'.$modelName['name'].'</option>';
			}
		}
		
		/*
		- get the list of the videos and create UI
		- using the movie_info table
		- Auth Singh
		*/
		function getVideoList($startPoint,$limit,$keyword)
		{
			$startPoint = $startPoint*$limit ;
			
			$movies = $this->manageContent->getValue_limit_sorted('movie_info','*',"date",$startPoint,$limit,"movie_name",$keyword);
			foreach($movies as $movie)
			{
				echo '<tbody>
                        <tr>
							<td class="span1 model_thumb"><img src="../members/images/movie_thumb/'.$movie['gallery_id'].'.JPG"/></td>
                            <td><a href="updateMovie.php?galleryId='.$movie['gallery_id'].'">'.$movie['gallery_id'].'</a></td>
							<td>'.$movie['movie_name'].'</td>
							<td>'.$movie['model'].'</td>
							<td>'.$movie['category'].'</td>
                            <td>'.$movie['date'].'</td>
                            <td><a href="editMovies.php?movieId='.$movie['id'].'&type=movie">
									<button class="btn btn-warning" type="button">
									<span class="icon-pencil"></span>&nbsp;&nbsp;EDIT</button>
								</a>
							</td>
                            <td><a href="v-includes/functions/function.deleteEntity.php?del_id='.$movie['id'].'&type=movie" >
									<button class=" btn btn-danger" type="button">
									<span class=" icon-trash"></span>&nbsp;&nbsp;DELETE</button>
								</a>
							</td>
                        </tr>
                    </tbody>';
			}
			
			if( $movies == "" )
			{
				echo '<td>No result found.</td>';
			}
		}
		
		/*
		- get the list of the sliced vids and create UI
		- using the sliced_vids table
		- Auth Singh
		*/
		function getSlicedVideoList($startPoint,$limit,$keyword)
		{
			$startPoint = $startPoint*$limit ;
			
			$slicedMovies = $this->manageContent->getValue_limit_sorted('sliced_vids','*',"date",$startPoint,$limit,'movie_name',$keyword);
			foreach($slicedMovies as $slicedMovie)
			{
				echo '<tbody>
                        <tr>
							<td class="span1 model_thumb"><img src="../members/images/movie_thumb/'.$slicedMovie['gallery_id'].'.JPG"/></td>
                            <td><a href="updateSliced.php?galleryId='.$slicedMovie['gallery_id'].'&movieId='.$slicedMovie["movie_id"].'">'.$slicedMovie['gallery_id'].'</a></td>
							<td>'.$slicedMovie['movie_name'].'</td>
							<td>'.$slicedMovie['model'].'</td>
							<td>'.$slicedMovie['category'].'</td>
                            <td>'.$slicedMovie['date'].'</td>
                            <td><a href="editMovies.php?movieId='.$slicedMovie["id"].'&type=sliced">
									<button class="btn btn-warning" type="button">
									<span class="icon-pencil"></span>&nbsp;&nbsp;EDIT</button>
								</a>
							</td>
                            <td><a href="v-includes/functions/function.deleteEntity.php?del_id='.$slicedMovie['id'].'&type=sliced" >
									<button class=" btn btn-danger" type="button">
									<span class=" icon-trash"></span>&nbsp;&nbsp;DELETE</button>
								</a>
							</td>
                        </tr>
                    </tbody>';
			}
		}
		
		/*
		- get sliced movies for a particular movie
		- Auth Singh
		*/
		function getSlicedVids($movieId)
		{
			$slicedMovies = $this->manageContent->getValueWhere("sliced_vids","*","movie_id",$movieId);
			foreach($slicedMovies as $slicedMovie)
			{
				echo '<tbody>
                        <tr>
							<td class="span1 model_thumb"><img src="../members/images/movie_thumb/'.$slicedMovie['gallery_id'].'.JPG"/></td>
                            <td><a href="updateSliced.php?galleryId='.$slicedMovie['gallery_id'].'&movieId='.$slicedMovie["movie_id"].'">'.$slicedMovie['gallery_id'].'</a></td>
							<td>'.$slicedMovie['movie_name'].'</td>
							<td>'.$slicedMovie['model'].'</td>
							<td>'.$slicedMovie['category'].'</td>
                            <td>'.$slicedMovie['date'].'</td>
                            <td><a href="editMovies.php?movieId='.$slicedMovie["id"].'&type=sliced">
									<button class="btn btn-warning" type="button">
									<span class="icon-pencil"></span>&nbsp;&nbsp;EDIT</button>
								</a>
							</td>
                            <td><button class=" btn btn-danger" type="button">
								<span class=" icon-trash"></span>&nbsp;&nbsp;DELETE</button>
							</td>
                        </tr>
                    </tbody>';
			}
		}
		
		/*
		- function to get the values for the DAL and
		- Pass is to UI
		- Auth Singh
		*/
		function getValue_Where($table_name,$value,$row_value,$value_entered)
		{
			$fetch_values = $this->manageContent->getValueWhere($table_name,$value,$row_value,$value_entered);
			return $fetch_values ;
		}
		
		/*
		- get uploaded files from the upload/image folder
		- Auth Singh
		*/
		function getUploadedImages($folderName)
		{
			$filenames = scandir("../uploads/images/".$folderName."/");
			$filenames = array_slice($filenames,2);
			//create a form for selecting gallery thumb
			foreach($filenames as $filename)
			{
				if(!empty($filename))
				{
					if(!is_dir("../uploads/images/".$folderName."/".$filename))
					{
						echo '<div class="span3 gallery_img">
								<a href="cropGalleryImage.php?folderName='.$folderName.'&fileName='.$filename.'&save=false">
									<img src="../uploads/images/'.$folderName.'/'.$filename.'" />
								</a>
							</div>';
						echo '';
					}
				}
			}
			echo '<input type="submit" value="Create Thumb" class="btn btn-large btn-warning btn_2"/>
				</form>';
		}
		
		/*
		- get the value of the pagination
		- according to the startPoint also max page display 10
		- both front startPoint = 0 and startPoint = end present
		- Auth Singh
		*/
		function pagination($page,$PageUrl,$max_no_index,$tableName,$type,$keyword)
		{
			//limit is the total no of elements to be shown
			$limit = 10 ;
			//used in the db for getting o/p
			$startPoint = $page*$limit ;
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
					echo '<li><a href="'.$PageUrl.'?p=0&limit='.$limit.'&type='.$type;
					if ( isset($keyword) && !empty($keyword) )
					{
						echo '&keyword='.$keyword;
					}
					echo '">Prev</a></li>';
				}
				elseif( $page != 0 )
				{
					echo '<li><a href="'.$PageUrl.'?p='.($page-1).'&limit='.$limit;
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
						echo '<li><a href="'.$PageUrl.'?p='.($i-1).'&limit='.$limit.'&type='.$type;
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
					echo '<li><a href="'.$PageUrl.'?p='.($page + 1).'&limit='.$limit.'&type='.$type;
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
		- get the list of the gallery and create UI
		- using the gallery_info table
		- Auth Singh
		*/
		function getGalleryListByModel($startPoint,$limit,$keyword)
		{
			$startPoint = $startPoint*$limit ;
			
			$gallerys = $this->manageContent->getValue_limit_sorted('gallery_info','*',"date",$startPoint,$limit,'model',$keyword);
			foreach($gallerys as $gallery)
			{
				echo '<tbody>
                        <tr>
							<td class="span1 model_thumb"><img src="../members/images/gallery_thumb/'.$gallery['gallery_id'].'.JPG"/></td>
                            <td><a href="galleryFromImage.php?galleryId='.$gallery['gallery_id'].'">'.$gallery['gallery_id'].'</a></td>
							<td>'.$gallery['gallery_name'].'</td>
							<td>'.$gallery['model'].'</td>
							<td>'.$gallery['category'].'</td>
                            <td>'.$gallery['date'].'</td>
                            <td><a href="editGallery.php?galleryId='.$gallery['id'].'" >
									<button class="btn btn-warning" type="button">
									<span class="icon-pencil"></span>&nbsp;&nbsp;EDIT</button>
								</a>
							</td>
                            <td><a href="v-includes/functions/function.deleteEntity.php?del_id='.$gallery['id'].'&type=gallery" >
									<button class=" btn btn-danger" type="button">
									<span class=" icon-trash"></span>&nbsp;&nbsp;DELETE</button>
								</a>
							</td>
                        </tr>
                    </tbody>';
			}
			if( $gallerys == "" )
			{
				echo '<td>No result found.</td>';
			}
		}
		
		/*
		- get the list of the videos and create UI
		- using the movie_info table
		- Auth Singh
		*/
		function getVideoListByModel($startPoint,$limit,$keyword)
		{
			$startPoint = $startPoint*$limit ;
			
			$movies = $this->manageContent->getValue_limit_sorted('movie_info','*',"date",$startPoint,$limit,"model",$keyword);
			foreach($movies as $movie)
			{
				echo '<tbody>
                        <tr>
							<td class="span1 model_thumb"><img src="../members/images/movie_thumb/'.$movie['gallery_id'].'.JPG"/></td>
                            <td><a href="updateMovie.php?galleryId='.$movie['gallery_id'].'">'.$movie['gallery_id'].'</a></td>
							<td>'.$movie['movie_name'].'</td>
							<td>'.$movie['model'].'</td>
							<td>'.$movie['category'].'</td>
                            <td>'.$movie['date'].'</td>
                            <td><a href="editMovies.php?movieId='.$movie['id'].'&type=movie">
									<button class="btn btn-warning" type="button">
									<span class="icon-pencil"></span>&nbsp;&nbsp;EDIT</button>
								</a>
							</td>
                            <td><a href="v-includes/functions/function.deleteEntity.php?del_id='.$movie['id'].'&type=movie" >
									<button class=" btn btn-danger" type="button">
									<span class=" icon-trash"></span>&nbsp;&nbsp;DELETE</button>
								</a>
							</td>
                        </tr>
                    </tbody>';
			}
			
			if( $movies == "" )
			{
				echo '<td>No result found.</td>';
			}
		}
	}

?>