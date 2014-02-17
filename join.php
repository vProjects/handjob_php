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
    	<div class="span8">
        	<h3 class="site_heading"> JOIN NOW By Credit Card!! Instant Access</h3>
        </div>
    </div>
    
    <div class="row-fluid">
    	<div class="span6 join_now">
        	    <form class="form-horizontal">
                	
                    <div class="control-group">
                    	<label class="control-label" for="inputEmail">Username</label>
                    	<div class="controls">
                    		<input type="text" id="inputEmail" placeholder="Username">
                    	</div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label" for="inputPassword">Password</label>
                    	<div class="controls">
                    		<input type="password" id="inputPassword" placeholder="Password">
                    	</div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label" for="inputEmail">Email</label>
                    	<div class="controls">
                    		<input type="text" id="inputEmail" placeholder="Email">
                    	</div>
                    </div>
                </form>
        </div>
        <div class="span6">
        
        </div>
    </div>
</div>
<!-- site description part ends here --->

<?php
	//include footer
	include ('v-templates/footer.php');
?> 