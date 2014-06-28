<?php
	$page_title = 'Blogs';
	//get header
	include ('v-templates/header.php');
	
	//get the horizontal navbar
	include ('v-templates/navbar.php');
	//include the config file for the pagination
	include('v-includes/config_pagination.php') ;
	
	//variable for the type of search
	$type = "" ;
	$keyword = "" ;
	
	$limit = '15';
?>

<!-- site description part starts here --->
<div class="container">
	<?php
		//include the model searchBar
		include('v-templates/modelSearchBar.php') ;
	?>

	<div class="row-fluid model_detail_heading">
    	<?php
			//get the pagination for the page
			$manageData->pagination($startPoint,"blog_list.php",10,"article_info","recent","",$limit);
		?>
    </div>
    
	<?php
		//get the articles
		$manageData->getArticles($startPoint,$limit);
	?>
    
    <div class="row-fluid">
        <div class="row-fluid">
        	<div class="span12">
            	<?php
					//get the pagination for the page
					$manageData->pagination($startPoint,"blog_list.php",10,"article_info","recent","",$limit);
				?>
            </div>
        </div>
    </div>
</div>
<!-- site description part ends here --->

<?php
	//include footer
	include ('v-templates/footer.php');
?> 