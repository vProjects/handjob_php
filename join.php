<?php
	$page_title = 'Join Now';
	//get header
	include ('v-templates/header.php');

	//get the horizontal navbar
	include ('v-templates/navbar.php');
	
?>

<!-- site description part starts here --->
<div class="container">
	
    <h3 class="site_heading">Site Features</h3>
    <div class="row-fluid">
    	<div class="span12 join_now">
        	<div class="row row_v_1">
            	<div class="span2 join_now_inner">
                	<img src="images/icon_1.png" alt="features" class="lazy img_update"/>
                    <div class="feature_text">SAFE AND SECURE WEBSITE</div>
                </div>
                <div class="span2 join_now_inner">
                	<img src="images/icon_2.png" alt="features" class="lazy img_update"/>
                    <div class="feature_text">MOBILE ENABLED WEBSITE</div>
                </div>
                <div class="span2 join_now_inner">
                	<img src="images/icon_3.png" alt="features" class="lazy img_update"/>
                    <div class="feature_text">UPDATES 15 TIMES PER MONTH</div>
                </div>
                <div class="span2 join_now_inner">
                	<img src="images/icon_4.png" alt="features" class="lazy img_update"/>
                    <div class="feature_text">EXCLUSIVE BEHIND THE SCENES</div>
                </div>
                <div class="span2 join_now_inner">
                	<img src="images/icon_5.png" alt="features" class="lazy img_update"/>
                    <div class="feature_text">UP TO 24 MEGAPIXEL EROTIC</div>
                </div>
                <div class="span2 join_now_inner">
                	<img src="images/icon_6.png" alt="features" class="lazy img_update"/>
                    <div class="feature_text">ULTRA FAST DELIVERY NETWORK</div>
                </div>
            </div>
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
                </div>
                <div class="span6">
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
                    <div class="control-group">
                        <div class="controls" style="text-align:center;">
                            <input type="submit" class="btn btn-primary btn-large join-now-btn-1" value="Join Now">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
    
    <div class="row">
    	<div class="span12 join_form_big_btn">
            <h3 class="site_heading">CUSTOMER SERVICES</h3>
        	<FORM ACTION="https://support.ccbill.com" >
              <INPUT TYPE="submit"  VALUE="   I Forgot My Password / Customer Support   " class="btn btn-primary btn-large join-now-btn-1" style="min-width:60%;">
            </FORM>
        </div>
    </div>
    
    <div class="row">
    	<div class="span12 join_form_big_btn">
            <h3 class="site_heading">MEMBERS</h3>
        	<FORM ACTION="http://handjobstop.com/members/" >
              <INPUT TYPE="submit"  VALUE="    Already a member?  Click Here.    " class="btn btn-primary btn-large join-now-btn-1" style="min-width:60%;">
            </FORM>
        </div>
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