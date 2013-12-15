<?php
	$page_title = 'MODELS';
	//get header
	include ('v-templates/header.php');

	//get the horizontal navbar
	include ('v-templates/navbar.php');
	
	//get the value of id from the query string
	$model_id = $GLOBALS["_GET"]["model_id"];
	
	$model_name = $GLOBALS["_GET"]["model_name"];
	
	//codes for setting the views
	$manageData->manageViews("model",$model_id);
?>

	<div id="bodyContainer" class="row-fluid">   
        <?php
		 	//GET the model searchBar
			include('v-templates/modelSearchBar.php');
		 ?>
        
        <!-- model detail starts here -->
        <?php
			//if the get varriable is set 
			if(isset($model_id) && !empty($model_id))
			{
				//get the UI structure of model details
				$manageData->getModelDetails($model_id);
			}
			
			if(isset($model_name) && !empty($model_name))
			{
				//get the model movies
				$manageData->getMoviesByModel($model_name);
				//get model gallery
				$manageData->getGalleryByModel($model_name,$model_id);
			}
		?>
        
	</div>
    <!-- body container ends here -->

    
<?php
	//include footer
	include ('v-templates/footer.php');
?>