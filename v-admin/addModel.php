<?php
	$pageTitle = "Add Model";
	include('v-templates/header.php');
	//include sidebar
	include('v-templates/sidebar.php');
?>

        <!--container for content of the website-->
        <div class="span9" id="content_container">
        	<blockquote>
                <p>Add a Model</p>
                <small>
                	<cite title="Source Title">Please add a model to your website.</cite>
                </small>
            </blockquote>
            <!--form for adding the model-->
            <div class="form-horizontal">
            <form action="v-includes/functions/function.addModel.php" method="post" enctype="multipart/form-data">
            	<div class="form-control v-form">
                	<label class="control-label">Model Name</label>
                    <input type="text" placeholder="Model Name" class="textbox1" name="model_name"/>
                </div>
                <div class="form-control v-form">
                	<label class="control-label">Description</label>
                    <textarea type="text" placeholder="Description" class="textbox1" name="description"></textarea>
                </div>
                <div class="form-control v-form">
                	<label class="control-label">Age</label>
                    <input type="text" placeholder="Age" class="textbox1" name="age"/>
                </div>
                <div class="form-control v-form">
                	<label class="control-label">Height</label>
                    <input type="text" placeholder="Height" class="textbox1" name="height"/>
                </div>
                <div class="form-control v-form">
                	<label class="control-label">Weight</label>
                    <input type="text" placeholder="Weight" class="textbox1" name="weight"/>
                </div>
                <div class="form-control v-form">
                	<label class="control-label">Measurement</label>
                    <input type="text" placeholder="Measurement" class="textbox1" name="measurement"/>
                </div>
                <div class="form-control v-form">
                	<label class="control-label">Category</label>
                    <select class="selectbox1" multiple="multiple" name="category[]">
                    	<?php 
								echo '<option value="">--------------------------------Movie Category--------------------------------</option>';
								//get the list of the movie categories
								$manageData->getCategoryListSelectBox("movie_category");
								echo '<option value="">--------------------------------Model Category--------------------------------</option>';
								//get the list of the model categories
								$manageData->getCategoryListSelectBox("model_category");
							?>
                    </select>
                </div>
                <div class="form-control v-form">
                	<label class="control-label">Status</label>
                    <select class="selectbox1" name="status">
                    	<option value="1">Online</option>
                        <option value="0">Offline</option>
                    </select>
                </div>
                <div class="form-control v-form">
                	<label class="control-label">Upload Photo</label>
                    <input type="file" class="textbox1" name="photo"/>
                </div>
                <div class="form-control v-form">
                <div class="function_result"><?php if(isset($_SESSION['result'])){echo $_SESSION['result'];unset($_SESSION['result']);} ?></div>
                	<input type="submit" value="Submit" class="btn btn-large btn-primary btn1" />
                </div>
            </form>
            </div><!--form ends here-->
        </div>
    	
    </div><!--body main container ends here-->
    
<?php
	//get footer
	include('v-templates/footer.php');
?>