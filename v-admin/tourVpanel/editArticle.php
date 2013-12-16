<?php
	//set the variables of the accordion and page title
	$page_title = "List Blog" ;
	$accord_cat = "blog" ;
	
	include('v-templates/header.php');
	//include sidebar
	include('v-templates/sidebar.php');
	//get the article details accordingly
	$article_id = "";
	if( $GLOBALS["_GET"] > 0 )
	{ 
		//get the model id 
		$article_id = $GLOBALS["_GET"]["id"];
	}
	
	$article_detail = $manageData->getValue_Where("article_info_tour","*","id",$article_id);
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
            <div class="edit_date">Date:<?php echo $article_detail[0]['article_date']; ?></div>
            <form action="v-includes/functions/function.editArticle.php" method="post">
            	<div class="form-control v-form">
                	<label class="control-label">Author</label>
                    <input type="text" placeholder="Author" value="<?php echo $article_detail[0]['article_author']; ?>" class="textbox1" name="article_author"/>
                </div>
                <div class="form-control v-form">
                	<label class="control-label">Title</label>
                    <input type="text" placeholder="Title" value="<?php echo $article_detail[0]['article_title']; ?>" class="textbox1" name="article_title"/>
                </div>
                <div class="form-control v-form">
                    <label class="control-label">Date</label>
                    <input type="text" placeholder="Date" class="textbox1" name="date" id="datepicker" />
                </div>
                <div class="form-control v-form">
                	<label class="control-label">Blog Content</label>
                    <textarea type="text" placeholder="Content" class="textbox1" name="article_description"><?php echo $article_detail[0]['article_description']; ?></textarea>
                </div>
                <div class="form-control v-form">
                	<div class="function_result"><?php if(isset($_SESSION['result'])){echo $_SESSION['result'];unset($_SESSION['result']);} ?></div>
                    <input type="hidden" value="<?php echo $article_detail[0]['id'];?>" name="id"/>
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