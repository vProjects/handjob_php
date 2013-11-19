<?php
	$page_title = 'MODELS';
	//get header
	include ('v-templates/header.php');

	//get the horizontal navbar
	include ('v-templates/navbar.php');
	$gallery_id = $GLOBALS["_GET"]["galleryId"];
	$model_id = $GLOBALS["_GET"]["model_id"];
	
?>

    <div id="bodyContainer" class="row-fluid">     
        <?php
            if(!empty($gallery_id) && isset($gallery_id))
            {
                //get the required model gallerys
                $manageData->getFilenamesImages($gallery_id);
            }
        ?>
       <div class="row-fluid">
        	
            <div class="span12 slider_wrapper">	
                 <div class="left-arrow" style="display: inline-block;">
                    <img class="lazy" src="images/left-arrow.png" style="display: inline-block;border:none;">
                </div>
                <div class="slider_container">
    	        	<img class="lazy" src="gallery/52821dc023e5c/s/100_3119.JPG" style="display: inline;width:100%;">
    	        </div>
    	        <div class="right-arrow" style="display: inline-block;">
    	        	<img class="lazy" src="images/right-arrow.png" style="display: inline-block;border:none;">
                </div>
             </div>  
            
        </div>
  
        
        
        
        
    </div>
    <!-- body container ends here -->
    
    
    
<?php
	//include footer
	include ('v-templates/footer.php');
?>