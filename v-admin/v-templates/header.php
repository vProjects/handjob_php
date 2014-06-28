<?php
	session_start();
	//check whether the admin is loggein or not
	if( !isset($_SESSION["login_flag"]) && empty($_SESSION["login_flag"]) && $_SESSION["login_flag"] != "v_pass_@1234" )
	{
		//redirect to login page
		header('Location: index.php');
	}
	include('v-includes/library/library.BLL.php');
	//create an object to access the methods of the BLL layer
	$manageData =  new manageContent_BLL();
	
	$vpanel_area = "MEMBERS" ;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--Import Bootstrap CSS-->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<!--Custom CSS file-->
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<link href="css/jquery.Jcrop.min.css" type="text/css" rel="stylesheet" />
<title>VPANEL | <?php if(isset($page_title) && !empty($page_title)){ echo $page_title; }?></title>
<script type="text/javascript">
	function reloadPage(folderName)
	{
		window.location = 'cropUploadImage.php?folderName='+folderName ;
	}
</script>
<script src="ckeditor/ckeditor.js"></script>

</head>

<body>
	
    
    <!--body main container starts here-->
    <div id="main_container">
    	<!--header starts here-->
        <div class="container" id="wrap">
            <div class="row v_row">
                <div class="span12 nav-header nav_header">
                    <div class="span2">
                        <h3>VPanel</h3>
                    </div>
                    <div class="span2">
                        <h5 style="color:#F00;">Members</h5>
                    </div>
                    <div class="span9">
                        <div class="navbar-inner">
                            <div class="nav-collapse collapse navbar-responsive-collapse">
                                <ul class="nav nav_v">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Model<b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="addModel.php">Add Model</a></li>
                                            <li><a href="listModels.php">List Model</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Photos<b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="galleryFromImage.php">Add New Photos</a></li>
                                            <li><a href="listGallery.php">List Gallery</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Videos<b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="uploadVideo.php">Add New Video</a></li>
                                            <li><a href="listVideo.php">List Video</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog<b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="createBlog.php">Add Blog</a></li>
                                            <li><a href="listBlog.php">List Blog</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hello Admin<b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="tourVpanel/admin.php"><span class="icon-globe"></span>&nbsp;&nbsp;Tour VPANEL</a></li>
                                            <li><a href="admin.php"><span class="icon-globe"></span>&nbsp;&nbsp;MEMBERS VAPNEL</a></li>
                                            <li><a href="#"><span class="icon-globe"></span>&nbsp;&nbsp;My Site</a></li>
                                            <li><a href="#"><span class="icon-wrench"></span>&nbsp;&nbsp;Manage</a></li>
                                            <li><a href="admin.php"><span class="icon-wrench"></span>&nbsp;&nbsp;Processes</a></li>
                                            <li><a href="logout.php"><span class="icon-off"></span>&nbsp;&nbsp;Logout</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div><!-- /.nav-collapse -->
                        </div><!-- /navbar-inner -->	
                    </div>
                    
                    <!--dropdown for admin-->
                    <div class="span2 admin-btn">
                    	<!-- Single button -->
                        <?php
							$manageData->quickNav();
						?>
                    </div><!--dropdown for admin ends here-->
                </div>
            </div>
        </div><!--header ends here-->