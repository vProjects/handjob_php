<?php
	$pageTitle = "Create Blog";
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
	
	$article_detail = $manageData->getValue_Where("article_info","*","id",$article_id);
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
                    <label class="control-label">Model</label>
                    <select class="selectbox1" name="model">
                        <?php 
                            //get the list of the model categories
                            $manageData->getModelNames_a($article_detail[0]['model']);
                        ?>
                    </select>
                </div>
                <div class="form-control v-form">
                    <label class="control-label">Date</label>
                    <input type="text" placeholder="Date" class="textbox1" name="date" id="datepicker" />
                </div>
                <div class="form-control v-form">
                	<label class="control-label">Show in:</label>
                    <select class="selectbox1" name="access">
                    	<option <?php if($article_detail[0]['access'] == 3){ echo 'selected="selected"';} ?> value="3">Both</option>
                        <option <?php if($article_detail[0]['access'] == 2){ echo 'selected="selected"';} ?> value="2">Members</option>
                        <option <?php if($article_detail[0]['access'] == 1){ echo 'selected="selected"';} ?> value="1">Tour</option>
                    </select>
                </div>
                <div class="form-control v-form">
                	<label class="control-label">Blog Content</label><br><br>
                    <textarea type="text" id="editor1" placeholder="Content" class="textbox1" name="article_description"><?php echo $article_detail[0]['article_description']; ?></textarea>
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