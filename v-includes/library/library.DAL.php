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
		- function to get the value sorted
		- and till present date for articles
		- auth Singh
		*/
		function getValue_limit_sorted_current_a($table_name,$value,$sortBy,$startPoint,$limit)
		{
			$query = $this->link->query("SELECT $value from $table_name WHERE `article_date` <= CURDATE() ORDER BY $sortBy DESC LIMIT $startPoint,$limit ");
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
		- and till present date
		- auth Singh
		*/
		function getValue_limit_sorted_current($table_name,$value,$sortBy,$startPoint,$limit)
		{
			if( $sortBy == "name" || $sortBy == "gallery_name" || $sortBy == "movie_name" || $sortBy == 'model' )
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
		- and till present date
		- auth Singh
		*/
		function getValue_where_sorted_current($table_name,$value,$where_column,$value_where,$sortBy)
		{
			$query = $this->link->query("SELECT $value from $table_name WHERE (`date` <= CURDATE()) AND (`status` = 1) AND (`$where_column`  LIKE '%$value_where%') ORDER BY $sortBy DESC ");
				
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
		- search by single keyword
		- Auth Singh
		*/
		function getSearchValue($table_name,$value,$row_value,$searchKeyword)
		{
			$query = $this->link->query("SELECT $value from $table_name where $row_value LIKE '%$searchKeyword%'");
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
		- function to get the row count of a table
		- auth Singh
		*/
		function getTotalRows($table_name,$searchKeyword)
		{
			if( $table_name == "article_info")
			{
				$query = $this->link->query("SELECT count(*) from $table_name WHERE (`end_date` <= CURDATE()) AND ((`access` = 1) OR (`access` = 3))");
			}
			elseif( $table_name == "model_info")
			{
				$query = $this->link->query("SELECT count(*) from $table_name WHERE (`date` <= CURDATE()) AND (`name` LIKE '$searchKeyword%')");
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
		
	}

?>