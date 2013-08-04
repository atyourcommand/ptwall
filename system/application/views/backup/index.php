 <!--start browse-->
    <div id="reg">
      <!--start short promo here-->
      <!--end short promo here-->
      <ul id="expanders" class="expandy-1 sortlists">
        <li id="reg" class="toggle">
          <div id="topBar" class="clearfix">
            <!--<h2 class="strapline">Find a Personal Trainer | <span>Register as a
              <definition title="Only fully Qualified, Accredited and Insured Personal Trainer are invited">Personal Trainer</definition>
              </span></h2>-->
            <a href="/blog/" class="blog"><strong>The Blog</strong></a>
            <h3><a href="#box1" name="box1" class="updates"><strong>Whats this about?  </strong><span class="toggler">+</span></a></h3>
             </div>
          <div class="sub-menu collapse" id="submenu-1">
            <div class="collapse-container clearfix">
              <!--start introduction-->
  <div id="introduction" class="clearfix">
    <div class="span-8 last">
      <div class="colborder">
        <p>Welcome <strong>PTWall USA</strong>, a <strong>Twitter
          <definition title="Web Application">App</definition>
          </strong> just for Personal Trainers <br />
          List your self as a <strong>Personal Trainer</strong> and be found for your <strong>personal training services. </strong>We are going to be very big.</p>
      </div>
    </div>
    <div class="span-8 last">
      <div class="colborder">
        <p> Here is a current <strong>feature list.</strong> </p>
        <ul>
          <li>Easy to add your <strong>Twitter Profile</strong></li>
          <li><strong>Add location &amp; specialty tags</strong></li>
          <li>Add your <strong>email</strong> contact.</li>
          <li>Describe your <strong>PT services</strong></li>
        </ul>
      </div>
    </div>
    <div class="span-8 last">
      <div class="">
        <p><strong>PTWall</strong> is the passion of <strong><a href="http://www.atyourcommand.com.au">Melbourne Web Designer</a> John Brunskill</strong>. With Twitter I have found a way for incredible connectivity and a passport for users to find a <strong>Personal Trainer</strong> in their area. 
Drop me a line <a href="mailto:admin@ptwall.com?subject=Message from PT Wall Website">here</a></p>
      </div>
    </div>
  </div>

            </div>
          </div>
        </li>
      </ul>
    </div>

<!--end browse-->
<!-- start wrapper -->
<div id="wrapper">
<!-- start headerWrapper -->
<div id="headerWrapper">
  <!-- start header -->
  <!-- <div id="header"> -->
    <!-- start navigation-->
    <!-- end navigation-->
 <!--</div>-->
  <!-- end header content -->
</div>
<!-- end headerWrapper content -->
<!--start template-->
<!--start grid-->
<div id="pageWrapper">
<div id="page" class="container showgrid">
  
  <div id="recordWrap" class="clearfix">
    <ul id="records" class="browse_box">
      <li id="controls-region" class="menu-open toggle">
       
            <div class="controls clearfix">
              <form name="test_form" id="function_search_form" action="index.php?c=welcome&m=index" method="post">
                <p class="clearfix inputs">                	
                  <label for="state" class="lbl_med">Choose state
   					<?php echo form_dropdown('state', $state_list,'','class=slt_med'); ?>
                  </label>
                  <label for="region" class="lbl_med">Choose County
					<?php echo form_dropdown('county', $county_list, $county_selected,'class=slt_med onChange=this.form.submit()'); ?>
                  </label>
                  <label for="sort by" class="lbl_med">Sort by
                  <select name="menu1" onChange="MM_jumpMenu('parent',this,0)" class="slt_med">
                    <option>Most recent</option>
                    <option>Most Tweets</option>
                    <option>Most Followers</option>
                    <option>Most Following</option>
					<option>Specialities</option>
					<option>Sports Specific</option>
                  </select>
                  </label>
				  <label for="specialities" class="lbl_med">Choose
            <select name="menu1" onChange="MM_jumpMenu('parent',this,0)" class="slt_med">
              <option>General</option>
              <option>Remedial</option>
              <option>Older Adults</option>
              <option>Children</option>
              <option>Aquatics</option>
              <option>Strength</option>
            </select></label>

                </p>
       		<p class="inputs clearfix">
              <?php echo form_hidden($hidden_data); ?>
              </span></p>                
              </form>
			  <br class="clear"/>
            </div>
           
          
      
      </li>
      <div class="sub-menu collapseAlt" id="">
        <div class="collapse-container">
		<div class="wp-pagenavi clearfix"> <span class="pages">Page 1 of 3</span><span class="current">1</span><a href="#" title="2">2</a><a href="#" title="3">3</a><a href="#" >&raquo;</a> </div>
          <div class="gallery_container" id="gallery_container1">
            <div id="thumb_container" class="thumb_container">
              <div id="thumbs1" class="thumbs">
			<?php foreach($latest_users as $user):?>              
                <div class="thumbnail"> <a href="#" class="thumblink fb-trigger tooltip" title="<?php echo $user->twitter_name ?>" rel="Here is brief bio of this personal trainer and little about qualifications, specialities, sports specific and methods.">
                  <div class="imageWrap"> <img src="<?php echo $user->profile_image_url ?>" alt="ptwall-thumb" width="48" height="48" /></div>
                  </a>
                  <!--start code for the modalbox-->
                  <div class="generic_dialog fb-modal">
                    <div class="informationBox corners">
                      <div class="padding">
                        <div class="inner">
                          <h2 class="resourceTitle"><?php echo $user->twitter_name ?></h2>
                          <div class="topContainer clearfix">
                            <div class="imageContainer"> <a href="#"><img src="<?php echo $user->profile_image_url ?>" alt="ptwall-thumb" width="48" height="48" /></a></div>
                            <div class="listContainer">
                              <dl>
                                <dt>Location:</dt>
                                <dd><a href="#">Your Google Maps lat &amp; long</a></dd>
                                <dt>Web:</dt>
                                <dd><a href="#">Personal Trainers Web Site</a></dd>
                                <dt>Bio:</dt>
                                <dd><?php echo $user->description ?></dd>
                                <dt>Twitter Stats</dt>
                                <dd> [<a href="#"><?php echo $user->friends_count ?> following</a>] [<a href="#"><?php echo $user->followers_count ?> followers</a>] [<a href="#"><?php echo $user->statuses_count ?> Tweets</a>] </dd>
                                <dt>Speciality:</dt>
                                <dd>Tags 1</dd>
                                <dt>Sports Specific:</dt>
                                <dd>Tags 1</dd>
                                <dt>Methods:</dt>
                                <dd>Tags 1</dd>
                              </dl>
                            </div>
                          </div>
                          <div class="messages">
                            <p><span><a href="#">Very important disclaimer message</a></span></p>
                          </div>
                          <div class="buttons clearfix"> <span class="btn-std">
                            <input type="button" value="Close" name="close" class="btn-std fb-close closer" />
                            </span> <a href="#" class="btn-std"><span>Send me a message</span></a></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--end code for the modalbox-->
                </div>  
        		<?php endforeach;?>            
              </div>
            </div>
          </div>
        </div>
      </div>
      </li>
    </ul>
  </div>
  <!-- end grid -->
</div>
</div>
<!-- end pageWrapper -->
