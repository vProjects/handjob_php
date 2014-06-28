<?php
	include('v-templates/header.php');
	//include sidebar
	include('v-templates/sidebar.php');
?>
<script type="text/javascript">
	window.onload = function(){
						fireProgress() ;
					}
</script>
        <!--container for content of the website-->
        <div class="span9" id="content_container">
        	<div class="span12 admin_container">
            	<blockquote>Running Process</blockquote>
                <div class="span11 process_div" id="process_div">
                	<p class="green_text">System processes running now...!!</p>
                    <?php
						$manageData->getCronVaues();
					?>
                </div>
            </div>
            
            <div class="row">
                <div class="span12" style="text-align:center;">
                    <a href="http://www.handjobstop.com/v-admin/v-includes/cron_jobs/cronsConvertVid.php" target="_blank">
                        <input type="button" class="btn btn-danger" value="Start Process" />
                    </a>
                </div>
            </div>
        
        
        </div>
    	
    </div><!--body main container ends here-->
    
<?php
	//get footer
	include('v-templates/footer.php');
?>