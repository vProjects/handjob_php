<?php
	$page_title = 'Webmaster';
	//get header
	include ('v-templates/header.php');

	//get the horizontal navbar
	include ('v-templates/navbar.php');
	
?>

<!-- site description part starts here --->
<div class="container">
	
	<?php
		//include the model searchBar
		include('v-templates/modelSearchBar.php') ;
	?>
	<div class="row-fluid">
    	<div class="span12">
        	<p>All Exclusive Hand Job content, High Res Images and HD videos. Real girls from around the world, watch real couples giving Hand jobs...! Downloadable Zip files Updated weekly. Start Browsing some of our episodes and join the HandJobStop.com family today.</p>
        </div>
    </div>
	    
	<div class="row-fluid">
    	<div class="span8">
        	<h3 class="site_heading red_text">Webmasters</h3>
        </div>
    </div>
    
    <div class="row-fluid">
    	<div class="span12 join_now">
        	<legend class="red_text bottom_border_grey">Earn 50% of all Signups & Rebills!</legend>
        	<p>Our webmaster program is ran through CCBILL. Its a 50/50 program, which means you earn 50% of all initial signups and 50% of all rebills for as long as a customer is a member! Click below to signup!</p>
        </div>
    </div>
    
    <div class="row-fluid webmaster_contact_row">
    	<div class="span8 offset2 join_now">
        	    <form class="form-horizontal" method="post" action="https://affiliateadmin.ccbill.com/signup.cgi">
                <legend class="red_text bottom_border_grey">Check your status.</legend>
                <div class="control-group">
                    <label class="control-label-v" for="inputEmail">Current Id</label>
                    <div class="controls-v">
                        <input type="text" name="EID" placeholder="Current Id" style="width: 70%;">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label-v" for="inputEmail">Username</label>
                    <div class="controls-v">
                        <input type="text" name="username" placeholder="Username" style="width: 70%;">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label-v" for="inputPassword">Password</label>
                    <div class="controls-v">
                        <input type="password" name="password" placeholder="Password" style="width: 70%;">
                    </div>
                </div>
                
                <div class="row-fluid">
			    	<div class="span12" style="text-align: center;">
                        <input type="hidden" name="CA" value="909492-0000">
                        <input type="hidden" name="GR" value="">
                        <input type="hidden" name="page_background" value="">
                        <input type="hidden" name="page_bgcolor" value="#FFFFFF">
                        <input type="hidden" name="page_text" value="#000000">
                        <input type="hidden" name="page_link" value="blue">
                        <input type="hidden" name="page_vlink" value="purple">
                        <input type="hidden" name="page_alink" value="blue">
                        <input type="hidden" name="table_left" value="#AEAEFF">
                        <input type="hidden" name="table_right" value="#FEFFC1">
                        <input type="hidden" name="table_text" value="#000000">
                        <input type="hidden" name="star_color" value="#CC0000">
			        	<input type="submit" class="btn btn-danger btn-large join-now-btn" value="Check">
			        </div>
			    </div>
                </form>
                
                <div class="row-fluid">
			    	<div class="span12" style="text-align: center;">
			        	<a href="https://affiliateadmin.ccbill.com/signup.cgi?CA=909492-0000&
			page_bgcolor=#FFFFFF&page_text=#000000&page_link=blue&page_vlink=purple&page_alink=blue&table_left=#AEAEFF&table_right=#FEFFC1&table_text=#000000&star_color=#CC0000"><input type="button" class="btn btn-danger btn-large join-now-btn"  value="Click here to Create New Account now" /></a>
			        </div>
			    </div>
        </div>
    </div>
    
    
    
    <div class="row-fluid">
    	<div class="span12 join_now">
        	<p style="text-align:center;">Below is the URL you will send traffic to. Replace the "<span class="red_text">XXXXXX</span>" with the account number CCBILL provides you when you signed up. Please note that this is one continuous URL. Use this linking code on any banner, graphic, or text link you wish.<br/><br/>http://refer.ccbill.com/cgi-bin/clicks.cgi?CA=909492-0013&PA=<span class="red_text">XXXXXX</span>&HTML=http://www.handjobstop.com/tour2/index.php? <br/><br/>Pick what you need to promote. If you need more pictures or video clips for your promo pages please contact me I'll be glad to help you. <a href="mailto:webmaster@handjobstop.com">webmaster@handjobstop.com</a><br/><br/>
</p>
        </div>
    </div>
    <!-- members favourite portion starts here ---->
    <div class="row-fluid photo_update">
        <div class="span12">
            <h3 class="site_heading memfav"> Members Favorite</h3>
            <div class="row-fluid photo_update_outline">
                <div class="pagination pagination-small pageno_nav pull-right">
                    <ul>
                        <li class="pageno_nav_viewall"><a class="btn-danger" href="join.php">Next </a></li>
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