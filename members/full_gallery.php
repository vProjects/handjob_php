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
    
    
    
<?php
	//include footer
	include ('v-templates/footer.php');
?>