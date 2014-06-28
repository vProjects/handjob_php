<?php
	$page_title = 'Models Details';
	//include header section
	include 'v-templates/header.php';

	//include navbar section
	include 'v-templates/navbar.php';
	
	$model_name = "" ;
	$model_id = "" ;
	//check if the page has get request or not
	if( $GLOBALS["_GET"] > 0 )
	{
		$model_id = $GLOBALS["_GET"]["model_id"] ;
		$model_name = $GLOBALS["_GET"]["model_name"] ;
	}
	
	
	//codes for setting the views
	$manageData->manageViews("model",$model_id);
?>


<!-- site description part starts here --->
<div class="container">
	<?php
		//include the model searchBar
		include('v-templates/modelSearchBar.php') ;

		//get the models details if id isset
		if( isset($model_id) && !empty($model_id) )
		{
			//get the UI for model details from BLL
			$manageData->getModel_Details($model_id) ;
		}
		
		
		//get the movies for the models
		$manageData->getMoviesByModel($model_name) ;
		
		//get the gallery for the models
		$manageData->getGalleryByModel($model_name) ;
	?>
      <!-- members favourite portion starts here ---->
    <div class="row-fluid photo_update">
        <div class="span12">
            <h3 class="site_heading memfav" style="margin-top:30px;"> Members Favorite</h3>
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
        </div>
     </div>   
     <!-- members favourite portion ends here ----> 
</div>
<!-- site description part ends here --->


<?php
	//include footer
	include ('v-templates/footer.php');
?>