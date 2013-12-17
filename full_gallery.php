<?php
	$page_title = 'Photos';
	//get header
	include ('v-templates/header.php');
	
	//get the horizontal navbar
	include ('v-templates/navbar.php');
	
	//variable for the type of search
	$gallery_id = "" ;
	if( $GLOBALS["_GET"] > 0 )
	{
		$gallery_id = $GLOBALS["_GET"]["gallery_id"];
	}
?>

<!-- site description part starts here --->
<div class="container">

    <div class="row-fluid">
        <div class="row-fluid model_detail_heading">
            <div class="btn-group">
                <?php
					//get the zip tabs
					$manageData->getZipLinks($gallery_id) ;
				?>
            </div>
        </div>
    </div>
    
    <!--- gallery starts here --->
    <?php 
		//get the photo gallery for the page
		$manageData->getGalleryFull($gallery_id) ;
	?>
    
     </div>    
    <!--- model details ends here --->
</div>
<!-- site description part ends here --->

<?php
	//include footer
	include ('v-templates/footer.php');
?> 