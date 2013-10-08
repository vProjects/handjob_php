<?php
	include('v-templates/header.php');
	//include sidebar
	include('v-templates/sidebar.php');
?>
        <!--container for content of the website-->
        <div class="span9" id="content_container">
        	<blockquote>
                <p>Create Gallery from a video</p>
                <small>
                	<cite title="Source Title">Gallery builder for your website.</cite>
                </small>
            </blockquote>
            
            <div class="form-horizontal">
                <form action="v-includes/functions/function.galleryFromVideo.php" method="post">
                    <div class="form-control v-form">
                        <label class="control-label">Filename</label>
                        <select class="selectbox1" name="filename">
                    		<option value="">Select One</option>
                        	<?php
								$manageDate->getFiles("videos");
							?>
                        </select>
                    </div>
                    <div class="form-control v-form row">
                        <div class="form-control v-form1 span6">
                            <label class="control-label">Snapshot Width</label>
                            <input type="text" placeholder="" class="textbox2" name="vedio_w" value="3000"/>
                        </div>
                        <div class="form-control v-form1 span6">
                            <label class="control-label">Snapshot Height</label>
                            <input type="text" placeholder="" class="textbox2" name="vedio_h" value="2000"/>
                        </div>
                        <div class="form-control v-form1 span6">
                            <label class="control-label">Snapshots Required</label>
                            <input type="text" placeholder="" class="textbox2" name="no_snapshot"/>
                        </div>
                    </div>
                    <div class="form-control v-form">
                        <label class="control-label">Model</label>
                        <select class="selectbox1" multiple="multiple" name="model[]">
                            <option value="1">VALUE</option>
                            <option value="2">VALUE</option>
                            <option value="3">VALUE</option>
                            <option value="4">VALUE</option>
                            <option value="5">VALUE</option>
                            <option value="6">VALUE</option>
                        </select>
                    </div>
                    <div class="form-control v-form">
                        <label class="control-label">Category</label>
                        <select class="selectbox1" multiple="multiple" name="category[]">
                            <option value="1">VALUE</option>
                            <option value="2">VALUE</option>
                            <option value="3">VALUE</option>
                            <option value="4">VALUE</option>
                            <option value="5">VALUE</option>
                            <option value="6">VALUE</option>
                        </select>
                    </div>
                    <div class="form-control v-form row">
                        <div class="form-control v-form1 span6">
                            <label class="control-label">Large Vid Width</label>
                            <input type="text" placeholder="" class="textbox2" name="l_vedio_w" value="1920"/>
                        </div>
                        <div class="form-control v-form1 span6">
                            <label class="control-label">Large Vid Height</label>
                            <input type="text" placeholder="" class="textbox2" name="l_vedio_h" value="1080"/>
                        </div>
                    </div>
                    <div class="form-control v-form row">
                        <div class="form-control v-form1 span6">
                            <label class="control-label">Medium Vid Width</label>
                            <input type="text" placeholder="" class="textbox2" name="m_vedio_w" value="1280"/>
                        </div>
                        <div class="form-control v-form1 span6">
                            <label class="control-label">Medium Vid Height</label>
                            <input type="text" placeholder="" class="textbox2" name="m_vedio_h" value="720"/>
                        </div>
                    </div>
                    <div class="form-control v-form row">
                        <div class="form-control v-form1 span6">
                            <label class="control-label">Small Vid Width</label>
                            <input type="text" placeholder="" class="textbox2" name="s_vedio_w" value="568"/>
                        </div>
                        <div class="form-control v-form1 span6">
                            <label class="control-label">Small Vid Height</label>
                            <input type="text" placeholder="" class="textbox2" name="s_vedio_h" value="320"/>
                        </div>
                    </div>
                    <div class="form-control v-form">
                        <label class="control-label">No. of Slicing</label>
                        <input type="text" placeholder="Measurement" class="textbox1" name="no_slicing"/>
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