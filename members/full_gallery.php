<?php
	$page_title = 'MODELS';
	//get header
	include ('v-templates/header.php');

	//get the horizontal navbar
	include ('v-templates/navbar.php');
	$gallery_id = $GLOBALS["_GET"]["galleryId"];
	$model_id = $GLOBALS["_GET"]["model_id"];
	
	//codes for setting the views
	$manageData->manageViews("gallery",$gallery_id);
	
?>

<div id="bodyContainer" class="row-fluid">
    	 
    	 <?php
			//if the get varriable is set 
			if(isset($model_id) && !empty($model_id))
			{
				//get the UI structure of model details
				$manageData->getModelDetails($model_id);
			}
		?>
        
        <div id="bodyContainer" class="row-fluid">
           <div class="row-fluid">
                <div class="btn-group">
                    <?php
                        if(isset($gallery_id) && !empty($gallery_id))
                        {
                            //get vid cap link
                            $manageData->getZipLinks($gallery_id);
                        }
                    ?>
                </div>	
           </div>
        
		<?php
			if(!empty($gallery_id) && isset($gallery_id))
			{
				//get the required model gallerys
				$manageData->getFullGallery($gallery_id);
			}
		?>
    	
   	</div>
    <!-- body container ends here -->
    <div class="row-fluid">
	        <div class="span12">
	            <div class="offset3 span6 rating">
	                Rate Me:
	                <img class="rateme" src="images/white-star.png"  alt="star" onclick="rate(5,'<?php echo $_SESSION["user"] ;?>','<?php echo $gallery_id ;?>','gallery')">
	                <img class="rateme" src="images/white-star.png"  alt="star" onclick="rate(4,'<?php echo $_SESSION["user"] ;?>','<?php echo $gallery_id ;?>','gallery')">
	                <img class="rateme" src="images/white-star.png"  alt="star" onclick="rate(3,'<?php echo $_SESSION["user"] ;?>','<?php echo $gallery_id ;?>','gallery')">
	                <img class="rateme" src="images/white-star.png"  alt="star" onclick="rate(2,'<?php echo $_SESSION["user"] ;?>','<?php echo $gallery_id ;?>','gallery')">
	                <img class="rateme" src="images/white-star.png"  alt="star" onclick="rate(1,'<?php echo $_SESSION["user"] ;?>','<?php echo $gallery_id ;?>','gallery')">
	            </div>
	        </div>
    </div>
    
    
    <div class="row-fluid comment_box">
    	<div class="alert">
		  <button type="button" class="close" data-dismiss="alert">&times;</button>
		  <strong>Success !!</strong> You have successfully submitted the commemnt
		</div>
    	<div class="row-fluid comments">	
	    	<div class="span2"><img src="http://placehold.it/100x100/" alt="userimage"></div>
	    	<div class="span10">
	    		<p>This is going to be a comment and this will be very good since it takes a very less time to comment on this system This is going to be a comment and this will be very good since it takes a very less time to comment on this system</p>
	    		<p><i class="icon-glass"></i><span class="commentstatus"> Like </span><span class="badge badge-success">2</span> <i class="icon-remove-sign"></i><span class="commentstatus"> Dislike </span><span class="badge badge-inverse">10</span> </p>
	    	</div>
    	</div>
    	<div class="row-fluid comments">	
	    	<div class="span2"><img src="http://placehold.it/100x100/" alt="userimage"></div>
	    	<div class="span10">
	    		<p>This is going to be a comment and this will be very good since it takes a very less time to comment on this system This is going to be a comment and this will be very good since it takes a very less time to comment on this system</p>
	    		<p><i class="icon-glass"></i><span class="commentstatus"> Like </span><span class="badge badge-success">2</span> <i class="icon-remove-sign"></i><span class="commentstatus"> Dislike </span><span class="badge badge-inverse">10</span> </p>
	    	</div>
    	</div>
    	<div class="row-fluid comments">	
	    	<div class="span2"><img src="http://placehold.it/100x100/" alt="userimage"></div>
	    	<div class="span10">
	    		<p>This is going to be a comment and this will be very good since it takes a very less time to comment on this system This is going to be a comment and this will be very good since it takes a very less time to comment on this system</p>
	    		<p><i class="icon-glass"></i><span class="commentstatus"> Like </span><span class="badge badge-success">2</span> <i class="icon-remove-sign"></i><span class="commentstatus"> Dislike </span><span class="badge badge-inverse">10</span> </p>
	    	</div>
    	</div>
    	<div class="row-fluid">	
	    	<div class="span12">
	    		<form class="form-horizontal">
		    		<div class="control-group">
		    			<div class="controls">
			    			<textarea rows="4" style="width: 50%"></textarea>
			    		</div>
			    		<div class="controls">
			    			<input type="button" class="btn" value="Submit">
			    		</div>			    		
		    		</div>
	    		</form>
	    	</div>
    	</div>
    </div>
    <script src="assets/js/js_function_v.js" type="text/javascript"></script>
    
    
<?php
	//include footer
	include ('v-templates/footer.php');
?>