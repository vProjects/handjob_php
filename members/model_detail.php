<?php
	$page_title = 'MODELS';
	//get header
	include ('v-templates/header.php');

	//get the horizontal navbar
	include ('v-templates/navbar.php');
	
	//get the value of id from the query string
	$model_id = $GLOBALS["_GET"]["model_id"];
	
	$model_name = $GLOBALS["_GET"]["model_name"];
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
		?>
        
        <!-- model detail ends here -->        
        <div class="row-fluid btn_group_outline">
       		<div class="btn-group">
			  <button class="btn btn-large btn-danger">Most Recent</button>
			  <button class="btn btn-large btn-danger">Most Popular</button>
			</div>	
       </div>
       
       
        <?php
			if(isset($model_name) && !empty($model_name))
			{
				//get the model movies
				$manageData->getMoviesByModel($model_name);
				//get model gallery
				$manageData->getGalleryByModel($model_name,$model_id);
			}
		?>
        
       
		<div class="row-fluid">
            <div class="span12 blank">
				<div class="pagination pagination-small center">
				  <ul>
					<li><a href="#">Prev</a></li>
					<li><a class="btn-danger center_1st" href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li><a href="#">6</a></li>
					<li><a href="#">7</a></li>
					<li><a href="#">8</a></li>
					<li><a href="#">9</a></li>
					<li><a href="#">Next</a></li>
				  </ul>
				</div>
            </div>
        </div>
	</div>
    <!-- body container ends here -->

    
<?php
	//include footer
	include ('v-templates/footer.php');
?>