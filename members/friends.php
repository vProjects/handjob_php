<?php
	$page_title = 'FRIENDS';
	//get header
	include ('v-templates/header.php');

	//get the horizontal navbar
	include ('v-templates/navbar.php');
	
	
	
	//define the page type for typr nav bar
	$pageName = "photos.php" ;	
?>

<div id="bodyContainer" class="row-fluid">
    	 <?php
		 	//get the required gallery
			$manageData->getFriends(0,1000);
			
			
			
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