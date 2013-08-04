<script src="<?php echo base_url(); ?>scripts/ajaxupload.js" type="text/javascript"></script>

<div id="wrapper" class="container <?php if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') == TRUE) { ?>handheld<? } else {	?>screen<? } ?>">
  <div class="row">
    <div class="span5">
      <div id="demo_area" class="clearfix">
        <h3>How your pic looks on the Wall</h3>
        <?php if ($image_exist) { ?>
        <img src="<?php echo base_url(); ?>scripts/timthumb.php?src=<?php echo $image_file ?>&a=t&w=122&h=122" alt="<?php echo $user->first_name." ".$user->last_name ?> " width="122">
        <? } else {					
					?>
        <img src="<?php echo base_url(); ?>scripts/timthumb.php?src=./images/default-profile-image.jpg&a=t&w=122&h=122" alt="<?php echo $user->first_name." ".$user->last_name ?> " width="122">
        <? } ?>
        <hr class="dotted"/>
        <h3>How your pic looks on your profile page</h3>
        <?php if ($image_exist) { ?>
        <img src="<?php echo base_url(); ?>scripts/timthumb.php?src=<?php echo $image_file ?>&a=t&w=250&h=313" alt="<?php echo $user->first_name." ".$user->last_name ?> " width="250">
        <? } else {					
					?>
        <img src="<?php echo base_url(); ?>scripts/timthumb.php?src=./images/default-profile-image.jpg&a=t&w=250&h=313" alt="<?php echo $user->first_name." ".$user->last_name ?> " width="250">
        <? } ?>
      </div>
    </div>
    <!--end left column-->
    <div class="span6 offset1 wrap">
      <h3>Upload your Profile image easily</h3>
      <fieldset>
      <a href="index.php?c=add&m=image&delete=true">Reset to Default</a>
      <form action="scripts/ajaxupload.php" method="post" name="sleeker" id="sleeker" enctype="multipart/form-data">
        <!--<input type="hidden" name="maxSize" value="512000" />-->
        <input type="hidden" name="maxSize" value="2000000" />
        <input type="hidden" name="maxW" value="250" />
        <input type="hidden" name="fullPath" value="<?php echo base_url(); ?>uploads/" />
        <input type="hidden" name="relPath" value="<?php echo ".".$upload_path ?>" />
        <input type="hidden" name="colorR" value="255" />
        <input type="hidden" name="colorG" value="255" />
        <input type="hidden" name="colorB" value="255" />
        <input type="hidden" name="maxH" value="325" />
        <input type="hidden" name="filename" value="filename" />
        <p>
          <input type="file" name="filename" onChange="ajaxUpload(this.form,'scripts/ajaxupload.php?filename=name&amp;userId=<?php echo $user->user_id; ?>&amp;maxSize=2000000&amp;maxW=250&amp;fullPath=<?php echo base_url(); ?>uploads/&amp;relPath=<?php echo ".".$upload_path ?>&amp;colorR=255&amp;colorG=255&amp;colorB=255&amp;maxH=325','upload_area','File Uploading Please Wait...&lt;br /&gt;&lt;img src=\'images/loader.gif\' width=\'31\' height=\'31\' border=\'0\' /&gt;','&lt;img src=\'images/cross.png\' width=\'16\' height=\'16\' border=\'0\' /&gt; Error in Upload, check settings and path info in source code.'); return false;" />
        </p>
      </form>
      </fieldset>
      <small style="font-weight: bold; font-style:italic;">Supported File Types: gif, jpg, png<br>
      Maximum File Size: 2MB </small>
      <hr class="dotted"/>
      <h3>Photo tips</h3>
      <p style="font-size:13px";>Close ups are great, need the face and not the kids this time.<br>
        <br>
        <strong> Yes</strong>, quality is important, don't add a small image as it will be pixelated and not suitable. <br> <br>
        <strong>No</strong> logos, branding or text over the image. <br>
        <br>
        <strong>Yes</strong>, we need to approve all images.<br>
        <br>
        <a href="mailto:admin@personaltrainerwall.com?subject=Message about adding my Image ">Email me</a> if you need any assistance.<br/>
      </p>
    </div>
  </div>
</div>
</div>
