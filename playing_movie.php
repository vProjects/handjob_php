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
	}
?>

<!-- site description part starts here --->
<div class="container">
    <div class="row-fluid model_detail_heading">
    	<div class="btn-group">
            <a href="#"><button class="btn <?php //if( $type=='recent'){ echo 'active' ;}?> btn-danger">Low</button></a>
            <a href="#"><button class="btn <?php //if( $type=='rated'){ echo 'active' ;}?> btn-danger">Medium</button></a>
            <a href="#"><button class="btn <?php //if( $type=='name'){ echo 'active' ;}?> btn-danger">High</button></a>
        </div>
    </div>
    
    <!-- movie player-->
    <div class="row-fluid">
       	<div class="span10 offset1 media" style="height:400px;margin-top:10px;background-color:#000;"></div>
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
</div>
<!-- site description part ends here --->

<?php
	//include footer
	include ('v-templates/footer.php');
?> 