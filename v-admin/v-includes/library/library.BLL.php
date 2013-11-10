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
                            <td><button class=" btn btn-danger" type="button">
								<span class=" icon-trash"></span>&nbsp;&nbsp;DELETE</button>
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
								<a href="../members/gallery/'.$galleryId.'/'.$filename.'" target="_blank">
									<img src="../members/gallery/'.$galleryId.'/s/'.$filename.'" />
								</a>
								<label class="radio radio_v">
									<input type="hidden" value="'.$galleryId.'" name="gallery_id"/>
									<input type="radio" value="'.$filename.'" name="thumb_image"/>
									Make this Gallery Thumbnail
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
		- function to get all the models
		- auth Singh
		*/
		function getModelList()
		{
			$models = $this->manageContent->getValue('model_info','*');
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
                            <td><button class="btn btn-warning" type="button">
								<span class="icon-pencil"></span>&nbsp;&nbsp;EDIT</button>
							</td>
                            <td><button class=" btn btn-danger" type="button">
								<span class=" icon-trash"></span>&nbsp;&nbsp;DELETE</button>
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
		function getGalleryList()
		{
			$gallerys = $this->manageContent->getValue('gallery_info','*');
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
                            <td><button class="btn btn-warning" type="button">
								<span class="icon-pencil"></span>&nbsp;&nbsp;EDIT</button>
							</td>
                            <td><button class=" btn btn-danger" type="button">
								<span class=" icon-trash"></span>&nbsp;&nbsp;DELETE</button>
							</td>
                        </tr>
                    </tbody>';
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
			print_r($folderNames);
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
			$categorys = $this->manageContent->getValue($tableName,"*");
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
			$modelNames = $this->manageContent->getValue("model_info","name");
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
		function getVideoList()
		{
			$movies = $this->manageContent->getValue('movie_info','*');
			foreach($movies as $movie)
			{
				echo '<tbody>
                        <tr>
							<td class="span1 model_thumb"><img src="../members/images/movie_thumb/'.$movie['gallery_id'].'.JPG"/></td>
                            <td><a href="galleryFromImage.php?galleryId='.$movie['gallery_id'].'">'.$movie['gallery_id'].'</a></td>
							<td>'.$movie['movie_name'].'</td>
							<td>'.$movie['model'].'</td>
							<td>'.$movie['category'].'</td>
                            <td>'.$movie['date'].'</td>
                            <td><button class="btn btn-warning" type="button">
								<span class="icon-pencil"></span>&nbsp;&nbsp;EDIT</button>
							</td>
                            <td><button class=" btn btn-danger" type="button">
								<span class=" icon-trash"></span>&nbsp;&nbsp;DELETE</button>
							</td>
                        </tr>
                    </tbody>';
			}
		}
		
		/*
		- get the list of the sliced vids and create UI
		- using the sliced_vids table
		- Auth Singh
		*/
		function getSlicedVideoList()
		{
			$slicedMovies = $this->manageContent->getValue('sliced_vids','*');
			foreach($slicedMovies as $slicedMovie)
			{
				echo '<tbody>
                        <tr>
							<td class="span1 model_thumb"><img src="../members/images/movie_thumb/'.$slicedMovie['gallery_id'].'.JPG"/></td>
                            <td><a href="galleryFromImage.php?galleryId='.$slicedMovie['gallery_id'].'">'.$slicedMovie['gallery_id'].'</a></td>
							<td>'.$slicedMovie['movie_name'].'</td>
							<td>'.$slicedMovie['model'].'</td>
							<td>'.$slicedMovie['category'].'</td>
                            <td>'.$slicedMovie['date'].'</td>
                            <td><button class="btn btn-warning" type="button">
								<span class="icon-pencil"></span>&nbsp;&nbsp;EDIT</button>
							</td>
                            <td><button class=" btn btn-danger" type="button">
								<span class=" icon-trash"></span>&nbsp;&nbsp;DELETE</button>
							</td>
                        </tr>
                    </tbody>';
			}
		}
		
	}

?>