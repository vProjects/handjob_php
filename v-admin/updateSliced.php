<?php
	include('v-templates/header.php');
	//include sidebar
	include('v-templates/sidebar.php');
?>
        <!--container for content of the website-->
        <div class="span9" id="content_container">
        	<blockquote>
                <p>Create Gallery from a Images</p>
                <small>
                	<cite title="Source Title">Gallery builder for your website.</cite>
                </small>
            </blockquote>
            <?php
				//UI for movie thumbs
				$manageData->getMovieThumbs($GLOBALS['_GET']['galleryId'],"sliced") ;
			?> 
            <!--create a gallery if galleryId is set-->
            <div class="row">
                <div class="span12 gallery1">
                <?php
                    if(!empty($GLOBALS['_GET']['movieId']) && !empty($GLOBALS['_GET']['galleryId']))
                    {
						echo '<h2>Your Gallery(Gallery ID:'.$GLOBALS['_GET']['movieId'].')</h2>';
                        //get the gallery id which contains the folder name of gallery images
                        $movieId = $GLOBALS['_GET']['movieId'];
						$galleryId = $GLOBALS['_GET']['galleryId'];
						$manageData->updateSlicedMovies($galleryId,$movieId);
                    }
                    
                ?>
                </div>
            </div><!--gallery div ends here-->
        </div>
    	
    </div><!--body main container ends here-->
    
<?php
	//get footer
	include('v-templates/footer.php');
?>