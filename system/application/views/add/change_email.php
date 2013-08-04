<div id="pageWrapper">
  <div id="wrapper">
    <div id="page">
	<h3>Change your email address</h3>
        <?php if (!$validate) { ?>
        <div class="ui-state-error ui-corner-all" style="padding: 0 .7em; vertical-align:middle;">
          <p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> Oops! <?php echo $error_message ?>.</p>
        </div>
        <?php } ?>
      <form name="" action="index.php?c=add&m=change_email" method="post">
        <div class="userDetails">
          <ul>
            <li class="expanders">
              <div class="padd quick corners">
                <?php if ($success) { ?>
                <p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> Your email address has been updated.</p>
                 <?php } ?>
                <?php if ($email_sent) { ?>
                <p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> An email has been sent to the new email address. Please follow the link in the email to verify.</p>
                 <?php } ?>
                <ul>
                  <li>
                    <?php if (!$verify && !$email_sent) { ?>
                    <div class="row clearfix">
                      <fieldset class="narrow" style="width:300px;">
                      <legend><span><b>1</b> Email </span></legend>
                      <p class="inputs clearfix">
                        <label for="emailAddress" class="lbl_med">Enter New Email Address <?php echo form_input($email); ?> </label>
                      </p>
                      
                      </fieldset>

		      <fieldset class="narrow" style="width:300px;">
                      <p class="message"><strong>To future proof, we suggest a non-work email address. </strong></p>
                      </fieldset>
                    </div>

                  </li>
                </ul>
				
				 <p class="inputs clearfix" style="margin-top:30px;"><span class="btn-std alt">
                <!--<input type="submit" name="submit" value="Update Profile!" class="btn-std" />-->
                <input type="submit"  name="submit" value="Update" class="btn-std" />
                <?php } ?>
                </span></p>
              </div>
              <!-- error in fields -->
              <!-- end error in fields -->
             
            </li>
          </ul>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- end pageWrapper -->