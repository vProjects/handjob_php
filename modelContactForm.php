<?php
	$page_title = 'Model Contact Form';
	//get header
	include ('v-templates/header.php');

	//get the horizontal navbar
	include ('v-templates/navbar.php');
	//include the config file for the pagination
	include('v-includes/config_pagination.php') ;
	
	//variable for the type of search
	$type = "" ;
	$keyword = "" ;
	if( $GLOBALS["_GET"] > 0 )
	{
		$type = $GLOBALS["_GET"]["type"];
	}
	if( !isset( $type ) || empty( $type ) )
	{
		$type = "recent" ;
	}
	if(isset($GLOBALS['_GET']['msg']))
	{
		$msg = $GLOBALS['_GET']['msg'];
	}
?>

<!-- site description part starts here --->
<div class="container">
	<?php
		//include the model searchBar
		include('v-templates/modelSearchBar.php') ;
	?>
    
    <!-- codes for the form starts here -->
    <form action="v-includes/function/function.modelContactInfo.php" method="post" class="model_form_outline span8">
    	<div class="form-group row-fluid">
        	<div class="model_form_label pull-left span3">**First Name:</div>
            <input type="text" placeholder="" name="f_name" class="model_form_textbox span8"/>
            <div class="clearfix"></div>
        </div>
        <div class="form-group row-fluid">
        	<div class="model_form_label pull-left span3">**Last Name:</div>
            <input type="text" placeholder="" name="l_name" class="model_form_textbox span8"/>
            <div class="clearfix"></div>
        </div>
        <div class="form-group row-fluid">
        	<div class="model_form_label pull-left span3">**Stage Name:</div>
            <input type="text" placeholder="" name="public_name" class="model_form_textbox span8"/>
            <div class="clearfix"></div>
        </div>
        <div class="form-group row-fluid">
        	<div class="model_form_label pull-left span3">**Date of Birth:</div>
            <select id="month" name="month" class="span2">
                <option value="00">Month</option>
                <option value="01">January</option>
                <option value="02">February</option>
                <option value="03">March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">June</option>
                <option value="07">July</option>
                <option value="08">August</option>
                <option value="09">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
            <select id="day" name="day" class="span2">
                 <option value="00">Day</option>
                 <option value="01">01</option>	
                 <option value="02">02</option>	
                 <option value="03">03</option>	
                 <option value="04">04</option>	
                 <option value="05">05</option>	
                 <option value="06">06</option>	
                 <option value="07">07</option>	
                 <option value="08">08</option>	
                 <option value="09">09</option>	
                 <option value="10">10</option>	
                 <option value="11">11</option>	
                 <option value="12">12</option>	
                 <option value="13">13</option>	
                 <option value="14">14</option>	
                 <option value="15">15</option>	
                 <option value="16">16</option>	
                 <option value="17">17</option>	
                 <option value="18">18</option>	
                 <option value="19">19</option>	
                 <option value="20">20</option>	
                 <option value="21">21</option>	
                 <option value="22">22</option>	
                 <option value="23">23</option>	
                 <option value="24">24</option>	
                 <option value="25">25</option>	
                 <option value="26">26</option>	
                 <option value="27">27</option>	
                 <option value="28">28</option>	
                 <option value="29">29</option>	
                 <option value="30">30</option>	
                 <option value="31">31</option>	
            </select>
                                                                                                                                   <select id="year" name="year" class="span2">
				 <option value="0000">Year</option>
                 <option value="1996">1996</option>	
                 <option value="1995">1995</option>	
                 <option value="1994">1994</option>	
                 <option value="1993">1993</option>	
                 <option value="1992">1992</option>	
                 <option value="1991">1991</option>	
                 <option value="1990">1990</option>	
                 <option value="1989">1989</option>	
                 <option value="1988">1988</option>	
                 <option value="1987">1987</option>	
                 <option value="1986">1986</option>	
                 <option value="1985">1985</option>	
                 <option value="1984">1984</option>	
                 <option value="1983">1983</option>	
                 <option value="1982">1982</option>	
                 <option value="1981">1981</option>	
                 <option value="1980">1980</option>	
                 <option value="1979">1979</option>	
                 <option value="1978">1978</option>	
                 <option value="1977">1977</option>	
                 <option value="1976">1976</option>	
                 <option value="1975">1975</option>	
                 <option value="1974">1974</option>	
                 <option value="1973">1973</option>	
                 <option value="1972">1972</option>	
                 <option value="1971">1971</option>	
                 <option value="1970">1970</option>	
                 <option value="1969">1969</option>	
                 <option value="1968">1968</option>	
                 <option value="1967">1967</option>	
                 <option value="1966">1966</option>	
                 <option value="1965">1965</option>	
                 <option value="1964">1964</option>	
                 <option value="1963">1963</option>	
                 <option value="1962">1962</option>	
                 <option value="1961">1961</option>	
                 <option value="1960">1960</option>	
                 <option value="1959">1959</option>	
                 <option value="1958">1958</option>	
                 <option value="1957">1957</option>	
                 <option value="1956">1956</option>	
                 <option value="1955">1955</option>	
                 <option value="1954">1954</option>	
                 <option value="1953">1953</option>	
                 <option value="1952">1952</option>	
                 <option value="1951">1951</option>	
                 <option value="1950">1950</option>
            </select>
            <div class="clearfix"></div>
        </div>
        <div class="form-group row-fluid">
        	<div class="model_form_label pull-left span3">**Birth Place:</div>
            <input type="text" placeholder="" name="birth_place" class="model_form_textbox span8"/>
            <div class="clearfix"></div>
        </div>
        <div class="form-group row-fluid">
        	<div class="model_form_label pull-left span3">**Country:</div>
            <input type="text" placeholder="" name="country" class="model_form_textbox span8"/>
            <div class="clearfix"></div>
        </div>
        <div class="form-group row-fluid">
        	<div class="model_form_label pull-left span3">**State/Region:</div>
            <input type="text" placeholder="" name="state" class="model_form_textbox span8"/>
            <div class="clearfix"></div>
        </div>
        <div class="form-group row-fluid">
        	<div class="model_form_label pull-left span3">**City:</div>
            <input type="text" placeholder="" name="city" class="model_form_textbox span8"/>
            <div class="clearfix"></div>
        </div>
        <div class="form-group row-fluid">
        	<div class="model_form_label pull-left span3">**Street Address:</div>
            <input type="text" placeholder="" name="street_address" class="model_form_textbox span8"/>
            <div class="clearfix"></div>
        </div>
        <div class="form-group row-fluid">
        	<div class="model_form_label pull-left span3">**Postal Code:</div>
            <input type="text" placeholder="" name="postal_code" class="model_form_textbox span8"/>
            <div class="clearfix"></div>
        </div>
        <div class="form-group row-fluid">
        	<div class="model_form_label pull-left span3">**Email Id:</div>
            <input type="text" placeholder="" name="email_id" class="model_form_textbox span8"/>
            <div class="clearfix"></div>
        </div>
        <div class="form-group row-fluid">
        	<div class="model_form_label pull-left span3">**Username:</div>
            <input type="text" placeholder="" name="username" class="model_form_textbox span8"/>
            <div class="clearfix"></div>
        </div>
        <div class="form-group row-fluid">
        	<div class="model_form_label pull-left span3">Phone Country Prefix:</div>
            <input type="text" placeholder="" name="phone_country_prefix" class="model_form_textbox span3"/>
            <div class="clearfix"></div>
        </div>
        <div class="form-group row-fluid">
        	<div class="model_form_label pull-left span3">Phone Number:</div>
            <input type="text" placeholder="" name="phone_number" class="model_form_textbox span5"/>
            <div class="clearfix"></div>
        </div>
        <div class="form-group row-fluid">
        	<div class="model_form_label pull-left span3">**Mobile Number:</div>
            <input type="text" placeholder="" name="mobile_number" class="model_form_textbox span5"/>
            <div class="clearfix"></div>
        </div>
        <div class="form-group row-fluid">
        	<div class="model_form_label pull-left span3">ICQ:</div>
            <input type="text" placeholder="" name="icq" class="model_form_textbox span5"/>
            <div class="clearfix"></div>
        </div>
        <div class="form-group row-fluid">
        	<div class="model_form_label pull-left span3">Website URL/Webpages:</div>
            <input type="text" placeholder="" name="web_url" class="model_form_textbox span5"/>
            <div class="clearfix"></div>
        </div>
        <div class="form-group row-fluid">
        	<div class="model_form_label pull-left span3">Facebook Link:</div>
            <input type="text" placeholder="" name="fb_link" class="model_form_textbox span5"/>
            <div class="clearfix"></div>
        </div>
        <div class="form-group row-fluid">
        	<div class="model_form_label pull-left span3">Twitter Name:</div>
            <input type="text" placeholder="" name="twitter" class="model_form_textbox span5"/>
            <div class="clearfix"></div>
        </div>
        <div class="form-group row-fluid">
        	<div class="model_form_label pull-left span3">**Image Links:</div>
            <input type="text" placeholder="" name="img_links" class="model_form_textbox span5"/>
            <div class="clearfix"></div>
        </div>
        <div class="form-group row-fluid">
        	<div class="model_form_label pull-left span3"></div>
            <input type="checkbox" name="year_limit" class="model_form_checkbox"/>
            <span>I am at least 18 years of age.</span>
            <div class="clearfix"></div>
        </div>
		<div class="form-group row-fluid">
        	<div class="model_form_label pull-left span3">Upload Image:</div>
            <input type="file" placeholder="" name="" class="model_form_textbox span5">
            <div class="clearfix"></div>
        </div>        
		<div class="form-group row-fluid">
        	<div class="model_form_label pull-left span3">Short note:</div>
            <textarea class="model_form_textbox span5"></textarea>
            <div class="clearfix"></div>
        </div>        

        <div class="form-group row-fluid">
        	<div class="model_form_label pull-left span3"></div>
            <input type="submit" value="SUBMIT" class="btn btn-large btn-danger span3" style="border-radius: 6px !important;"/>
            <p style="color:#ff0000;"><?php if(isset($msg)){ echo $msg; } ?></p>
            <div class="clearfix"></div>
        </div>
    </form>
     <!-- members favourite portion starts here ---->
        <div class="row-fluid photo_update">
            <div class="span12">
                <h3 class="site_heading memfav"> Members Favorite</h3>
                <div class="row-fluid photo_update_outline">
                    <div class="pagination pagination-small pageno_nav pull-right">
                        <ul>
                            <li class="pageno_nav_viewall"><a class="btn-danger" href="join.php">Next</a></li>
                        </ul>
                    </div>
                </div>
                <?php
                    //generate an alternate number for the members favorite
                    $alternate = rand(1,2) ;
                    if( $alternate%2 == 0 ) 
                    {
                        //get the random members favourite movie
                        $manageData->membersFavourite(0,9,'movie') ;			
                    }
                    else
                    {
                        //get the random members favourite photos
                        $manageData->membersFavourite(0,8,'photo') ;
                    }
                ?>
                
                <!--- photo row3 ends here --->
                
            </div>
         </div>   
         <!-- members favourite portion ends here ---->
    <!-- codes for the form ends here -->
    </div>
       
     </div>    
     

</div>
<!-- site description part ends here --->

<?php
	//include footer
	include ('v-templates/footer.php');
?> 