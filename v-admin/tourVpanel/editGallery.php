<?php
	//set the variables of the accordion and page title
	$page_title = "Edit Gallery" ;
	$accord_cat = "manage_media" ;
	
	include('v-templates/header.php');
	//include sidebar
	include('v-templates/sidebar.php');
	
	if( $GLOBALS["_GET"] > 0 )
	{ 
		//get the model id 
		$gallery_id = $GLOBALS["_GET"]["galleryId"];
		
		$gallery_details = $manageData->getValue_Where("gallery_info_tour","*","id",$gallery_id);
	}
	
	//intialize variable
	$members_gallery = '' ;
 	//check the gallery is linked or not
	if( !empty($gallery_details[0]['members_gallery']) || isset($gallery_details[0]['members_gallery']) )
	{
		$members_gallery = $manageData->getValue_Where("gallery_info","*","id",$gallery_details[0]['members_gallery']);
		$members_gallery = $members_gallery[0]['gallery_name'] ;
	}
?>
        <!--container for content of the website-->
        <div class="span9" id="content_container">
        	<blockquote>
                <p>Update Gallery Details </p>
                <small>
                	<cite title="Source Title">Update the gallery details of your website.</cite>
                </small>
            </blockquote>
            
            <div class="image_model" style="height:377px;width:250px;">
                <img src="../../images/gallery_thumb/<?php echo $gallery_details[0]['gallery_id'].".JPG"; ?>" style="height:377px;width:250px;"/>
            </div>
            
            <div class="form-horizontal">
                <form action="v-includes/functions/function.editGalleryThumb.php" method="post" enctype="multipart/form-data">
                	<div class="form-control v-form">
                        <label class="control-label">Upload Image</label>
                        <input style="margin-left: 20px;" type="file" name="gallery_thumb" >
                    	<input type="hidden" name="gallery_id" value="<?php echo $gallery_details[0]['gallery_id']; ?>" />
                        <input type="hidden" name="id" value="<?php echo $gallery_id; ?>" />
                		<input type="submit" value="Update Thumb" class="btn btn-medium btn-warning" />
                	</div>
                </form>
            </div>
            
            <div class="form-horizontal">
            	<div class="edit_date">Date:<?php echo $gallery_details[0]['date']; ?></div>
                <form action="v-includes/functions/function.editGallery.php" method="post">
                	<div class="form-control v-form">
                        <label class="control-label">Gallery Name</label>
                        <input class="textbox1" type="text" name="gallery_name" placeholder="Gallery Name" value="<?php echo $gallery_details[0]["gallery_name"]; ?>">
                    </div>
                    <div class="form-control v-form">
                        <label class="control-label">Description</label>
                        <textarea type="text" placeholder="Description" class="textbox1" name="description"><?php echo $gallery_details[0]["description"]; ?></textarea>
                    </div>
                    <div class="form-control v-form">
                        <label class="control-label">Members Gallery</label>
                        <input type="text" class="textbox1" readonly="readonly" value="<?php echo $members_gallery; ?>"/>
                    </div>
                    <div class="form-control v-form">
                        <label class="control-label"  style="color:#fff;">Members Gallery</label>
                        <?php
							//get the select box with members gallery
							$manageData->getMembersGallery() ;
						?>
                    </div>
                    <div class="form-control v-form">
                        <label class="control-label">Date</label>
                        <input type="text" placeholder="Date" class="textbox1" name="date" id="datepicker" />
                    </div>
                    <div class="form-control v-form">
                        <label class="control-label">Model</label>
                        <input type="text" class="textbox1" readonly="readonly" value="<?php echo $gallery_details[0]['model']; ?>"/>
                    </div>
                    <div class="form-control v-form">
                        <label class="control-label" style="color:#fff;">Category</label>
                        <select class="selectbox1" style="height:150px;" multiple="multiple" name="model[]">
                            <?php 
								//get the list of the model categories
								$manageData->getModelNames();
							?>
                        </select>
                    </div>
                    <div class="form-control v-form">
                	<label class="control-label">Category</label>
                    <input type="text" class="textbox1" readonly="readonly" value="<?php echo $gallery_details[0]['category']; ?>"/>
                </div>
                <div class="form-control v-form">
                	<label class="control-label" style="color:#fff;">Category</label>
                    <select class="selectbox1" style="height:150px;" multiple="multiple" name="category[]">
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
                <div class="form-control v-form">
                    <label class="control-label">Status</label>
                    <select class="selectbox1" name="status">
                        <option <?php if($gallery_details[0]['status'] == 1){ echo 'selected="selected"';} ?> value="online">Online</option>
                        <option <?php if($gallery_details[0]['status'] == 0){ echo 'selected="selected"';} ?> value="offline">Offline</option>
                    </select>
                </div>
                    <div class="function_result"><?php if(isset($_SESSION['result'])){echo $_SESSION['result'];unset($_SESSION['result']);} ?></div>
                    <input type="hidden" name="type" value="gallery" />
                    <input type="hidden" name="id" value="<?php echo $gallery_id; ?>" />
                	<input type="submit" value="Update Gallery" class="btn btn-large btn-warning btn_l" />
                </form>
            </div>
            
        </div>
    	
        
    </div><!--body main container ends here-->
    
<?php
	//get footer
	include('v-templates/footer.php');
?>