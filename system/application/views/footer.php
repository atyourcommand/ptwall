<div id="footerWrapper">
<div id="footer">
<section class="theme theme-two">
<div class="container">
  <div class="row-fluid">
    <div class="span3 filler">
      <div class="table">
        <div class="section-header">
          <h1 class="large no-caps">Jump on</h1>
          <div class="buyline"><a href="http://personaltrainerwall.com/join/">Add yourself or login here</a> to pimp your services</div>
        </div>
      </div>
    </div>
    <div class="span6"> 
      
      <!--Do not show buttons for facebook or twitter-->
      
      <div id="" class="clearfix">
        <div class="table">
          <div class="section-header">
            <h1 class="large center no-caps">Shout out</h1>
            <div class="buyline center">See on our <a href="https://www.facebook.com/pages/Personal-Trainer-Wall/185142201591117">facebook page</a> to engage with more PT's</div>
          </div>
          <div class="center">
            <div class="fb-like" data-layout="box_count" data-href="http://personaltrainerwall.com"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="span3 filler">
      <div class="table">
        <div class="section-header">
          <h1 class="large no-caps">Who?</h1>
          <div class="buyline">This Personal Trainer Directory is built and maintained by - <a href="http://www.atyourcommand.com.au">AYC Digital </a></div>
        </div>
      </div>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span12">
      <p class="copy center">
        <?php 
if ($controller=="trainers"){ ?>
        <?php echo $title; ?>
        <? } else { ?>
        Find a Personal Trainer in your city |
        <? } ?>
       
        Personal Trainer Wall <sup>&copy;</sup> 2008 to 2013 </p>
    </div>
    </section>
  </div>

</body>
<!--Bootstrap--> 
<script type="text/javascript" src="<?php echo base_url(); ?>scripts/bootstrap.js"></script> 
<!--This is used on the auto complete search menu options--> 
<script type="text/javascript" src="<?php echo base_url(); ?>scripts/bootstrap-tabs.js"></script> 
<script>
	window.onload = function () {
		//initiate tabs
		tabbedContent('tabs');
	}
</script> 
<!-- Auto complete--> 
<script type="text/javascript" src="<?php echo base_url(); ?>scripts/autosuggest/js/bsn.AutoSuggest_c_2.0.js"></script> 

<!--Ad Rotator--> 
<!--http://jquery.malsup.com/cycle/--> 
<script type="text/javascript" src="<?php echo base_url(); ?>scripts/jquery.cycle.all.js"></script> 
<script>$('#fade').cycle();</script> 
<script type="text/javascript">
		$(function () {
			var $alert = $('#alert');
			if($alert.length)
			{
				var alerttimer = window.setTimeout(function () {
					$alert.trigger('click');
				}, 3000);
				$alert.animate({height: $alert.css('line-height') || '50px'}, 200)
				.click(function () {
					window.clearTimeout(alerttimer);
					$alert.animate({height: '0'}, 200);
				});
			}
		});
		</script> 
<script language="javascript" type="text/javascript">
<!--
// Get the HTTP Object
function getHTTPObject(){
   if (window.ActiveXObject) return new ActiveXObject("Microsoft.XMLHTTP");
   else if (window.XMLHttpRequest) return new XMLHttpRequest();
   else {
      alert("Your browser does not support AJAX.");
      return null;
   }
}   
 
// Change the value of the outputText field
function setOutput(){
    if(httpObject.readyState == 4){
        var combo = document.getElementById('county');
        combo.options.length = 0;
 
        var response = httpObject.responseText;
        var items = response.split(";");
        var count = items.length;
        for (var i=0;i<count;i++){
            var options = items[i].split("-");
            combo.options[i] = 
			    new Option(options[0],options[1]);
        }
    }
}
 
// Implement business logic    
function getCounties(){    
    httpObject = getHTTPObject();
    if (httpObject != null) {
		httpObject.open("GET", "index.php?c=ajaxcalls&m=get_users_per_county&state_id="+document.getElementById('state').value, true);
        httpObject.onreadystatechange = setOutput;
        httpObject.send(null);
    }
}


var httpObject = null;
/*
window.addEvent('domready',function(){
									

	
	 var x=document.getElementById("sort_menu");
	  var y = document.getElementById("id");	
	
	if (x.selectedIndex==4)
		y.style.display = "block";

});*/
//-->
</script> 
<!--ajax calls--> 
<script type="text/javascript">
function checkSort(){   
	 var x=document.getElementById("sort_menu");
	  var y = document.getElementById("sort_criteria");	
	
	 if (x.selectedIndex > 3)
	 	y.style.display = "block";	
	else
	    var z=document.getElementById("function_search_form");
		z.submit();
	 	y.style.display = "none";
    }
 
</script> 
<!--if the window is less than 768px wide then add a class--> 
<script type="text/javascript">
$(document).ready( function() {
    /* Check width on page load*/
    if ( $(window).width() < 768) {
     $('html').addClass('mobile');
    }
    else {}
 });

 $(window).resize(function() {
    /*If browser resized, check width again */
    if ($(window).width() < 768) {
     $('html').addClass('mobile');
    }
    else {$('html').removeClass('mobile');}
 });
