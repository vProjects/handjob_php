<?php
	$page_title = 'Movies';
	//get header
	include ('v-templates/header.php');

	//get the horizontal navbar
	include ('v-templates/navbar.php');
	
	$movie_id = "" ;
	$gallery_id = "" ;
	//if there is a get request then get movie_id
	if( $GLOBALS["_GET"] > 0 )
	{
		//get the value of id from the query string
		$movie_id = $GLOBALS["_GET"]["movie_id"];
		$gallery_id = $GLOBALS["_GET"]["gallery_id"];
		$model_id = $GLOBALS["_GET"]["model_id"] ;
	}
	
	//codes for setting the views
	$manageData->manageViews("movie",$movie_id);
?>

<!-- site description part starts here --->
<div class="container">
	<?php
		//get the models details if id isset
		if( isset($model_id) && !empty($model_id) )
		{
			//get the UI for model details from BLL
			$manageData->getModel_Details($model_id) ;
		}
		
		//get the description
		$manageData->getDescription($movie_id,"movie") ;
	?>
    <div class="row-fluid model_detail_heading">
    	<div class="btn-group">
            <a href="#"><button class="btn <?php //if( $type=='recent'){ echo 'active' ;}?> btn-danger">Low</button></a>
            <a href="#"><button class="btn <?php //if( $type=='rated'){ echo 'active' ;}?> btn-danger">Medium</button></a>
            <a href="#"><button class="btn <?php //if( $type=='name'){ echo 'active' ;}?> btn-danger">High</button></a>
        </div>
    </div>
    
    <!-- movie player-->
    <div class="row-fluid">
       <div class="row-fluid v_player">
			<video class="mejs-ted" width="900" height="507" src="http://handjobstop.com/members/videos/52f3d23a07a0a/s/52f3d23a07a0a.mp4" type="video/mp4" 
				id="player1" poster="http://handjobstop.com/members/images/movie_thumb/52f3d23a07a0a.JPG" 
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
    
    <?php
		//if the get varriable is set 
		if(isset($movie_id) && !empty($movie_id))
		{
			//get the UI structure of sample video image
			$manageData->getSamplVideoImage($movie_id);
		}
	?>
    <!--get the sliced videos-->
     <!-- members favourite portion starts here ---->
        <div class="row-fluid photo_update">
        	<div class="span12">
            	<h3 class="site_heading"> Members Favorite</h3>
            </div>
            <div class="row-fluid photo_update_outline">
                <div class="pagination pagination-small pageno_nav pull-right">
                    <ul>
                        <li class="pageno_nav_viewall"><a class="btn-danger" href="join.php">Next &gt;</a></li>
                    </ul>
                </div>
            </div>
            <?php
                //generate an alternate number for the members favorite
                $alternate = rand(1,2) ;
                if( $alternate%2 == 0 ) 
                {
                    //get the random members favourite movie
                    $manageData->membersFavourite(0,9,'movie') ;			
                }
                else
                {
                    //get the random members favourite photos
                    $manageData->membersFavourite(0,8,'photo') ;
                }
            ?>
            
            <!--- photo row3 ends here --->
         </div>    
        <!-- members favourite portion ends here ---->
     </div>    
    <!--- model details ends here --->
</div>
<!-- site description part ends here --->

<?php
	//include footer
	include ('v-templates/footer.php');
?> 