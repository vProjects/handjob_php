<?php
	$page_title = 'Models';
	//include header section
	include 'v-templates/header.php';
?>

<?php
	//include navbar section
	include 'v-templates/navbar.php';
?>

<!-- site description part starts here --->
<div class="container">
	<div class="row-fluid">
    	<div class="span12 search_model">
        	<h4>Model Directory</h4>
            <div class="pagination pagination-small center">
              <ul>
                <li><a  class="btn-danger center_1st" href="#">A</a></li>
                <li><a href="#">B</a></li>
                <li><a href="#">C</a></li>
                <li><a href="#">D</a></li>
                <li><a href="#">E</a></li>
                <li><a href="#">F</a></li>
                <li><a href="#">G</a></li>
                <li><a href="#">H</a></li>
                <li><a href="#">I</a></li>
                <li><a href="#">J</a></li>
                <li><a href="#">K</a></li>
                <li><a href="#">L</a></li>
                <li><a href="#">M</a></li>
                <li><a href="#">N</a></li>
                <li><a href="#">O</a></li>
                <li><a href="#">P</a></li>
                <li><a href="#">Q</a></li>
                <li><a href="#">R</a></li>
                <li><a href="#">S</a></li>
                <li><a href="#">T</a></li>
                <li><a href="#">U</a></li>
                <li><a href="#">V</a></li>
                <li><a href="#">W</a></li>
                <li><a href="#">X</a></li>
                <li><a href="#">Y</a></li>
                <li><a href="#">Z</a></li>
              </ul>
            </div>
        </div>
    </div>
    <div class="row-fluid model_detail_heading">
    	<div class="btn-group">
            <div class="btn btn-danger">Most Recent</div>
            <div class="btn btn-danger">Top Rated</div>
            <div class="btn btn-danger">A-Z</div>
        </div>
        <div class="pagination pagination-small pageno_nav pull-right">
            <ul>
                <li class="pageno_nav_viewall"><a class="btn-danger" href="#">&lt; Previous</a></li>
                <li><a class="btn-danger" href="#">1</a></li>
                <li><a class="btn-danger" href="#">2</a></li>
                <li><a class="btn-danger" href="#">3</a></li>
                <li><a class="btn-danger" href="#">4</a></li>
                <li><a class="btn-danger" href="#">5</a></li>
                <li class="pageno_nav_viewall"><a class="btn-danger" href="#">Next &gt;</a></li>
            </ul>
        </div>
    </div>
    <!--- model details starts here --->
    <?php
    	//get the models for UI
		$manageData->getModels(0,12,'name');
	?>
    
        <div class="row-fluid">
        	<div class="pagination pagination-small pageno_nav pull-right">
            	<ul>
                	<li class="pageno_nav_viewall"><a class="btn-danger" href="#">&lt; Previous</a></li>
                	<li><a class="btn-danger" href="#">1</a></li>
                    <li><a class="btn-danger" href="#">2</a></li>
                    <li><a class="btn-danger" href="#">3</a></li>
                    <li><a class="btn-danger" href="#">4</a></li>
                    <li><a class="btn-danger" href="#">5</a></li>
                    <li class="pageno_nav_viewall"><a class="btn-danger" href="#">Next &gt;</a></li>
                </ul>
            </div>
        </div>
        <div class="row-fluid end_caption">
            <h4>Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum</h4>
        </div>
     </div>    
    <!--- model details ends here --->
</div>
<!-- site description part ends here --->

<?php
	//include footer
	include ('v-templates/footer.php');
?>