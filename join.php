<?php
	$page_title = 'Join Now';
	//get header
	include ('v-templates/header.php');

	//get the horizontal navbar
	include ('v-templates/navbar.php');
	
?>

<!-- site description part starts here --->
<div class="container">
	<div class="row-fluid">
    	<div class="span12">
        	<p>All Exclusive Hand Job content, High Res Images and HD videos. Real girls from around the world, watch real couples giving Hand jobs...! Downloadable Zip files Updated weekly. Start Browsing some of our episodes and join the HandJobStop.com family today.</p>
        </div>
    </div>
	
    <div class="row-fluid">
    	<div class="span12 join_now">
        	<p class="red_text">EXCLUSIVE HAND JOBS CONTENT. WMV VIDEO. MP4 VIDEO. FLV-STREAMING. FULL HD VIDEOS. HIGH RES IMAGES. CUSTOM ZIP FILES. UPDATES DAILY. NO DOWNLOAD LIMITATIONS. </p>
        </div>
    </div>
    
    <div class="row-fluid">
    	<div class="span10 offset1 join_now">
        	<img src="images/join.jpg"/>
        </div>
    </div>
    
	<div class="row-fluid">
    	<div class="span8">
        	<h3 class="site_heading red_text"> JOIN NOW By Credit Card!! Instant Access</h3>
        </div>
    </div>
    
    <div class="row-fluid">
    	<div class="span6 join_now">
        	    <form class="form-horizontal">
                <legend class="red_text bottom_border_grey">Fill up the form.</legend>
                <div class="control-group">
                    <label class="control-label-v" for="inputEmail">Username</label>
                    <div class="controls-v">
                        <input type="text" placeholder="Username">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label-v" for="inputPassword">Password</label>
                    <div class="controls-v">
                        <input type="password" placeholder="Password">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label-v" for="inputEmail">Email</label>
                    <div class="controls-v">
                        <input type="text" placeholder="Email">
                    </div>
                </div>
        </div>
        <div class="span6 join_now">
        	<div class="control-group">
            	<legend class="red_text bottom_border_grey">Choose your option.</legend>
                <div class="controls">
                    <input type="radio" name="plan" class="join_element" style="margin:-2px 0 0 0;">
                	$24.99(USD) for 30 days then $24.99(USD) recurring every 30 days
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <input type="radio" name="plan" class="join_element" style="margin:-2px 0 0 0;">
                	$59.99(USD) for 90 days then $59.99(USD) recurring every 90 days
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <input type="radio" name="plan" class="join_element" style="margin:-2px 0 0 0;">
                	$99.99(USD) for 180 days (non-recurring)
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <input type="radio" name="plan" class="join_element" style="margin:-2px 0 0 0;">
                	$39.99(USD) for 30 days (non-recurring)
                </div>
            </div>
        </div>
    </div>
    <div class="row-fluid">
    	<div class="control-group">
            <div class="controls">
                <input type="submit" class="btn btn-danger btn-large join-now-btn" value="Join Now">
                <a href="#"><h4>Forgot Password ? Click Here</h4></a>
                <a href="#"><h4 class="red_text">Already a member ? Click here to Login</h4></a>
            </div>
        </div>
        </form>
    </div>
    <!-- members favourite portion starts here ---->
    <div class="row-fluid photo_update">
        <div class="span12">
            <h3 class="site_heading"> Members Favorite</h3>
            <div class="row-fluid photo_update_outline">
                <div class="pagination pagination-small pageno_nav pull-right">
                    <ul>
                        <li class="pageno_nav_viewall"><a class="btn-danger" href="join.php">Next &gt;</a></li>
                    </ul>
                </div>
            </div>
            <?php
                //generate an alternate number for the members favorite
                $alternate = rand(1,2) ;
                if( $alternate%2 == 0 ) 
                {
                    //get the random members favourite movie
                    $manageData->membersFavourite(0,9,'movie') ;			
                }
                else
                {
                    //get the random members favourite photos
                    $manageData->membersFavourite(0,8,'photo') ;
                }
            ?>
            
            <!--- photo row3 ends here --->
            
        </div>
     </div>   
     <!-- members favourite portion ends here ---->
</div>
<!-- site description part ends here --->

<?php
	//include footer
	include ('v-templates/footer.php');
?> 