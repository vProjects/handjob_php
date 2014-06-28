<?php
	//set the variables of the accordion and page title
	$page_title = "List Members" ;
	$accord_cat = "dashboard" ;
	
	include('v-templates/header.php');
	//include sidebar
	include('v-templates/sidebar.php');
?>
        
        <!--container for content of the website-->
        <div class="span9" id="content_container">
        	<blockquote>
                <p>List Members</p>
                <small>
                	<cite title="Source Title">List of members in your website.</cite>
                </small>
            </blockquote>
                <table class="table table-hover">
                    <caption>List Of Members</caption>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>End Date</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>...</td>
                            <td>...</td>
                            <td>...</td>
                            <td>...</td>
                            <td>...</td>
                            <td>...</td>
                            <td>...</td>
                            <td>...</td>
                        </tr>
                    </tbody>
                </table>
        </div>
    	
    </div><!--body main container ends here-->
    
<?php
	//get footer
	include('v-templates/footer.php');
?>