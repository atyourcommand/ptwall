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
<!--//All extra scripts here-->


<script>
jQuery(document).ready(function($) {
  $('a[rel*=facebox]').facebox();
})
</script> 

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
