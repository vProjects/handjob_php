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
?>


<!-- site description part starts here --->
<div class="container">
	<?php
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
       
</div>
<!-- site description part ends here --->


<?php
	//include footer
	include ('v-templates/footer.php');
?>