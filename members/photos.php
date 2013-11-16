<?php
	$page_title = 'PHOTOS';
	//get header
	include ('v-templates/header.php');

	//get the horizontal navbar
	include ('v-templates/navbar.php');
	
	//include the pagination configuration file
	include('v-includes/config_pagination.php');
	include('v-includes/config.php');
	
	//define the page type for typr nav bar
	$pageName = "photos.php" ;	
?>

<div id="bodyContainer" class="row-fluid">
    	 <?php
		 	//GET the model searchBar
			include('v-templates/modelSearchBar.php');
		 
      		//GET the model type nav bar
			include('v-templates/typeNav.php');
		
			//get the required gallery
			$manageData->getGallery($startPoint,$limit,$type);
			
			//get the pagination for the page
			$manageData->pagination($startPoint,"photos.php",10,"gallery_info",$type);
		?>
    	
    

    	
   	</div>
    <!-- body container ends here -->
    
    
    
<?php
	//include footer
	include ('v-templates/footer.php');
?>