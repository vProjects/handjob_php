<?php
	//set the variables of the accordion and page title
	$page_title = "List Sliced" ;
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
	
	$total_elements = $manageData->getTotalElements("sliced_vids") ;
?>
        
        <!--container for content of the website-->
        <div class="span9" id="content_container">
        	<blockquote>
                <p>List Sliced Movies</p>
                <small>
                	<cite title="Source Title">List of Sliced Movies in your website.</cite>
                </small>
            </blockquote>
            <div class="span4">
            	<h4>Tolal Elements: <?php echo $total_elements ; ?></h4>
            </div>
            <div class="span4 pull-right">
                  <input type="text" class="input-medium" style="margin-bottom:0px;" placeholder="Search..." id="search_box_1">
                  <button type="button" class="btn btn-primary" onclick="searchPage('listSlicedVid.php','search_box_1')">Search</button>
            </div>
                <?php
					if($keyword == "" )
					{
						//get the pagination of the page
						$manageData->pagination($startPoint,"listSlicedVid.php",10,"sliced_vids","date",$keyword);
					}
				?>

                <table class="table table-hover">
                    <caption>List Of Models</caption>
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
                        $manageData->getSlicedVideoList($startPoint,$limit,$keyword);							
                    ?>
                        
                </table>
                <?php
					if($keyword == "" )
					{
						//get the pagination of the page
						$manageData->pagination($startPoint,"listSlicedVid.php",10,"sliced_vids","date",$keyword);
					}
				?>
        </div>
    	
    </div><!--body main container ends here-->
    
<?php
	//get footer
	include('v-templates/footer.php');
?>