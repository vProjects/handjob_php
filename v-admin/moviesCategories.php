<?php
	$pageTitle = "Category List";
	include('v-templates/header.php');
	//include sidebar
	include('v-templates/sidebar.php');
?>
        
        <!--container for content of the website-->
        <div class="span9" id="content_container">
        	<blockquote>
                <p>List Movies Category</p>
                <small>
                	<cite title="Source Title">List of movies Categories in your website.</cite>
                </small>
            </blockquote>
                <table class="table table-hover">
                    <caption>List Of Movie Categories</caption>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
							//get the list of the model categories
							$manageData->getCategoryList("movie_category");
						?>
                    </tbody>
                </table>
        </div>
    	
    </div><!--body main container ends here-->
    
<?php
	//get footer
	include('v-templates/footer.php');
?>