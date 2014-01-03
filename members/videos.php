<?php
	$page_title = 'MOVIES';
	//get header
	include ('v-templates/header.php');
	
	//get the horizontal navbar
	include ('v-templates/navbar.php');
	
	//include the pagination configuration file
	include('v-includes/config_pagination.php');
	include('v-includes/config.php');
	
	//define the page type for typr nav bar
	$pageName = "videos.php" ;	
?>

<div id="bodyContainer" class="row-fluid">
    	 <?php
		 	//GET the model searchBar
			include('v-templates/modelSearchBar.php');
			
			//GET the model type nav bar
			include('v-templates/typeNav.php');
			
			//get the required videos
			$manageData->getVideos($startPoint,$limit,$type);
		
			//get the pagination for the page
			$manageData->pagination($startPoint,"videos.php",10,"movie_info",$type,$keyword,$limit);
		
			//generate an alternate number for the members favorite
			$alternate = rand(1,2) ;
			if( $alternate%2 == 0 ) 
			{
				//get the random members favourite movie
				$manageData->membersFavourite(0,12,'movie',4) ;			
			}
			else
			{
				//get the random members favourite photos
				$manageData->membersFavourite(0,12,'photo',4) ;
			}
		?>
    	
   	</div>
    <!-- body container ends here -->
    
    
    
<?php
	//include footer
	include ('v-templates/footer.php');
?>