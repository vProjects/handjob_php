<?php
	$page_title = 'MODELS';
	//get header
	include ('v-templates/header.php');

	//get the horizontal navbar
	include ('v-templates/navbar.php');
	$gallery_id = $GLOBALS["_GET"]["galleryId"];;
	
?>

<div id="bodyContainer" class="row-fluid">
    	 
    	
		<?php
			if(!empty($gallery_id) && isset($gallery_id))
			{
				//get the required models
				$manageData->getFullGallery($gallery_id);
			}
		?>
    	
   	</div>
    <!-- body container ends here -->
    
    
    
<?php
	//include footer
	include ('v-templates/footer.php');
?>