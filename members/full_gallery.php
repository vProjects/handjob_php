<?php
	$page_title = 'PHOTOS';
	//get header
	include ('v-templates/header.php');
	
	//get the main banner
	include ('v-templates/main_banner.php');
	//get the horizontal navbar
	include ('v-templates/navbar.php');
	if( $GLOBALS["_GET"] > 0 )
	{
		$gallery_id = $GLOBALS["_GET"]["galleryId"];
		$model_id = $GLOBALS["_GET"]["model"];
		$index = $GLOBALS["_GET"]["index"];
		$elements = $GLOBALS["_GET"]["element"] ;
		$page = $GLOBALS["_GET"]["page"] ;
	}
	
	//codes for setting the views
	$manageData->manageViews("gallery",$gallery_id);
	
	//get the number of images for a particular gallery
	$no_of_images = $manageData->getNumberOfGalleryImages($gallery_id) ;
	
	//variable to manipulate $elements_1
	$manipulate_element_1 = $page ;
	
	//check the value of page for minimum and maximum value
	if( ($page+$elements) > $no_of_images )
	{
		$page = $no_of_images - $elements ;
		$elements_1 = $no_of_images - $manipulate_element_1 ;
	}
	if( $elements > $no_of_images )
	{
		$page = 0 ;
		$elements = $elements_1 = $no_of_images ;
	}
	else
	{
		$elements_1 = $elements ;
	}
	if( $page < 0 )
	{
		$page = 0 ;
	}
	
	//get the rating for the particular movie
	$enity_rating = $manageData->getRating("gallery",$gallery_id) ;
	
	if( $enity_rating == 1 )
	{
		$enity_rating = $manageData->getRating("movie",$gallery_id) ;
	}
	//get total voted people
	$voted_people = $manageData->getPeopleVoted('gallery',$gallery_id) ;
?>

