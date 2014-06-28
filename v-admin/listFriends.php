<?php
	//set the variables of the accordion and page title
	$page_title = "List Friends" ;
	$accord_cat = "content" ;
	
	include('v-templates/header.php');
	//include sidebar
	include('v-templates/sidebar.php');
	
	//include('v-includes/library/pagination_config.php');
	include('v-includes/library/pagination_config.php');
	
	$total_elements = $manageData->getTotalElements("friends") ;
?>
        
        <!--container for content of the website-->
        <div class="span9" id="content_container">
        	<blockquote>
                <p>List Friends</p>
                <small>
                	<cite title="Source Title">List of friends in your website.</cite>
                </small>
            </blockquote>
            <div class="span4">
            	<h4>Tolal Elements: <?php echo $total_elements ; ?></h4>
            </div>
				<?php
					if($keyword == "")
					{
						//get the pagination of the page
						$manageData->pagination($startPoint,"listFriends.php",10,"friends","date","");
					}
				?>
                <table class="table table-hover">
                    <caption>List Of Models</caption>
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Link</th>
                            <th>Date</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    
					<?php
                        //call the method from BLL to get friends list
                        $manageData->getFriendsList($startPoint,"15") ;
                    ?>
                        
                </table>
                
                <?php
					if($keyword == "")
					{
						//get the pagination of the page
						$manageData->pagination($startPoint,"listFriends.php",10,"friends","date","");
					}
				?>
        </div>
    	
    </div><!--body main container ends here-->
    
<?php
	//get footer
	include('v-templates/footer.php');
?>