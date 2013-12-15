<?php
	//set the variables of the accordion and page title
	$page_title = "Social Links" ;
	$accord_cat = "social" ;
	
	include('v-templates/header.php');
	//include sidebar
	include('v-templates/sidebar.php');
?>
        <!--container for content of the website-->
        <div class="span9" id="content_container">
        	<blockquote>
                <p>Chang Socail Links</p>
                <small>
                	<cite title="Source Title">Change Social Links of your website.</cite>
                </small>
            </blockquote>
            <!--form for adding the model-->
            <div class="form-horizontal">
            	<div class="form-control v-form">
                	<label class="control-label">Twiter Link</label>
                    <input type="text" placeholder="Twiter Link" class="textbox1"/>
                </div>
                <div class="form-control v-form">
                	<label class="control-label">Facebook Link</label>
                    <input type="text" placeholder="Facebook Link" class="textbox1"/>
                </div>
                <div class="form-control v-form">
                	<input type="submit" value="Submit" class="btn btn-large btn-primary btn1" />
                </div>
            </div><!--form ends here-->
        </div>
    	
    </div><!--body main container ends here-->
    
<?php
	//get footer
	include('v-templates/footer.php');
?>