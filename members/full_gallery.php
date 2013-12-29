<?php
	$page_title = 'MODELS';
	//get header
	include ('v-templates/header.php');

	//get the horizontal navbar
	include ('v-templates/navbar.php');
	$gallery_id = $GLOBALS["_GET"]["galleryId"];
	$model_id = $GLOBALS["_GET"]["model_id"];
	
	//codes for setting the views
	$manageData->manageViews("gallery",$gallery_id);
	
?>

<div id="bodyContainer" class="row-fluid">
    	 
    	 <?php
			//if the get varriable is set 
			if(isset($model_id) && !empty($model_id))
			{
				//get the UI structure of model details
				$manageData->getModelDetails($model_id);
			}
		?>
        
        <div id="bodyContainer" class="row-fluid">
           <div class="row-fluid">
                <div class="btn-group">
                    <?php
                        if(isset($gallery_id) && !empty($gallery_id))
                        {
                            //get vid cap link
                            $manageData->getZipLinks($gallery_id);
                        }
                    ?>
                </div>	
           </div>
        
		<?php
			if(!empty($gallery_id) && isset($gallery_id))
			{
				//get the required model gallerys
				$manageData->getFullGallery($gallery_id);
			}
		?>
    	
   	</div>
    <!-- body container ends here -->
    <div class="row-fluid">
	        <div class="span12">
	            <div class="offset3 span6 rating">
	                Rate Me:
	                <img class="rateme" src="images/white-star.png"  alt="star" onclick="rate(1,'<?php echo $_SESSION["user"] ;?>','<?php echo $gallery_id ;?>','gallery')">
	                <img class="rateme" src="images/white-star.png"  alt="star" onclick="rate(2,'<?php echo $_SESSION["user"] ;?>','<?php echo $gallery_id ;?>','gallery')">
	                <img class="rateme" src="images/white-star.png"  alt="star" onclick="rate(3,'<?php echo $_SESSION["user"] ;?>','<?php echo $gallery_id ;?>','gallery')">
	                <img class="rateme" src="images/white-star.png"  alt="star" onclick="rate(4,'<?php echo $_SESSION["user"] ;?>','<?php echo $gallery_id ;?>','gallery')">
	                <img class="rateme" src="images/white-star.png"  alt="star" onclick="rate(5,'<?php echo $_SESSION["user"] ;?>','<?php echo $gallery_id ;?>','gallery')">
	            </div>
	        </div>
    </div>
    
    
    <div class="row-fluid comment_box">
    	
		<?php 
			//print the status of the comment submission
			if( isset($_SESSION['result']) && !empty($_SESSION['result']))
			{
				echo '<div class="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>' ;
				echo $_SESSION['result'] ;
				unset($_SESSION['result']) ;
				echo '</div>' ;
			}
			
			//get the comments for the post
			$manageData->getComments("gallery",$gallery_id,0) ;
        ?>
        <div class="row-fluid">
            <div class="span12">
                <h4>Comment Here:</h4>
            </div>
        </div> 
    	<div class="row-fluid">	
	    	<div class="span12">
	    		<form class="form-horizontal" action="functions/function.comment.php" method="post">
		    		<div class="control-group">
		    			<div class="controls">
			    			<textarea rows="4" style="width: 50%" name="comment"></textarea>
			    		</div>
			    		<div class="controls">
                        	<input type="hidden" value="<?php echo $gallery_id ; ?>" name="id" />
                            <input type="hidden" value="gallery" name="type" />
                            <input type="hidden" value="<?php echo $_SESSION['user'] ;?>" name="member" />
			    			<input type="submit" class="btn" value="Submit">
			    		</div>			    		
		    		</div>
	    		</form>
	    	</div>
    	</div>
    </div>
    
    
    <script src="assets/js/js_function_v.js" type="text/javascript"></script>
    
    
<?php
	//include footer
	include ('v-templates/footer.php');
?>