<?php
	$page_title = 'MODELS';
	//get header
	include ('v-templates/header.php');

	//get the horizontal navbar
	include ('v-templates/navbar.php');
	
	//get the value of id from the query string
	$keyword = $GLOBALS["_GET"]["keyword"];
?>

<div id="bodyContainer" class="row-fluid">
    	 
         <?php
		 	//GET the model searchBar
			include('v-templates/modelSearchBar.php');
		 ?>
      
		<?php
			//get the required models
			$manageData->searchModelDirectory($keyword);
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