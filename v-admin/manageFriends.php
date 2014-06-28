<?php
	//set the variables of the accordion and page title
	$page_title = "Manage Friends" ;
	$accord_cat = "content" ;
	
	include('v-templates/header.php');
	//include sidebar
	include('v-templates/sidebar.php');
?>

        <!--container for content of the website-->
        <div class="span9" id="content_container">
        	<blockquote>
                <p>Add a Friend</p>
                <small>
                	<cite title="Source Title">Please add a friend to your website.</cite>
                </small>
            </blockquote>
            <!--form for adding the model-->
            <div class="form-horizontal">
            <form action="v-includes/functions/function.manageFrind.php" method="post" enctype="multipart/form-data">
            	<div class="form-control v-form">
                	<label class="control-label">Friend Name</label>
                    <input type="text" placeholder="Friend Name" class="textbox1" name="name"/>
                </div>
                <div class="form-control v-form">
                	<label class="control-label">Friend Link</label>
                    <input type="text" placeholder="Friend Link" class="textbox1" name="link"/>
                </div>
                <div class="form-control v-form">
                    <label class="control-label">Date</label>
                    <input type="text" placeholder="Date" class="textbox1" name="date" id="datepicker" />
                </div>
                <div class="form-control v-form">
                	<label class="control-label">Show in:</label>
                    <select class="selectbox1" name="access_friends">
                    	<option value="3">Both</option>
                        <option value="2">Members</option>
                        <option value="1">Tour</option>
                    </select>
                </div>
               <div class="form-control v-form">
                	<label class="control-label">Upload Photo</label>
                    <input type="file" class="textbox1" name="photo"/>
                </div>
                <div class="form-control v-form">
                <div class="function_result"><?php if(isset($_SESSION['result'])){echo $_SESSION['result'];unset($_SESSION['result']);} ?></div>
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