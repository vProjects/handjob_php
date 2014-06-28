<?php
	$pageTitle = "Change Password";
	include('v-templates/header.php');
	//include sidebar
	include('v-templates/sidebar.php');

?>
        
        <!--container for content of the website-->
        <div class="span9" id="content_container">
        	<blockquote>
                <p>Chang Password</p>
                <small>
                	<cite title="Source Title">Change admin password of your website.</cite>
                </small>
            </blockquote>
            <!--form for adding the model-->
            <div class="form-horizontal">
            	<div class="form-control v-form">
                	<label class="control-label">Username</label>
                    <input type="text" placeholder="Username" class="textbox1"/>
                </div>
                <div class="form-control v-form">
                	<label class="control-label">Password</label>
                    <input type="text" placeholder="Password" class="textbox1"/>
                </div>
                <div class="form-control v-form">
                	<label class="control-label">Retype-Pssword</label>
                    <input type="text" placeholder="Retype-Pssword" class="textbox1"/>
                </div>
                <div class="form-control v-form">
                	<input type="submit" value="Submit" class="btn btn-large btn-primary btn1" />
                </div>
            </div><!--form ends here-->
        </div>
    	
    </div><!--body main container ends here-->
    
<?php
	//get footer
	include('v-templates/footer.php');
?>