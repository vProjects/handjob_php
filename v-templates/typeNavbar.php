<div class="btn-group">
    <a href="<?php echo $pageName ?>?type=recent"><button class="btn <?php if( $type=='recent'){ echo 'active' ;}?> btn-danger">Most Recent</button></a>
    <a href="<?php echo $pageName ?>?type=rated"><button class="btn <?php if( $type=='rated'){ echo 'active' ;}?> btn-danger">Most Popular</button></a>
    <a href="<?php echo $pageName ?>?type=name"><button class="btn <?php if( $type=='name'){ echo 'active' ;}?> btn-danger">A-Z</button></a>
</div>