<!--http://www.personaltrainerwall.com-->
<?php 
if(!(isset($is_ajax) && $is_ajax=="yes"))
{?>
<?php }?>
<div id="wrapper" class="home">
  <section class="theme-one">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-4">
          <div id="searchMenu" class="clearfix">
            <ul id="tabs" class="tabs">
              <li class="active"><a href="#theLocation" data-toggle="tab"><span>Location</span></a></li>
              <li><a href="#theName" data-toggle="tab"><span>Name</a></span></li>
              <li><a href="#theTags" data-toggle="tab"><span>Tag</a></span></li>
            </ul>
          </div>
        </div>
        <div class="col-xs-12 col-sm-4">
          <form name="test_form" id="additional_search_form" action="<?php echo base_url(); ?>index.php?c=welcome&m=index" method="post">
            
            <!--start smartSearchWrap-->
            <div id="smartSearchWrap" class="clearfix smartSearchWrap tab-content" style="display:block;">
              <div class="tab-pane smartSearch active" id="theLocation" >
                <input id="location" type="text"  onblur="if (this.value == '') {this.value = 'City ...';}" onfocus="if (this.value == 'City ...') {this.value = '';}" value="City ..." name="search_by_city" class="col-xs-12" />
              </div>
              <div class="tab-pane smartSearch" id="theName">
                <input id="name" type="text"  onblur="if (this.value == '') {this.value = 'Last name ...';}" onfocus="if (this.value == 'Last name ...') {this.value = '';}" value="Last name ..." name="search_by_name" class="col-xs-12" />
              </div>
              <div class="tab-pane smartSearch" id="theTags">
                <input id="tag" type="text"  onblur="if (this.value == '') {this.value = 'Tag ...';}" onfocus="if (this.value == 'Tag ...') {this.value = '';}" value="Tag ..." name="search_by_tag" class="col-xs-12" />
              </div>
            </div>
          </form>
        </div>
        <div class="col-xs-12 col-sm-4">
          <div class="search-message">See your location? Connect with FB button to add it!</div>
        </div>
      </div>
      <div class="row"> 
      <div class="content-divider hidden-xs"></div>
          <div class="recordWrap">
         <div class="">  
           	 <div class="controls clearfix mainSearch">
              <form name="extra_test_form" id="function_search_form" action="<?php echo base_url(); ?>index.php?c=welcome&m=index" method="post">
                <div class="inputs">
                  <?php 
							//$data = get_location_drops($country);
							//print_r($data);
							
							/*$state_list = $data['state_list'];			
							$county_list = $data['county_list'];
							$sort_options = $data['sort_options'];
							$county_selected = $data['county_selected'];
							$state_selected = $data['state_selected'];*/
							//$hidden_data = $data['hidden_data'];
							
							?>
                  <label for="country" class="col-xs-6 col-sm-6 col-md-3" ><span style="display:none;">Choose country</span>
                    <?php  echo form_dropdown('country', $country_list,$country,'id=country class=col-xs-12   onChange="clearSearch(); onChangeAjax();" '); ?>
                  </label>
                  <label for="state" class="col-xs-6 col-sm-6 col-md-3"><span style="display:none;">Choose state</span> <?php echo form_dropdown('state', $state_list,$state_selected,'id=state class=col-xs-12 onChange="clearSearch(); onChangeAjax();" class='); ?> </label>
                  <label for="region" class="col-xs-6 col-sm-6 col-md-3"><span style="display:none;">Choose County</span> <?php echo form_dropdown('county', $county_list, $county_selected,'id=county  class=col-xs-12 onChange="clearSearch(); onChangeAjax();" '); ?> </label>
                  <!-- <label for="sort_by" class="lbl_sm" style="text-indent:-2000px;"><span style="display:none;">Sort by </span><?php echo form_dropdown('sort_menu', $sort_menu, $sort_selected,'id=sort_menu class=col-xs-12  onChange=checkSort()'); ?> </label>
            
			<?php if ($sort_selected=="joined" || $sort_selected=="statuses_count" || $sort_selected=="followers_count" || $sort_selected=="friends_count") { ?>
            <label for="specialities" class="lbl_sm" id="sort_criteria" style="text-indent:-2000px;display: none;"><span style="display:none;">Choose </span><?php echo form_dropdown('sort_options', $sort_options, $sort_options_selected,'class=span12 onChange="clearSearch(); onChangeAjax();" '); ?> </label>
            <?} else { ?>
            <label for="specialities" class="lbl_sm" id="sort_criteria" style="text-indent:-2000px;"><span style="display:none;">Choose </span><?php echo form_dropdown('sort_options', $sort_options, $sort_options_selected,'class=col-xs-12 onChange="clearSearch(); onChangeAjax();" '); ?> </label>
            <? } ?> -->
                  <label for="specialities" class="col-xs-6 col-sm-6 col-md-3" id="sort_criteria"><span style="display:none;">Choose </span><?php echo form_dropdown('sort_options', $sort_options, $sort_options_selected,'class=col-xs-12  onChange="clearSearch(); onChangeAjax();"'); ?> </label>
                  <input type="hidden" name="search_by_name_id" id="search_by_name_id" value="" />
                  <input type="hidden" name="search_by_location_id" id="search_by_location_id" value="<?php echo isset($search_by_location_id)?$search_by_location_id:"";?>" />
                  <input type="hidden" name="search_by_tag_id" id="search_by_tag_id" value="<?php echo isset($search_by_tag_id)?$search_by_tag_id:"";?>" />
                  <!--<input type="hidden" name="country" id="country" value="< ?php echo isset($country)?$country:""; ?>" />--> 
                </div>
              </form>
            </div>
         </div>  
            <div class="row">
            	<div class="col-xs-12">
            <!--Breadcrumbs-->
            <div id="breadCrumb3" class="clearfix breadCrumb module"> <?php echo ul($breadcrumb); ?> </div>
            <!--//Breadcrumbs-->
            	</div>
            </div>
            <div class="row">
            <ul class="profile-thumbs">
              <?php foreach($latest_users as $user):
			  	$profile_image = $profile_image_path.md5($user->profile_image_url).".".substr(strrchr($user->profile_image_url, '.'), 1);
	    ?>
              <!--ALL content--> 
              <!--add if approved conditional to -->
              <?php if($user->approved==1) { ?>
              <li class="clearfix col-sm-4 col-md-2">
                <div class="sponsor nonMobileVersion"">
                  <div class="imageWrapper <?php if($user->approved==1) { ?>approved<?php } ?>">
                    <?php if ($user_image[$user->user_id]['exist']) { ?>
                    <a href="<?php echo base_url(); ?>personal-trainer/<?php echo str_replace(" ","_",trim($user->first_name)."_".trim($user->last_name)); ?>"> <img src="<?php echo base_url(); ?>scripts/timthumb.php?src=<?php echo $user_image[$user->user_id]['image_file']?>&q=60&a=t&w=142&h=142" alt="Personal Trainer <?php echo $user->first_name." ".$user->last_name ?>" border="0" width="100%"> 
                    <!--Add overlay image for hover-->
                    <div class="overlay">&nbsp;</div>
                    </a>
                    <? } else {					
					?>
                    <a href="<?php echo base_url(); ?>personal-trainer/<?php echo str_replace(" ","_",trim($user->first_name)."_".trim($user->last_name)); ?>"> <img src="<?php echo base_url();?>scripts/timthumb.php?src=images/default-profile-image.jpg&q=60&a=t&w=142&h=142" alt="Personal Trainer <?php echo $user->first_name." ".$user->last_name ?>" border="0" width="100%"/> </a>
                    <? } ?>
                    <span class="show_upgrade">&nbsp;</span> </div>
                </div>
                <h3 class="heading-profile-name"> <a href="<?php echo base_url(); ?>personal-trainer/<?php echo str_replace(" ","_",trim($user->first_name)."_".trim($user->last_name)); ?>" class="tips format" original-title="<img src='<?php echo get_user_thumb($user->user_id); ?>' width='80' height='80' style='float:none; margin-bottom:10px;'/><br /><?php echo $user->first_name.' '.$user->last_name ?><br /><span class='location'><?php echo $this->City_model->get_name_by_id($user->city_id)."" ?> <span class='location'><?php echo $this->County_model->get_name_by_id($user->county_id)."" ?> <?php echo $this->State_model->get_name_by_id($user->state_id)."" ?></span>"><?php echo $user->first_name.'<br />'.$user->last_name ?> </a></h3>
                <div class="heading-profile-location"><?php echo $this->County_model->get_name_by_id($user->county_id)."" ?></div>
                <div class="user-social-icon">
                  <?php if ($user->auth=="facebook") { ?>
                  <a class="tips format" original-title="Follow <?php echo $user->facebook_name ?> on Facebook" href="http://www.facebook.com/profile.php?id=<?php echo $user->user_id ?>" ><img src="<?php echo base_url();?>images/social-icons-24/picons46.png" style="float:none;margin-right:5px;"/></a>
                  <? } else {					
					?>
                  <a class="tips format" original-title="Follow <?php echo $user->twitter_name ?> on Twitter" href="http://twitter.com/<?php echo $user->twitter_name ?>"><img src="<?php echo base_url();?>images/social-icons-24/picons45.png" style="margin-right:5px;"/></a>
                  <? } ?>
                </div>
              </li>
              <?php } ?>
              <?php endforeach;?>
            </ul>
            </div>
            <div class="row">
            <div id="pagingSection">
              <div class="wp-navi clearfix pad" id="ajax_paging" > <span class="paging-heading"><?php echo "more".$current_." profiles ".$total_s; ?></span> <?php echo $pagination ?> </div>
            </div>
             </div>
          </div>
      </div>    
     

    </div>

  </section>

      <div class="section-divider"></div>
  <!--Join up Section-->
  <?php if ($user_logged_in && $auth_mode!=-1) { ?>
  <!--Do not show this section if logged in-->
  <?php } else { ?>
  <section class="theme theme-two">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div id="joinUp" class="clearfix">
            <div class="section-header">
              <h1 class="large center no-caps">Get some front page action</h1>
              <div class="buyline center">Get an invitation to join
                <?php $query = mysql_query("SELECT * FROM users");$number=mysql_num_rows($query); echo "". $number; ?>
                Fitness Guys</div>
            </div>
            <!--<ul id="horizontal-list">
                <li class="twitterLink"><small><a class="btnFacebook" href="<?php echo base_url(); ?>index.php?c=auth&m=fb_login" >Facebook</a></small> </li>
                 <li class="twitterLink"><small> <a href="<?php echo $data['twitter_request_url']; ?>" class="btnTwitter" original-title="Join or login here " >Twitter</a></small> </li>
              </ul>-->
            <div class="row">
              <div class="col-sm-4 filler">&nbsp;</div>
              <div class="col-sm-4">
                <div id="signUp">
                  <div class="row">
                    <form action="http://aycdigital.createsend.com/t/i/s/iykrh/" method="post">
                      <input id="fieldEmail" name="cm-iykrh-iykrh" type="email" required class="col-xs-10" placeholder="Where to?">
                      <input type="image" style="color: transparent;" class="col-xs-2 signupbtn" value="Subscribe" name="submit">
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 filler">&nbsp;</div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="call-out-pod">
            <div class="row">
              <div class="col-xs-12 col-md-8">
                <div class="pad">
                  <h1 class="regular alt">What's the matter with a little more local and international attention?</h1>
                  <p>It's no secret that we found most of the Personal Trainers on this Directory using Social Media Tools over the past 5 years. You will find that many of them build their communities with Facebook, Twitter and or by keeping a Blog. Accordingly they are highly visible in a very competitive market. We found this very helpful as we rate on-line conduct as a major factor in the selection and approval of Personal Trainers on this Directory.  I hope that you enjoy watching us a build a credible resource for the Personal Training Industry now and in future years. </p>
                </div>
              </div>
              <div class="col-md-3 col-md-offset-1 hidden-xs hidden-sm">
                <div class="image-container"> <img src="<?php echo base_url(); ?>images/personal-trainer-wall-1.png" class="graphic-home-1 rotate-image-15" alt="Personal Trainer pages rank really well"/></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="call-out-footer">
                <div class="pad-horizontal"> <img src="<?php echo base_url(); ?>images/cert-logos.png" alt="Some of the certifications accepted by Personal Trainer Wall"/ class="hidden-xs"> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php } ?>
  <!--//Join up Section-->
  <!--Text Section-->
  <section class="theme theme-three">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <h1 class="regular">About this Personal Trainer Directory</h1>
          <p>We are a free Personal Training Directory. <a href="http://personaltrainerwall.com/index.php?c=welcome&show_guests=true">Any Guests and PT's</a> join now. Established in 2008, Personal Trainer Wall is the project of John Brunskill, a <a href="http://www.atyourcommand.com.au">Freelance Web Designer and Developer</a>. Here we attract Personal Trainers from USA, Canada, UK and Australia to list their Personal Training Services to improve their online visibility. In an effort to provide an excellent National Personal Training Directory, we ask Personal Trainers to nominate the details of their certifications and expiry date. After an approval period we publish. We then promote the services of subscribed Personal Trainers with daily Twitter campaigns featuring the trainers name, city and url. <a class="" href="http://personaltrainerwall.com/join/">Add yourself or login here</a></p>
          <p>&nbsp;</p>
          <h1 class="regular">Personal Trainer Wall Statistics</h1>
          <p> There are <strong>
            <?php $query = mysql_query("SELECT * FROM users");$number=mysql_num_rows($query); echo "". $number; ?>
            </strong> registered users on this Personal Trainer Directory that have joined as a Personal Trainer, guest or sponsor.<br>
            <br>
            Personal Trainer Profiles include Speciality Tags, Sports Specific Tags and Style Tags to users find just the personal trainer they are looking for. There are currently <strong>
            <?php $query = mysql_query("SELECT * FROM tags");$number=mysql_num_rows($query); echo "". $number; ?>
            </strong> to select or search with. We encourage all the independent Personal Trainers to add tags to their profile create an individual and meaningful profile page.</p>
        </div>
        <div class="col-sm-6">
          <h1 class="regular">Personal Training Certifications</h1>
          <p>Personal Training Certification providers currently accepted on this Personal Training Directory</p>
          <p>NASM, 
            ACSM, 
            NSCA, 
            ISSA, 
            ACE, 
            NPTI (National Personal Training Institute), 
            IFPA (International Fitness Professionals Association), 
            CAN-FIT-PRO (Canadian Association Of Fitness Professionals), 
            AFAA (Aerobics and Fitness Association of America), 
            Certified Professional Trainers Network (Canada), 
            Canadian Association of FItness Professionals (Canada), 
            Ontario Association of Sports & Exercise Sciences (Canada), 
            Canadian Society of Exercise Physiology (Canada), 
            Humber College (Canada), 
            Australian Fitness Academy, 
            Australian Institute of Fitness, 
            Australian Fitness Network, 
            Personal Training Academy (Australia), 
            Fitness Institute Australia, 
            Wyn Training Solutions (Australia), 
            MMISS Mark McGaw Institute of Sports Science (Australia), 
            NESTA (The National Exercise & Sports Trainers Association) , 
            NCCPT (National Council of Certified Personal Trainers), 
            Active IQ (UK), 
            YMCA Fitness Industry Training (UK), 
            Training Organization not added yet, 
            BCRPA (Canada), 
            NCSF (National Council on Strength and Fitness), 
            Fitness Australia, 
            NSPA (National Strength Professionals Association), 
            WABBA (UK), 
            Premier International (UK), 
            Future Fit Training (UK), 
            NFPT (National Federation of Professional Trainers), 
            NETA (National Exercise Trainers Association), 
            The Cooper Institute, 
            Lifetime (UK), 
            Expert Rating, 
            AFTA (American Fitness Training of Athletics), 
            World Fitness Association, 
            International Fitness Association (IFA), 
            PTA Global, 
            Ashley Institute of Training (Australia), 
            PFIT, 
            Fitour, 
            YMCA YWCA (Canada).</p>
        </div>
      </div>
      <div class="content-divider hidden-xs"></div>
      <!--Rotator Ad Section-->
      
      <div class="row hidden-xs">
        <div class="col-xs-12">
          <div class="ad-rotator">
            <div class="pics" id="fade" style="position: relative;"> <a href="http://www.atyourcommand.com.au/personal-trainer-websites/?media=web&campaign=ptwall&=home" style="position: absolute; top: 0px; left: 0px; display: none; z-index: 3; opacity: 1; width: 724px; height: 100px;"><img width="724" height="100" src="<?php echo base_url(); ?>images/ads/ayc-2-a.jpg"></a> <a href="http://www.atyourcommand.com.au/personal-trainer-websites/?media=web&campaign=ptwall&=home" style="position: absolute; top: 0px; left: 0px; display: none; z-index: 3; opacity: 0; width: 724px; height: 100px;"><img width="724" height="100" src="<?php echo base_url(); ?>images/ads/ayc-2-b.jpg"></a> <a href="http://www.atyourcommand.com.au/personal-trainer-websites/?media=web&campaign=ptwall&=home" style="position: absolute; top: 0px; left: 0px; display: block; z-index: 4; opacity: 0; width: 724px; height: 100px;"><img width="724" height="100" src="<?php echo base_url(); ?>images/ads/ayc-2-c.jpg"></a> </div>
            <div class="ad-banner-message" style="text-align:center; font-size:11px; color:#ffffff; ">Advertise to our Fitness network here - </div>
          </div>
        </div>
      </div>
      
      <!--//Rotator Ad Section--> 
    </div>
  </section>
  
  <!--End Text Section-->
  <div class="section-divider"></div>
  <!--Search Section--> 
  
  <!--End Search Section--> 
  <!--Ads Section-->
  <section class="theme theme-one hide">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="google-banner hidden-phone">
            <div class="pics" style="position: relative;">
            <!--Google ad code went here-->
         </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--End Ads Section-->
  <div class="section-divider"></div>
  <div id="loaderImage" style="display:none; position:fixed; width:100%; height:100%; background-color:#333333; zoom: 1;
	filter: alpha(opacity=50);
	opacity: 0.5; top:0; z-index:1000; text-align:center;"><img src="<?php echo base_url();?>images/loader.gif"  style="position:absolute;top:50%;left:50%;"/></div>
