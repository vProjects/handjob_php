    <!-- navbar starts here ---->
    <div class="navbar navigation">
    	<div class="navbar-inner navbar_inner">
        	<div class="container">
            
            	<!-- .btn-navbar is used as the toggle for collapsed navbar content -->
                  <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </a>
                  
                  <div class="nav-collapse collapse">
                  		<ul class="nav">
                        	<li <?php if($page_title == 'Tour'){echo 'class="active"';}?>><a href="tour.php">Home</a></li>
                            <li <?php if($page_title == 'Movies'){echo 'class="active"';}?>><a href="movie.php">Movies</a></li>
                            <li <?php if($page_title == 'Photos'){echo 'class="active"';}?>><a href="photo.php">Photos</a></li>
                            <li <?php if($page_title == 'Models'){echo 'class="active"';}?>><a href="model.php">Models</a></li>
                            <li <?php if($page_title == 'Blogs'){echo 'class="active"';}?>><a href="blog_list.php">Blog</a></li>
                            <li <?php if($page_title == 'Friends'){echo 'class="active"';}?>><a href="friends.php">Friends</a></li>
                            <li <?php if($page_title == 'Join Now'){echo 'class="active"';}?>><a href="join.php" class="nav_join">Join now!</a></li>
                        </ul>
                  </div>
            </div>
        </div>
    </div>
    <!-- navbar ends here ---->
</div>  
<!--- header ends here ---->