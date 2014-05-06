<?php
	$page_title = 'BLOGS';
	//get header
	include ('v-templates/header.php');
	
	//get the main banner
	include ('v-templates/main_banner.php');
	//get the horizontal navbar
	include ('v-templates/navbar.php');
	
	//include the pagination configuration file
	include('v-includes/config_pagination.php');
?>
	 <script>
		    	/*
		 * function to show mouse over effects on the model images on the home page
		 * 
		 */
		$( document ).ready(function() {
			$('.row-fluid .mostPopular .main').mouseover(function() {
			  	var descBox = $(this).parent().parent().parent().children('#description');
			  	descBox.css("display","block");
			});
			
			$('.row-fluid .mostPopular .main').mouseout(function() {
			  	var descBox = $(this).parent().parent().parent().children('#description');
			  	descBox.css("display","none");
			});


			$('.row-fluid .mostPopular .kid').mouseover(function() {
			  	var descBox = $(this).parent().parent().children('#description');
			  	descBox.css("display","block");
			});
			
			$('.row-fluid .mostPopular .kid').mouseout(function() {
			  	var descBox = $(this).parent().parent().children('#description');
			  	descBox.css("display","none");
			});
			
			$('.mv .link').mouseover(function(){
				var descBox = $(this).parent().children('#descriptionImg')
				descBox.css("display","block");
			});
			
			$('.mv .link').mouseout(function(){
				var descBox = $(this).parent().children('#descriptionImg')
				descBox.css("display","none");
			});
			
			
			
		});

    </script>
	
    <div class="row-fluid">
        <div class="span12">
            <?php
                //GET the model searchBar
                include('v-templates/modelSearchBar.php');
            ?>
        </div>
    </div>

	<div id="bodyContainer" class="row-fluid">
    	<!-- leftcontainer starts here---->
        <div class="span9" id="leftContainer">
        <!---- blog list starts here --->
        	<?php
				//get the pagination for the page
				$manageData->pagination($startPoint,"blog_list.php",10,"article_info","recent","",15);
				
				//to get the articles
				$manageData->getArticles($startPoint,15);
				
				//get the pagination for the page
				$manageData->pagination($startPoint,"blog_list.php",10,"article_info","recent","",15);
			?>
            
        </div>
        <!-- leftcontainer ends here---->
        
        
        <!-- rightcontainer starts here---->
    	<div class="span3" id="rightContainer">
        	<div class="row-fluid">
                    <div ID="secondaryMainBar" class="span12" style="margin-top:0">
                            <h4>Most Popular Models</h4>
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
                            <h4>Suggested Sites</h4>
                    </div>
                </div>
            	<?php
                    //get the suggested sites
                    $manageData->getSuggested_sites() ;
                ?>
                
                <div class="row-fluid">
                    <div ID="secondaryMainBar" class="span12">
                            <h4>Most Viewed Updates</h4>
                    </div>
                </div>
                <?php
					//get the most viewed right side bar
					$manageData->getMostViewed_sidebar();
				?>
                
                <div class="row-fluid">
                    <div ID="secondaryMainBar" class="span12">
                            <h4>Most Popular Updates</h4>
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
					<a class="twitter-timeline" href="https://twitter.com/handjobsstop" data-widget-id="451360896585965568">Tweets by @handjobsstop</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                </div><!--social box ends here---twiter-->
                
				<!--social box starts here---facebook-->
                <div class="row-fluid">
                    <div ID="secondaryMainBar" class="span12">
                            <h4>Latest From Facebook</h4>
                    </div>
                </div>
                <div class="row-fluid social">
					<div class="fb-like-box" data-href="https://www.facebook.com/handjobstop?ref=hl" data-width="255" data-height="600" data-colorscheme="dark" data-show-faces="false" data-header="false" data-stream="true" data-show-border="false"></div>                </div><!--social box ends here---facebook-->
        </div>
        <!-- rightcontainer ends here---->
    </div>
    
    <script src="assets/js/js_function_v.js" type="text/javascript"></script>
    
<?php
	//include footer
	include ('v-templates/footer.php');
?>