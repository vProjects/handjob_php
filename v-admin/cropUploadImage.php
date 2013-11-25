<?php
	include('v-templates/header.php');
	//include sidebar
	include('v-templates/sidebar.php');
?>
        <!--container for content of the website-->
        <div class="span9" id="content_container">
        	<blockquote>
                <p>Update Uploaded Photos</p>
                <small>
                	<cite title="Source Title">Select the uploaded image for gallery creation to crop.</cite>
                </small>
            </blockquote>
            <div class="form-horizontal">
                <div class="form-control v-form">
                    <label class="control-label">Folder Name</label>
                    <select class="selectbox1" name="foldername" onBlur="reloadPage(this.value)">
                        <option value="">Select one</option>
                        <?php
                            //get the names of the folders
                            $manageData->getFolders();
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="span12 gallery1">
                <?php
                    if(!empty($GLOBALS['_GET']['folderName']))
                    {
                        //get the gallery id which contains the folder name of gallery images
                        $folderName = $GLOBALS['_GET']['folderName'];
						$manageData->getUploadedImages($folderName);
                    }
                    
                ?>
                </div>
            </div><!--gallery div ends here-->
        </div>
    	
    </div><!--body main container ends here-->
    
<?php
	//get footer
	include('v-templates/footer.php');
?>