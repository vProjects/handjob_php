<?php
	$page_title = 'MOVIES';
	//get header
	include ('v-templates/header.php');
	
	//get the horizontal navbar
	include ('v-templates/navbar.php');
	
	//include the pagination configuration file
	include('v-includes/config_pagination.php');
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
			$manageData->getVideos($startPoint,$limit);
		
			//get the pagination for the page
			$manageData->pagination($startPoint,"videos.php",10,"movie_info");
		?>
    	
   	</div>
    <!-- body container ends here -->
    
    
    
<?php
	//include footer
	include ('v-templates/footer.php');
?>