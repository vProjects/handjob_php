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
                      <a href="#myModal" role="button" class="popup_link" data-toggle="modal">Advanced Search</a>
                    </form>
                </div>  <!-- will contain the search bar -->	
            </div>
        </div>
                    
                    
                   
                    <!-- Modal section starts here -->
                    <div id="myModal" class="modal hide fade popup_page" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-header popup_page_header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 id="myModalLabel">Modal header</h4>
                      </div>
                      <div class="modal-body">
                        <p>One fine body…</p>
                      </div>
                      <div class="modal-footer popup_page_footer">
                        <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
                      </div>
                    </div>
                    <!-- Modal section ends here -->
                    
               