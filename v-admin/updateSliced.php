<?php
	include('v-templates/header.php');
	//include sidebar
	include('v-templates/sidebar.php');
?>
        <!--container for content of the website-->
        <div class="span9" id="content_container">
        	<blockquote>
                <p>Create Gallery from a Images</p>
                <small>
                	<cite title="Source Title">Gallery builder for your website.</cite>
                </small>
            </blockquote>
            <div class="form-horizontal">
                <form action="#" method="post">
                	<div class="form-control v-form">
                        <label class="control-label">Gallery Name</label>
                        <input class="textbox1" type="text" name="gallery_name" placeholder="Gallery Name">
                    </div>
                    <div class="form-control v-form">
                        <label class="control-label">Folder Name</label>
                        <select class="selectbox1" name="foldername">
                        	<option value="">Select one</option>
                            <?php
								//get the names of the folders
								$manageData->getFolders();
							?>
                        </select>
                    </div>
                    <div class="form-control v-form">
                        <label class="control-label">Model</label>
                        <select class="selectbox1" multiple="multiple" name="model[]">
                            <?php 
								//get the list of the model categories
								$manageData->getModelNames();
							?>
                        </select>
                    </div>
                    <div class="form-control v-form">
                        <label class="control-label">Category</label>
                        <select class="selectbox1" multiple="multiple" name="category[]">
                            <?php 
								echo '<option value="">--------------------------------Movie Category--------------------------------</option>';
								//get the list of the movie categories
								$manageData->getCategoryListSelectBox("movie_category");
								echo '<option value="">--------------------------------Model Category--------------------------------</option>';
								//get the list of the model categories
								$manageData->getCategoryListSelectBox("model_category");
							?>
                        </select>
                    </div>
                    <div class="function_result"><?php if(isset($_SESSION['result'])){echo $_SESSION['result'];unset($_SESSION['result']);} ?></div>
                	<input type="submit" value="Create Gallery" class="btn btn-large btn-warning btn_l" />
                </form>
            </div>
            <!--create a gallery if galleryId is set-->
            <div class="row">
                <div class="span12 gallery1">
                <?php
                    if(!empty($GLOBALS['_GET']['movieId']) && !empty($GLOBALS['_GET']['galleryId']))
                    {
						echo '<h2>Your Gallery(Gallery ID:'.$GLOBALS['_GET']['movieId'].')</h2>';
                        //get the gallery id which contains the folder name of gallery images
                        $movieId = $GLOBALS['_GET']['movieId'];
						$galleryId = $GLOBALS['_GET']['galleryId'];
						$manageData->updateSlicedMovies($galleryId,$movieId);
                    }
                    
                ?>
                </div>
            </div><!--gallery div ends here-->
        </div>
    	
    </div><!--body main container ends here-->
    
<?php
	//get footer
	include('v-templates/footer.php');
?>