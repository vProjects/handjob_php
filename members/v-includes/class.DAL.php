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
		
		
	}
?>