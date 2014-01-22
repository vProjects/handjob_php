<?php
	$page_title = 'PLAYING-MOVIE';
	//get header
	include ('v-templates/header.php');

	//get the horizontal navbar
	include ('v-templates/navbar.php');
	
	//get the value of id from the query string
	$movie_id = $GLOBALS["_GET"]["movieId"];
	$gallery_id = $GLOBALS["_GET"]["gallery_id"];
	$model_id = $GLOBALS["_GET"]["model"];
	$type = $GLOBALS["_GET"]["type"] ;
	
	//codes for setting the views
	$manageData->manageViews("movie",$movie_id);
	
	//get the rating for the particular movie
	/*- initialise the variable -*/
	$enity_rating = "" ;
	
	if($gallery_id == 0 )
	{
		$enity_rating = $manageData->getRating("movie",$movie_id) ;
	}
	else
	{
		$enity_rating = $manageData->getRating("sliced",$gallery_id) ;
	}
	
	/*
	- codes for generating movie_url
	- Auth Singh
	*/
	//codes for the movie_url
	$video_url = "" ;
	
	if( $gallery_id != 0 )
	{
		$video_url .= "sliced/" ;
	}
	else
	{
		$video_url .= "videos/" ;
	}
	
	$video_url .= $movie_id."/" ;
	
	//modify accoring to the type
	if( $type == "medium" )
	{
		$video_url .= "m/" ;
	}
	elseif( $type != "high" )
	{
		$video_url .= "s/" ;
	}
	
	//video link
	if( $gallery_id != 0 )
	{
		$video_url .= $gallery_id.".mp4" ;
	}
	else
	{
		$video_url .= $movie_id.".mp4" ;
	}
	
	
?>

    
    <div id="bodyContainer" class="row-fluid">
    	<?php
			//if the get varriable is set 
			if(isset($model_id) && !empty($model_id))
			{
				//get the UI structure of model details
				$manageData->getModelDetails($model_id);
			}
			
            //get the description
            $manageData->getDescription($movie_id,"movie") ;
        ?>
       
       <div class="row-fluid">
       		<div class="btn-group">
                <a href="playing_movie.php?<?php echo "model=".$model_id."&movieId=".$movie_id."&gallery_id=".$gallery_id."&type=low" ; ?>"><button class="btn btn-large btn-danger <?php if( $type == "low" ){ echo "active"; } ?>">Low</button></a>
                <a href="playing_movie.php?<?php echo "model=".$model_id."&movieId=".$movie_id."&gallery_id=".$gallery_id."&type=medium" ; ?>"><button class="btn btn-large btn-danger <?php if( $type == "medium" ){ echo "active"; } ?>">Medium</button></a>
                <a href="playing_movie.php?<?php echo "model=".$model_id."&movieId=".$movie_id."&gallery_id=".$gallery_id."&type=high" ; ?>"><button class="btn btn-large btn-danger <?php if( $type == "high" ){ echo "active"; } ?>">High</button></a>
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
			<video class="mejs-ted" width="640" height="360" src="<?php echo $video_url ; ?>" type="video/mp4" 
				id="player1" poster="images/movie_thumb/52d6639a31b48.JPG" 
				controls="controls" preload="none">
			</video>

				
		<script>
			$('audio,video').mediaelementplayer({
				success: function(player, node) {
					$('#' + node.id + '-mode').html('mode: ' + player.pluginType);
				}
			});
			
			</script>
		
          
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
                
                <?php
					//check the rating to find thats i hot or not
					if( $enity_rating > 3 )
					{
						echo '<img src="images/img_hot.png" alt="rate-me" />' ;
					}
				?>
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
    <?php
		//generate an alternate number for the members favorite
		$alternate = rand(1,2) ;
		if( $alternate%2 == 0 ) 
		{
			//get the random members favourite movie
			$manageData->membersFavourite(0,12,'movie',4) ;			
		}
		else
		{
			//get the random members favourite photos
			$manageData->membersFavourite(0,12,'photo',4) ;
		}
	?>
    
    
    <script src="assets/js/js_function_v.js" type="text/javascript"></script>
     
<?php
	//include footer
	include ('v-templates/footer.php');
?>  