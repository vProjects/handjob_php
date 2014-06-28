<?php
	$pageTitle = "Add Model Category";
	include('v-templates/header.php');
	//include sidebar
	include('v-templates/sidebar.php');
	if($GLOBALS["_GET"] > 0)
	{
		$type = $GLOBALS["_GET"]["type"];
		$id = $GLOBALS["_GET"]["id"];
		
		//get the value from the category table for the respective value
		$category = $manageData->getValue_Where($type,"*","id",$id);
	}
?>

        
        <!--container for content of the website-->
        <div class="span9" id="content_container">
        	<blockquote>
                <p>Edit Category</p>
                <small>
                	<cite title="Source Title">Please edit a category to your website.</cite>
                </small>
            </blockquote>
            <!--form for adding the model-->
            <div class="form-horizontal">
            <form action="v-includes/functions/function.editCategory.php" method="post" enctype="multipart/form-data">
            	<div class="form-control v-form">
                	<label class="control-label">Category</label>
                    <input type="text" placeholder="Category" value="<?php print_r($category[0]["category"]); ?>" class="textbox1" name="category_name"/>
                </div>
                <div class="form-control v-form">
                <div class="function_result"><?php if(isset($_SESSION['result'])){echo $_SESSION['result'];unset($_SESSION['result']);} ?></div>
                	<input type="hidden" value="<?php echo $type; ?>" name="type" />
                    <input type="hidden" value="<?php echo $id; ?>" name="id" />
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