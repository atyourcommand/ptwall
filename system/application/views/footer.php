<div id="footerWrapper">
<div id="footer">
<section class="theme theme-two">
<div class="container">
  <div class="row">
    <div class="col-sm-3 filler">
      <div class="table">
        <div class="section-header">
          <h1 class="large no-caps">Jump on</h1>
          <div class="buyline"><a href="http://personaltrainerwall.com/join/">Add yourself or login here</a> to pimp your services</div>
        </div>
      </div>
    </div>
    <div class="col-sm-6"> 
      
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
    <div class="col-sm-3 filler">
      <div class="table">
        <div class="section-header">
          <h1 class="large no-caps">Who?</h1>
          <div class="buyline">This Personal Trainer Directory is built and maintained by - <a href="http://www.atyourcommand.com.au">AYC Digital </a></div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12">
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
<!--All minified scripts here-->
<script type="text/javascript" src="<?php echo base_url(); ?>main.min.js"></script>
<!--//All minified scripts here-->

<!--Bootstrap--> 
<!--This is used on the auto complete search menu options--> 
<!--<script type="text/javascript" src="<?php echo base_url(); ?>scripts/bootstrap.js"></script> -->
<!--<script>
	window.onload = function () {
		//initiate tabs
		tabbedContent('tabs');
	}
</script>--> 
<!-- Auto complete--> 
<!--<script type="text/javascript" src="<?php echo base_url(); ?>scripts/bsn.AutoSuggest_c_2.0.js"></script> -->

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

<!--Tweets on Re-Tweet Page--> 
<!--Search bar--> 
<!--<script type="text/javascript" src="<?php echo base_url(); ?>scripts/general_functions.js"></script> -->
<!--BreadCrumb--> 
<!--<script src="<?php echo base_url(); ?>scripts/jquery.easing.1.3.js" type="text/javascript" language="JavaScript"></script>--> 
<!--<script src="<?php echo base_url(); ?>scripts/jquery.jBreadCrumb.1.1.js" type="text/javascript" language="JavaScript"></script>--> 
<!--<script src="<?php echo base_url(); ?>scripts/facebox.js" type="text/javascript"></script> -->
<script>
jQuery(document).ready(function($) {
  $('a[rel*=facebox]').facebox();
})
</script> 
<!--Expander sections --> 
<!--<script type="text/javascript" src="<?php echo base_url(); ?>scripts/jquery.cookie.js"></script> -->
<!--<script type="text/javascript" src="<?php echo base_url(); ?>scripts/collapse.js"></script>--> 
<!--drop down menu--> 
<!--<script src="<?php echo base_url(); ?>scripts/switcher.js" type="text/javascript"></script>--> 
<!--Tooltips--> 
<!--<script type="text/javascript" src="<?php echo base_url(); ?>scripts/tipsy.js"></script> -->
<!--Cannot read the main script?-->
<!--<script type='text/javascript'>
$(function() {
    $('.tips').tipsy({fade: true});  
    $('.format').tipsy({html: true });
});
</script>-->
<?php if($show_update_modal) { ?>
<? } ?>
<script type="text/javascript">
//http://davidwalsh.name/persistent-header-opacity
$(document).ready(function() {
	(function() {
		//settings
		var fadeSpeed = 200, fadeTo = 0.5, topDistance = 30;
		var topbarME = function() { $('#header-wrapper').fadeTo(fadeSpeed,1); }, topbarML = function() { $('#header-wrapper').fadeTo(fadeSpeed,fadeTo); };
		var inside = false;
		//do
		$(window).scroll(function() {
			position = $(window).scrollTop();
			if(position > topDistance && !inside) {
				//add events
				topbarML();
				$('#header-wrapper').bind('mouseenter',topbarME);
				$('#header-wrapper').bind('mouseleave',topbarML);
				inside = true;
			}
			else if (position < topDistance){
				topbarME();
				$('#header-wrapper').unbind('mouseenter',topbarME);
				$('#header-wrapper').unbind('mouseleave',topbarML);
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
