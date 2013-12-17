<?php
	$page_title = 'Models';
	//include header section
	include 'v-templates/header.php';

	//include navbar section
	include 'v-templates/navbar.php';
	
	//variable for the type of search
	$type = "" ;
	$keyword = "" ;
	
	if( $GLOBALS["_GET"] > 0 )
	{
		$type = $GLOBALS["_GET"]["type"] ;
		$keyword = $GLOBALS["_GET"]["keyword"] ;
	}
	if( !isset( $type ) || empty( $type ) )
	{
		$type = "recent" ;
	}
?>

<!-- site description part starts here --->
<div class="container">
	<?php
		//include the model searchBar
		include('v-templates/modelSearchBar.php') ;
	?>
    <div class="row-fluid model_detail_heading">
    	<?php
			//set the pageName for the type navbar
			$pageName = "searchModelDir.php" ;
			//include the type navbar
			include('v-templates/typeNavbar.php') ;
		?>
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
		$manageData->searchModelDirectory(0,12,$type,$keyword);
	?>
    
        <div class="row-fluid">
            <div class="span12">
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