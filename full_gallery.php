<?php
	$page_title = 'Photos';
	//get header
	include ('v-templates/header.php');
	
	//get the horizontal navbar
	include ('v-templates/navbar.php');
	
	//variable for the type of search
	$gallery_id = "" ;
	$model = "" ;
	if( $GLOBALS["_GET"] > 0 )
	{
		$gallery_id = $GLOBALS["_GET"]["gallery_id"] ;
		$model = $GLOBALS["_GET"]["model"] ;
	}
?>

<!-- site description part starts here --->
<div class="container">
	<?php
		//get the model details if the model name is set
		if( isset($model) && !empty($model) )
		{
			//create the UI using the BLL method
			$manageData->getModel_Details_byName($model) ;
		}
	?>
    <div class="row-fluid">
        <div class="row-fluid model_detail_heading">
            <div class="btn-group">
                <?php
					//removed as not needed so can be added later by removing comment
					//get the zip tabs
					//$manageData->getZipLinks($gallery_id) ;
				?>
            </div>
        </div>
    </div>
    
    <!--- gallery starts here --->
    <?php 
		//get the photo gallery for the page
		$manageData->getGalleryFull($gallery_id,$model) ;
	?>
    
     </div>    
    <!--- model details ends here --->
</div>
<!-- site description part ends here --->

<?php
	//include footer
	include ('v-templates/footer.php');
?> 