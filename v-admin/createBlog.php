<?php
	$pageTitle = "Create Blog";
	include('v-templates/header.php');
	//include sidebar
	include('v-templates/sidebar.php');

?>

        
        <!--container for content of the website-->
        <div class="span9" id="content_container">
        	<blockquote>
                <p>Create Blog</p>
                <small>
                	<cite title="Source Title">Post a blog in your website.</cite>
                </small>
            </blockquote>
            <!--form for adding the model-->
            <div class="form-horizontal">
            <form action="v-includes/functions/function.createArticle.php" method="post">
            	<div class="form-control v-form">
                	<label class="control-label">Author</label>
                    <input type="text" placeholder="Author" class="textbox1" name="article_author"/>
                </div>
                <div class="form-control v-form">
                	<label class="control-label">Title</label>
                    <input type="text" placeholder="Title" class="textbox1" name="article_title"/>
                </div>
                <div class="form-control v-form">
                	<label class="control-label">Blog Content</label>
                    <textarea type="text" placeholder="Content" class="textbox1" name="article_description"></textarea>
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