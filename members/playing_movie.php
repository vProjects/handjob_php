<?php
	$page_title = 'PLAYING-MOVIE';
	//get header
	include ('v-templates/header.php');

	//get the horizontal navbar
	include ('v-templates/navbar.php');
	
	//get the value of id from the query string
	$movie_id = $GLOBALS["_GET"]["movieId"];
?>

    
    <div id="bodyContainer" class="row-fluid">
       <div class="row-fluid">
       		<div class="btn-group">
			  <button class="btn btn-large btn-danger">High</button>
			  <button class="btn btn-large btn-danger">Medium</button>
			  <button class="btn btn-large btn-danger">Low</button>
			</div>	
            <?php
				if(isset($movie_id) && !empty($movie_id))
				{
					//get vid cap link
					$manageData->getVidCapLink($movie_id);
				}
			?>
       </div>
       
       <div class="row-fluid">
       		<div class="span10 offset1 media" style="height:400px;margin-top:10px;">
            <video id="example_video_1" class="video-js vjs-default-skin media-object" controls preload="none" width="100%"
          poster="http://video-js.zencoder.com/oceans-clip.png"
          data-setup="{}">
          
         <source src="../uploads/videos/aa.mp4" type='video/flv' />
        <track kind="captions" src="videoplayer/demo.captions.vtt" srclang="en" label="English"></track><!-- Tracks need an ending tag thanks to IE9 -->
          </video>
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
		
            
            
            
 
		<div class="row-fluid">
            <div class="span12 blank">
				<div class="pagination pagination-small center">
				  <ul>
					<li><a href="#">Prev</a></li>
					<li><a class="btn-danger" href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li><a href="#">6</a></li>
					<li><a href="#">7</a></li>
					<li><a href="#">8</a></li>
					<li><a href="#">9</a></li>
					<li><a href="#">Next</a></li>
				  </ul>
				</div>
            </div>
        </div>
 	
   	</div>
    <!-- body container ends here -->
   
     
<?php
	//include footer
	include ('v-templates/footer.php');
?>  