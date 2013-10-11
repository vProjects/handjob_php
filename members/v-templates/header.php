<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if(isset($page_title)){echo 'HANDJOBSTOP | '.$page_title;}?></title>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
<script type="text/javascript">
	function showDetails(variable){
		document.getElementById(variable).style.display = "block";
		var mp = document.getElementById('mp');
		mp.onmouseout=function(){
			document.getElementById(variable).style.display = "none";
		
		};
	}
	
</script>
<!-- playing-movie page specific css and js -->
<link href="videoplayer/video-js.css" rel="stylesheet" type="text/css">
<script src="videoplayer/video.js"></script>
<script>
    videojs.options.flash.swf = "videoplayer/video-js.swf";
  </script>
<!-- playing-movie page specific css and js ends here -->
</head>
<body>

<div class="container">
	<div id="header">
        <div class="row-fluid banner">
        	<div class="span12">
                <div class="span8">
                    <div class="span4 logo"><img src="images/logo.png" alt="logo"></div>
                </div>  <!-- will contain the logo -->
                <div class="span4">
                    <form class="form-search pull-right">
                      <input type="text" class="input-medium search-query">
                      <button type="submit" class="btn btn-danger">Search</button>
                      <!-- Button to trigger modal -->
                      <a href="advance_search.php" class="popup_link">Advanced Search</a>
                    </form>
                </div>  <!-- will contain the search bar -->	
            </div>
        </div>
                    
                    
               