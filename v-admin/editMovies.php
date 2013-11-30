<?php
	include('v-templates/header.php');
	//include sidebar
	include('v-templates/sidebar.php');
	if( $GLOBALS["_GET"] > 0 )
	{ 
		//get the model id 
		$movie_id = $GLOBALS["_GET"]["movieId"];
		//type whether sliced or movie
		$type = $GLOBALS["_GET"]["type"] ;
	}
	if( $type == "movie" )
	{
		$movie_details = $manageData->getValue_Where("movie_info","*","id",$movie_id);
	}
	elseif( $type == "sliced" )
	{
		$movie_details = $manageData->getValue_Where("sliced_vids","*","id",$movie_id);
	}
?>
        <!--container for content of the website-->
        <div class="span9" id="content_container">
        	<blockquote>
                <p>Edit Video Details</p>
                <small>
                	<cite title="Source Title">Edit Video Details for your website.</cite>
                </small>
            </blockquote>
            
        	<div class="image_model" style="width:317px;height:178px;">
                <img src="../members/images/movie_thumb/<?php echo $movie_details[0]['gallery_id'].".JPG"; ?>" style="height:178px;width:317px;"/>
            </div>
            
            <div class="form-horizontal">
                <form action="#" method="post">
                	<div class="form-control v-form">
                        <label class="control-label">Upload Image</label>
                        <input style="margin-left: 20px;" type="file" name="movie_thumb" >
                   	
                        <input type="hidden" name="type" value="<?php echo $type; ?>" />
                    	<input type="hidden" name="id" value="<?php echo $movie_id; ?>" />
                		<input type="submit" value="Update Thumb" class="btn btn-medium btn-warning" />
                	</div>
                </form>
            </div>
            
            <div class="form-horizontal">
                <form action="v-includes/functions/function.editMovies.php" method="post">
                	<div class="form-control v-form">
                        <label class="control-label">Movie Name</label>
                        <input class="textbox1" type="text" name="movie_name" placeholder="Movie Name" value="<?php echo $movie_details[0]["movie_name"]; ?>">
                    </div>
                    <div class="form-control v-form">
                        <label class="control-label">Description</label>
                        <textarea type="text" placeholder="Description" class="textbox1" name="description"><?php echo $movie_details[0]["description"]; ?></textarea>
                    </div>
                    <div class="form-control v-form">
                        <label class="control-label">Date</label>
                        <input type="text" placeholder="Date" class="textbox1" name="date" id="datepicker"/>
                    </div>
                    <div class="form-control v-form">
                        <label class="control-label">Model</label>
                        <input type="text" class="textbox1" readonly="readonly" value="<?php echo $movie_details[0]['model']; ?>"/>
                    </div>
                    <div class="form-control v-form">
                        <label class="control-label" style="color:#fff;">Category</label>
                        <select class="selectbox1" multiple="multiple" name="model[]">
                            <?php 
								//get the list of the model categories
								$manageData->getModelNames();
							?>
                        </select>
                    </div>
                    <div class="form-control v-form">
                	<label class="control-label">Category</label>
                    <input type="text" class="textbox1" readonly="readonly" value="<?php echo $movie_details[0]['category']; ?>"/>
                </div>
                <div class="form-control v-form">
                	<label class="control-label" style="color:#fff;">Category</label>
                    <select class="selectbox1" multiple="multiple" name="category[]">
                    	<?php 
								echo '<option value="">-------Movie Category------</option>';
								//get the list of the movie categories
								$manageData->getCategoryListSelectBox("movie_category");
								echo '<option value="">-------Model Category------</option>';
								//get the list of the model categories
								$manageData->getCategoryListSelectBox("model_category");
							?>
                    </select>
                </div>
                    <div class="function_result"><?php if(isset($_SESSION['result'])){echo $_SESSION['result'];unset($_SESSION['result']);} ?></div>
                    <input type="hidden" name="type" value="<?php echo $type; ?>" />
                    <input type="hidden" name="id" value="<?php echo $movie_id; ?>" />
                	<input type="submit" value="Update Movies" class="btn btn-large btn-warning btn_l" />
                </form>
            </div>
            
        </div>
    	
        
    </div><!--body main container ends here-->
    
<?php
	//get footer
	include('v-templates/footer.php');
?>