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
	if( $GLOBALS["_GET"] > 0 )
	{
		$type_m = $GLOBALS["_GET"]["type_m"] ;
		$type_p = $GLOBALS["_GET"]["type_p"] ;
		$type_mo = $GLOBALS["_GET"]["type_mo"] ;
	}
	if( !isset($type_p) || empty($type_p) )
	{
		$type_p = 'recent' ;
	}
	
	if( !isset($type_m) || empty($type_m) )
	{
		$type_m = 'recent' ;
	}
	
	if( !isset($type_mo) || empty($type_mo) )
	{
		$type_mo = 'recent' ;
	}
?>

<!-- site description part starts here --->
<div class="container">
	<div class="row-fluid site_description">
    	<div class="span12">
        	<h3 class="site_heading">About Handjobstop</h3>
            <?php 
				//get the about_handjob content
				$manageData->getContent("about_handjob") ;
			?>
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
            	<a href="tour.php?type_m=recent&<?php echo 'type_p='.$type_p.'&type_mo='.$type_mo; ?>"><div class="btn <?php if( $type_m =='recent'){ echo 'active' ;}?> btn-danger border_radius_l">Most Recent</div></a>
                <a href="tour.php?type_m=rated&<?php echo 'type_p='.$type_p.'&type_mo='.$type_mo; ?>"><div class="btn <?php if( $type_m =='rated'){ echo 'active' ;}?> btn-danger">Top Rated</div></a>
                <a href="tour.php?type_m=name&<?php echo 'type_p='.$type_p.'&type_mo='.$type_mo; ?>"><div class="btn <?php if( $type_m =='name'){ echo 'active' ;}?> btn-danger border_radius_r">A-Z</div></a>
            </div>
            <div class="pagination pagination-small pageno_nav pull-right">
            	<ul>
                    <li class="pageno_nav_viewall"><a class="btn btn-danger border_radius" href="movie.php">Next &gt;</a></li>
                </ul>
            </div>
        </div>
         <!--- movies starts here --->
		<?php 
            //get the movies for the page
            $manageData->getMovies(0,9,$type_m) ;
        ?>
        
        <div class="row-fluid bottom-next">
        	<div class="pagination pagination-small pageno_nav pull-right">
            	<ul>
                    <li class="pageno_nav_viewall"><a class="btn btn-danger border_radius" href="movie.php">Next &gt;</a></li>
                </ul>
            </div>
        </div>
        <div class="row-fluid end_caption">
            <?php 
				//get the about_handjob content
				$manageData->getContent("movie_update") ;
			?>
        </div>
     </div>    
    <!-- video update portion ends here ---->
    <!-- photo update portion starts here --->
    <div class="row-fluid photo_update">
    	<h3 class="site_heading"> Latest Photos Updates</h3>
        <div class="row-fluid photo_update_outline">
        	<div class="btn-group">
            	<a href="tour.php?type_p=recent&<?php echo 'type_m='.$type_m.'&type_mo='.$type_mo; ?>"><div class="btn <?php if( $type_p =='recent'){ echo 'active' ;}?> btn-danger border_radius_l">Most Recent</div></a>
                <a href="tour.php?type_p=rated&<?php echo 'type_m='.$type_m.'&type_mo='.$type_mo; ?>"><div class="btn <?php if( $type_p =='rated'){ echo 'active' ;}?> btn-danger">Top Rated</div></a>
                <a href="tour.php?type_p=name&<?php echo 'type_m='.$type_m.'&type_mo='.$type_mo; ?>"><div class="btn <?php if( $type_p =='name'){ echo 'active' ;}?> btn-danger border_radius_r">A-Z</div></a>
            </div>
            <div class="pagination pagination-small pageno_nav pull-right">
            	<ul>
                    <li class="pageno_nav_viewall"><a class="btn btn-danger border_radius" href="photo.php">Next &gt;</a></li>
                </ul>
            </div>
        </div>
        <!--- gallery starts here --->
		<?php 
            //get the photo gallery for the page
            $manageData->getGallery(0,8,$type_p) ;
        ?>
       <div class="row-fluid bottom-next">
        	<div class="pagination pagination-small pageno_nav pull-right">
            	<ul>
                    <li class="pageno_nav_viewall"><a class="btn btn-danger border_radius" href="photo.php">Next &gt;</a></li>
                </ul>
            </div>
        </div>
        <div class="row-fluid end_caption">
            <?php 
				//get the about_handjob content
				$manageData->getContent("photo_update") ;
			?>
        </div>
    </div>
    <!-- photo update portion ends here --->
    
    <!-- Model update portion starts here ---->
    <div class="row-fluid photo_update">
    	<h3 class="site_heading"> Latest Models Updates</h3>
        <div class="row-fluid photo_update_outline">
        	<div class="btn-group">
            	<a href="tour.php?type_mo=recent&<?php echo 'type_m='.$type_m.'&type_p='.$type_p; ?>"><div class="btn <?php if( $type_mo =='recent'){ echo 'active' ;}?> btn-danger border_radius_l">Most Recent</div></a>
                <a href="tour.php?type_mo=rated&<?php echo 'type_m='.$type_m.'&type_p='.$type_p; ?>"><div class="btn <?php if( $type_mo =='rated'){ echo 'active' ;}?> btn-danger">Top Rated</div></a>
                <a href="tour.php?type_mo=name&<?php echo 'type_m='.$type_m.'&type_p='.$type_p; ?>"><div class="btn <?php if( $type_mo =='name'){ echo 'active' ;}?> btn-danger border_radius_r">A-Z</div></a>
            </div>
            <div class="pagination pagination-small pageno_nav pull-right">
            	<ul>
                    <li class="pageno_nav_viewall"><a class="btn btn-danger border_radius" href="model.php">Next &gt;</a></li>
                </ul>
            </div>
        </div>
        <?php
			//get the models for home
			$manageData->getModelsHome(0,8,$type_mo) ;
		?>
       <div class="row-fluid bottom-next">
        	<div class="pagination pagination-small pageno_nav pull-right">
            	<ul>
                    <li class="pageno_nav_viewall"><a class="btn btn-danger border_radius" href="model.php">Next &gt;</a></li>
                </ul>
            </div>
        </div>
        <div class="row-fluid end_caption">
            <?php 
				//get the about_handjob content
				$manageData->getContent("model_update") ;
			?>
        </div>
     </div>   
    <!-- Model update portion ends here ---->    
    
    
    <!-- members favourite portion starts here ---->
    <div class="row-fluid photo_update">
    	<h3 class="site_heading memfav"> Members Favorite</h3>
        <div class="row-fluid photo_update_outline">
            <div class="pagination pagination-small pageno_nav pull-right">
            	<ul>
                    <li class="pageno_nav_viewall"><a class="btn btn-danger border_radius" href="join.php">Next &gt;</a></li>
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
        
        
        
     </div>    
    <!-- members favourite portion ends here ---->
</div>
<!-- site description part ends here --->

<?php
	//include footer section
	include 'v-templates/footer.php';
?>
