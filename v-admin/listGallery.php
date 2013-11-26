<?php
	$pageTitle = "Model List";
	include('v-templates/header.php');
	//include sidebar
	include('v-templates/sidebar.php');
	
	include('v-includes/library/pagination_config.php');
?>
        
        <!--container for content of the website-->
        <div class="span9" id="content_container">
        	<blockquote>
                <p>List Model</p>
                <small>
                	<cite title="Source Title">List of models in your website.</cite>
                </small>
            </blockquote>
                <table class="table table-hover">
                    <caption>List Of Models</caption>
                    <thead>
                        <tr>
                            <th>Thumb</th>
                            <th>Gallery Id</th>
                            <th>Gallery Name</th>
                            <th>Model</th>
                            <th>Category</th>
                            <th>Date</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    
					<?php
                        //call the method from BLL to get model list
                        $manageData->getGalleryList($startPoint,$limit);							
                    ?>
                        
                </table>
                <?php
					//get the pagination of the page
					$manageData->pagination($startPoint,"listGallery.php",10,"gallery_info","date",$keyword);
				?>
        </div>
    	
    </div><!--body main container ends here-->
    
<?php
	//get footer
	include('v-templates/footer.php');
?>