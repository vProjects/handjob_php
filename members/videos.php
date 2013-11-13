<?php
	$page_title = 'VIDEOS';
	//get header
	include ('v-templates/header.php');

	//get the horizontal navbar
	include ('v-templates/navbar.php');
?>

<div id="bodyContainer" class="row-fluid">
    	 <?php
		 	//GET the model searchBar
			include('v-templates/modelSearchBar.php');
		 ?>
         
         
       <div class="row-fluid">
       		<div class="btn-group">
			  <button class="btn btn-large btn-danger">Most Recent</button>
			  <button class="btn btn-large btn-danger">Most Popular</button>
			  <button class="btn btn-large btn-danger">Name/Title</button>
			</div>	
       </div>
      

    	<?php
			//get the required videos
			$manageData->getVideos();
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