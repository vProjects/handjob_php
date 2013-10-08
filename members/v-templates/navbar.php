<div class="navigation">
        	<div class="navbar">
              <div class="navbar-inner">
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
                              <li <?php if($page_title == 'MODELS'){echo 'class="active"';}?>><a href="model.php">Model</a></li>
                              <li <?php if($page_title == 'PHOTOS'){echo 'class="active"';}?>><a href="photos.php">Photo</a></li>
                              <li <?php if($page_title == 'VIDEOS'){echo 'class="active"';}?>><a href="videos.php">Videos</a></li>
                              <li><a href="#">Blogs</a></li>
                              <li><a href="#">Friends</a></li>
                              <li><a href="#">Logout</a></li>
                        </ul>
                    </div>
                </div>
          </div>
        </div>
    </div>
</div>  <!-- header ends here -->