<?php
	//set the variables of the accordion and page title
	$page_title = "Suggested Sites" ;
	$accord_cat = "content" ;
	include('v-templates/header.php');
	//include sidebar
	include('v-templates/sidebar.php');
?>

        
        <!--container for content of the website-->
        <div class="span9" id="content_container">
        	<blockquote>
                <p>Manage Suggested Sites</p>
                <small>
                	<cite title="Source Title">Manage Suggested Sites of your admin section.</cite>
                </small>
            </blockquote>
            <!--form for adding the model-->
            <div class="form-horizontal">
            <form action="v-includes/functions/function.suggestedSites.php" method="post">
            	<div class="form-inline v_inline_form">
                	<label class="control-label">Site 1</label>
                    <?php 
						//get the category selectbox
						$manageData->getFriendsSelect("link_1");
					?>
                </div>
                <div class="form-inline v_inline_form">
                	<label class="control-label">Site 2</label>
                    <?php 
						//get the category selectbox
						$manageData->getFriendsSelect("link_2");
					?>
                </div>
                <div class="form-inline v_inline_form">
                	<label class="control-label">Site 3</label>
                    <?php 
						//get the category selectbox
						$manageData->getFriendsSelect("link_3");
					?>
                </div>
                <div class="form-inline v_inline_form">
                	<label class="control-label">Site 4</label>
                    <?php 
						//get the category selectbox
						$manageData->getFriendsSelect("link_4");
					?>
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