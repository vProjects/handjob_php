<?php
	//set the variables of the accordion and page title
	$page_title = "List Model" ;
	$accord_cat = "dashboard" ;
	
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
?>
        
        <!--container for content of the website-->
        <div class="span9" id="content_container">
        	<blockquote>
                <p>List Model</p>
                <small>
                	<cite title="Source Title">List of models in your website.</cite>
                </small>
            </blockquote>
            <div class="span4 pull-right">
                  <input type="text" class="input-medium" style="margin-bottom:0px;" placeholder="Search..." id="search_box_1">
                  <button type="button" class="btn btn-primary" onclick="searchPage('listModels.php','search_box_1')">Search</button>
            </div>

                <table class="table table-hover">
                    <caption>List Of Models</caption>
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Height</th>
                            <th>Weight</th>
                            <th>Date</th>
                            <th>Categories</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    
					<?php
                        //call the method from BLL to get model list
                        $manageData->getModelList($startPoint,$limit,$keyword);							
                    ?>
                        
                </table>
                <?php
					if($keyword == "")
					{
						//get the pagination of the page
						$manageData->pagination($startPoint,"listModels.php",10,"model_info","date",$keyword);
					}
				?>
        </div>
    	
    </div><!--body main container ends here-->
    
<?php
	//get footer
	include('v-templates/footer.php');
?>