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
       
       <div class="row-fluid">
       		<div class="span10 offset1 media" style="max-height:500px;height:100%; margin-top:10px;">
            
          <!-- new video player added here -->
            <div id="myplayer">
            <script type="text/javascript">
                $(document).ready(function(){
					var browserWidth = $(document).width();
					var video_link = 'http://www.handjobstop.com/members/<?php echo $movie_path; ?>' ;
					var video_thumb = 'http://www.gdd.ro/flvplayer/examples/fast-and-furious-1.jpg' ;
					var click_tag = '';
					if ( browserWidth >  1024 )
					{
						$('#myplayer').flash({
							'src':'http://www.gdd.ro/gdd/flvplayer/gddflvplayer.swf',
							'width':'100%',
							'height':'500',
							'allowfullscreen':'true',
							'allowscriptaccess':'always',
							'wmode':'transparent',
							'flashvars': {
								'vdo':video_link,
								'sound':'50',
								'splashscreen':video_thumb,
								'autoplay':'false',
								'clickTAG': click_tag,
								'endclipaction':''
							}
						});
					}
					if ( browserWidth <=  1024 && browserWidth >  640 )
					{
						$('#myplayer').flash({
							'src':'http://www.gdd.ro/gdd/flvplayer/gddflvplayer.swf',
							'width':'100%',
							'height':'400',
							'allowfullscreen':'true',
							'allowscriptaccess':'always',
							'wmode':'transparent',
							'flashvars': {
								'vdo': video_link,
								'sound':'50',
								'splashscreen':video_thumb,
								'autoplay':'false',
								'clickTAG':click_tag,
								'endclipaction':''
							}
						});
					}
					if ( browserWidth <=  640 )
					{
						$('#myplayer').flash({
							'src':'http://www.gdd.ro/gdd/flvplayer/gddflvplayer.swf',
							'width':'100%',
							'height':'230',
							'allowfullscreen':'true',
							'allowscriptaccess':'always',
							'wmode':'transparent',
							'flashvars': {
								'vdo':video_link,
								'sound':'50',
								'splashscreen':video_thumb,
								'autoplay':'false',
								'clickTAG':click_tag,
								'endclipaction':''
							}
						});
					}
                });
            </script>
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
   
     
<?php
	//include footer
	include ('v-templates/footer.php');
?>  