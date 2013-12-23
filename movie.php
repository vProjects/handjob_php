<?php
	$page_title = 'Movies';
	//get header
	include ('v-templates/header.php');

	//get the horizontal navbar
	include ('v-templates/navbar.php');
	//include the config file for the pagination
	include('v-includes/config_pagination.php') ;
	
	//variable for the type of search
	$type = "" ;
	$keyword = "" ;
	if( $GLOBALS["_GET"] > 0 )
	{
		$type = $GLOBALS["_GET"]["type"];
	}
	if( !isset( $type ) || empty( $type ) )
	{
		$type = "recent" ;
	}
?>

<!-- site description part starts here --->
<div class="container">
	<?php
		//include the model searchBar
		include('v-templates/modelSearchBar.php') ;
	?>
    <div class="row-fluid model_detail_heading">
    	<?php
			//set the pageName for the type navbar
			$pageName = "movie.php" ;
			//include the type navbar
			include('v-templates/typeNavbar.php') ;
			
			//get the pagination for the page
			$manageData->pagination($startPoint,"movie.php",10,"movie_info_tour",$type,$keyword,$limit);
		?>
        
    </div>
    
    <!--- movies starts here --->
    <?php 
		//get the movies for the page
		$manageData->getMovies($startPoint,$limit,$type) ;
	?>
    
        <div class="row-fluid">
        	<div class="span12">
            	<?php
					//get the pagination for the page
					$manageData->pagination($startPoint,"movie.php",10,"movie_info_tour",$type,$keyword,$limit);
				?>
            </div>
        </div>
        <div class="row-fluid end_caption">
            <h4>Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum</h4>
        </div>
        <!-- members favourite portion starts here ---->
        <div class="row-fluid photo_update">
            <div class="span12">
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
         </div>   
         <!-- members favourite portion ends here ---->
     </div>    
    <!--- movie details ends here --->
     

</div>
<!-- site description part ends here --->

<?php
	//include footer
	include ('v-templates/footer.php');
?> 