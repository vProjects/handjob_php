<?php
	//set the variables of the accordion and page title
	$page_title = "Add Movie Category" ;
	$accord_cat = "manage_category" ;
	
	include('v-templates/header.php');
	//include sidebar
	include('v-templates/sidebar.php');
?>

        
        <!--container for content of the website-->
        <div class="span9" id="content_container">
        	<blockquote>
                <p>Add a Movie Category</p>
                <small>
                	<cite title="Source Title">Please add a movie category to your website.</cite>
                </small>
            </blockquote>
            <!--form for adding the model-->
            <div class="form-horizontal">
            <form action="v-includes/functions/function.addCategory.php" method="post" enctype="multipart/form-data">
            	<div class="form-control v-form">
                	<label class="control-label">Movie Category</label>
                    <input type="text" placeholder="Movie Category" class="textbox1" name="category_name"/>
                </div>
                <div class="form-control v-form">
                <div class="function_result"><?php if(isset($_SESSION['result'])){echo $_SESSION['result'];unset($_SESSION['result']);} ?></div>
                	<input type="hidden" value="movie_category" name="page" />
                	<input type="submit" value="Add Category" class="btn btn-large btn-primary btn1" />
                </div>
            </form>
            </div><!--form ends here-->
        </div>
    	
    </div><!--body main container ends here-->
    
<?php
	//get footer
	include('v-templates/footer.php');
?>