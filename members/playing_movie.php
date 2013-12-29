<?php
	$page_title = 'PLAYING-MOVIE';
	//get header
	include ('v-templates/header.php');

	//get the horizontal navbar
	include ('v-templates/navbar.php');
	
	//get the value of id from the query string
	$movie_id = $GLOBALS["_GET"]["movieId"];
	$gallery_id = $GLOBALS["_GET"]["gallery_id"];
	
	//codes for setting the views
	$manageData->manageViews("movie",$movie_id);

?>

    
    <div id="bodyContainer" class="row-fluid">
       <div class="row-fluid">
       		<div class="btn-group">
                <button class="btn btn-large btn-danger">High</button>
                <button class="btn btn-large btn-danger">Medium</button>
                <button class="btn btn-large btn-danger">Low</button>
				<?php
                    if(isset($movie_id) && !empty($movie_id))
                    {
                        //get vid cap link
                        $manageData->getVidCapLink($movie_id);
                    }
                ?>
			</div>	
       </div>
       
       <div class="row-fluid">
       		<div class="span10 offset1 media" style="height:400px;margin-top:10px;">
            <!-- new video player added here -->
            <div id="myplayer">
                <video id="h264" src="http://handjobstop.com/members/videos/oceans-clip.mp4" poster="http://handjobstop.com/members/images/movie_thumb/52a9ae35299c1.JPG"  style="height:400px;margin-top:10px;"></video>
            </div>
          
          <!-- new video player added here -->
          </div>
      </div>
       
       
     <!-- model detail starts here -->
        <?php
			//if the get varriable is set 
			if(isset($movie_id) && !empty($movie_id))
			{
				//get the UI structure of model details
				$manageData->getSlicedMovie($movie_id);
			}
		?>
   	</div>
    <!-- body container ends here -->
   <div class="row-fluid">
        <div class="span12">
            <div class="offset3 span6 rating">
                Rate Me:
                <img class="rateme" src="images/white-star.png" alt="star" onclick="rate(1,'<?php echo $_SESSION["user"] ;?>','<?php if(isset($gallery_id) && $gallery_id != 0){ echo $gallery_id;}else{ echo $movie_id ;}?>','<?php if(isset($gallery_id) && $gallery_id != 0){ echo 'sliced';}else{ echo 'movie' ;}?>')">
                <img class="rateme" src="images/white-star.png" alt="star" onclick="rate(2,'<?php echo $_SESSION["user"] ;?>','<?php if(isset($gallery_id) && $gallery_id != 0){ echo $gallery_id;}else{ echo $movie_id ;}?>','<?php if(isset($gallery_id) && $gallery_id != 0){ echo 'sliced';}else{ echo 'movie' ;}?>')">
                <img class="rateme" src="images/white-star.png" alt="star" onclick="rate(3,'<?php echo $_SESSION["user"] ;?>','<?php if(isset($gallery_id) && $gallery_id != 0){ echo $gallery_id;}else{ echo $movie_id ;}?>','<?php if(isset($gallery_id) && $gallery_id != 0){ echo 'sliced';}else{ echo 'movie' ;}?>')">
                <img class="rateme" src="images/white-star.png" alt="star" onclick="rate(4,'<?php echo $_SESSION["user"] ;?>','<?php if(isset($gallery_id) && $gallery_id != 0){ echo $gallery_id;}else{ echo $movie_id ;}?>','<?php if(isset($gallery_id) && $gallery_id != 0){ echo 'sliced';}else{ echo 'movie' ;}?>')">
                <img class="rateme" src="images/white-star.png" alt="star" onclick="rate(5,'<?php echo $_SESSION["user"] ;?>','<?php if(isset($gallery_id) && $gallery_id != 0){ echo $gallery_id;}else{ echo $movie_id ;}?>','<?php if(isset($gallery_id) && $gallery_id != 0){ echo 'sliced';}else{ echo 'movie' ;}?>')">
            </div>
        </div>
    </div>
    
    <!-- comment box starts here -->
    <div class="row-fluid comment_box">
		<?php 
			//print the status of the comment submission
			if( isset($_SESSION['result']) && !empty($_SESSION['result']))
			{
				echo '<div class="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>' ;
				echo $_SESSION['result'] ;
				unset($_SESSION['result']) ;
				echo '</div>' ;
			}
			
			//get the comments for the post
			$manageData->getComments("movie",$movie_id,$gallery_id) ;
        ?>
        <div class="row-fluid">
            <div class="span12">
                <h4>Comment Here:</h4>
            </div>
        </div> 
    	<div class="row-fluid">	
	    	<div class="span12">
	    		<form class="form-horizontal" action="functions/function.comment.php" method="post">
		    		<div class="control-group">
		    			<div class="controls">
			    			<textarea rows="4" style="width: 50%" name="comment"></textarea>
			    		</div>
			    		<div class="controls">
                        	<input type="hidden" value="<?php echo $movie_id ; ?>" name="id" />
                            <input type="hidden" value="<?php echo $gallery_id ; ?>" name="gallery_id" />
                            <input type="hidden" value="movie" name="type" />
                            <input type="hidden" value="<?php echo $_SESSION['user'] ;?>" name="member" />
			    			<input type="submit" class="btn" value="Submit">
			    		</div>			    		
		    		</div>
	    		</form>
	    	</div>
    	</div>
    </div><!-- comment box ends here -->
    
    
    <script src="assets/js/js_function_v.js" type="text/javascript"></script>
     
<?php
	//include footer
	include ('v-templates/footer.php');
?>  