<?php
	$pageTitle = "Blog List";
	
	include('v-templates/header.php');
	//include sidebar
	include('v-templates/sidebar.php');
?>
        
        <!--container for content of the website-->
        <div class="span9" id="content_container">
        	<blockquote>
                <p>List of Blogs</p>
                <small>
                	<cite title="Source Title">List of blogs of your website.</cite>
                </small>
            </blockquote>
                <table class="table table-hover">
                    <caption>List Of Blogs</caption>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Breif</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <?php 
						//fetch the article list
						$manageData->getArticleList(); 
					?>
                </table>
        </div>
    	
    </div><!--body main container ends here-->
    
<?php
	//get footer
	include('v-templates/footer.php');
?>