<?php
	//set the variables of the accordion and page title
	$page_title = "Change Password" ;
	$accord_cat = "admin" ;
	
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
            <form action="v-includes/functions/function.changePassword.php" method="post">
            	<div class="form-control v-form">
                	<label class="control-label">Old Password</label>
                    <input type="text" name="old_password" placeholder="Old Password" class="textbox1"/>
                </div>
                <div class="form-control v-form">
                	<label class="control-label">New Password</label>
                    <input type="text" name="password" placeholder="Password" class="textbox1"/>
                </div>
                <div class="form-control v-form">
                	<label class="control-label">Retype-Pssword</label>
                    <input type="text" name="retype_password" placeholder="Retype-Pssword" class="textbox1"/>
                </div>
                <div class="function_result"><?php if(isset($_SESSION['result'])){echo $_SESSION['result'];unset($_SESSION['result']);} ?></div>
                <div class="form-control v-form">
                	<input type="submit" value="Submit" class="btn btn-large btn-primary btn1" />
                </div>
            </form>
            </div><!--form ends here-->
        </div>
    	
    </div><!--body main container ends here-->
    
<?php
	//get footer
	include('v-templates/footer.php');
?>