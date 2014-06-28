<?php
	$pageTitle = "Change Password";
	include('v-templates/header.php');
	//include sidebar
	include('v-templates/sidebar.php');
?>

        
        <!--container for content of the website-->
        <div class="span9" id="content_container">
        	<blockquote>
                <p>Manage Quick Links</p>
                <small>
                	<cite title="Source Title">Manage Quick Links of your admin section.</cite>
                </small>
            </blockquote>
            <!--form for adding the model-->
            <div class="form-horizontal">
            <form action="v-includes/functions/function.addQuickLinks.php" method="post">
            	<div class="form-inline v_inline_form">
                	<label class="control-label">Link 1</label>
                    <?php 
						//get the category selectbox
						$manageData->getSelectCategory("link_1");
					?>
                </div>
                <div class="form-inline v_inline_form">
                	<label class="control-label">Link 2</label>
                    <?php 
						//get the category selectbox
						$manageData->getSelectCategory("link_2");
					?>
                </div>
                <div class="form-inline v_inline_form">
                	<label class="control-label">Link 3</label>
                    <?php 
						//get the category selectbox
						$manageData->getSelectCategory("link_3");
					?>
                </div>
                <div class="form-inline v_inline_form">
                	<label class="control-label">Link 4</label>
                    <?php 
						//get the category selectbox
						$manageData->getSelectCategory("link_4");
					?>
                </div>
                <div class="form-inline v_inline_form">
                	<label class="control-label">Link 5</label>
                    <?php 
						//get the category selectbox
						$manageData->getSelectCategory("link_5");
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