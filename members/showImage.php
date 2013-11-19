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
            if(!empty($gallery_id) && isset($gallery_id))
            {
                //get the required model gallerys
                $manageData->getFullGallery($gallery_id);
            }
        ?>
       <div class="row-fluid">
        	
            	
                 <div class="span1" style="display: inline-block;">
                    <img class="lazy" src="images/left-arrow.png" style="display: inline-block;">
                </div>
                <div class="span10">
    	        	<img class="lazy" src="gallery/52821dc023e5c/s/100_3120.JPG" style="display: inline;">
    	        </div>
    	        <div class="span1" style="display: inline-block;">
    	        	<img class="lazy" src="images/right-arrow.png" style="display: inline-block;">
                </div>
               
            
        </div>
  
        
        
        
        
    </div>
    <!-- body container ends here -->
    
    
    
<?php
	//include footer
	include ('v-templates/footer.php');
?>