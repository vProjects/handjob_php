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
	
	
	//codes for setting the views
	$manageData->manageViews("gallery",$gallery_id);
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
         <!-- members favourite portion starts here ---->
            <div class="row-fluid photo_update">
                <h3 class="site_heading"> Members Favorite</h3>
                <div class="row-fluid photo_update_outline">
                    <div class="pagination pagination-small pageno_nav pull-right">
                        <ul>
                            <li class="pageno_nav_viewall"><a class="btn-danger" href="join.php">Next &gt;</a></li>
                        </ul>
                    </div>
                </div>
                <?php
                    //generate an alternate number for the members favorite
                    $alternate = rand(1,2) ;
                    if( $alternate%2 == 0 ) 
                    {
                        //get the random members favourite movie
                        $manageData->membersFavourite(0,9,'movie') ;			
                    }
                    else
                    {
                        //get the random members favourite photos
                        $manageData->membersFavourite(0,8,'photo') ;
                    }
                ?>
                
                <!--- photo row3 ends here --->
                <div class="row-fluid">
                    <div class="pagination pagination-small pageno_nav pull-right">
                        <ul>
                            <li class="pageno_nav_viewall"><a class="btn-danger" href="join.php">Next &gt;</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row-fluid end_caption">
                    <h4>Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum</h4>
                </div>
             </div>    
            <!-- members favourite portion ends here ---->
         </div>    
        <!--- model details ends here --->
     </div>    
    <!--- model details ends here --->
    
</div>
<!-- site description part ends here --->

<?php
	//include footer
	include ('v-templates/footer.php');
?> 