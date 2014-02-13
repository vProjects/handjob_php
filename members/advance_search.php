<?php
	$page_title = 'ADVANCE SEARCH';
	//get header
	include ('v-templates/header.php');

	//get the horizontal navbar
	include ('v-templates/navbar.php');
	/*
	$date = '2014-02-07';
	$pDate = date('Y-m-d',strtotime('-1 week'));
	echo $pDate ;*/
?>

	<div id="bodyContainer" class="row-fluid advaced_search_form">
    	<div class="span8 offset2">
    	<form action="adv_result.php" class="form-horizontal" method="post">
            <div class="row-fluid">
                <div class="span10 offset2 form_part">
                	<h5>Find photo sets or movies that contain: </h5>
                      <div class="control-group">
                        <label class="control-label">Any of these words</label>
                        <div class="controls">
                        <input type="text"name="content_keyword_with">
                        </div>
                     </div>
                     <div class="control-group">
                        <label class="control-label">This exact word or phrase</label>
                        <div class="controls">
                        <input type="text" name="content_keyword_exact">
                        </div>
                     </div>
                </div>
            </div>
            
            <div class="row-fluid">
                <div class="span10 offset2 form_part">
                	<h5>But don't show results that have: </h5>
                      <div class="control-group">
                        <label class="control-label">All these words</label>
                        <div class="controls">
                        <input type="text" name="content_keyword_without">
                        </div>
                     </div>
                </div>
            </div>
            
            <div class="row-fluid">
                <div class="span10 offset2 form_part"> 
                	<h5>Only show results for: </h5>
                      <div class="control-group">
                        <label class="control-label">Content added within</label>
                        <div class="controls">
                        <select name="content_date">
                            <option value="all">Anytime</option>
                            <option value="1w">1 Week</option>
                            <option value="2w">2 Weeks</option>
                            <option value="1m">1 Month</option>
                            <option value="2m">2 Month</option>
                        </select>
                        </div>
                     </div>
                     <div class="control-group">
                        <label class="control-label" name="content_type">That contains media types</label>
                        <div class="controls">
                        <select name="content_type">
                            <option value="all">All Content Type</option>
                            <option value="movie">Movies</option>
                            <option value="photo">Photos</option>
                            <option value="model">Models</option>
                        </select>
                        </div>
                     </div>
                 </div>
            </div>
            <?php
				//UI for the category
				$manageData->getCategory_AdvancedSearch() ;
			?>
            <div class="row-fluid">
                <div class="span10 offset2 form_part_button"> 
                      <div class="control-group">
                            <button type="submit" class="btn btn-large btn-danger">SEARCH</button>
                      </div> 
                </div>
            </div>  
        </form>
    </div>
    </div>

<?php
	//include footer
	include ('v-templates/footer.php');
?>