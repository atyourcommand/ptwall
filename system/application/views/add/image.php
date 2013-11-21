<!-- Image Upload -->
<script src="<?php echo base_url(); ?>scripts-extra/ajaxupload.js" type="text/javascript"></script>
<section class="theme theme-three">
  <div class="container">
    <div class="row"> 
  
      
         
      <h1 class="regular center">Adding an image</h1>
      <div id="demo_area" class="panel panel-warning selected">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-12">
              <h3 class="panel-title">Adding an image to your profile or classified</h3>
            </div>
          </div>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-xs-12">
            
                <!-- email not verified -->
      <?php if ($email_verified==0 && $user->active==1) { ?>
      <p class="alert alert-danger center">Your email address is not verified yet. If you did not receive the email with the verification link please <a href="mailto:admin@personaltrainerwall.com">email</a> us now. <?php /*?><?php echo $email_verified_msg ?> <?php */?></p>
      <? } ?>
      <!-- email not verified-->
             
              <p><strong>Photo tips</strong></p>
              <p style="font-size:13px"><?php echo $user->first_name ?></strong> ,close ups are great, need the face and not the kids this time. <br>
                No logos, branding or text. <br><br>
                <strong>Classifieds: </strong>You also need a great image. No logos text or branding either. Get your phone and get creative!<br>
                <br>
               
              </p>
                <hr class="dotted"/>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-6">
                <p><strong>How your image looks on the Wall</strong></p>
                <?php if ($image_exist) { ?>
                <img src="<?php echo base_url(); ?>scripts/timthumb.php?src=<?php echo $image_file ?>&a=t&w=122&h=122" alt="<?php echo $user->first_name." ".$user->last_name ?> " width="122">
                <? } else {					
					?>
                <img src="<?php echo base_url(); ?>scripts/timthumb.php?src=./images/default-profile-image.jpg&a=t&w=122&h=122" alt="<?php echo $user->first_name." ".$user->last_name ?> " width="122">
                <? } ?>
                <hr class="dotted"/>
                 <p><strong>Upload your image easily</strong></p>
                    <!-- email not verified -->
      <?php if ($email_verified==0 && $user->active==1) { ?>
      <p>Sorry your email address is not verified yet. </p>
      <? } else { ?>
      <!-- email not verified-->
              <fieldset>
                <form action="scripts-extra/ajaxupload.php" method="post" name="sleeker" id="sleeker" enctype="multipart/form-data">
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
                  <a href="index.php?c=add&m=image&delete=true" class="btn-std"><span>Reset to Default</span></a>
                    <input type="file" name="filename" onChange="ajaxUpload(this.form,'scripts-extra/ajaxupload.php?filename=name&amp;userId=<?php echo $user->user_id; ?>&amp;maxSize=2000000&amp;maxW=250&amp;fullPath=<?php echo base_url(); ?>uploads/&amp;relPath=<?php echo ".".$upload_path ?>&amp;colorR=255&amp;colorG=255&amp;colorB=255&amp;maxH=325','upload_area','File Uploading Please Wait...&lt;br /&gt;&lt;img src=\'images/loader.gif\' width=\'31\' height=\'31\' border=\'0\' /&gt;','&lt;img src=\'images/cross.png\' width=\'16\' height=\'16\' border=\'0\' /&gt; Error in Upload, check settings and path info in source code.'); return false;" />
                  </p>
                </form>
              </fieldset>
              <p>
              <small style="font-weight: bold; font-style:italic;">Supported File Types: gif, jpg, png
              Maximum File Size: 2MB </small></p>
              <p id="upload_area"><p>   <? } ?> </div>
            <div class="col-xs-12 col-sm-6">
            <p><strong>How your image looks on your page</strong></p>
                <?php if ($image_exist) { ?>
                <img src="<?php echo base_url(); ?>scripts/timthumb.php?src=<?php echo $image_file ?>&a=t&w=250&h=313" alt="<?php echo $user->first_name." ".$user->last_name ?> " width="250">
                <? } else {					
					?>
                <img src="<?php echo base_url(); ?>scripts/timthumb.php?src=./images/default-profile-image.jpg&a=t&w=250&h=313" alt="<?php echo $user->first_name." ".$user->last_name ?> " width="250">
                <? } ?>
          </div>
           </div>
          <div class="row">
            <div class="col-xs-12">
             <hr class="dotted"/>
              <p><strong>Need help?</strong></p>
              <p style="font-size:13px">
                <a href="mailto:admin@personaltrainerwall.com?subject=Message about adding my Image ">Email us</a> if you need any assistance or have a question about addding your image.<br/>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>