</div>
<!--//Wrapper--> 
<script>
	
	function applyPagination() {
		$("#ajax_paging a").click(function() {
			var url = $(this).attr("href");
			$(this).attr("href",'');
			if(url!="")
			{
			  var newUrl = url.split("?");
			  var newUrl = newUrl[1].split("&");
				var perfTimes = $("#function_search_form").serialize();
				$.ajax({
					type: "POST",
					data: newUrl[5]+"&is_ajax=yes&"+perfTimes,
					url: "<?php echo site_url('index.php/welcome/ajax_paging_record');?>",
					beforeSend: function() {
						//$("#wrapper").html("");
						 /*var ajaxHtml = $("#loaderImage").html();
						 $.facebox(ajaxHtml);*/
						 $("#loaderImage").show();
					},
					success: function(msg) {
						$("#loaderImage").hide();
						$("#wrapper").html(msg);
						//$('.tips').tipsy({fade: true});  
						//$('.format').tipsy({html: true });
						$('#fade').cycle();
						applyPagination();
						breadCrumb3Ajax();
						//tabbedContent('tabs');
						searchMatch();
						console.log();
					}
				});
			}
			return false;
		});
	}
	
	function onChangeAjax() {
		var perfTimes = $("#function_search_form").serialize();
		$.ajax({
			type: "POST",
			data: "is_ajax=yes&"+perfTimes,
			url: "<?php echo site_url('index.php/welcome/ajax_paging_record');?>",
			beforeSend: function() {
				//$("#wrapper").html("");
				/*var ajaxHtml = $("#loaderImage").html();
				 $.facebox(ajaxHtml);*/
				 $("#loaderImage").show();
			},
				success: function(msg) {
				$("#loaderImage").hide();
				$("#wrapper").html(msg);
				//$('.tips').tipsy({fade: true});  
				//$('.format').tipsy({html: true });
				$('#fade').cycle();
				applyPagination();
				breadCrumb3Ajax();
				//tabbedContent('tabs');
				searchMatch();
			}
		});
	}
	
	function breadCrumb3Ajax() {
		$("#breadCrumb3 a").click(function() {
			var url = $(this).attr("href");
			$(this).attr("href",'');
			//alert(url);
			if(url!=""){ 
				 var newUrl = url.split("?");
					$.ajax({
					type: "POST",
					data: newUrl[1]+"&is_ajax=yes",
					url: "<?php echo site_url('index.php/welcome/ajax_paging_record');?>",
					beforeSend: function() {
						//$("#wrapper").html("");
						 /*var ajaxHtml = $("#loaderImage").html();
						 $.facebox(ajaxHtml);*/
						 $("#loaderImage").show();
					},
					success: function(msg) {
						$("#loaderImage").hide();
						$("#wrapper").html(msg);
						//$('.tips').tipsy({fade: true});  
						//$('.format').tipsy({html: true });
						$('#fade').cycle();
						applyPagination();
						breadCrumb3Ajax();
						//tabbedContent('tabs');
						searchMatch();
					}
				});
			}
			return false;
		});
	}
	
	function clearSearch()
	{
		$("#search_by_name_id").val('');
		$("#search_by_location_id").val('');
		$("#search_by_tag_id").val('');
	}
	
	$(document).ready(function(){
		applyPagination();
		breadCrumb3Ajax();
		searchMatch();
	});
	
