<?php
	$page_type = $GLOBALS["_GET"]["type"] ;
	//set the variables of the accordion and page title
	$page_title = $page_type." Comments" ;
	$accord_cat = "comment" ;
	
	include('v-templates/header.php');
	//include sidebar
	include('v-templates/sidebar.php');
	
	include('v-includes/library/pagination_config.php');
	
	//set table for pagination
	if( $page_type == "Movies" )
	{
		$comment_table = "movie_comment" ;
	}
	if( $page_type == "Photos" )
	{
		$comment_table = "gallery_comment" ;
	}
	if( $page_type == "Article" )
	{
		$comment_table = "article_comment" ;
	}
	if( $page_type == "Model" )
	{
		$comment_table = "model_comment" ;
	}
	if( $page_type == "Sliced" )
	{
		$comment_table = "movie_comment" ;
	}
?>
        
        <!--container for content of the website-->
        <div class="span9" id="content_container">
        	<blockquote>
                <p>List <?php echo $page_type; ?> Comments</p>
                <small>
                	<cite title="Source Title">List of Comments in your website.</cite>
                </small>
            </blockquote>
            <?php
				if($keyword == "")
				{
					//get the pagination of the page
					$manageData->pagination_comment($startPoint,"listComments.php",10,$comment_table,$page_type,"");
				}
			?>
                <table class="table table-hover">
                    <caption>List Of Comments</caption>
                    <thead>
                        <tr>
                        	<th>Thumb</th>
                            <th><?php echo $page_type; ?> Id</th>
                            <th><?php echo $page_type; ?> Name</th>
                            <th>Member</th>
                            <th>Comments</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    
					<?php
                        //call the method from BLL to get model list
                        $manageData->getComments($page_type,$startPoint,$limit);							
                    ?>
                        
                </table>
			<?php
            	if($keyword == "")
				{
					//get the pagination of the page
					$manageData->pagination_comment($startPoint,"listComments.php",10,$comment_table,$page_type,"");
				}
			?>
        </div>
    	
    </div><!--body main container ends here-->
    
<?php
	//get footer
	include('v-templates/footer.php');
?>