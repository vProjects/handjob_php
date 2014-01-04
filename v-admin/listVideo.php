<?php
	//set the variables of the accordion and page title
	$page_title = "List Video" ;
	$accord_cat = "manage_media" ;
	
	include('v-templates/header.php');
	//include sidebar
	include('v-templates/sidebar.php');
	
	include('v-includes/library/pagination_config.php');
	
	//get the search keyword
	if( isset($GLOBALS["_GET"]["keyword"]) && !empty($GLOBALS["_GET"]["keyword"]) )
	{ 
		//pagination limit
		$keyword = $GLOBALS["_GET"]["keyword"];
		
	}
	
	$total_elements = $manageData->getTotalElements("movie_info") ;
?>
        
        <!--container for content of the website-->
        <div class="span9" id="content_container">
        	<blockquote>
                <p>List Movies</p>
                <small>
                	<cite title="Source Title">List of Movies in your website.</cite>
                </small>
            </blockquote>
            <div class="span4">
            	<h4>Tolal Elements: <?php echo $total_elements ; ?></h4>
            </div>
            <div class="span4 pull-right">
                  <input type="text" class="input-medium" style="margin-bottom:0px;" placeholder="Search..." id="search_box_1">
                  <button type="button" class="btn btn-primary" onclick="searchPage('listVideo.php','search_box_1')">Search</button>
            </div>
                <?php
					if($keyword == "")
					{
						//get the pagination of the page
						$manageData->pagination($startPoint,"listVideo.php",10,"movie_info","date",$keyword);
					}
				?>

                <table class="table table-hover">
                    <caption>List Of Movies</caption>
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
                        //call the method from BLL to get model list
                        $manageData->getVideoList($startPoint,$limit,$keyword);						
                    ?>
                        
                </table>
                <?php
					if($keyword == "")
					{
						//get the pagination of the page
						$manageData->pagination($startPoint,"listVideo.php",10,"movie_info","date",$keyword);
					}
				?>
        </div>
    	
    </div><!--body main container ends here-->
    
<?php
	//get footer
	include('v-templates/footer.php');
?>