<?php
	$page_title = 'Blogs';
	//get header
	include ('v-templates/header.php');
	
	//get the horizontal navbar
	include ('v-templates/navbar.php');
?>

<!-- site description part starts here --->
<div class="container">
	<div class="row-fluid model_detail_heading">
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
    
	<?php
		//get the articles
		$manageData->getArticles(0,10);
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
<!-- site description part ends here --->

<?php
	//include footer
	include ('v-templates/footer.php');
?> 