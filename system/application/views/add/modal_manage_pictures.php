<div id="gallery_manage" class="informationBox">
  <h2 class="resourceTitle">Manage Photos</h2>
  <div class="inner">
    <p style="text-align:center;"><a href="./multibox_pages/upload_crop.php?user_id=<?php echo $user_id ?>">Upload New Image</a> | <a href="index.php?c=add&m=manage_user_pic&action=default&user_id=<?php echo $user_id ?>&img_id=<?php echo $large->id ?>">Make Image Default </a> | <a href="index.php?c=add&m=manage_user_pic&action=delete&user_id=<?php echo $user_id ?>&img_id=<?php echo $large->id ?>">Delete Image</a></p>
    <div class="thumbsBox clearfix">
        <img src="<?php echo $user_image ?>" alt="ptwall-thumb" width="96" height="96"<?php if ($no_default) { ?> style="color:red;border:solid 1px red;"  <? } ?> />
      <?php 
					$i=0;
					foreach ($image_data as $image) {
				
					
				?>
      <a href="index.php?c=add&m=manage_user_pic&user_id=<?php echo $user_id ?>&large=<?php echo $i ?>" class=""> <img src="<?php echo $image_path.$image->thumbnail ?>" alt="ptwall-thumb" width="96" height="96"  <?php if ($image->default_image==1) { ?> style="color:red;border:solid 1px red;"  <? } ?>/></a>
      <? 
					$i++;
					} 
				
				?>
    </div>
    <div class="imageBox"> <img name="" src="<?php echo $image_path.$large->filename ?>" alt="<?php echo $user_id ?>" /> </div>
  </div>
</div>
