<?php
	$page_title = 'Legal';
	//get header
	include ('v-templates/header.php');
	
	//get the main banner
	include ('v-templates/main_banner.php');
	//get the horizontal navbar
	include ('v-templates/navbar.php');
	
	//define the page type for typr nav bar		
?>

<div id="bodyContainer" class="row-fluid">
    	 <?php
		 	//GET the model searchBar
			include('v-templates/modelSearchBar.php');
		?>
        <div class="row-fluid">
	    	<div class="span8">
	        	<h3 class="site_heading legel_heading">Legal Statement</h3>
	        </div>
	    </div>
	    
	    <div class="row-fluid model_detail">
	    	<div class="span12 legal_content">
	        	<legend class="red_text_1 bottom_border_grey">18 U.S.C 2257 Record Keeping Requirements Compliance Statement</legend>
	        	<p>All models that appear in any visual depiction contained on <a href="handjobstop.com">HandJobStop.com</a> were eighteen years of age or older at the time said depictions were created. Proof of age documentation required pursuant to 18 U.S.C. 2257, 18 U.S.C. 2256 and 28 CFR 75 is maintained by the custodian of records as follows: </p>
	            
	            <p class="red_text legal_add_text">
	                KATANA MULTIMEDIA
	                <br />
	                100 cours de la marne 
	                <br />
	                33800 BORDEAUX FRANCE
				</p>
	            
	        </div>
	    </div>
        
        <?php
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