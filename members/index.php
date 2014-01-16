<?php
	$page_title = 'HOME';
	//get header
	include ('v-templates/header.php');
	
?>

    	
<?php
	//get the horizontal navbar
	include ('v-templates/navbar.php');
?>
              
    <div class="clearfix"></div>
	<div id="bodyContainer" class="row-fluid">
    	<!--- search by model starts here ---->
         <?php
		 	//GET the model searchBar
			include('v-templates/modelSearchBar.php');
		 ?>
        <!--- search by model ends here ---->
          <div class="row-fluid">   
            <div class="span9" id="leftContainer">
            
			<div class="row-fluid comArt">
				<ul class="nav nav-tabs">
				  <li class="tab"><a href="#home" data-toggle="tab">Recent Comments</a></li>
				  <li class="tab"><a href="#profile" data-toggle="tab">Recent Article</a></li>
				</ul>
				<div id="myTabContent" class="tab-content">
				  <div class="tab-pane fade in active" id="home">
					<p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu 
					stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan 
					helvetica. Reprehenderit butcher </p>
					<p>retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, 
					qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip 
					quis cardigan american apparel, butcher voluptate nisi qui.</p>
				  </div>
				  <div class="tab-pane fade" id="profile">
					<p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. 
					Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan 
					four loko farm-to-table craft beer twee.</p><p> Qui photo booth letterpress, commodo enim craft 
					beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda 
					labore aesthetic magna delectus mollit. Keytar </p>helvetica VHS salvia yr, vero magna velit 
					sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean 
					shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, 
					tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
				   </div>
				</div>
			</div>
				
			    

                <div class="row-fluid">
                    <div id="mainBar" class="span12">
                            <h4>Latest Movies Updates</h4>
                    </div>
                </div>
                
                <?php
					//get the latest movies
					$manageData->getVideosHome(0,6,"recent");
				?>
                
                <div class="row-fluid">
                    <div class="span12">
                    	<a href="videos.php">
                            <div class="span4 pull-right clickMore">
                                <h4>Click Here For More >></h4>
                            </div>
                        </a>
                    </div> <!-- Latest Video updates ends here -->
                </div>
                
                 <div class="row-fluid">  
                    <div id="mainBar" class="span12">
                            <h4>Latest Photo Updates</h4>
                    </div>
                </div>
                <?php
					//get the latest movies
					$manageData->getGalleryHome(0,6,"recent");
				?>
                <div class="row-fluid">
                    <div class="span12">
                    	<a href="photos.php">
                            <div class="span4 pull-right clickMore">
                                <h4>Click Here For More >></h4>
                            </div>
                        </a>
                    </div> <!-- Latest Photo updates ends here -->
                </div>
                
                
				<div class="row-fluid">
                    <div id="mainBar" class="span12">
                            <h4>Latest Model Updates</h4>
                    </div>
                </div>
                <?php
					//get the latest movies
					$manageData->getModelsHome(0,6,"recent");
				?>
                <div class="row-fluid">
                    <div class="span12">
                    	<a href="model.php">
                            <div class="span4 pull-right clickMore">
                                <h4>Click Here For More >></h4>
                            </div>
                        </a>
                    </div> <!-- Latest Model updates ends here -->
                </div>
				
                <?php
					//generate an alternate number for the members favorite
					$alternate = rand(1,2) ;
					if( $alternate%2 == 0 ) 
					{
						//get the random members favourite movie
						$manageData->membersFavourite(0,9,'movie',3) ;			
					}
					else
					{
						//get the random members favourite photos
						$manageData->membersFavourite(0,9,'photo',3) ;
					}
				?>
                
            
            </div>
            <!-- right container starts from here -->
            <div class="span3" id="rightContainer">
            	<div class="row-fluid">
                    <div ID="secondaryMainBar" class="span12" style="margin-top:0">
                            <h4>Most Popular Model</h4>
                    </div>
                </div>
                <div class="popularmodels">
                	<?php
						//get the models
						$manageData->getRightSidebar_model();
					?>
                </div>
                
                
                <div class="row-fluid">
                    <div ID="secondaryMainBar" class="span12">
                            <h4>Suggested Site</h4>
                    </div>
                </div>
				<?php
                    //get the suggested sites
                    $manageData->getSuggested_sites() ;
                ?>
                
                <div class="row-fluid">
                    <div ID="secondaryMainBar" class="span12">
                            <h4>Most Viewed Update</h4>
                    </div>
                </div>
                <?php
					//get the most viewed right side bar
					$manageData->getMostViewed_sidebar();
				?>
                
                <div class="row-fluid">
                    <div ID="secondaryMainBar" class="span12">
                            <h4>Most Popular Update</h4>
                    </div>
                </div>
                <?php
					//get the most viewed right side bar
					$manageData->getMostPopular_sidebar();
				?>
                <!--social box starts here---twiter-->
                <div class="row-fluid">
                    <div ID="secondaryMainBar" class="span12">
                            <h4>Latest Tweets</h4>
                    </div>
                </div>
                <div class="row-fluid social">
                	<a class="twitter-timeline" href="https://twitter.com/namantweets" data-widget-id="422881942036443136">Tweets by @namantweets</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>


                </div><!--social box ends here---twiter-->
                
				<!--social box starts here---facebook-->
                <div class="row-fluid">
                    <div ID="secondaryMainBar" class="span12">
                            <h4>Latest From Facebook</h4>
                    </div>
                </div>
                <div class="row-fluid social">
                	<ul>
                    	<li class="facebook"><a href="" class="link">Elevated X now comes with pre-designed splash and join pages!</a></li>
                        <li class="facebook"><a href="" class="link">Elevated X now comes with pre-designed splash and join pages!</a></li>
                        <li class="facebook"><a href="" class="link">Elevated X now comes with pre-designed splash and join pages!</a></li>
                        <li class="facebook"><a href="" class="link">Elevated X now comes with pre-designed splash and join pages!</a></li>
                    </ul>
                </div><!--social box ends here---facebook-->
            </div> <!-- rightContainer ends here -->
         </div>
    </div>
<?php
	//include footer
	include ('v-templates/footer.php');
?>