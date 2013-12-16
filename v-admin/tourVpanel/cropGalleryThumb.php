<?php
	$pageTitle = "Add Model";
	include('v-templates/header.php');
	//include sidebar
	include('v-templates/sidebar.php');
	
	$folderName = "" ;
	$filename = "" ;
	$save_status = "";
	
	if( $GLOBALS["_GET"] > 0 )
	{ 
		//get the save status 
		$save_status = $GLOBALS["_GET"]["save"];
		$filename = $GLOBALS["_GET"]["filename"];
		$id = $GLOBALS["_GET"]["id"];
	}
?>

        <!--container for content of the website-->
        <div class="span9" id="content_container">
        	<blockquote>
                <p>Edit a Gallery Thumb</p>
                <small>
                	<cite title="Source Title">Edit model to your website.</cite>
                </small>
            </blockquote>
            <div class="crop_container" style="width:90%;background:none;height:100%;">
            <?php 
				//if the save get is not set the create the page for croping
				if( $save_status == "false" ){
			?>
                <div class="image_model_1" style="max-width:500px;" id="image_box">
                    <img src="../../temp/thumbs/<?php echo $filename ;?>" id="cropbox"/>
                     
                </div>
                <form action="v-includes/functions/function.cropGalleryThumb.php" method="post" class="form_image_crop">
                	<input type="hidden" name="filename" value="<?php echo $filename; ?>"/>
                    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                    <input type="hidden" name="Image_h" id="Image_h"/>
                    <input type="hidden" name="Image_w" id="Image_w"/>
                    <label>X1 <input type="text" size="4" id="x" name="x" /></label>
                    <label>Y1 <input type="text" size="4" id="y" name="y" /></label>
                    <label>X2 <input type="text" size="4" id="x2" name="x2" /></label>
                    <label>Y2 <input type="text" size="4" id="y2" name="y2" /></label>
                    <label>W <input type="text" size="4" id="w" name="w" style="margin:0 0 8px 4px;;"/></label>
                    <label>H <input type="text" size="4" id="h" name="h" style="margin: 0 0 4px 8px;;"/></label>
                    <input type="submit" value="Crop Image" style="float:right;"/>
                </form>
            <?php
				}
				//else create UI for saving the cropped image
				if( $save_status == "answer" ){
			?>
            	<div class="image_model" style="max-width:500px;height:100%;">
                    <img src="../../temp/thumbs/<?php echo $filename; ?>" style="max-width:500px;"/>
                    <a href="cropGalleryThumb.php?filename=<?php echo $filename; ?>&save=true&id=<?php echo $id; ?>" >
                        <button class="btn btn-warning" type="button" style="left: 10%;position: relative;">
                        <span class="icon-pencil"></span>&nbsp;&nbsp;SAVE MODEL IMAGE</button>
                    </a>
                </div>
            <?php
				}
				//if save status is true then save the image
				if( $save_status == "true")
				{
					$src = '../../temp/thumbs/'.$filename;
					$dst = "../../images/gallery_thumb/".$filename ;
					
					$img_r = imagecreatefromjpeg($src);
					
					if(file_exists($dst) && file_exists($src))
					{
						unlink($dst);
					}
					imagejpeg($img_r,$dst,100);
					unlink($src);	
					echo '<div class="image_model" style="max-width:500px;height:100%;">
                    		<img src="'.$dst.'" style="max-width:500px;"/>
						
							<a href="editGallery.php?galleryId='.$id.'" >
								<button class="btn btn-warning" type="button" style="left: 10%;position: relative;">
								<span class="icon-pencil"></span>&nbsp;&nbsp;&nbsp;&nbsp;RETURN TO MAIN</button>
							</a>
						</div>' ;
				}
			?>
        	</div>
        </div>
    	
    </div><!--body main container ends here-->
    
<?php
	//get footer
	include('v-templates/footer.php');
?>