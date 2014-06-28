<?php
	//include the connectoin class
	include('class.database.php');
	
	//DATA ACCESS LAYER
	class LIBRARY_DAL
	{
		public $link;
		
		//contructor function
		function __construct()
		{
			$db_connection = new dbConnection();
			//create connection and store it in the $link varriable
			$this->link = $db_connection->connect();
			//return the connection
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
		- function to get the value
		- till present date
		- auth Singh
		*/
		function getValue_current($table_name,$value)
		{
			$query = $this->link->query("SELECT $value from $table_name WHERE `date` <= CURDATE()");
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
		- function to get the value
		- auth Singh
		*/
		function getValue_limit($table_name,$value,$startPoint,$limit)
		{
			$query = $this->link->query("SELECT $value from $table_name LIMIT $startPoint,$limit");
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
		- function to get the value sorted
		- auth Singh
		*/
		function getValue_limit_sorted($table_name,$value,$sortBy,$startPoint,$limit)
		{
			if( $sortBy == "name" || $sortBy == "gallery_name" || $sortBy == "movie_name" )
			{
				$query = $this->link->query("SELECT $value from $table_name ORDER BY $sortBy ASC LIMIT $startPoint,$limit");
			}
			else
			{
				$query = $this->link->query("SELECT $value from $table_name ORDER BY $sortBy DESC LIMIT $startPoint,$limit");
			}
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
		- function to get the value sorted
		- and till present date ASC
		- auth Singh
		*/
		function getValue_limit_sorted_current($table_name,$value,$sortBy,$startPoint,$limit)
		{
			if( $sortBy == "name" || $sortBy == "model" || $sortBy == "movie_name" )
			{
				$query = $this->link->query("SELECT $value from $table_name WHERE (`date` <= CURDATE()) AND (`status` = 1) ORDER BY $sortBy ASC LIMIT $startPoint,$limit ");
			}
			else
			{
				$query = $this->link->query("SELECT $value from $table_name WHERE (`date` <= CURDATE()) AND (`status` = 1) ORDER BY $sortBy DESC LIMIT $startPoint,$limit");
			}
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
		- function to get the value sorted
		- and till present date DESC
		- auth Singh
		*/
		function getValue_limit_sorted_current_d($table_name,$value,$sortBy,$startPoint,$limit)
		{
			if( $sortBy == "name" || $sortBy == "model" || $sortBy == "movie_name" )
			{
				$query = $this->link->query("SELECT $value from $table_name WHERE (`date` <= CURDATE()) AND (`status` = 1) ORDER BY $sortBy DESC LIMIT $startPoint,$limit ");
			}
			else
			{
				$query = $this->link->query("SELECT $value from $table_name WHERE (`date` <= CURDATE()) AND (`status` = 1) ORDER BY $sortBy DESC LIMIT $startPoint,$limit");
			}
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
		- function to get the value sorted
		- and till present date for articles
		- auth Singh
		*/
		function getValue_limit_sorted_current_a($table_name,$value,$sortBy,$startPoint,$limit)
		{
			if( $sortBy == "name" || $sortBy == "gallery_name" || $sortBy == "movie_name" )
			{
				$query = $this->link->query("SELECT $value from $table_name WHERE `end_date` <= CURDATE() ORDER BY $sortBy ASC LIMIT $startPoint,$limit ");
			}
			else
			{
				$query = $this->link->query("SELECT $value from $table_name WHERE  (`end_date` <= CURDATE()) AND ((`access` = 2) OR (`access` = 3)) AND (`article_date` <= CURDATE()) ORDER BY $sortBy DESC LIMIT $startPoint,$limit");
			}
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
		- function to get the value sorted
		- auth Singh
		*/
		function getValue_limit_sorted_current_a_1($table_name,$value,$sortBy,$startPoint,$limit)
		{
			$query = $this->link->query("SELECT $value from $table_name WHERE `date` <= CURDATE() ORDER BY $sortBy ASC LIMIT $startPoint,$limit ");
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
		- function to get the value sorted
		- auth Singh
		*/
		function getValue_limit_sorted_current_d_1($table_name,$value,$sortBy,$startPoint,$limit)
		{
			$query = $this->link->query("SELECT $value from $table_name WHERE `date` <= CURDATE() ORDER BY $sortBy DESC LIMIT $startPoint,$limit ");
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
		- function to get the row count of a table
		- auth Singh
		*/
		function getTotalRows($table_name,$searchKeyword)
		{
			if( $table_name == "article_info")
			{
				$query = $this->link->query("SELECT count(*) from $table_name WHERE (`end_date` <= CURDATE()) AND ((`access` = 2) OR (`access` = 3))");
			}
			elseif( $table_name == "model_info")
			{
				$query = $this->link->query("SELECT count(*) from $table_name WHERE (`date` <= CURDATE()) AND (`name` LIKE '%$searchKeyword%')");
			}
			else
			{
				$query = $this->link->query("SELECT count(*) from $table_name WHERE (`date` <= CURDATE())");
			}
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
		- method for getting the values using where clause
		- auth Singh
		*/
		function getValueWhere_latest($table_name,$value,$row_value,$value_entered,$sortBy)
		{
			$query = $this->link->query("SELECT $value from $table_name where $row_value='$value_entered' ORDER BY $sortBy DESC");
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
		- method for getting the value for search model directory
		- Auth Singh
		*/
		function getSearchModelDirectory($table_name,$value,$row_value,$searchKeyword,$sortBy,$startPoint,$limit)
		{
			$query = $this->link->query("SELECT $value from $table_name where $row_value LIKE '$searchKeyword%' ORDER BY $sortBy DESC LIMIT $startPoint,$limit");
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
		- search by single keyword
		- Auth Singh
		*/
		function getSearchValue($table_name,$value,$row_value,$searchKeyword)
		{
			$sortBy = 'date' ;
			$query = $this->link->query("SELECT $value from $table_name where ($row_value LIKE '%$searchKeyword%') AND (`date` <= CURDATE()) ORDER BY $sortBy DESC");
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
		- increment the value by 1
		- basically used for getting views
		- Auth Singh
		*/
		function incrementByOne($table_name,$update_column,$column_name,$column_value)
		{
			$query = $this->link->prepare("UPDATE $table_name SET `$update_column`= (`$update_column`+1) WHERE `$column_name` = '$column_value'");
			$query->execute();
			$count = $query->rowCount();
			return $count;
		}
		
		/*
		- method for inserting the rating
		- auth Singh
		*/
		function insertRating($table_name,$member,$rating)
		{
			$query = $this->link->prepare("INSERT INTO `$table_name`( `unit_id`, `member_id`) VALUES (?,?)");
			$values = array($rating,$member);
			$query->execute($values);
		}
		
		
		/*
		- method for updating the values using where clause
		- auth Singh
		*/
		function updateValueWhere($table_name,$update_column,$update_value,$column_name,$column_value)
		{
			$query = $this->link->prepare("UPDATE `$table_name` SET `$update_column`= '$update_value' WHERE `$column_name` = '$column_value'");
			$query->execute();
			$count = $query->rowCount();
			return $count;
		}
		
		/*
		- method to enter the comments in the database
		- @table name is also variable so can be used for all comments
		- Auth Singh
		*/
		function insertComment($tableName,$id,$member,$comment,$page,$like,$dislike,$date)
		{		
			$query = $this->link->prepare("INSERT INTO `$tableName` ( `unit_id`, `member`, `comment`, `page`, `comment_like`, `comment_dislike`, `date`) VALUES (?,?,?,?,?,?,?)");
			$values = array($id,$member,$comment,$page,$like,$dislike,$date);
			$query->execute($values);
			$count = $query->rowCount();
			return $count;
		}
		
		/*
		- method to enter the like and dislike in the database
		- @table name is also variable so can be used for all comments
		- Auth Singh
		*/
		function insertLikes($tableName,$id,$member,$like_dislike)
		{		
			$query = $this->link->prepare("INSERT INTO `$tableName` (`unit_id`, `member_id`, `type`) VALUES (?,?,?)");
			$values = array($id,$member,$like_dislike);
			$query->execute($values);
			$count = $query->rowCount();
			return $count;
		}
		
		
		/*
		- function to get the value sorted
		- and till present date
		- auth Singh
		*/
		function getValue_limit_sorted_random($table_name,$value,$startPoint,$limit)
		{
			$query = $this->link->query("SELECT $value from $table_name WHERE (`date` <= CURDATE()) AND (`status` = 1) ORDER BY RAND() ASC LIMIT $startPoint,$limit ");
			
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
		- get total rows for the rating
		- the number of people voted for
		- Auth Singh
		*/
		function getTotalRows_vote($table_name,$entity_id)
		{
			$query = $this->link->query("SELECT count(*) from $table_name WHERE `unit_id` = '$entity_id'");
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
		- get all the comments for the application
		- Auth Singh
		*/
		function getAllComments()
		{
			$query = $this->link->query("(SELECT * FROM `movie_comment` ORDER BY `id` DESC LIMIT 0,25) UNION ALL (SELECT * FROM `model_comment` ORDER BY `id` DESC LIMIT 0,25) UNION ALL	(SELECT * FROM `gallery_comment` ORDER BY `id` DESC LIMIT 0,25) UNION ALL	(SELECT * FROM `article_comment` ORDER BY `id` DESC LIMIT 0,25)");
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
		- fuction get the advanced search for photos
		- Auth Singh
		*/
		function getAdvSearch($table_name,$where_coloumn,$keyword_with,$keyword_exact,$keyword_without,$cdate,$sortby,$startpoint,$limit)
		{
			if( !empty($keyword_without) && isset($keyword_without) )
			{
				if(!empty($keyword_exact) && isset($keyword_exact) && !empty($keyword_with) && isset($keyword_with))
				{
					$query = $this->link->query("SELECT * FROM `$table_name` WHERE ((`$where_coloumn` LIKE '%$keyword_with%') OR (`$where_coloumn` LIKE '$keyword_exact')) AND (`$where_coloumn` NOT LIKE '%$keyword_without%') AND (`date` > '$cdate') ORDER BY $sortby DESC LIMIT $startpoint,$limit");
				}
				else
				{
					//check for the keywords WILD CARDS
					if(!empty($keyword_with) && isset($keyword_with))
					{
						$query = $this->link->query("SELECT * FROM `$table_name` WHERE (`$where_coloumn` LIKE '%$keyword_with%') AND (`$where_coloumn` NOT LIKE '%$keyword_without%') AND (`date` > '$cdate') ORDER BY $sortby'DESC LIMIT $startpoint,$limit");
					}
					//result for only exact
					if(!empty($keyword_exact) && isset($keyword_exact))
					{
						$query = $this->link->query("SELECT * FROM `$table_name` WHERE (`$where_coloumn` LIKE '$keyword_exact') AND (`$where_coloumn` NOT LIKE '%$keyword_without%') AND (`date` > '$cdate') ORDER BY $sortby DESC LIMIT $startpoint,$limit");
					}
				}
			}
			else
			{
				if(!empty($keyword_exact) && isset($keyword_exact) && !empty($keyword_with) && isset($keyword_with))
				{
					$query = $this->link->query("SELECT * FROM `$table_name` WHERE (`$where_coloumn` LIKE '%$keyword_with%') OR (`$where_coloumn` LIKE '$keyword_exact') AND (`date` > '$cdate') ORDER BY $sortby DESC LIMIT $startpoint,$limit");
				}
				else
				{
					//check for the keywords WILD CARDS
					if(!empty($keyword_with) && isset($keyword_with))
					{
						$query = $this->link->query("SELECT * FROM `$table_name` WHERE (`$where_coloumn` LIKE '%$keyword_with%')  AND (`date` > '$cdate') ORDER BY $sortby DESC LIMIT $startpoint,$limit");
						//echo "SELECT * FROM `$table_name` WHERE (`$where_coloumn` LIKE '%$keyword_with%')  AND (`date` > '$cdate') ORDER BY $sortby DESC LIMIT $startpoint,$limit";
					}
					//result for only exact
					elseif(!empty($keyword_exact) && isset($keyword_exact))
					{
						$query = $this->link->query("SELECT * FROM `$table_name` WHERE (`$where_coloumn` LIKE '$keyword_exact')  AND (`date` > '$cdate') ORDER BY $sortby DESC LIMIT $startpoint,$limit");
					}
					else
					{
						$query = $this->link->query("SELECT * FROM `$table_name` WHERE (`date` > '$cdate') ORDER BY $sortby DESC LIMIT $startpoint,$limit");
					}
				}
			}
			
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
		- get the sorted category
		- Aut Singh
		*/
		function getSortedCategory($table_name,$value,$sortyby)
		{
			$query = $this->link->query("SELECT $value from $table_name ORDER BY $sortyby");
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
	}
?>