</script> 
<script type="text/javascript">
	function searchMatch()
	{
		var options = {
			script:"index.php?c=ajaxcalls&m=get_search&json=true&",
			varname:"input",
			json:true,
			callback: function (obj) { document.getElementById('testid').value = obj.id; 
			
			}
		};
		//var as_json = new AutoSuggest('search_input', options);
		var options_search_name_xml = {
			script:"index.php?c=ajaxcalls&m=get_search_by_name&",
			minchars: 2,
			varname:"input",
			callback: function (obj) { document.getElementById('search_by_name_id').value = obj.id;document.getElementById("function_search_form").submit(); }
		};
		
		var options_search_city_xml = {
			script:"index.php?c=ajaxcalls&m=get_search_by_location&",
			minchars: 2,
			varname:"input",
			timeout:5000,
			callback: function (obj) { document.getElementById('search_by_location_id').value = obj.id;onChangeAjax(); }
		};		
		
		var options_search_tag_xml = {
			script:"index.php?c=ajaxcalls&m=get_search_by_tag&",
			minchars: 2,
			varname:"input",
			callback: function (obj) { document.getElementById('search_by_tag_id').value = obj.id;onChangeAjax(); }
		};
		
		var as_xml = new AutoSuggest('name', options_search_name_xml);
		var as_xml_location = new AutoSuggest('location', options_search_city_xml);
		var as_xml_tag = new AutoSuggest('tag', options_search_tag_xml);
	}
	</script>
<!--Ad Rotator--> 
<!--http://jquery.malsup.com/cycle/--> 
<script type="text/javascript" src="<?php echo base_url(); ?>scripts-extra/jquery.cycle.all.js"></script>
<script>$('#fade').cycle();</script> 

