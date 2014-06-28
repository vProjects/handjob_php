<!--sidebar for navigation-->
<div class="span3" id="sidebar_container">
    <div class="accordion" id="accordion2">
        <!--1st accordion menu starts here-->
        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                <span class="icon-list-alt"></span>&nbsp;&nbsp;Dashboard
                </a>
            </div>
            <div id="collapseOne" class="accordion-body <?php if($accord_cat == "dashboard"){echo "in";}?> collapse">
                <div class="accordion-inner">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a <?php if( $page_title == "List Members" ){ echo 'class="v_active"'; }?> href="listMembers.php"><span class="icon-hand-right"></span>&nbsp;&nbsp;List Members</a></li>
                        <li><a <?php if( $page_title == "Add Model" ){ echo 'class="v_active"'; }?> href="addModel.php"><span class="icon-hand-right"></span>&nbsp;&nbsp;Add Model</a></li>
                        <li><a <?php if( $page_title == "List Model" ){ echo 'class="v_active"'; }?> href="listModels.php"><span class="icon-hand-right"></span>&nbsp;&nbsp;List Model</a></li>
                        <li><a href="#"><span class="icon-hand-right"></span>&nbsp;&nbsp;Header Banner</a></li>
                        <li><a href="#"><span class="icon-hand-right"></span>&nbsp;&nbsp;Friends</a></li>
                    </ul>
                </div>
            </div>
        </div><!--1st accordion menu starts here-->
        
        
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
        
        
        <!--3rd accordion menu starts here-->
        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOn">
                <span class="icon-list-alt"></span>&nbsp;&nbsp;Manage Category
                </a>
            </div>
            <div id="collapseOn" class="accordion-body <?php if($accord_cat == "manage_category"){echo "in";}?> collapse">
                <div class="accordion-inner">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a <?php if( $page_title == "Add Movie Category" ){ echo 'class="v_active"'; }?> href="addMovieCat.php"><span class="icon-hand-right"></span>&nbsp;&nbsp;Create Movie Category</a></li>
                        <li><a <?php if( $page_title == "Add Model Category" ){ echo 'class="v_active"'; }?> href="addModelCat.php"><span class="icon-hand-right"></span>&nbsp;&nbsp;Create Model Category</a></li>
                        <li><a <?php if( $page_title == "List Movie Category" ){ echo 'class="v_active"'; }?> href="moviesCategories.php"><span class="icon-hand-right"></span>&nbsp;&nbsp;List Movie Category</a></li>
                        <li><a <?php if( $page_title == "List Model Category" ){ echo 'class="v_active"'; }?> href="modelCategories.php"><span class="icon-hand-right"></span>&nbsp;&nbsp;List Model Category</a></li>
                    </ul>
                </div>
            </div>
        </div><!--3rd accordion menu starts here-->
        
        
        <!--4rth accordion menu starts here-->
        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse4">
                <span class="icon-list-alt"></span>&nbsp;&nbsp;Manage Blog
                </a>
            </div>
            <div id="collapse4" class="accordion-body <?php if($accord_cat == "blog"){echo "in";}?> collapse">
                <div class="accordion-inner">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a <?php if( $page_title == "Create Blog" ){ echo 'class="v_active"'; }?> href="createBlog.php"><span class="icon-hand-right"></span>&nbsp;&nbsp;Create Blog</a></li>
                        <li><a <?php if( $page_title == "List Blog" ){ echo 'class="v_active"'; }?> href="listBlog.php"><span class="icon-hand-right"></span>&nbsp;&nbsp;List Blog</a></li>
                    </ul>
                </div>
            </div>
        </div><!--4rth accordion menu starts here-->
        
        <!--5th accordion menu starts here-->
        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse5">
                <span class="icon-list-alt"></span>&nbsp;&nbsp;Admin Control
                </a>
            </div>
            <div id="collapse5" class="accordion-body <?php if($accord_cat == "admin"){echo "in";}?> collapse">
                <div class="accordion-inner">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a <?php if( $page_title == "Change Password" ){ echo 'class="v_active"'; }?> href="changePwd.php"><span class="icon-hand-right"></span>&nbsp;&nbsp;Change Password</a></li>
                        <li><a href="phpi.php" target="_blank"><span class="icon-hand-right"></span>&nbsp;&nbsp;phpinfo()</a></li>
                    </ul>
                </div>
            </div>
        </div><!--5th accordion menu starts here-->
        
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
                        <li><a <?php if( $page_title == "Manage Friends" ){ echo 'class="v_active"'; }?> href="manageFriends.php"><span class="icon-hand-right"></span>&nbsp;&nbsp;Add Friends</a></li>
                        <li><a <?php if( $page_title == "List Friends" ){ echo 'class="v_active"'; }?> href="listFriends.php"><span class="icon-hand-right"></span>&nbsp;&nbsp;List Friends</a></li>
                        <li><a <?php if( $page_title == "Suggested Sites" ){ echo 'class="v_active"'; }?> href="manageSuggestedSites.php"><span class="icon-hand-right"></span>&nbsp;&nbsp;Suggested Sites</a></li>
                    </ul>
                </div>
            </div>
        </div><!--6th accordion menu starts here-->
        
        <!--7th accordion menu starts here-->
        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse7">
                <span class="icon-list-alt"></span>&nbsp;&nbsp;Manage Social
                </a>
            </div>
            <div id="collapse7" class="accordion-body <?php if($accord_cat == "social"){echo "in";}?> collapse">
                <div class="accordion-inner">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a <?php if( $page_title == "Social Links" ){ echo 'class="v_active"'; }?> href="socialLinks.php"><span class="icon-hand-right"></span>&nbsp;&nbsp;Social Link</a></li>
                    </ul>
                </div>
            </div>
        </div><!--7th accordion menu starts here-->
        
        <!--8th accordion menu starts here-->
        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse8">
                <span class="icon-list-alt"></span>&nbsp;&nbsp;Manage Comments
                </a>
            </div>
            <div id="collapse8" class="accordion-body <?php if($accord_cat == "comment"){echo "in";}?> collapse">
                <div class="accordion-inner">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a <?php if( $page_title == "Model Comments" ){ echo 'class="v_active"'; }?> href="listComments.php?type=Model"><span class="icon-hand-right"></span>&nbsp;&nbsp;Model Comments</a></li>
                        <li><a <?php if( $page_title == "Photos Comments" ){ echo 'class="v_active"'; }?> href="listComments.php?type=Photos"><span class="icon-hand-right"></span>&nbsp;&nbsp;Photos Comments</a></li>
                        <li><a <?php if( $page_title == "Movies Comments" ){ echo 'class="v_active"'; }?> href="listComments.php?type=Movies"><span class="icon-hand-right"></span>&nbsp;&nbsp;Movies Comments</a></li>
                        <li><a <?php if( $page_title == "Article Comments" ){ echo 'class="v_active"'; }?> href="listComments.php?type=Article"><span class="icon-hand-right"></span>&nbsp;&nbsp;Blog Comments</a></li>
                    </ul>
                </div>
            </div>
        </div><!--8th accordion menu starts here-->
        
    </div>
</div><!--sidebar ends here-->