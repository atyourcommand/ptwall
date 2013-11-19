<section class="theme theme-three">
  <div class="container">
    <div class="row-fluid">
      <h1 class="regular center">Change your email address</h1>
      <div class="panel panel-warning filter-guest filter-sponsor filter-trainer selected">
        <div class="panel-heading">
          <h3 class="panel-title">This changes your email address with us</h3>
        </div>
        <div class="panel-body">
          <?php if (!$validate) { ?>
          <div  class="alert alert-danger center">
            <p> Oops! <?php echo $error_message ?>.</p>
          </div>
          <?php } ?>
          <form name="" action="index.php?c=add&m=change_email" method="post">
            <?php if ($success) { ?>
            <p>Your email address has been updated.</p>
            <?php } ?>
            <?php if ($email_sent) { ?>
            <p>An email has been sent to the new email address. Please follow the link in the email to verify.</p>
            <?php } ?>
            <?php if (!$verify && !$email_sent) { ?>
            <p class="message">To future proof, can we suggest a non-work email address. </p>
            <p class="inputs clearfix">
              <label for="emailAddress" class="lbl_med">Enter New Email Address <?php echo form_input($email); ?> </label>
            </p>
            <p class="inputs clearfix" style="margin-top:30px;"><a href="/" class="btn-std alt"><span>Cancel</span></a> <span class="btn-std alt">
              <input type="submit"  name="submit" value="Update" class="btn-std" />
              </span> </p>
            <?php } ?>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
