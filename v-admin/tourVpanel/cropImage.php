<?php
	$pageTitle = "Add Model";
	include('v-templates/header.php');
	//include sidebar
	include('v-templates/sidebar.php');
	
	$model_id = "";
	$save_status = "";
	$filename = "" ;
	if( $GLOBALS["_GET"] > 0 )
	{ 
		//get the save status 
		$save_status = $GLOBALS["_GET"]["save"];
		$filename = $GLOBALS["_GET"]["filename"];
		//get the model id 
		$model_id = $GLOBALS["_GET"]["modelId"];
	}
	if( isset($model_id) && !empty($model_id))
	{
		$model_detail = $manageData->getValue_Where("model_info","*","id",$model_id);
	}
?>
        <!--container for content of the website-->
        <div class="span9" id="content_container">
        	<blockquote>
                <p>Edit a Model</p>
                <small>
                	<cite title="Source Title">Edit model to your website.</cite>
                </small>
            </blockquote>
            <div class="crop_container">
            <?php 
				//if the save get is not set the create the page for croping
				if( $save_status == "false" ){
			?>
                <div class="image_model_1">
                    <img src="../members/images/model_thumb/<?php echo $model_detail[0]['image_thumb']; ?>" style="height:377px;width:250px;" id="cropbox"/>
                     
                </div>
                <form action="v-includes/functions/function.cropModel.php" method="post" class="form_image_crop">
                	<input type="hidden" name="filename" value="<?php echo $model_detail[0]['image_thumb']; ?>"/>
                    <input type="hidden" name="id" value="<?php echo $model_detail[0]['id']; ?>"/>
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
            	<div class="image_model">
                    <img src="../temp/<?php echo $filename; ?>" style="height:377px;width:250px;"/>
                    <a href="cropImage.php?filename=<?php echo $filename; ?>&save=true&modelId=<?php echo $model_id; ?>" >
                        <button class="btn btn-warning" type="button" style="margin:4px 28px;">
                        <span class="icon-pencil"></span>&nbsp;&nbsp;SAVE MODEL IMAGE</button>
                    </a>
                </div>
            <?php
				}
				//if save status is true then save the image
				if( $save_status == "true")
				{
					$src = '../temp/'.$filename;
					$dst = "../members/images/model_thumb/".$filename ;
					move_uploaded_file( $src , $dst );
					$img_r = imagecreatefromjpeg($src);
					if(file_exists($dst) && file_exists($src))
					{
						unlink($dst);
					}
					imagejpeg($img_r,"../members/images/model_thumb/".$filename,100);
					unlink("../temp/".$filename);	
					echo '<div class="image_model">
                    		<img src="'.$dst.'" style="height:377px;width:250px;"/>
						
							<a href="editModel.php?modelId='.$model_id.'" >
								<button class="btn btn-warning" type="button" style="margin:4px 28px;">
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