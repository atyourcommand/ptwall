<div id="gallery_manage" class="informationBox">
  <h2 class="resourceTitle">View Photos</h2>
  <div class="inner">
    <div class="topContainer clearfix">
      <!-- <div class="imageWrap"> <a href="#"><img src="" alt="ptwall-thumb" width="48" height="48" /></a></div>-->
      <div class="listContainer">
        <div class="thumbsBox clearfix">
          <?php 
					$i=0;
					foreach ($image_data as $image) {
				
					
				?>
          <a href="index.php?c=add&m=view_user_pic&user_id=<?php echo $user_id ?>&large=<?php echo $i ?>" class="thumblink tooltip"> <img src="<?php echo $image_path.$image->thumbnail ?>" alt="ptwall-thumb" width="96" height="96" /></a>
          <? 
					$i++;
					} 
				
				?>
        </div>
        <div class="imageBox">
         <?php if (count($image_data)) { ?>
          <p> <img name="" src="<?php echo $image_path.$large->filename ?>" alt="<?php echo $user_id ?>" /> </p>
         <?php } ?>          
        </div>
      </div>
    </div>
  </div>
</div>