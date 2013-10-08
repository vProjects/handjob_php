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
                <form action="v-includes/functions/function.galleryFromImage.php" method="post">
                    <div class="form-control v-form">
                        <label class="control-label">Folder Name</label>
                        <input type="text" placeholder="" class="textbox1" name="foldername"/>
                    </div>
                    <div class="form-control v-form">
                        <label class="control-label">Model</label>
                        <input type="text" placeholder="" class="textbox1" name="model_name"/>
                    </div>
                    <div class="form-control v-form">
                        <label class="control-label">Category</label>
                        <input type="text" placeholder="" class="textbox1" name="category"/>
                    </div>
                    <div class="function_result"><?php if(isset($_SESSION['result'])){echo $_SESSION['result'];unset($_SESSION['result']);} ?></div>
                	<input type="submit" value="Create Gallery" class="btn btn-large btn-warning btn_l" />
                </form>
            </div>
            <!--create a gallery if galleryId is set-->
            <div class="row">
                <div class="span12 gallery1">
                <?php
                    if(!empty($GLOBALS['_GET']['galleryId']))
                    {
						echo '<h2>Your Gallery(Gallery ID:'.$GLOBALS['_GET']['galleryId'].')</h2>';
                        //get the gallery id which contains the folder name of gallery images
                        $galleryId = $GLOBALS['_GET']['galleryId'];
						$manageDate->getGallery($galleryId);
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