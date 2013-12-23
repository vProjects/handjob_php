<?php
	$page_title = 'Tour';
	//include header section
	include 'v-templates/header.php';

	//include navbar section
	include 'v-templates/navbar.php';

	//include slider section
	include 'v-templates/slider.php';
	
	//get the type of the files displayed
	//intialize the variables
	$type_m = "0" ;
	$type_p = "0" ;
	$type_mo = "0" ;
	//get values
	if( $GLOBALS["_GET"] )
	{
		$type_m = $GLOBALS["_GET"]["type_m"] ;
		$type_p = $GLOBALS["_GET"]["type_p"] ;
		$type_mo = $GLOBALS["_GET"]["type_mo"] ;
	}
	
?>

<!-- site description part starts here --->
<div class="container">
	<div class="row-fluid site_description">
    	<div class="span12">
        	<h3 class="site_heading">About Handjobstop</h3>
            <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.</p>
            <p> Reprehenderit butcher
retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.
</p>
        </div>
       <!--<div class="span3 site_login_button">
        	<div class="btn-group-vertical">
            	<div class="btn btn-large"> Get Access Now</div>
                <div class="btn btn-large btn-inverse access_login">already a member? <div class="btn btn-danger"> Login</div> </div>
            </div>
        </div>-->
    </div>
    <!-- video update portion starts here ---->
    <div class="row-fluid photo_update">
    	<h3 class="site_heading"> Latest Movies Updates</h3>
        <div class="row-fluid photo_update_outline">
        	<div class="btn-group">
            	<a href="tour.php?type_m=recent&<?php echo 'type_p='.$type_p.'&type_mo='.$type_mo; ?>"><div class="btn btn-danger">Most Recent</div></a>
                <a href="tour.php?type_m=rated&<?php echo 'type_p='.$type_p.'&type_mo='.$type_mo; ?>"><div class="btn btn-danger">Top Rated</div></a>
                <a href="tour.php?type_m=name&<?php echo 'type_p='.$type_p.'&type_mo='.$type_mo; ?>"><div class="btn btn-danger">A-Z</div></a>
            </div>
            <div class="pagination pagination-small pageno_nav pull-right">
            	<ul>
                    <li class="pageno_nav_viewall"><a class="btn-danger" href="movie.php">Next &gt;</a></li>
                </ul>
            </div>
        </div>
         <!--- movies starts here --->
		<?php 
            //get the movies for the page
            $manageData->getMovies(0,9,$type_m) ;
        ?>
        
        <div class="row-fluid">
        	<div class="pagination pagination-small pageno_nav pull-right">
            	<ul>
                    <li class="pageno_nav_viewall"><a class="btn-danger" href="movie.php">Next &gt;</a></li>
                </ul>
            </div>
        </div>
        <div class="row-fluid end_caption">
            <h4>Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum</h4>
        </div>
     </div>    
    <!-- video update portion ends here ---->
    <!-- photo update portion starts here --->
    <div class="row-fluid photo_update">
    	<h3 class="site_heading"> Latest Photos Updates</h3>
        <div class="row-fluid photo_update_outline">
        	<div class="btn-group">
            	<a href="tour.php?type_p=recent&<?php echo 'type_m='.$type_m.'&type_mo='.$type_mo; ?>"><div class="btn btn-danger">Most Recent</div></a>
                <a href="tour.php?type_p=rated&<?php echo 'type_m='.$type_m.'&type_mo='.$type_mo; ?>"><div class="btn btn-danger">Top Rated</div></a>
                <a href="tour.php?type_p=name&<?php echo 'type_m='.$type_m.'&type_mo='.$type_mo; ?>"><div class="btn btn-danger">A-Z</div></a>
            </div>
            <div class="pagination pagination-small pageno_nav pull-right">
            	<ul>
                    <li class="pageno_nav_viewall"><a class="btn-danger" href="photo.php">Next &gt;</a></li>
                </ul>
            </div>
        </div>
        <!--- gallery starts here --->
		<?php 
            //get the photo gallery for the page
            $manageData->getGallery(0,8,$type_p) ;
        ?>
       <div class="row-fluid">
        	<div class="pagination pagination-small pageno_nav pull-right">
            	<ul>
                    <li class="pageno_nav_viewall"><a class="btn-danger" href="photo.php">Next &gt;</a></li>
                </ul>
            </div>
        </div>
        <div class="row-fluid end_caption">
            <h4>Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum</h4>
        </div>
    </div>
    <!-- photo update portion ends here --->
    
    <!-- Model update portion starts here ---->
    <div class="row-fluid photo_update">
    	<h3 class="site_heading"> Latest Models Updates</h3>
        <div class="row-fluid photo_update_outline">
        	<div class="btn-group">
            	<a href="tour.php?type_mo=recent&<?php echo 'type_m='.$type_m.'&type_p='.$type_p; ?>"><div class="btn btn-danger">Most Recent</div></a>
                <a href="tour.php?type_mo=rated&<?php echo 'type_m='.$type_m.'&type_p='.$type_p; ?>"><div class="btn btn-danger">Top Rated</div></a>
                <a href="tour.php?type_mo=name&<?php echo 'type_m='.$type_m.'&type_p='.$type_p; ?>"><div class="btn btn-danger">A-Z</div></a>
            </div>
            <div class="pagination pagination-small pageno_nav pull-right">
            	<ul>
                    <li class="pageno_nav_viewall"><a class="btn-danger" href="model.php">Next &gt;</a></li>
                </ul>
            </div>
        </div>
        <?php
			//get the models for home
			$manageData->getModelsHome(0,8,$type_mo) ;
		?>
       <div class="row-fluid">
        	<div class="pagination pagination-small pageno_nav pull-right">
            	<ul>
                    <li class="pageno_nav_viewall"><a class="btn-danger" href="model.php">Next &gt;</a></li>
                </ul>
            </div>
        </div>
        <div class="row-fluid end_caption">
            <h4>Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum</h4>
        </div>
     </div>   
    <!-- Model update portion ends here ---->    
    
    
    <!-- members favourite portion starts here ---->
    <div class="row-fluid photo_update">
    	<h3 class="site_heading"> Members Favorite</h3>
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
        <div class="row-fluid">
        	<div class="pagination pagination-small pageno_nav pull-right">
            	<ul>
                    <li class="pageno_nav_viewall"><a class="btn-danger" href="join.php">Next &gt;</a></li>
                </ul>
            </div>
        </div>
        <div class="row-fluid end_caption">
            <h4>Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum</h4>
        </div>
     </div>    
    <!-- members favourite portion ends here ---->
</div>
<!-- site description part ends here --->

<?php
	//include footer section
	include 'v-templates/footer.php';
?>
