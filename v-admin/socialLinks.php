<?php
	$pageTitle = "Change Social Links";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--Import Bootstrap CSS-->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<!--Custom CSS file-->
<link href="css/style.css" rel="stylesheet" type="text/css" />
<title><?php echo $pageTitle;?>| ADMIN</title>
</head>

<body>
	
    
    <!--body main container starts here-->
    <div id="main_container">
    	<!--header starts here-->
        <div class="container" id="wrap">
            <div class="row v_row">
                <div class="span12 nav-header nav_header">
                    <div class="span2">
                        <h3>VPanel</h3>
                    </div>
                    <!--dropdown for admin-->
                    <div class="span2 admin-btn">
                    	<!-- Single button -->
                        <div class="btn-group">
                            <button type="button" class="btn dropdown-toggle btn-custom" data-toggle="dropdown">
                            	Hello Admin&nbsp;&nbsp;<span class="icon-align-justify"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#"><span class="icon-globe"></span>&nbsp;&nbsp;My Site</a></li>
                                <li><a href="#"><span class="icon-wrench"></span>&nbsp;&nbsp;Manage</a></li>
                                <li class="divider"></li>
                                <li><a href="#"><span class="icon-off"></span>&nbsp;&nbsp;Logout</a></li>
                            </ul>
                        </div>
                    </div><!--dropdown for admin ends here-->
                </div>
            </div>
        </div><!--header ends here-->
        
        <!--include sidebar-->
        <?php
			include('v-templates/sidebar.php');
		?>
        
        <!--container for content of the website-->
        <div class="span9" id="content_container">
        	<blockquote>
                <p>Chang Socail Links</p>
                <small>
                	<cite title="Source Title">Change Social Links of your website.</cite>
                </small>
            </blockquote>
            <!--form for adding the model-->
            <div class="form-horizontal">
            	<div class="form-control v-form">
                	<label class="control-label">Twiter Link</label>
                    <input type="text" placeholder="Twiter Link" class="textbox1"/>
                </div>
                <div class="form-control v-form">
                	<label class="control-label">Facebook Link</label>
                    <input type="text" placeholder="Facebook Link" class="textbox1"/>
                </div>
                <div class="form-control v-form">
                	<input type="submit" value="Submit" class="btn btn-large btn-primary btn1" />
                </div>
            </div><!--form ends here-->
        </div>
    	
    </div><!--body main container ends here-->
    
<?php
	//get footer
	include('v-templates/footer.php');
?>