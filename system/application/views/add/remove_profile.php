	<?php
  if(isset($removeMsg) && $removeMsg=="yes")
  {?>
    <div id="wrapper" class="container">
      <div id="page" class="row-fluid">
        <div class="span12 wrap">
          <div class="content">
          <h1 class="hero">Remove Profile</h1>
            <p>Your profile has been removed successfully.You can rejoin anytime when you are ready </p>	
        </div>
      </div>
    </div>
    </div>
    </div>
<?php
 }else{?>
    <div id="wrapper" class="container">
      <div id="page" class="row-fluid">
        <div class="span12 wrap">
          <div class="content">
          <h1 class="hero">Remove Profile</h1>
            <p>We are sorry to see you leave though feel free to rejoin anytime when you are ready.</p>
            <p>This action will remove any subscription information too which cannot recovered.</p>
            <form name="" action="index.php?c=add&m=remove_profile" method="post">
            
              <p class="inputs clearfix" style="margin-top:35px;"> 
                <a href="/" class="btn-std alt"><span>Cancel</span></a>
               <span class="btn-std alt">
                <input type="submit"  name="submit" value="Yes, remove all my information" class="btn-std" />
                </span></p>
            </form>
        </div>
      </div>
    </div>
    </div>
    </div>
     <?php 
}?>