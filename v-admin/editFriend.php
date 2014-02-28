<?php
	$page_title = "Edit Friends" ;
	$accord_cat = "content" ;
	include('v-templates/header.php');
	//include sidebar
	include('v-templates/sidebar.php');
	
	$model_id = "";
	if( $GLOBALS["_GET"] > 0 )
	{ 
		//get the model id 
		$friend_id = $GLOBALS["_GET"]["id"];
	}
	
	$friend_detial = $manageData->getValue_Where("friends","*","id",$friend_id);
?>
		
        <!--container for content of the website-->
        <div class="span9" id="content_container">
        	<blockquote>
                <p>Edit a Friend</p>
                <small>
                	<cite title="Source Title">Edit Friend to your website.</cite>
                </small>
            </blockquote>
            	
                <div class="image_model">
                    <img src="../members/images/friend_thumb/<?php echo $friend_detial[0]['friend_thumb']; ?>" style="height:377px;width:250px;"/>
                    <a href="cropFriend.php?id=<?php echo $friend_id; ?>&save=false&filename=<?php echo $friend_detial[0]['friend_thumb']; ?>" >
                        <button class="btn btn-warning" type="button" style="margin:4px 28px;">
                        <span class="icon-pencil"></span>&nbsp;&nbsp;CROP MODEL IMAGE</button>
                    </a>
                </div>
                
            <div class="form-horizontal">
            	<div class="edit_date">Date:<?php echo $friend_detial[0]['date']; ?></div>
            <form action="v-includes/functions/function.editFriend.php" method="post" enctype="multipart/form-data">
            	<div class="form-control v-form">
                	<label class="control-label">Friend Name</label>
                    <input type="text" placeholder="Friend Name" class="textbox1" name="name" value="<?php echo $friend_detial[0]['name']; ?>"/>
                </div>
                <div class="form-control v-form">
                	<label class="control-label">Friend Link</label>
                    <input type="text" placeholder="Friend link" class="textbox1" name="link" value="<?php echo $friend_detial[0]['link']; ?>"/>
                </div>
                <div class="form-control v-form">
                    <label class="control-label">Date</label>
                    <input type="text" placeholder="Date" class="textbox1" name="date" id="datepicker" />
                </div>
                <div class="form-control v-form">
                	<label class="control-label">Show in:</label>
                    <select class="selectbox1" name="access_friends">
                    	<option <?php if($friend_detial[0]['access'] == 3){ echo 'selected="selected"';} ?> value="3">Both</option>
                        <option <?php if($friend_detial[0]['access'] == 2){ echo 'selected="selected"';} ?> value="2">Members</option>
                        <option <?php if($friend_detial[0]['access'] == 1){ echo 'selected="selected"';} ?> value="1">Tour</option>
                    </select>
                </div>
                <div class="form-control v-form">
                	<label class="control-label">Status</label>
                    <select class="selectbox1" name="status">
                    	<option <?php if($friend_detial[0]['status'] == 1){ echo 'selected="selected"';} ?> value="online">Online</option>
                        <option <?php if($friend_detial[0]['status'] == 0){ echo 'selected="selected"';} ?> value="offline">Offline</option>
                    </select>
                </div>
               <div class="form-control v-form">
                	<label class="control-label">Upload Photo</label>
                    <input type="file" class="textbox1" name="photo"/>
                </div>
                <div class="form-control v-form">
                <div class="function_result"><?php if(isset($_SESSION['result'])){echo $_SESSION['result'];unset($_SESSION['result']);} ?></div>
                	<input type="submit" value="Update" class="btn btn-large btn-primary btn1" />
                    <input type="hidden" value="<?php echo $friend_id ; ?>" name="id" />
                    <input type="hidden" value="<?php echo $friend_detial[0]['friend_thumb'] ; ?>" name="friend_thumb" />
                </div>
            </form>
            </div><!--form ends here-->
            
            
            
        </div>
    	
    </div><!--body main container ends here-->
    
<?php
	//get footer
	include('v-templates/footer.php');
?>