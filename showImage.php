<?php
	$page_title = 'Photos';
	//get header
	include ('v-templates/header.php');
	
	//get the horizontal navbar
	include ('v-templates/navbar.php');
	
	//variable for the type of search
	$gallery_id = "" ;
	$model = "" ;
	$type = "low" ;
	$filename_get = "" ;
	if( $GLOBALS["_GET"] > 0 )
	{
		$gallery_id = $GLOBALS["_GET"]["gallery_id"] ;
		$model = $GLOBALS["_GET"]["model"] ;
		$type = $GLOBALS["_GET"]["type"] ;
		$filename_get = $GLOBALS["_GET"]["filename"] ;
	}
	
	//get the filename array using the BLL
	$filename = $manageData->getSliderImage($gallery_id) ;
	
	$gallery_path = "" ;
	
	if( $type == "high" )
	{
		$gallery_path = "gallery/".$gallery_id."/" ;
	}
	elseif( $type == "medium" )
	{
		$gallery_path = "gallery/".$gallery_id."/m/" ;
	}
	else
	{
		$gallery_path = "gallery/".$gallery_id."/s/" ;
	}
?>

<!-- site description part starts here --->
<div class="container">
	<?php
		//get the model details if the model name is set
		if( isset($model) && !empty($model) )
		{
			//create the UI using the BLL method
			$manageData->getModel_Details_byName($model) ;
		}
	?>
    <div class="row-fluid">
        <div class="row-fluid model_detail_heading">
            <div class="btn-group pull-left">
                <div onClick="redirectIt('low')" class="btn btn-danger">Small</div>
                <div onClick="redirectIt('medium')" class="btn btn-danger">Medium</div>
                <div onClick="redirectIt('high')" class="btn btn-danger">Large</div>
            </div>
            <div class="btn-group pull-right">
                <div class="btn btn-danger" onClick="firstClick()">First</div>
                <div class="btn btn-danger" onClick="previousClick()">Previous</div>
                <div id="pic_index" class="btn btn-danger">0/0</div>
                <div class="btn btn-danger" onClick="nextClick()">Next</div>
                <div class="btn btn-danger" onClick="lastClick()">Last</div>
            </div>
        </div>
    </div>
   <?php
   	if( $type == "low" )
	{
   ?>
   
    <div class="row-fluid">
    	<div class="offset2 span8 slider_wrapper">
        	<div class="slider_container">
	            <img class="lazy" onClick="nextClick()" id="img_container_1" style="display: inline;width:100%;" src="">
                <img class="lazy" id="img_container_2" style="display: inline;width:100%;display:none;" src="">
                <img class="lazy" id="img_container_3" style="display: inline;width:100%;display:none;" src="">
            </div>
        </div>
    </div>
    
    <?php
	}
	if( $type == "medium" )
	{
	?>
    
    <div class="row-fluid">
    	<div class="offset1 span10 slider_wrapper">
        	<div class="slider_container" >
	            <img class="lazy" onClick="nextClick()" id="img_container_1" style="display: inline;width:100%;" src="">
                <img class="lazy" id="img_container_2" style="display: inline;width:100%;display:none;" src="">
                <img class="lazy" id="img_container_3" style="display: inline;width:100%;display:none;" src="">
            </div>
        </div>
    </div>
    
    <?php
	}
	if( $type == "high" )
	{
	?>
    
    <div class="row-fluid">
    	<div class="span12 slider_wrapper">
        	<div class="slider_container">
	            <img class="lazy" onClick="nextClick()" id="img_container_1" style="display: inline;width:100%;" src="">
                <img class="lazy" id="img_container_2" style="display: inline;width:100%;display:none;" src="">
                <img class="lazy" id="img_container_3" style="display: inline;width:100%;display:none;" src="">
            </div>
        </div>
    </div>
	
	<?php
	}
	?>
    
</div>
<!-- site description part ends here --->
<script type="text/javascript">
	var filename  = <?php print_r($filename[0]) ; ?> ;
	var total_no = <?php echo $filename[1] ; ?> ;
	var galleryPath = '<?php echo $gallery_path; ?>' ;
	
	//index for the image navigation
	var index = filename.indexOf('<?php echo $filename_get; ?>') ;
	
	//initialze the images on loading
	window.onload = forIniti() ;
	
	function forIniti()
	{
		//index ;
		document.getElementById('img_container_1').src = galleryPath+filename[index] ;
		imageNavigation() ;
	}
	
	//function for showing the image navigation
	function imageNavigation()
	{
		document.getElementById('pic_index').innerHTML = (index+1)+"/"+total_no ;
	}
	
	function joinPage()
	{
		//codes to redirect to join page for tour section
		window.location = 'join.php' ;
	}
	
	function nextClick()
	{
		//increment the index
		index++ ;
		
		//check the index for last image
		if( index >= total_no)
		{
			//codes to redirect to join page for tour section
			joinPage() ;
			document.getElementById('img_container_1').src = galleryPath+filename[index] ;
			document.getElementById('img_container_2').src = galleryPath+filename[0] ;
			document.getElementById('img_container_3').src = galleryPath+filename[1] ;
			index = 0 ;
		}
		if( index == total_no-1)
		{
			//codes to redirect to join page for tour section
			joinPage() ;
			document.getElementById('img_container_1').src = galleryPath+filename[index] ;
			document.getElementById('img_container_2').src = galleryPath+filename[index+1] ;
			document.getElementById('img_container_3').src = galleryPath+filename[0] ;
		}
		if( index <= total_no-2)
		{
			document.getElementById('img_container_1').src = galleryPath+filename[index] ;
			document.getElementById('img_container_2').src = galleryPath+filename[index+1] ;
			document.getElementById('img_container_3').src = galleryPath+filename[index+2] ;
		}
		//set the image navigation
		imageNavigation() ;
	}
	
	function previousClick()
	{
		//decrement the index
		index-- ;
		if( index <= 0 )
		{
			document.getElementById('img_container_1').src = galleryPath+filename[index] ;
			document.getElementById('img_container_2').src = galleryPath+filename[total_no] ;
			document.getElementById('img_container_3').src = galleryPath+filename[total_no-1] ;
			if( index != 0 )
			{
				//codes to redirect to join page for tour section
				joinPage() ;
				index = total_no-1 ;
			}
		}
		
		if( index == 1 )
		{
			document.getElementById('img_container_1').src = galleryPath+filename[1] ;
			document.getElementById('img_container_2').src = galleryPath+filename[0] ;
			document.getElementById('img_container_3').src = galleryPath+filename[total_no-1] ;
		}
		if( index >= 2 )
		{
			document.getElementById('img_container_1').src = galleryPath+filename[index] ;
			document.getElementById('img_container_2').src = galleryPath+filename[index-1] ;
			document.getElementById('img_container_3').src = galleryPath+filename[index-2] ;
		}
		//set the image navigation
		imageNavigation() ;
		
	}
	
	function redirectIt(type)
	{
		window.location = 'showImage.php?type='+type+'&gallery_id=<?php echo $gallery_id."&model=".$model."&filename=" ?>'+filename[index];
	}
	
	function lastClick()
	{
		//codes to redirect to join page for tour section
		joinPage() ;
		index = total_no ;
		previousClick() ;
	}
	
	function firstClick()
	{
		index = -1 ;
		nextClick() ;
	}
	
</script> 
<?php
	//include footer
	include ('v-templates/footer.php');
?> 