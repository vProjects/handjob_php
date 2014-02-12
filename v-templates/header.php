<?php
	//include the BLL
	include('v-includes/library/library.BLL.php');
	//create an object of BLL to manage Data
	$manageData = new LIBRARY_BLL() ;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Handjobstop| <?php echo $page_title;?></title>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="assets/js/responsiveslides.min.js"></script>
 <script>
    $(function () {

      // Slideshow 1
      $(".rslides").responsiveSlides({
        speed: 1000,
        maxwidth: 100%
      });

    });
  </script>
  
	<!-- playing-movie page specific css and js -->
	
	<!-- new video player scripts -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<!-- new video player scripts -->
		<script src="build/jquery.js"></script>	
		<script src="build/mediaelement-and-player.min.js"></script>
		<script src="build/testforfiles.js"></script>	
		<link rel="stylesheet" href="build/mediaelementplayer.min.css" />
	    <link rel="stylesheet" href="build/mejs-skins.css" />
	<!-- new video player scripts -->
	
	<!-- new video player scripts -->
	
	<!-- playing-movie page specific css and js ends here -->

</head>

<body>
<!--- header starts here ---->
<div class="header">
	<!-- header top part starts here ---->
    <div class="row-fluid">
        <div class="span6 logo">
            <img src="images/home_logo.png" alt="logo" />
        </div>
        <div class="span4 offset2" id="login_section">
            <h5 class="site_heading">Member's Login</h5>
            <form class="form-inline" action="v-includes/function/function.login.php" method="post">
              <input type="text" class="input-small login_textbox" placeholder="Username" name="u_name">
              <input type="password" class="input-small login_textbox" placeholder="Password" name="u_pass">
              <button type="submit" class="btn btn-danger">Log In</button>
            </form>
        </div>
    </div>
    <!-- header top part ends here ---->
