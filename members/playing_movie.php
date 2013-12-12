<?php
	$page_title = 'PLAYING-MOVIE';
	//get header
	include ('v-templates/header.php');

	//get the horizontal navbar
	include ('v-templates/navbar.php');
	
	$gallery_id = "" ;
	
	if( $GLOBALS["_GET"] > 0 )
	{
		//get the value of id from the query string
		$movie_id = $GLOBALS["_GET"]["movieId"];
		
		$gallery_id = $GLOBALS["_GET"]["gallery_id"] ;
		$type = $GLOBALS["_GET"]["type"] ;
	}
	
	//get the movie file path according to the type 
	if( $type == "high" )
	{
		$quality = "/" ;
	}
	elseif( $type == "medium" )
	{
		$quality = "/m/" ;
	}
	else
	{
		$quality = "/s/" ;
	}
	
	//set the movie path
	if( isset($gallery_id) && !empty($gallery_id) && ($gallery_id != 0) )
	{
		$movie_path = "sliced/".$movie_id.$quality.$gallery_id.".flv" ;
	}
	else
	{
		$movie_path = "videos/".$movie_id.$quality.$movie_id.".flv" ;
	}
	
		
	//codes for setting the views
	$manageData->manageViews("movie",$movie_id);
?>

    
    <div id="bodyContainer" class="row-fluid">
       <div class="row-fluid">
       		<div class="btn-group">
                
				<?php
					//get the movie quality nav bar
					$manageData->getQuality_movie($movie_id,$gallery_id,$type);
					
                    if(isset($movie_id) && !empty($movie_id))
                    {
                        //get vid cap link
                        $manageData->getVidCapLink($movie_id);
                    }
                ?>
			</div>	
       </div>
       
       <!-- container for video player-->
       <div class="row-fluid">
       		<div class="span10 offset1 media" style="max-height:500px;height:100%; margin-top:10px;">
            	<!--videoplayer-->
                <video width="640" height="360" id="player2" poster="../media/echo-hereweare.jpg" controls="controls" preload="none">
                    <!-- Fallback flash player for no-HTML5 browsers with JavaScript turned off -->
                    <object width="640" height="360" type="application/x-shockwave-flash" data="media_player/flashmediaelement.swf"> 		
                        <param name="movie" value="media_player/flashmediaelement.swf" /> 
                        <param name="flashvars" value="controls=true&amp;file=<?php echo $movie_path; ?>" /> 		
                        <!-- Image fall back for non-HTML5 browser with JavaScript turned off and no Flash player installed -->
                        <img src="../media/echo-hereweare.jpg" width="640" height="360" alt="Here we are" 
                            title="No video playback capabilities" />
                    </object>
                </video><!-- video player ends here-->
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
   
     
<?php
	//include footer
	include ('v-templates/footer.php');
?>  