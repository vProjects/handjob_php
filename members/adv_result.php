<?php
	$page_title = 'PLAYING-MOVIE';
	//get header
	include ('v-templates/header.php');

	//get the horizontal navbar
	include ('v-templates/navbar.php');
	
	//get the value of id from the query string
	if( $_SERVER['REQUEST_METHOD'] == 'POST' )
	{
		$keyword_with = $GLOBALS["_POST"]["content_keyword_with"];
		$keyword_exact = $GLOBALS["_POST"]["content_keyword_exact"];
		$keyword_without = $GLOBALS["_POST"]["content_keyword_without"];
		$content_date = $GLOBALS["_POST"]["content_date"] ;
		$content_type = $GLOBALS["_POST"]["content_type"] ;
		$movie_category = $GLOBALS["_POST"]["movie_category"] ;
		$model_category = $GLOBALS["_POST"]["model_category"] ;
	}
	//this will be used for the search box
	elseif( $_SERVER['REQUEST_METHOD'] == 'GET' )
	{
		$keyword_with = $GLOBALS["_GET"]["content_keyword"];
		$keyword_exact = '';
		$keyword_without = '';
		$content_date = 'all';
		$content_type = 'all' ;
		$movie_category = 'all' ;
		$model_category = 'all' ;
	}
	
	//initialize the date variable to the initial date
	$cdate = '2012-01-01' ;
	
	//set the begining date according to the dropdown
	//1 week
	if( $content_date == '1w' )
	{
		$cdate = date('Y-m-d',strtotime('-1 week')); ;
	}
	//2 week
	if( $content_date == '2w' )
	{
		$cdate = date('Y-m-d',strtotime('-2 week')); ;
	}
	//1 month
	if( $content_date == '1m' )
	{
		$cdate = date('Y-m-d',strtotime('-1 month')); ;
	}
	//2 month
	if( $content_date == '2m' )
	{
		$cdate = date('Y-m-d',strtotime('-2 month')); ;
	}
	
?>

    
    <div id="bodyContainer" class="row-fluid">
    	
        <?php
			//get the content according to the type and keywords
			$manageData->getAdvSearch($keyword_with,$keyword_without,$keyword_exact,$cdate,$content_type,$model_category,$movie_category) ;
						
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
   	</div>
    <!-- body container ends here -->
<?php
	//include footer
	include ('v-templates/footer.php');
?>  