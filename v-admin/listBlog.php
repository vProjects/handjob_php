<?php
	//set the variables of the accordion and page title
	$page_title = "List Blog" ;
	$accord_cat = "blog" ;
	
	include('v-templates/header.php');
	//include sidebar
	include('v-templates/sidebar.php');
	
	include('v-includes/library/pagination_config.php');
	
	$total_elements = $manageData->getTotalElements("article_info") ;
?>
        
        <!--container for content of the website-->
        <div class="span9" id="content_container">
        	<blockquote>
                <p>List of Blogs</p>
                <small>
                	<cite title="Source Title">List of blogs of your website.</cite>
                </small>
            </blockquote>
            <div class="span4">
            	<h4>Tolal Elements: <?php echo $total_elements ; ?></h4>
            </div>
				<?php
                    //get the pagination of the page
                    $manageData->pagination($startPoint,"listBlog.php",10,"article_info","date",$keyword);
                ?>
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
						$manageData->getArticleList($startPoint,$limit); 
					?>
                </table>
                <?php
                    //get the pagination of the page
                    $manageData->pagination($startPoint,"listBlog.php",10,"article_info","date",$keyword);
                ?>
        </div>
    	
    </div><!--body main container ends here-->
    
<?php
	//get footer
	include('v-templates/footer.php');
?>