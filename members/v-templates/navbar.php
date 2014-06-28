<div class="navigation">
        	<div class="navbar">
              <div class="navbar-inner navbar_inner">
                <div class="container">
             
                  <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
                  <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </a>
             
                  	<!-- Be sure to leave the brand out there if you want it shown -->
                    <!-- Everything you want hidden at 940px or less, place within here -->
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                              <li <?php if($page_title == 'HOME'){echo 'class="active"';}?>><a href="index.php">Home</a></li>
                              <li <?php if($page_title == 'VIDEOS'){echo 'class="active"';}?>><a href="videos.php">Movies</a></li>
                              <li <?php if($page_title == 'PHOTOS'){echo 'class="active"';}?>><a href="photos.php">Photos</a></li>
                              <li <?php if($page_title == 'MODELS'){echo 'class="active"';}?>><a href="model.php">Models</a></li>
                              <li <?php if($page_title == 'BLOGS'){echo 'class="active"';}?>><a href="blog_list.php">Blog</a></li>
                              <li <?php if($page_title == 'FRIENDS'){echo 'class="active"';}?>><a href="friends.php">Friends</a></li>
                              <li><a href="logout.php" class="nav_logout">Logout</a></li>
                        </ul>
                    </div>
                </div>
          </div>
        </div>
    </div>
</div>  <!-- header ends here -->