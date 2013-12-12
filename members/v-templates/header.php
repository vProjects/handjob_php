<?php
	session_start() ;
	//check whether the admin is loggein or not
	if( !isset($_SESSION["login_flag"]) && empty($_SESSION["login_flag"]) && $_SESSION["login_flag"] != "v_pass_@1234_members" )
	{
		//redirect to login page
		header('Location: ../tour.php');
	}
	include("v-includes/class.BLL.php");
	//object of the BLL class
	$manageData = new LIBRARY_BLL();
	$keyword = "";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if(isset($page_title)){echo 'HANDJOBSTOP | '.$page_title;}?></title>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
<script type="text/javascript">
	function showDetails(variable){
		document.getElementById(variable).style.display = "block";
		var mp = document.getElementById('mp');
		mp.onmouseout=function(){
			document.getElementById(variable).style.display = "none";
		
		};
	}
	
</script>
<!-- playing-movie page specific css and js -->

<!-- new video player scripts -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<code><script src="media_player/mediaelement-and-player.min.js"></script>
<link rel="stylesheet" href="media_player/mediaelementplayer.css" /></code>
<!-- new video player scripts -->

<!-- playing-movie page specific css and js ends here -->
</head>
<body>

<div class="container">
	<div id="header">
        <div class="row-fluid banner">
            <div class="span5 logo">
                <img src="images/home_logo.png" alt="logo" width="500">
            </div>  <!-- will contain the logo -->
            <div class="span4 offset3 pull-right" id="advanced_search">
                <form class="form-search pull-right">
                  <input type="text" class="input-medium search-query">
                  <button type="submit" class="btn btn-danger">Search</button>
                  <!-- Button to trigger modal -->
                  <a href="advance_search.php" class="popup_link">Advanced Search</a>
                </form>
            </div>  <!-- will contain the search bar -->	
        </div>
                    
                    
               