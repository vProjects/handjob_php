<?php
	include('v-templates/header.php');
	//include sidebar
	include('v-templates/sidebar.php');
?>
        <!--container for content of the website-->
        <div class="span9" id="content_container">
        	<blockquote>
                <p>Sample Movies Images</p>
                <small>
                	<cite title="Source Title">Update Sample Movies Images of your website.</cite>
                </small>
            </blockquote>
            
            <!--create a gallery if galleryId is set-->
            <div class="row">
                <div class="span12 gallery1">
                <?php
                    if(!empty($GLOBALS['_GET']['galleryId']))
                    {
						echo '<h2>Your Sample Images(Movie ID:'.$GLOBALS['_GET']['galleryId'].')</h2>';
                        //get the gallery id which contains the folder name of gallery images
                        $galleryId = $GLOBALS['_GET']['galleryId'];
						$manageData->updateMovies($galleryId);
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