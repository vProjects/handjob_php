<?php
	//include the connection class
	include('class.database.php');
	
	class manageContent_DAL
	{
		private $link;
		
		//variable to store the date 
		private $presentDate;
		
		//construct function
		function __construct()
		{
			$db_Connection = new dbConnection();
			$this->link = $db_Connection->connect();
			return $this->link;
		}
		
		/*
		- function to get the value
		- auth Singh
		*/
		function getValue($table_name,$value)
		{
			$query = $this->link->query("SELECT $value from $table_name");
			$query->execute();
			$rowcount = $query->rowCount();
			if($rowcount > 0){
				$result = $query->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}
			else{
				return $rowcount;
			}
		}
		
		/*
		- function to get the sorted value
		- auth Singh
		*/
		function getValue_latest($table_name,$value,$sortBy)
		{
			$query = $this->link->query("SELECT $value from $table_name pet ORDER BY `$sortBy` DESC");
			$query->execute();
			$rowcount = $query->rowCount();
			if($rowcount > 0){
				$result = $query->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}
			else{
				return $rowcount;
			}
		}
		
		/*
		- method for inserting the article/blog
		- auth Singh
		*/
		function insertArticle($aHeading, $aAuthor, $aDesc,$date)
		{
			$query = $this->link->prepare("INSERT INTO `article_info`(`article_title`, `article_author`, `article_description` , `article_date`) VALUES (?,?,?,?)");
			$values = array($aHeading,$aAuthor,$aDesc,$date);
			$query->execute($values);
		}
		
		/*
		- method for updating the values using where clause
		- auth Singh
		*/
		function updateValueWhere($table_name,$update_column,$update_value,$column_name,$column_value)
		{
			$query = $this->link->prepare("UPDATE `admin_info` SET `$update_column`= '$update_value' WHERE `$column_name` = '$column_value'");
			$query->execute();
			$count = $query->rowCount();
			return $count;
		}
		
		/*
		- method for getting the values using where clause
		- auth Singh
		*/
		function getValueWhere($table_name,$value,$row_value,$value_entered)
		{
			$query = $this->link->query("SELECT $value from $table_name where $row_value='$value_entered'");
			$query->execute();
			$rowcount = $query->rowCount();
			if($rowcount > 0){
				$result = $query->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}
			else{
				return $rowcount;
			}
		}
		
		/*
		- method for inserting the model details
		- auth Singh
		*/
		function insertModel($name,$description,$age,$height,$weight,$category,$image,$date,$view,$rating,$status)
		{
			$query = $this->link->prepare("INSERT INTO `model_info`(`name`, `description`, `age`, `height`, `weight`, `category`, `image_thumb`, `date`, `views`, `rating`, `status`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
			$values = array($name,$description,$age,$height,$weight,$category,$image,$date,$view,$rating,$status);
			$query->execute($values);
			return $query->rowCount();
		}
		
		/*
		- method to insert the value for cron file video conversion
		- Auth Singh
		*/
		function insertCronGallery($inputVideo,$outputVidPath,$outFilename,$model,$category,$vidFormat_1,$vidFormat_2,$vidFormat_3,$resolution_l,$resolution_m,$resolution_s,$inputFile_snap,$no_snapshot,$snapOut_path,$snap_out_filename,$snap_h,$snap_w,$cron_status)
		{
			$query = $this->link->prepare("INSERT INTO `cron_gallery`(`input_video`, `outVid_path`, `out_filename`, `model`, `category`, `vid_format_1`, `vid_format_2`, `vid_format_3`, `resolution_l`, `resolution_m`, `resolution_s`, `snap_input`, `no_snapshot`, `out_snap_path`, `out_snap_filename`, `snap_h`, `snap_w`, `cron_status`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
			$values = array($inputVideo,$outputVidPath,$outFilename,$model,$category,$vidFormat_1,$vidFormat_2,$vidFormat_3,$resolution_l,$resolution_m,$resolution_s,$inputFile_snap,$no_snapshot,$snapOut_path,$snap_out_filename,$snap_h,$snap_w,$cron_status);
			$query->execute($values);
			return $query->rowCount();
		}
		
		/*
		- method to insert the value for cron file
		- Auth Singh
		*/
		function insertCronSilce($outputFilename,$model,$category,$inputPath,$outputPath,$videoDuration,$no_slices,$outputFormat,$resolutionLarge,$resolutionMedium,$resolutionSmall,$status)
		{
			$query = $this->link->prepare("INSERT INTO `cron_slice`(`vid_name`, `model`, `category`, `input_path`, `output_path`, `vid_duration`, `no_slice`, `output_format`,`resolution_l`, `resolution_m`, `resolution_s`, `status`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
			$values = array($outputFilename,$model,$category,$inputPath,$outputPath,$videoDuration,$no_slices,$outputFormat,$resolutionLarge,$resolutionMedium,$resolutionSmall,$status);
			$query->execute($values);
			return $query->rowCount();
		}
		
		/*
		- method to insert the value for slice_info table
		- Auth Singh
		*/
		function insertSilcedInfo($gallery_id,$path,$model,$category,$date,$view,$rating)
		{
			$query = $this->link->prepare("INSERT INTO `sliced_vids`( `gallery_id`, `path`, `model`, `category`, `date`, `view`, `rating`) VALUES (?,?,?,?,?,?,?)");
			$values = array($gallery_id,$path,$model,$category,$date,$view,$rating);
			$query->execute($values);
			return $query->rowCount();
		}
		
		/*
		- method to insert into gallery_info table
		- Auth Singh
		*/
		function insertGalleryInfo($galleryId,$gallery_name,$path,$category,$model,$date,$view,$rating,$status)
		{
			$query = $this->link->prepare("INSERT INTO `gallery_info`(`gallery_id`,`gallery_name`,`path`, `category`, `model`, `date`,  `view`, `rating`,`status`) VALUES (?,?,?,?,?,?,?,?,?)");
			$values = array($galleryId,$gallery_name,$path,$category,$model,$date,$view,$rating,$status);
			$query->execute($values);
			return $query->rowCount();
		}
		
		/*
		- method to insert into movie_info table
		- Auth Singh
		*/
		function insertMovieInfo($galleryId,$category,$model,$path,$vid_format_1,$vid_format_2,$vid_format_3,$duration,$date,$status)
		{
			$query = $this->link->prepare("INSERT INTO `movie_info`(`gallery_id`, `category`, `model`, `path`, `vid_format_1`, `vid_format_2`, `vid_format_3`, `duration`, `date`, `status`) VALUES (?,?,?,?,?,?,?,?,?,?)");
			$values = array($galleryId,$category,$model,$path,$vid_format_1,$vid_format_2,$vid_format_3,$duration,$date,$status);
			$query->execute($values);
			return $query->rowCount();
		}
		
		/*
		- method to delete the values 
		- Auth Singh
		*/
		function deleteValue($table_name,$column_name,$column_value)
		{
			$queryString = "DELETE FROM $table_name WHERE $column_name =$column_value";
			$query = $this->link->prepare($queryString);
			$query->execute();
			$count = $query->rowCount();
			return $count;
		}
		
		/*
		- method to insert category
		- Auth Singh
		*/
		function insertCategory($tableName,$category,$date,$view,$rating)
		{
			$query = $this->link->prepare("INSERT INTO $tableName( `category`, `date`, `view`, `rating`) VALUES (?,?,?,?)");
			$values = array($category,$date,$view,$rating);
			$query->execute($values);
			return $query->rowCount();
		}
	}

?>