<?php
	$pageTitle = "Add Model";
	include('v-templates/header.php');
	//include sidebar
	include('v-templates/sidebar.php');
	
	$model_id = "";
	if( $GLOBALS["_GET"] > 0 )
	{ 
		//get the model id 
		$model_id = $GLOBALS["_GET"]["modelId"];
	}
	
	$model_detail = $manageData->getValue_Where("model_info","*","id",$model_id);
?>
		
        <!--container for content of the website-->
        <div class="span9" id="content_container">
        	<blockquote>
                <p>Edit a Model</p>
                <small>
                	<cite title="Source Title">Edit model to your website.</cite>
                </small>
            </blockquote>
            	
                <div class="image_model">
                    <img src="../members/images/model_thumb/<?php echo $model_detail[0]['image_thumb']; ?>" style="height:377px;width:250px;"/>
                    <a href="cropImage.php?modelId=<?php echo $model_id; ?>&save=false&filename=<?php echo $model_detail[0]['image_thumb']; ?>" >
                        <button class="btn btn-warning" type="button" style="margin:4px 28px;">
                        <span class="icon-pencil"></span>&nbsp;&nbsp;CROP MODEL IMAGE</button>
                    </a>
                </div>
                
            <div class="form-horizontal">
            	<div class="edit_date">Date:<?php echo $model_detail[0]['date']; ?></div>
            <form action="v-includes/functions/function.editModel.php" method="post" enctype="multipart/form-data">
            	<div class="form-control v-form">
                	<label class="control-label">Model Name</label>
                    <input type="text" placeholder="Model Name" class="textbox1" name="model_name" value="<?php echo $model_detail[0]['name']; ?>"/>
                </div>
                <div class="form-control v-form">
                	<label class="control-label">Description</label>
                    <textarea type="text" placeholder="Description" class="textbox1" name="description"><?php echo $model_detail[0]['description']; ?></textarea>
                </div>
                <div class="form-control v-form">
                	<label class="control-label">Age</label>
                    <input type="text" placeholder="Age" class="textbox1" name="age" value="<?php echo $model_detail[0]['age']; ?>"/>
                </div>
                <div class="form-control v-form">
                	<label class="control-label">Height</label>
                    <input type="text" placeholder="Height" class="textbox1" name="height" value="<?php echo $model_detail[0]['height']; ?>"/>
                </div>
                <div class="form-control v-form">
                	<label class="control-label">Weight</label>
                    <input type="text" placeholder="Weight" class="textbox1" name="weight" value="<?php echo $model_detail[0]['weight']; ?>"/>
                </div>
                <div class="form-control v-form">
                	<label class="control-label">Measurement</label>
                    <input type="text" placeholder="Measurement" class="textbox1" name="measurement"/>
                </div>
                <div class="form-control v-form">
                	<label class="control-label">Date</label>
                    <input type="text" placeholder="Date" class="textbox1" name="date" id="datepicker"/>
                </div>
                <div class="form-control v-form">
                	<label class="control-label">Category</label>
                    <input type="text" placeholder="Measurement" class="textbox1" readonly="readonly" value="<?php echo $model_detail[0]['category']; ?>"/>
                </div>
                <div class="form-control v-form">
                	<label class="control-label" style="color:#fff;">Category</label>
                    <select class="selectbox1" style="height:150px;" multiple="multiple" name="category[]">
                    	<?php 
								echo '<option value="">-------Movie Category------</option>';
								//get the list of the movie categories
								$manageData->getCategoryListSelectBox("movie_category");
								echo '<option value="">-------Model Category------</option>';
								//get the list of the model categories
								$manageData->getCategoryListSelectBox("model_category");
							?>
                    </select>
                </div>
                <div class="form-control v-form">
                	<label class="control-label">Status</label>
                    <select class="selectbox1" name="status">
                    	<option <?php if($model_detail[0]['status'] == 1){ echo 'selected="selected"';} ?> value="online">Online</option>
                        <option <?php if($model_detail[0]['status'] == 0){ echo 'selected="selected"';} ?> value="offline">Offline</option>
                    </select>
                </div>
               <div class="form-control v-form">
                	<label class="control-label">Upload Photo</label>
                    <input type="file" class="textbox1" name="photo"/>
                </div>
                <div class="form-control v-form">
                <div class="function_result"><?php if(isset($_SESSION['result'])){echo $_SESSION['result'];unset($_SESSION['result']);} ?></div>
                	<input type="submit" value="Update" class="btn btn-large btn-primary btn1" />
                </div>
                <input type="hidden" value="<?php echo $model_detail[0]['image_thumb']; ?>" name="thumb_name"/>
                <input type="hidden" value="<?php echo $model_detail[0]['id']; ?>" name="id"/>
            </form>
            </div><!--form ends here-->
            
            <!-- get the list of model specific gallery -->
            <table class="table table-hover">
            <caption>List Of Model Gallery</caption>
            <thead>
                <tr>
                    <th>Thumb</th>
                    <th>Gallery Id</th>
                    <th>Gallery Name</th>
                    <th>Model</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
                
			<?php
                //call the method from BLL to get model list
                $manageData->getGalleryListByModel(0,100,$model_detail[0]['name']);							
            ?>
                    
            </table>
            
            <!-- get the list of model specific movies -->
            <table class="table table-hover">
                <caption>List Of Model Movies</caption>
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
                    $manageData->getVideoListByModel(0,100,$model_detail[0]['name']);						
                ?>
                    
            </table>
        </div>
    	
    </div><!--body main container ends here-->
    
<?php
	//get footer
	include('v-templates/footer.php');
?>