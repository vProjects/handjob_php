<!--sidebar for navigation-->
<div class="span3" id="sidebar_container">
    <div class="accordion" id="accordion2">
        
        <!--2nd accordion menu starts here-->
        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                <span class="icon-list-alt"></span>&nbsp;&nbsp;Manage Media
                </a>
            </div>
            <div id="collapseTwo" class="accordion-body  <?php if($accord_cat == "manage_media"){echo "in";}?>  collapse">
                <div class="accordion-inner">
                    <ul class="nav nav-pills nav-stacked">
                    	<li><a href="cropUploadImage.php" <?php if( $page_title == "Crop Uploaded" ){ echo 'class="v_active"'; }?>><span class="icon-hand-right"></span>&nbsp;&nbsp;Uploaded Images</a></li>
                        <li><a <?php if( $page_title == "Add Video" ){ echo 'class="v_active"'; }?> href="uploadVideo.php"><span class="icon-hand-right"></span>&nbsp;&nbsp;Add New Videos</a></li>
                        <li><a <?php if( $page_title == "Add Photos" ){ echo 'class="v_active"'; }?> href="galleryFromImage.php"><span class="icon-hand-right"></span>&nbsp;&nbsp;New Photo Set</a></li>
                        <li><a <?php if( $page_title == "List Video" ){ echo 'class="v_active"'; }?> href="listVideo.php"><span class="icon-hand-right"></span>&nbsp;&nbsp;List Movies</a></li>
                        <li><a <?php if( $page_title == "List Sliced" ){ echo 'class="v_active"'; }?> href="listSlicedVid.php"><span class="icon-hand-right"></span>&nbsp;&nbsp;List Sliced Movies</a></li>
                        <li><a <?php if( $page_title == "List Gallery" ){ echo 'class="v_active"'; }?> href="listGallery.php"><span class="icon-hand-right"></span>&nbsp;&nbsp;List Gallery</a></li>
                    </ul>
                </div>
            </div>
        </div><!--2nd accordion menu starts here-->
        
        <!--6th accordion menu starts here-->
        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse6">
                <span class="icon-list-alt"></span>&nbsp;&nbsp;Manage Content
                </a>
            </div>
            <div id="collapse6" class="accordion-body <?php if($accord_cat == "content"){echo "in";}?> collapse">
                <div class="accordion-inner">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a <?php if( $page_title == "Paginations" ){ echo 'class="v_active"'; }?> href="managePagination.php"><span class="icon-hand-right"></span>&nbsp;&nbsp;Contol Pagination</a></li>
                        <li><a href="#"><span class="icon-hand-right"></span>&nbsp;&nbsp;Submenu</a></li>
                    </ul>
                </div>
            </div>
        </div><!--6th accordion menu starts here-->
        
    </div>
</div><!--sidebar ends here-->