<?php
	$page_title = 'BLOGS';
	//get header
	include ('v-templates/header.php');

	//get the horizontal navbar
	include ('v-templates/navbar.php');
	
	//include the pagination configuration file
	include('v-includes/config_pagination.php');
?>

	<div id="bodyContainer" class="row-fluid">
    	<!-- leftcontainer starts here---->
        <div class="span9" id="leftContainer">
        <!---- blog list starts here --->
        	<?php
				//to get the articles
				$manageData->getArticles($startPoint,$limit);
				
				//get the pagination for the page
				$manageData->pagination($startPoint,"blog_list.php",10,"article_info","recent","");
			?>
            
        </div>
        <!-- leftcontainer ends here---->
        
        
        <!-- rightcontainer starts here---->
    	<div class="span3" id="rightContainer">
        	<div class="row-fluid">
                    <div ID="secondaryMainBar" class="span12" style="margin-top:0">
                            <h4>Most Popular Model</h4>
                    </div>
                </div>
                <div class="popularmodels">
                    <div class="row-fluid">
                        <div class="mostPopular class12">
						
                            <img onmouseover="showDetails('description')"  id= "mp" class="lazy" data-src="images/mostPopular.jpg" src="" alt="most popular model"> 
						
                            <h5>LEENA HAZE</h5>
							
                        </div>
                    </div>
					<div id="description" style="display:none;">asdfasdf</div>
                    <div class="row-fluid">
                        <div class="mostPopular span6">
                            <img class="lazy" data-src="images/mostPopular.jpg" src="" alt="most popular model"> 
                            <h5>LEENA HAZE</h5>
                        </div>
                        <div class="mostPopular span6">
                            <img class="lazy" data-src="images/mostPopular.jpg" src="" alt="most popular model"> 
                            <h5>LEENA HAZE</h5>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="mostPopular span6">
                            <img class="lazy" data-src="images/mostPopular.jpg" src="" alt="most popular model"> 
                            <h5>LEENA HAZE</h5>
                        </div>
                        <div class="mostPopular span6">
                            <img class="lazy" data-src="images/mostPopular.jpg" src="" alt="most popular model"> 
                            <h5>LEENA HAZE</h5>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="mostPopular span6">
                            <img class="lazy" data-src="images/mostPopular.jpg" src="" alt="most popular model"> 
                            <h5>LEENA HAZE</h5>
                        </div>
                        <div class="mostPopular span6">
                            <img class="lazy" data-src="images/mostPopular.jpg" src="" alt="most popular model"> 
                            <h5>LEENA HAZE</h5>
                        </div>
                    </div>
                </div>
                
                
                <div class="row-fluid">
                    <div ID="secondaryMainBar" class="span12">
                            <h4>Suggested Site</h4>
                    </div>
                </div>
            	<div class="row-fluid popularmodels">
                    <div class="mostPopular span6">
                    	<img class="lazy" data-src="images/mostPopular.jpg" src="" alt="most popular model"> 
                        <h5>LEENA HAZE</h5>
                    </div>
                    <div class="mostPopular span6">
                    	<img class="lazy" data-src="images/mostPopular.jpg" src="" alt="most popular model"> 
                        <h5>LEENA HAZE</h5>
                    </div>
                </div>
                
                <div class="row-fluid">
                    <div ID="secondaryMainBar" class="span12">
                            <h4>Most Viewed Update</h4>
                    </div>
                </div>
                <div class="row-fluid social">
                	<ul>
                    	<h5> Most Viewed Movies</h5>
                    	<li><a href="" class="link">1. Lorem Ipsum Ipsum</a></li>
                        <li><a href="" class="link">2. Lorem Ipsum Ipsum</a></li>
                        <li><a href="" class="link">3. Lorem Ipsum Ipsum</a></li>
                        <li><a href="" class="link">4. Lorem Ipsum Ipsum</a></li>
                    </ul>
                	<ul>
                    	<h5> Most Viewed Photos</h5>
                    	<li><a href="" class="link">1. Lorem Ipsum Ipsum</a></li>
                        <li><a href="" class="link">2. Lorem Ipsum Ipsum</a></li>
                        <li><a href="" class="link">3. Lorem Ipsum Ipsum</a></li>
                        <li><a href="" class="link">4. Lorem Ipsum Ipsum</a></li>
                    </ul>
                	<ul>
                    	<h5> Most Viewed Models</h5>
                    	<li><a href="" class="link">1. Lorem Ipsum Ipsum</a></li>
                        <li><a href="" class="link">2. Lorem Ipsum Ipsum</a></li>
                        <li><a href="" class="link">3. Lorem Ipsum Ipsum</a></li>
                        <li><a href="" class="link">4. Lorem Ipsum Ipsum</a></li>
                    </ul>
                </div>


                <div class="row-fluid">
                    <div ID="secondaryMainBar" class="span12">
                            <h4>Most Popular Update</h4>
                    </div>
                </div>
                <div class="row-fluid social">
                	<ul>
                    	<h5> Most Viewed Movies</h5>
                    	<li><a href="" class="link">1. Lorem Ipsum Ipsum</a></li>
                        <li><a href="" class="link">2. Lorem Ipsum Ipsum</a></li>
                        <li><a href="" class="link">3. Lorem Ipsum Ipsum</a></li>
                        <li><a href="" class="link">4. Lorem Ipsum Ipsum</a></li>
                    </ul>
                	<ul>
                    	<h5> Most Viewed Photos</h5>
                    	<li><a href="" class="link">1. Lorem Ipsum Ipsum</a></li>
                        <li><a href="" class="link">2. Lorem Ipsum Ipsum</a></li>
                        <li><a href="" class="link">3. Lorem Ipsum Ipsum</a></li>
                        <li><a href="" class="link">4. Lorem Ipsum Ipsum</a></li>
                    </ul>
                	<ul>
                    	<h5> Most Viewed Models</h5>
                    	<li><a href="" class="link">1. Lorem Ipsum Ipsum</a></li>
                        <li><a href="" class="link">2. Lorem Ipsum Ipsum</a></li>
                        <li><a href="" class="link">3. Lorem Ipsum Ipsum</a></li>
                        <li><a href="" class="link">4. Lorem Ipsum Ipsum</a></li>
                    </ul>
                </div>
                <!--social box starts here---twiter-->
                <div class="row-fluid">
                    <div ID="secondaryMainBar" class="span12">
                            <h4>Latest Tweets</h4>
                    </div>
                </div>
                <div class="row-fluid social">
                	<ul>
                    	<li class="twitter"><a href="" class="link">Elevated X now comes with pre-designed splash and join pages!</a></li>
                        <li class="twitter"><a href="" class="link">Elevated X now comes with pre-designed splash and join pages!</a></li>
                        <li class="twitter"><a href="" class="link">Elevated X now comes with pre-designed splash and join pages!</a></li>
                        <li class="twitter"><a href="" class="link">Elevated X now comes with pre-designed splash and join pages!</a></li>
                    </ul>
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
        </div>
        <!-- rightcontainer ends here---->
    </div>
    
<?php
	//include footer
	include ('v-templates/footer.php');
?>