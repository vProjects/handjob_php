<?php
	$page_title = 'MODELS';
	//get header
	include ('v-templates/header.php');
	
	//get the main banner
	include ('v-templates/main_banner.php');
	//get the horizontal navbar
	include ('v-templates/navbar.php');
	
	//get the value of id from the query string
	$model_id = $GLOBALS["_GET"]["model_id"];
	
	$model_name = $GLOBALS["_GET"]["model_name"];
	
	//codes for setting the views
	$manageData->manageViews("model",$model_id);
	
	//get the rating for the particular movie
	$enity_rating = $manageData->getRating("model",$model_id) ;
	
	//get total voted people
	$voted_people = $manageData->getPeopleVoted('model',$model_id) ;
?>

	<div id="bodyContainer" class="row-fluid">   
        <?php
		 	//GET the model searchBar
			include('v-templates/modelSearchBar.php');
		 ?>
        
        <!-- model detail starts here -->
        <?php
			//if the get varriable is set 
			if(isset($model_id) && !empty($model_id))
			{
				//get the UI structure of model details
				$manageData->getModelDetails($model_id);
			}
			
			if(isset($model_name) && !empty($model_name))
			{
				//get the model movies
				$manageData->getMoviesByModel($model_name);
				//get model gallery
				$manageData->getGalleryByModel($model_name,$model_id);
			}
		?>
        
        
	</div>
    <!-- body container ends here -->
	<div class="row-fluid">
        <div class="span12">
            <div class="offset3 span6 rating">
            	<div class="row-fluid">
                	<div class="span7 voted_people stars_container">
                        NOT 
                        <img class="rateme" src="images/white-star.png" alt="star" onclick="rate(1,'<?php echo $_SESSION["user"] ;?>','<?php echo $model_id ;?>','model')">
                        <img class="rateme" src="images/white-star.png" alt="star" onclick="rate(2,'<?php echo $_SESSION["user"] ;?>','<?php echo $model_id ;?>','model')">
                        <img class="rateme" src="images/white-star.png" alt="star" onclick="rate(3,'<?php echo $_SESSION["user"] ;?>','<?php echo $model_id ;?>','model')">
                        <img class="rateme" src="images/white-star.png" alt="star" onclick="rate(4,'<?php echo $_SESSION["user"] ;?>','<?php echo $model_id ;?>','model')">
                        <img class="rateme" src="images/white-star.png" alt="star" onclick="rate(5,'<?php echo $_SESSION["user"] ;?>','<?php echo $model_id ;?>','model')"> HOT
                        <?php
                            //check the rating to find thats i hot or not
                            if( $enity_rating > 3 )
                            {
                                echo '<img src="images/img_hot.png" alt="rate-me" />' ;
                            }
                        ?>
                        <div class="row-fluid">
                            <div class="span12 voted_people">
                            	<div class="num_rating"  <?php if($enity_rating <= 3){echo 'style="margin-left: 51px;"';} ?>>
                                    <span class="num_rating_in">1</span>
                                    <span class="num_rating_in">2</span>
                                    <span class="num_rating_in">3</span>
                                    <span class="num_rating_in">4</span>
                                    <span class="num_rating_in">5</span>                                
                                </div>
                             </div>
                        </div>
            		</div>
                    <div class="span3 voted_people">
                    	<?php
							if( !empty($voted_people) )
							{
								echo "Rating: ".($enity_rating-1)."/5 <br/> ( ".$voted_people."Votes )" ;
							}
						?>
                    </div>
                </div>
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
                        	<input type="hidden" value="<?php echo $model_id ; ?>" name="id" />
                            <input type="hidden" value="<?php echo $model_name ; ?>" name="model_name" />
                            <input type="hidden" value="model" name="type" />
                            <input type="hidden" value="<?php echo $_SESSION['user'] ;?>" name="member" />
			    			<input type="submit" class="btn" value="Submit">
			    		</div>			    		
		    		</div>
	    		</form>
	    	</div>
    	</div>
        <?php
			//get the comments for the post
			$manageData->getComments("model",$model_id,0) ;
		?>
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