<?php
	$page_title = 'MODELS';
	//get header
	include ('v-templates/header.php');

	//get the horizontal navbar
	include ('v-templates/navbar.php');
	
	//get the value of id from the query string
	$model_id = $GLOBALS["_GET"]["model_id"];
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
		?>
        
        <!-- model detail ends here -->        
        <div class="row-fluid btn_group_outline">
       		<div class="btn-group">
			  <button class="btn btn-large btn-danger">Most Recent</button>
			  <button class="btn btn-large btn-danger">Most Popular</button>
			  <button class="btn btn-large btn-danger">Name/Title</button>
			</div>	
       </div>
       
       <div class="row-fluid">
            <div id="mainBar" class="span12">
                    <h4>Latest Video Updates</h4>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span4 element">
                <h4>Kattie Gold behind the scene tease.</h4>
                <h5>0 min 0 sec</h5>
                <img class="lazy" data-src="images/video.jpg" src="" alt="vdeo">
                <p>Added 2013-07-23<br />Views: 90</p>
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
            </div>
            <div class="span4 element">
                <h4>Kattie Gold behind the scene tease.</h4>
                <h5>0 min 0 sec</h5>
                <img class="lazy" data-src="images/video.jpg" src="" alt="vdeo">
                <p>Added 2013-07-23<br />Views: 90</p>
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
            </div>
            <div class="span4 element">
                <h4>Kattie Gold behind the scene tease.</h4>
                <h5>0 min 0 sec</h5>
                <img class="lazy" data-src="images/video.jpg" src="" alt="vdeo">
                <p>Added 2013-07-23<br />Views: 90</p>
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
            </div>
        </div>
        <div class="row-fluid">
            <div class="span4 element">
                <h4>Kattie Gold behind the scene tease.</h4>
                <h5>0 min 0 sec</h5>
                <img class="lazy" data-src="images/video.jpg" src="" alt="vdeo">
                <p>Added 2013-07-23<br />Views: 90</p>
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
            </div>
            <div class="span4 element">
                <h4>Kattie Gold behind the scene tease.</h4>
                <h5>0 min 0 sec</h5>
                <img class="lazy" data-src="images/video.jpg" src="" alt="vdeo">
                <p>Added 2013-07-23<br />Views: 90</p>
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
            </div>
            <div class="span4 element">
                <h4>Kattie Gold behind the scene tease.</h4>
                <h5>0 min 0 sec</h5>
                <img class="lazy" data-src="images/video.jpg" src="" alt="vdeo">
                <p>Added 2013-07-23<br />Views: 90</p>
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                    <div class="span4 pull-right clickMore">
                        <h4>Click Here For More >></h4>
                    </div>
            </div> <!-- Latest Video updates ends here -->
        </div>
        
         <div class="row-fluid">  
            <div id="mainBar" class="span12">
                    <h4>Latest Photo Updates</h4>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span4 element">
                <h4>Kattie Gold behind the scene tease.</h4>
                <h5>0 min 0 sec</h5>
                <img class="lazy" data-src="images/image.jpg" src="" alt="vdeo">
                <p>Added 2013-07-23<br />Views: 90</p>
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
            </div>
            <div class="span4 element">
                <h4>Kattie Gold behind the scene tease.</h4>
                <h5>0 min 0 sec</h5>
                <img src="images/image.jpg" alt="vdeo">
                <p>Added 2013-07-23<br />Views: 90</p>
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
            </div>
            <div class="span4 element">
                <h4>Kattie Gold behind the scene tease.</h4>
                <h5>0 min 0 sec</h5>
                <img class="lazy" data-src="images/image.jpg" src="" alt="vdeo">
                <p>Added 2013-07-23<br />Views: 90</p>
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
            </div>
        </div>
        <div class="row-fluid">
            <div class="span4 element">
                <h4>Kattie Gold behind the scene tease.</h4>
                <h5>0 min 0 sec</h5>
                <img class="lazy" data-src="images/image.jpg" src="" alt="vdeo">
                <p>Added 2013-07-23<br />Views: 90</p>
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
            </div>
            <div class="span4 element">
                <h4>Kattie Gold behind the scene tease.</h4>
                <h5>0 min 0 sec</h5>
                <img class="lazy" data-src="images/image.jpg" src="" alt="vdeo">
                <p>Added 2013-07-23<br />Views: 90</p>
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
            </div>
            <div class="span4 element">
                <h4>Kattie Gold behind the scene tease.</h4>
                <h5>0 min 0 sec</h5>
                <img class="lazy" data-src="images/image.jpg" src="" alt="vdeo">
                <p>Added 2013-07-23<br />Views: 90</p>
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="span4 pull-right clickMore">
                    <h4>Click Here For More >></h4>
                </div>
            </div> <!-- Latest Photo updates ends here -->
        </div>
        
        
        <div class="row-fluid">
            <div id="mainBar" class="span12">
                    <h4>Latest Model Updates</h4>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span4 element">
                <h4>Kattie Gold behind the scene tease.</h4>
                <h5>0 min 0 sec</h5>
                <img class="lazy" data-src="images/image.jpg" src="" alt="vdeo">
                <p>Added 2013-07-23<br />Views: 90</p>
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
            </div>
            <div class="span4 element">
                <h4>Kattie Gold behind the scene tease.</h4>
                <h5>0 min 0 sec</h5>
                <img class="lazy" data-src="images/image.jpg" src="" alt="vdeo">
                <p>Added 2013-07-23<br />Views: 90</p>
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
            </div>
            <div class="span4 element">
                <h4>Kattie Gold behind the scene tease.</h4>
                <h5>0 min 0 sec</h5>
                <img class="lazy" data-src="images/image.jpg" src="" alt="vdeo">
                <p>Added 2013-07-23<br />Views: 90</p>
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
            </div>
        </div>
        <div class="row-fluid">
            <div class="span4 element">
                <h4>Kattie Gold behind the scene tease.</h4>
                <h5>0 min 0 sec</h5>
                <img class="lazy" data-src="images/image.jpg" src="" alt="vdeo">
                <p>Added 2013-07-23<br />Views: 90</p>
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
            </div>
            <div class="span4 element">
                <h4>Kattie Gold behind the scene tease.</h4>
                <h5>0 min 0 sec</h5>
                <img class="lazy" data-src="images/image.jpg" src="" alt="vdeo">
                <p>Added 2013-07-23<br />Views: 90</p>
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
            </div>
            <div class="span4 element">
                <h4>Kattie Gold behind the scene tease.</h4>
                <h5>0 min 0 sec</h5>
                <img class="lazy" data-src="images/image.jpg" src="" alt="vdeo">
                <p>Added 2013-07-23<br />Views: 90</p>
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="span4 pull-right clickMore">
                    <h4>Click Here For More >></h4>
                </div>
            </div> <!-- Latest Model updates ends here -->
        </div>
        
        
        <div class="row-fluid">  
            <div id="mainBar" class="span12">
                <h4>More Updates for you</h4>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span4 element">
                <h4>Kattie Gold behind the scene tease.</h4>
                <h5>0 min 0 sec</h5>
                <img class="lazy" data-src="images/moreupdates.jpg" src="" alt="vdeo">
                <p>Added 2013-07-23<br />Views: 90</p>
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
            </div>
            <div class="span4 element">
                <h4>Kattie Gold behind the scene tease.</h4>
                <h5>0 min 0 sec</h5>
                <img class="lazy" data-src="images/moreupdates.jpg" src="" alt="vdeo">
                <p>Added 2013-07-23<br />Views: 90</p>
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
            </div>
            <div class="span4 element">
                <h4>Kattie Gold behind the scene tease.</h4>
                <h5>0 min 0 sec</h5>
                <img class="lazy" data-src="images/moreupdates.jpg" src="" alt="vdeo">
                <p>Added 2013-07-23<br />Views: 90</p>
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
            </div>
        </div>
        <div class="row-fluid">
            <div class="span4 element">
                <h4>Kattie Gold behind the scene tease.</h4>
                <h5>0 min 0 sec</h5>
                <img class="lazy" data-src="images/moreupdates.jpg" src="" alt="vdeo">
                <p>Added 2013-07-23<br />Views: 90</p>
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
            </div>
            <div class="span4 element">
                <h4>Kattie Gold behind the scene tease.</h4>
                <h5>0 min 0 sec</h5>
                <img class="lazy" data-src="images/moreupdates.jpg" src="" alt="vdeo">
                <p>Added 2013-07-23<br />Views: 90</p>
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
            </div>
            <div class="span4 element">
                <h4>Kattie Gold behind the scene tease.</h4>
                <h5>0 min 0 sec</h5>
                <img class="lazy" data-src="images/moreupdates.jpg" src="" alt="vdeo">
                <p>Added 2013-07-23<br />Views: 90</p>
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
                <img class="lazy" data-src="images/star-on.png" src="" alt="star">
            </div>
        </div>
        <div class="row-fluid">
        <div class="span12">
                <div class="span4 pull-right clickMore">
                    <h4>Click Here For More >></h4>
                </div>
            </div> <!-- More updates for you ends here -->
        </div>
		<div class="row-fluid">
            <div class="span12 blank">
				<div class="pagination pagination-small center">
				  <ul>
					<li><a href="#">Prev</a></li>
					<li><a class="btn-danger center_1st" href="#">1</a></li>
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