</script> 
<!--Tweets on Re-Tweet Page--> 
<!--Search bar--> 
<script type="text/javascript" src="<?php echo base_url(); ?>scripts/general_functions.js"></script> 
<!--Tweets on Re-Tweet Page--> 
<script type="text/javascript" src="<?php echo base_url(); ?>scripts/jquery.tweet.js"></script> 
<script type="text/javascript">
	jQuery(function($){
        $(".tweets").tweet({
          username: "ptjessie",
          page: 1,
          avatar_size: 32,
          count: 20,
          loading_text: "loading ..."
        }).bind("loaded", function() {
          var ul = $(this).find(".tweet_list");
          var ticker = function() {
            setTimeout(function() {
              ul.find('li:first').fadeOut( 1000, function() {
                $(this).detach().appendTo(ul).removeAttr('style');
              });
              ticker();
            }, 5000);
          };
          ticker();
        });
      });
 </script> 

<!--delays images loading when not in the viewport --> 
<script type="text/javascript" src="<?php echo base_url(); ?>scripts/lazyload.js"></script> 
<script charset="utf-8" type="text/javascript">
      $(function() {          
          $(".guests img").lazyload({
             placeholder : "http://personaltrainerwall.com/images/grey.gif",
             effect      : "fadeIn"
          });
      });
</script> 
<!--slider--> 
<!--<script type="text/javascript" src="<?php echo base_url(); ?>scripts/easySlider1.7.js"></script>--> 
<!--<script type="text/javascript">
		$(document).ready(function(){	
			$("#slider").easySlider({
				auto: true, 
				continuous: true,
				numeric: true
			});
		});	
	</script>--> 
<!--BreadCrumb--> 
<script src="<?php echo base_url(); ?>scripts/breadcrumbs/jquery.easing.1.3.js" type="text/javascript" language="JavaScript"></script> 
<script src="<?php echo base_url(); ?>scripts/breadcrumbs/jquery.jBreadCrumb.1.1.js" type="text/javascript" language="JavaScript"></script> 
<script src="<?php echo base_url(); ?>scripts/facebox.js" type="text/javascript"></script> 
<script charset="utf-8" type="text/javascript">
jQuery(document).ready(function($) {
  $('a[rel*=facebox]').facebox();
}) 
</script> 
<!--Container Collapse for search options --> 
<script type="text/javascript" src="<?php echo base_url(); ?>scripts/jquery.cookie.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>scripts/collapse.js"></script> 
<!--menu switcher--> 
<script src="<?php echo base_url(); ?>scripts/switcher.js" type="text/javascript"></script> 
<!--Tooltips--> 
<script type="text/javascript" src="<?php echo base_url(); ?>scripts/tipsy.js"></script> 
<script type='text/javascript'>
$(function() {
    $('.tips').tipsy({fade: true});  
    $('.format').tipsy({html: true });
});
</script>
<?php if($show_update_modal) { ?>
<? } ?>
<script type="text/javascript">
//http://davidwalsh.name/persistent-header-opacity
$(document).ready(function() {
	(function() {
		//settings
		var fadeSpeed = 200, fadeTo = 0.5, topDistance = 30;
		var topbarME = function() { $('#headerContainer').fadeTo(fadeSpeed,1); }, topbarML = function() { $('#headerContainer').fadeTo(fadeSpeed,fadeTo); };
		var inside = false;
		//do
		$(window).scroll(function() {
			position = $(window).scrollTop();
			if(position > topDistance && !inside) {
				//add events
				topbarML();
				$('#headerContainer').bind('mouseenter',topbarME);
				$('#headerContainer').bind('mouseleave',topbarML);
				inside = true;
			}
			else if (position < topDistance){
				topbarME();
				$('#headerContainer').unbind('mouseenter',topbarME);
				$('#headerContainer').unbind('mouseleave',topbarML);
				inside = false;
			}
		});
	})();
});
</script> 
<script>
window.fbAsyncInit = function() {
	FB.init({
		appId: '130355453666011',
		cookie: true,
		xfbml: true,
		oauth: true
	});
	FB.Event.subscribe('auth.login', function(response) {
		window.location.reload();
	});
	FB.Event.subscribe('auth.logout', function(response) {
		window.location.reload();
	});
};
(function() {
	var e = document.createElement('script'); e.async = true;
	e.src = document.location.protocol +
		'//connect.facebook.net/en_US/all.js';
	document.getElementById('fb-root').appendChild(e);
}());

function fbLogin()
{ 
	FB.login(function(response) {
		 if (response.authResponse) {
			if (response.status == 'connected') {//console.log(response);
					alert('here');
					var userId = response.authResponse.userID;
					var access_token = response.authResponse.accessToken;
					alert(userId);
			}else
			{
				return false;
			}
		}else 
		{
		}
	});
}

</script> 
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-740836-29']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</html>
