<?php
	$page_title = 'Legal';
	//get header
	include ('v-templates/header.php');

	//get the horizontal navbar
	include ('v-templates/navbar.php');
	
?>

<!-- site description part starts here --->
<div class="container">
	
	<?php
		//include the model searchBar
		include('v-templates/modelSearchBar.php') ;
	?>
	    
	<div class="row-fluid">
    	<div class="span8">
        	<h3 class="site_heading red_text">Legal Statement</h3>
        </div>
    </div>
    
    <div class="row-fluid">
    	<div class="span12 join_now">
        	<legend class="red_text bottom_border_grey">18 U.S.C 2257 Record Keeping Requirements Compliance Statement</legend>
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
    
    
    <!-- members favourite portion starts here ---->
    <div class="row-fluid photo_update">
        <div class="span12">
            <h3 class="site_heading memfav"> Members Favorite</h3>
            <div class="row-fluid photo_update_outline">
                <div class="pagination pagination-small pageno_nav pull-right">
                    <ul>
                        <li class="pageno_nav_viewall"><a class="btn-danger" href="join.php">Next &gt;</a></li>
                    </ul>
                </div>
            </div>
            <?php
                //generate an alternate number for the members favorite
                $alternate = rand(1,2) ;
                if( $alternate%2 == 0 ) 
                {
                    //get the random members favourite movie
                    $manageData->membersFavourite(0,9,'movie') ;			
                }
                else
                {
                    //get the random members favourite photos
                    $manageData->membersFavourite(0,8,'photo') ;
                }
            ?>
            
            <!--- photo row3 ends here --->
            
        </div>
     </div>   
     <!-- members favourite portion ends here ---->
</div>
<!-- site description part ends here --->

<?php
	//include footer
	include ('v-templates/footer.php');
?> 