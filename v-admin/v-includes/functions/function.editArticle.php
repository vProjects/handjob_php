<?php
	session_start();
	include('../library/library.DAL.php');
	//create an object of DAL object
	$manageData = new manageContent_DAL();
	
	$table_name = "article_info" ;
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$article_author = $_POST['article_author'];
		$article_title = $_POST['article_title'];
		$article_description = $_POST['article_description'];
		$access = $_POST['access'];
		
		$date = $_POST['date'];
		$id = $_POST['id'];
	}
	
	//update the date
	if( isset($date) && !empty($date))
	{
		$result = $manageData->updateValueWhere($table_name,"article_date",$date,"id",$id);
		if( $result == 1 )
		{
			$_SESSION['result'] = "Update Successful." ;
		}
	}
	
		
	//update the author
	if( isset($article_author) && !empty($article_author))
	{
		$result = $manageData->updateValueWhere($table_name,"article_author",$article_author,"id",$id);
		if( $result == 1 )
		{
			$_SESSION['result'] = "Update Successful." ;
		}
	}
	
	//update the title
	if( isset($article_title) && !empty($article_title))
	{
		$result = $manageData->updateValueWhere($table_name,"article_title",$article_title,"id",$id);
		if( $result == 1 )
		{
			$_SESSION['result'] = "Update Successful." ;
		}
	}
	
	//update the description
	if( isset($article_description) && !empty($article_description))
	{
		$result = $manageData->updateValueWhere($table_name,"article_description",$article_description,"id",$id);
		if( $result == 1 )
		{
			$_SESSION['result'] = "Update Successful." ;
		}
	}
	
	//update the access
	if( isset($access) && !empty($access))
	{
		$result = $manageData->updateValueWhere($table_name,"access",$access,"id",$id);
		if( $result == 1 )
		{
			$_SESSION['result'] = "Update Successful." ;
		}
	}
	
	
	header('Location: ../../editArticle.php?id='.$id);
?>