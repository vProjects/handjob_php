<?php
	//set the variables of the accordion and page title
	$page_title = "Tour Content" ;
	$accord_cat = "content" ;
	
	include('v-templates/header.php');
	//include sidebar
	include('v-templates/sidebar.php');
	
	//fetch the contents
	$about_handjob = $manageData->getValue_Where("content_tour","content","topic","about_handjob");
	$movie_update = $manageData->getValue_Where("content_tour","content","topic","movie_update");
	$model_update = $manageData->getValue_Where("content_tour","content","topic","model_update");
	$members_fav = $manageData->getValue_Where("content_tour","content","topic","members_fav");
	$photo_update = $manageData->getValue_Where("content_tour","content","topic","photo_update");
?>
        <!--container for content of the website-->
        <div class="span9" id="content_container">
        	<blockquote>
                <p>Manage tour home content</p>
                <small>
                	<cite title="Source Title">Manage content of your website.</cite>
                </small>
            </blockquote>
            
            <div class="form-horizontal">
                <form action="v-includes/functions/function.manageConentHome.php" method="post">
                    <div class="form-control v-form">
                        <label class="control-label">About Tour</label>
                        <textarea type="text" class="textbox1" name="about_handjob"><?php echo $about_handjob[0]["content"]; ?></textarea>
                    </div>
                    <div class="form-control v-form">
                        <label class="control-label">Movie Update</label>
                        <input type="text" class="textbox1" value="<?php echo $movie_update[0]["content"]; ?>" name="movie_update" />
                    </div>
                   <div class="form-control v-form">
                        <label class="control-label">Photo Update</label>
                        <input type="text" class="textbox1" value="<?php echo $photo_update[0]["content"]; ?>"  name="gallery_update" />
                    </div>
                    <div class="form-control v-form">
                        <label class="control-label">Model Update</label>
                        <input type="text" class="textbox1" value="<?php echo $model_update[0]["content"]; ?>" name="model_update" />
                    </div>
                    <div class="form-control v-form">
                        <label class="control-label">Members Favorite</label>
                        <input type="text" class="textbox1" value="<?php echo $members_fav[0]["content"]; ?>"  name="members_fav" />
                    </div>
                    <div class="function_result"><?php if(isset($_SESSION['result'])){echo $_SESSION['result'];unset($_SESSION['result']);} ?></div>
                	<input type="submit" value="Update" class="btn btn-large btn-warning btn_l" />
                </form>
            </div>
            
        </div>
    	
        
    </div><!--body main container ends here-->
    
<?php
	//get footer
	include('v-templates/footer.php');
?>