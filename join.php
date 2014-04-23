<?php
	session_start();
	$page_title = 'Join Now';
	//get header
	include ('v-templates/header.php');

	//get the horizontal navbar
	include ('v-templates/navbar.php');
	
	//include slider section
	include 'v-templates/slider.php';
?>

<!-- site description part starts here --->
<div class="container">
	
	<div class="row-fluid">
    	<div class="span8">
        	<h3 class="site_heading red_text">100% SAFE & SECURE</h3>
        </div>
    </div>
    
    <div class="row-fluid">
    	<div class="span12 join_now">
        	<div class="row-fluid">
            	<div class="span6">
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
                    </form>
                </div>
                
                
                <form action='signup.php' method="post">
                <div class="span6">
                    <div class="control-group">
                        <legend class="red_text bottom_border_grey">Choose your option.</legend>
                        <div class="controls plans">
                            <input type="radio" name="plan" class="join_element" style="margin:-2px 0 0 0;" value="0000000163:840">
                            <strong>$24.99(USD)</strong> for 30 days then $24.99(USD) recurring every 30 days
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls plans">
                            <input type="radio" name="plan" class="join_element" style="margin:-2px 0 0 0;" value="0000000419:840">
                            <strong>$59.99(USD)</strong> for 90 days then $59.99(USD) recurring every 90 days
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls plans">
                            <input type="radio" name="plan" class="join_element" style="margin:-2px 0 0 0;" value="0000000420:840">
                            <strong>$99.99(USD)</strong> for 180 days (non-recurring)
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls plans">
                            <input type="radio" name="plan" class="join_element" style="margin:-2px 0 0 0;" value="0000000150:840">
                            <strong>$39.99(USD)</strong> for 30 days (non-recurring)
                        </div>
                        <p style="color:#F00;margin-top:5px"><?php if(isset($_SESSION['result'])){echo $_SESSION['result'];unset($_SESSION['result']);} ?></p>
                    </div>
                    <div class="control-group">
                        <div class="controls" style="text-align:center;">
                            <input type="submit" class="btn btn-danger btn-large join-now-btn-1 border_radius" value="Join Now">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
    
    <div class="row">
    	<div class="span6 join_form_big_btn">
            <h4 class="site_heading">CUSTOMER SERVICES</h4>
        	<FORM ACTION="https://support.ccbill.com" >
              <INPUT TYPE="submit"  VALUE="   I Forgot My Password / Customer Support   " class="btn btn-danger btn-large border_radius">
            </FORM>
        </div>
    	<div class="span6 join_form_big_btn">
            <h4 class="site_heading">MEMBERS</h4>
        	<FORM ACTION="http://handjobstop.com/members/" >
              <INPUT TYPE="submit"  VALUE="    Already a member?  Click Here.    " class="btn btn-danger btn-large border_radius">
            </FORM>
        </div>
        
    </div>
    
    <h3 class="site_heading">Site Features</h3>
    <div class="row-fluid">
    	<div class="span12 join_now">
        	<div class="row row_v_1">
            	<div class="span2 join_now_inner">
                	<img src="images/icon_1.png" alt="features" class="lazy img_update"/>
                    <div class="feature_text">SAFE & SECURE</div>
                </div>
                <div class="span2 join_now_inner">
                	<img src="images/icon_2.png" alt="features" class="lazy img_update"/>
                    <div class="feature_text">MOBILE ENABLED</div>
                </div>
                <div class="span2 join_now_inner">
                	<img src="images/icon_3.png" alt="features" class="lazy img_update"/>
                    <div class="feature_text">DAILY UPDATES</div>
                </div>
                <div class="span2 join_now_inner">
                	<img src="images/icon_4.png" alt="features" class="lazy img_update"/>
                    <div class="feature_text">EXCLUSIVE SCENES</div>
                </div>
                <div class="span2 join_now_inner">
                	<img src="images/icon_5.png" alt="features" class="lazy img_update"/>
                    <div class="feature_text">HIGH RESOLUTION</div>
                </div>
                <div class="span2 join_now_inner">
                	<img src="images/icon_6.png" alt="features" class="lazy img_update"/>
                    <div class="feature_text">FULL HD</div>
                </div>
            </div>
        </div>
    </div>
    
    
    <!-- members favourite portion starts here ---->
    <div class="row-fluid photo_update">
        <div class="span12">
            <h3 class="site_heading memfav"> Members Favorite</h3>
            <div class="row-fluid photo_update_outline">
                <div class="pagination pagination-small pageno_nav pull-right">
                    <ul>
                        <li class="pageno_nav_viewall"><a class="btn-danger" href="join.php">Next</a></li>
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