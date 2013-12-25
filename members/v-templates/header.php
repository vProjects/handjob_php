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
<!-- new video player scripts -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <!-- Include jQuery and jQuery UI -->
    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

    <!-- Many more themes to chose from... go to http://jqueryui.com/themeroller! -->
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/dark-hive/jquery-ui.css">
    
    <script type="text/javascript" src="bin/minplayer.compressed.js"></script>

    <!-- Include the template CSS and JS files. -->
    <link rel="stylesheet" href="templates/default/css/minplayer_default.css">
    <script type="text/javascript" src="templates/default/js/minplayer.playLoader.default.js"></script>
    <script type="text/javascript" src="templates/default/js/minplayer.controller.default.js"></script>
    <script type="text/javascript" src="templates/default/js/minplayer.default.js"></script>
    
    <script type="text/javascript">
        $(function() {
        $("#h264").minplayer({
          width: '50%',
          height: 'auto'
        });
       });
    </script>
<!-- new video player scripts -->

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
                  <div class="row-fluid">
                	<div class="span6 username">
                    	<?php 
							//get the username from the login session variable
							echo 'Hello! <a href="#">'.$_SESSION["user"].'</a>' ;
						?>
                    </div>
                  </div>
                </form> 
            </div>  <!-- will contain the search bar -->	
        </div>
                    
                    
               