<div id="bodyContainer" class="row-fluid">
    	 
    	 <?php
			//GET the model searchBar
			include('v-templates/modelSearchBar.php');
			
			//if the get varriable is set 
			if(isset($model_id) && !empty($model_id))
			{
				$models = explode(',',$model_id) ;
				foreach($models as $model)
				{
					//get the UI for model details from BLL
					$manageData->getModelDetails($model) ;
				}
			}
			 //get the description
            $manageData->getDescription($gallery_id,"gallery") ;
		?>
        
        <div id="bodyContainer" class="row-fluid">
           <div class="row-fluid border_red">
                <div class="btn-group">
                    <?php
                        if(isset($gallery_id) && !empty($gallery_id))
                        {
                            //get vid cap link
                            $manageData->getZipLinks($gallery_id);
                        }
                    ?>
                </div>	
                <div class="span2 pull-right">
                	<div class="btn-group">
                    	<button class="btn btn-danger" onclick="prevImage()">Prev</button>
                        <button class="btn btn-danger"><?php echo ($elements+$page)."/".$no_of_images ; ?></button>
                        <button class="btn btn-danger" onclick="nextImage()">Next</button>
                    </div>
                </div>
                <!--the select box for no of images -->
                <div class="span4 pull-right">
                	<select onchange="controlImages(this.value,'<?php echo "index=".$index."&model=".$model_id."&galleryId=".$gallery_id."&page=".$page ; ?>')" class="pull-right" style="width:100px;">
                    	<option value="">Select</option>
                        <?php
							//generate the full selectbox
							$i = 10 ;
							for( $i = 10 ; $i < $no_of_images ; )
							{
								echo '<option' ;
								if ( $elements == $i )
								{
									echo ' selected="selected"' ;
								}
								echo ' value="'.$i.'">'.$i.'</option>' ;								
							
								$i = 2*$i ;
							}
							
							//print the last element 
							echo '<option' ;
							if ( $elements == $no_of_images )
							{
								echo ' selected="selected"' ;
							}
							echo ' value="'.$no_of_images.'">Full</option>' ;	
						?>
                    </select>
                </div>
           </div>
        
		<?php
			if(!empty($gallery_id) && isset($gallery_id))
			{
				//get the required model gallerys
				$manageData->getFullGallery($gallery_id,$page,$elements_1 );
			}
		?>
    	
        <div class="row-fluid">
               <div class="span12">
               		<div class="row-fluid">
                    	<div class="span6 btn-group for_margin">
							<?php
                                if(isset($gallery_id) && !empty($gallery_id))
                                {
                                    //get vid cap link
                                    $manageData->getZipLinks($gallery_id);
                                }
                            ?>
                        </div>	
                        <div class="span2 pull-right for_margin">
                            <div class="btn-group">
                                <button class="btn btn-danger" onclick="prevImage()">Prev</button>
                                <button class="btn btn-danger"><?php echo ($elements+$page)."/".$no_of_images ; ?></button>
                                <button class="btn btn-danger" onclick="nextImage()">Next</button>
                            </div>
                        </div>
                        <!--the select box for no of images -->
                        <div class="span2 pull-right for_margin">
                            <select onchange="controlImages(this.value,'<?php echo "index=".$index."&model=".$model_id."&galleryId=".$gallery_id."&page=".$page ; ?>')" class="pull-right" style="width:100px;">
                                <option value="">Select</option>
                                <?php
									//generate the full selectbox
									$i = 10 ;
									for( $i = 10 ; $i < $no_of_images ; )
									{
										echo '<option' ;
										if ( $elements == $i )
										{
											echo ' selected="selected"' ;
										}
										echo ' value="'.$i.'">'.$i.'</option>' ;								
									
										$i = 2*$i ;
									}
									
									//print the last element 
									echo '<option' ;
									if ( $elements == $no_of_images )
									{
										echo ' selected="selected"' ;
									}
									echo ' value="'.$no_of_images.'">Full</option>' ;	
								?>
                            </select>
                        </div>
                    </div>
               </div>     
           </div>
   	</div>
    <!-- body container ends here -->
    <div class="row-fluid">
	        <div class="span12">
	            <div class="offset3 span6 rating">
                	<div class="row-fluid">
                		<div class="span7 voted_people stars_container">
                            NOT
                            <img class="rateme" src="images/white-star.png"  alt="star" onclick="rate(1,'<?php echo $_SESSION["user"] ;?>','<?php echo $gallery_id ;?>','gallery')">
                            <img class="rateme" src="images/white-star.png"  alt="star" onclick="rate(2,'<?php echo $_SESSION["user"] ;?>','<?php echo $gallery_id ;?>','gallery')">
                            <img class="rateme" src="images/white-star.png"  alt="star" onclick="rate(3,'<?php echo $_SESSION["user"] ;?>','<?php echo $gallery_id ;?>','gallery')">
                            <img class="rateme" src="images/white-star.png"  alt="star" onclick="rate(4,'<?php echo $_SESSION["user"] ;?>','<?php echo $gallery_id ;?>','gallery')">
                            <img class="rateme" src="images/white-star.png"  alt="star" onclick="rate(5,'<?php echo $_SESSION["user"] ;?>','<?php echo $gallery_id ;?>','gallery')">
                            HOT
                            <?php
                                //check the rating to find thats i hot or not
                                if( $enity_rating > 3 )
                                {
                                    echo '<img src="images/img_hot.png" alt="rate-me" />' ;
                                }
                            ?>
                            <div class="row-fluid">
                                <div class="span12 voted_people">
                                    <div class="num_rating" <?php if($enity_rating <= 3){echo 'style="margin-left: 65px;"';} ?>>
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
                                    echo "Rating: ".($enity_rating)."/5 <br/> ( ".$voted_people."Votes )" ;
                                }
                            ?>
                        </div>
                    </div>            
	            </div>
	        </div>
    </div>
    
    
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
                        	<input type="hidden" value="<?php echo $gallery_id ; ?>" name="id" />
                            <input type="hidden" value="gallery" name="type" />
                            <input type="hidden" value="<?php echo $page; ?>" name="page" />
                            <input type="hidden" value="<?php echo $elements; ?>" name="element" />
                            <input type="hidden" value="<?php echo $model_id; ?>" name="model" />
                            <input type="hidden" value="<?php echo $_SESSION['user'] ;?>" name="member" />
			    			<input type="submit" class="btn" value="Submit">
			    		</div>			    		
		    		</div>
	    		</form>
	    	</div>
    	</div>
        <?php	
			//get the comments for the post
			$manageData->getComments("gallery",$gallery_id,0) ;
        ?>
    </div>
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
    
    <script type="text/javascript">
		var page_v = <?php echo $page ; ?> ;
		var total_elements = <?php echo $no_of_images ; ?> ;
		var elements_v = <?php echo $elements ; ?> ;
    	function nextImage()
		{
			if( page_v+elements_v < total_elements )
			{
				page_v = page_v+elements_v ;
			}
			//reload the page
			window.location = 'full_gallery.php?'+'<?php echo "index=".$index."&model=".$model_id."&galleryId=".$gallery_id."&page=" ; ?>'+page_v+'&element='+elements_v  ;
		}
		function prevImage()
		{
			page_v = page_v-elements_v ;
			//reload the page
			window.location = 'full_gallery.php?'+'<?php echo "index=".$index."&model=".$model_id."&galleryId=".$gallery_id."&page=" ; ?>'+page_v+'&element='+elements_v  ;
		}
    </script>
    <script src="assets/js/js_function_v.js" type="text/javascript"></script>
    
    
<?php
	//include footer
	include ('v-templates/footer.php');
?>