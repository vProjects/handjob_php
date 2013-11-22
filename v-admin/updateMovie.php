<?php
	include('v-templates/header.php');
	//include sidebar
	include('v-templates/sidebar.php');
?>
        <!--container for content of the website-->
        <div class="span9" id="content_container">
        	<blockquote>
                <p>Update Movies</p>
                <small>
                	<cite title="Source Title">Update Movies of your website.</cite>
                </small>
            </blockquote>
            
            <!--get the sliced vids for the movie-->
            <table class="table table-hover">
                    <caption>List Of Sliced Movie</caption>
                    <thead>
                        <tr>
                            <th>Thumb</th>
                            <th>Movie Id</th>
                            <th>Movie Name</th>
                            <th>Model</th>
                            <th>Category</th>
                            <th>Date</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    
					<?php
						if(!empty($GLOBALS['_GET']['galleryId']))
						{
							//get the gallery id which contains the folder name of gallery images
							$galleryId = $GLOBALS['_GET']['galleryId'];
							$manageData->getSlicedVids($galleryId);
						}
                    
                	?>
                        
                </table>
            
            <!--create a gallery if galleryId is set-->
            <div class="row">
                <div class="span12 gallery1">
                <?php
                    if(!empty($GLOBALS['_GET']['galleryId']))
                    {
						echo '<h2>Your Gallery(Gallery ID:'.$GLOBALS['_GET']['galleryId'].')</h2>';
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