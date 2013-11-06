<?php
	include('v-templates/header.php');
	//include sidebar
	include('v-templates/sidebar.php');
?>
        <!--container for content of the website-->
        <div class="span9" id="content_container">
        	<div class="span12 admin_container">
            	<blockquote>Running Process</blockquote>
                <div class="span11 process_div">
                	<p class="green_text">System processes running now...!!</p>
                    <?php
						$manageData->getCronVaues();
					?>
                </div>
            </div>
        </div>
    	
    </div><!--body main container ends here-->
    
<?php
	//get footer
	include('v-templates/footer.php');
?>