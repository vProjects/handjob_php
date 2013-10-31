<?php
	session_start();
	include('../library/library.DAL.php');
	//create an object of DAL object
	$manageData = new manageContent_DAL();
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$article_author = $_POST['article_author'];
		$article_title = $_POST['article_title'];
		$article_description = $_POST['article_description'];
	}
	//get the present date for the article insertion
	$date = date('Y-m-d');
	if(isset($article_title) && !empty($article_title) && isset($article_description) && !empty($article_description))
	{
		$result = $manageData->insertArticle($article_title,$article_author,$article_description,$date);
		$_SESSION['result'] = "Update Successfully.";
	}
	else
	{
		$_SESSION['result'] = "Please fill the form properly.";
	}
	
	//header('Location: ../../createBlog.php');
?>