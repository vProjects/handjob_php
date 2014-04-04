<!--- footer starts here ---->
<div class="row-fluid footer">
	<div class="span4 footer_part">
    	<p class="footer_part_heading">Site links</p>
        <ul>
        	<li><a href="index.php">Home</a></li>
            <li><a href="model.php">Models</a></li>
            <li><a href="photos.php">Photos</a></li>
            <li><a href="videos.php">Videos</a></li>
            <li><a href="blog_list.php">Blogs</a></li>
            <li><a href="friends.php">Freinds</a></li>
        </ul>
    </div>
     <div class="span4 footer_part">
        <p class="footer_part_heading">Contact</p>
        <ul>
        	<li><a href="https://support.ccbill.com/" target="_blank">Support</a></li>
            <li><a href="mailto:webmaster@handjobstop.com" target="_blank">Contact Us</a></li>
            <li><a href="http://handjobstop.com/modelContactForm.php">Models Wanted</a></li>
            <li><a href="http://www.handjobstop.com/webmaster.php">Webmaster</a></li>
            <li><a href="#">Legal</a></li>
        </ul>
      </div>
      <div class="span4 footer_part">
        <p class="footer_part_heading">Social Links</p>
        <ul>
        	<li><a href="https://www.facebook.com/handjobstop?ref=hl" target="_blank"><img src="images/facebooks.png" class="socialIcons" alt="facebook"></a></li>
            <li><a href="#"><img src="images/twitters.png" target="_blank" class="socialIcons" alt="twitter"></a></li>
            <li><a href="#"><img src="images/insta.png" target="_blank" class="socialIcons" alt="google plus"></a></li>
        </ul>
      </div>
</div>
<div class="row-fluid footer_text_part">
	<div class="span10 offset1">
        <hr class="footer_hr" />
        <p>All models on handjobstop.com were 18 years of age or older when photographed.</p>
        <p>WARNING: If you are under 21 years of age or if it is illegal to view adult material in your community, please leave now. </p>
        <p>All rights reserved. 2014 - www.handjobstop.com</p>
    </div>    
</div>
<!--- footer ends here ------>

</div> 



<script type="text/javascript">
function endclip(){
            $('#myplayer').flash({
            'src':'http://www.gdd.ro/gdd/flvplayer/gddflvplayer.swf',
            'width':'100%',
            'height':'300',
            'wmode':'transparent',
            'flashvars': {
                'vdo':'http://www.gdd.ro/flvplayer/examples/AvatarHD.mp4',
                'autoplay':'true',
            }
            }); 

    }
</script>
<script type="text/javascript" src="assets/js/image_slider.js"></script>
<script type="text/javascript" src="assets/js/jquery.lazy.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="../assets/js/responsiveslides.js"></script>

<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery("img.lazy").lazy({
        effect: "fadeIn",
        effectTime: 1500
    });
});

$(function () {

  // Slideshow 1
  $('#abc').responsiveSlides({
        speed: 1000,
        maxwidth: 3200
      });

    });
 


function doSearch(search_id)
{
	var keyword = document.getElementById(search_id).value ;
	
	window.location = 'adv_result.php?content_keyword='+keyword ;
}
</script>


</body>


</html>