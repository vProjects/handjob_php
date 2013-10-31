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
			$filenames = scandir("../members/gallery/".$galleryId);
			$filenames = array_slice($filenames,2);
			foreach($filenames as $filename)
			{
				if(!empty($filename))
				{
					if(!is_dir("../members/gallery/".$galleryId."/".$filename))
					{
						echo '<div class="span3 gallery_img">
								<a href="../members/gallery/'.$galleryId.'/'.$filename.'" target="_blank">
									<img src="../members/gallery/'.$galleryId.'/'.$filename.'" />
								</a>
							</div>';
					}
				}
			}
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
			echo '<p class="green_text">Schedule Time for the process:'."8:00".'</p>';
		}
		
		function getCategoryList($tableName)
		{
			$categorys = $this->manageContent->getValue($tableName);
			foreach($categorys as $category)
			{
				echo '<th>'.'</th>';
                echo '<th>'.'</th>';
			}
	}

?>