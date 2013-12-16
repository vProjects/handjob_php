<?php
	//set the variables of the accordion and page title
	$page_title = "Add Video" ;
	$accord_cat = "manage_media" ;
	
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
                        <label class="control-label">Gallery Name</label>
                        <input class="textbox1" type="text" name="gallery_name" placeholder="Gallery Name">
                    </div>
                    <div class="form-control v-form">
                        <label class="control-label">Description</label>
                        <textarea type="text" placeholder="Description" class="textbox1" name="description"></textarea>
                    </div>
                    <div class="form-control v-form">
                        <label class="control-label">Date</label>
                        <input type="text" placeholder="Date" class="textbox1" name="date" id="datepicker" />
                    </div>
                    <div class="form-control v-form">
                        <label class="control-label">Filename</label>
                        <select class="selectbox1" name="filename">
                    		<option value="">Select One</option>
                        	<?php
								$manageData->getFiles("videos");
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
                        <select class="selectbox1" style="height:150px;" multiple="multiple" name="model[]">
                            <?php 
								//get the list of the model categories
								$manageData->getModelNames();
							?>
                        </select>
                    </div>
                    <div class="form-control v-form">
                        <label class="control-label">Category</label>
                        <select class="selectbox1" style="height:150px;" multiple="multiple" name="category[]">
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
            
        </div>
    	
        
    </div><!--body main container ends here-->
    
<?php
	//get footer
	include('v-templates/footer.php');
?>