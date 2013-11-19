<?php
if(isset($removeMsg) && $removeMsg=="yes")
{?>
<section class="theme theme-three">
  <div class="container">
    <div class="row">
      <h1 class="regular center"> Your profile and history has been removed </h1>
      <p class="center">You can rejoin anytime when you are ready. </p>
    </div>
  </div>
</section>
<?php }else{ ?>
<section class="theme theme-three">
  <div class="container">
    <div class="row">
      <h1 class="regular center">Remove Profile</h1>
      <div class="panel panel-warning filter-guest filter-sponsor filter-trainer selected">
        <div class="panel-heading">
          <h3 class="panel-title">Remove your profile and history</h3>
        </div>
        <div class="panel-body">
          <p> <strong><?php echo $user->first_name ?></strong>, we are sorry to see you leave though feel free to rejoin anytime when you are ready.</p>
          <p>This action will remove any subscription information too which cannot be recovered.</p>
          <form name="" action="index.php?c=add&m=remove_profile" method="post">
            <p class="inputs clearfix" style="margin-top:35px;"> <a href="/" class="btn-std alt"><span>Cancel</span></a> <span class="btn-std alt">
              <input type="submit"  name="submit" value="Yes, remove all my information" class="btn-std" />
              </span></p>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<?php }?>