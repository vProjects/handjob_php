<?php
	$pageTitle = "Add Model";
	include('v-templates/header.php');
	//include sidebar
	include('v-templates/sidebar.php');
?>
		
        <!--container for content of the website-->
        <div class="span9" id="content_container">
        	<blockquote>
                <p>Manage Pagination</p>
                <small>
                	<cite title="Source Title">Manage Pagination for model,movies and photos of member area.</cite>
                </small>
            </blockquote>
                
            <div class="form-horizontal">
            <form action="v-includes/functions/function.managePagination.php" method="post">
            	<div class="form-control v-form">
                	<label class="control-label">No of Rows</label>
                    <select class="selectbox1" name="pagination">
                    	<option value="">Select One</option>
                    	<option value="8">2 Rows</option>
                        <option value="12">3 Rows</option>
                        <option value="16">4 Rows</option>
                        <option value="20">5 Rows</option>
                        <option value="24">6 Rows</option>
                        <option value="28">7 Rows</option>
                        <option value="32">8 Rows</option>
                        <option value="36">9 Rows</option>
                        <option value="40">10 Rows</option>
                    </select>
                </div>
                <div class="form-control v-form">
                <div class="function_result"><?php if(isset($_SESSION['result'])){echo $_SESSION['result'];unset($_SESSION['result']);} ?></div>
                	<input type="submit" value="Update" class="btn btn-large btn-primary btn1" />
                </div>
               </form>
            </div><!--form ends here-->
            
        </div>
    	
    </div><!--body main container ends here-->
    
<?php
	//get footer
	include('v-templates/footer.php');
?>