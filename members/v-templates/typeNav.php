<div class="row-fluid btn_group_outline red_border">
    <div class="btn-group margin_bottom_2">
      <a href="<?php echo $pageName ?>?type=recent"><button class="btn <?php if($type=='recent'){echo 'active';} ?> btn-large btn-danger border_radius_l">Most Recent</button></a>
      <a href="<?php echo $pageName ?>?type=rated"><button class="btn <?php if($type=='rated'){echo 'active';} ?> btn-large btn-danger">Most Popular</button></a>
      <a href="<?php echo $pageName ?>?type=name"><button class="btn <?php if($type=='name'){echo 'active';} ?> btn-large btn-danger border_radius_r">A-Z</button></a>
    </div>	
</div>