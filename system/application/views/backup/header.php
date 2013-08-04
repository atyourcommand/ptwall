<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head profile="http://gmpg.org/xfn/11"> 
<meta name="resource-type" content="document" /> 
<meta http-equiv="content-language" content="en-us" /> 
<meta http-equiv="author" content="John Brunskill" /> 
<meta http-equiv="contact" content="atyourcommand@mac.com" /> 
<meta name="copyright" content="Copyright (c)2009 John Brunskill. All Rights Reserved." /> 
<!--<META NAME="description" CONTENT="Using a plugin to generate this" />--> 
<!--<META NAME="keywords" CONTENT="Using a plugin to generate this" />--> 
<link rel="shortcut icon" type="image/ico" href="favicon.ico" /> 
<link rel="stylesheet" href="blog/wp-content/themes/ptwall/css/reset.css" type="text/css" media="screen, projection"/> 
<link rel="stylesheet" href="blog/wp-content/themes/ptwall/css/grid.css" type="text/css" media="screen, projection"/> 
<link rel="stylesheet" href="blog/wp-content/themes/ptwall/css/typography.css" type="text/css" media="screen, projection"/> 
<link rel="stylesheet" href="blog/wp-content/themes/ptwall/css/forms.css" type="text/css" media="screen, projection"/> 
<link rel="stylesheet" href="blog/wp-content/themes/ptwall/css/modalbox.css" type="text/css" media="screen, projection"/> 
<link rel="stylesheet" href="blog/wp-content/themes/ptwall/css/tooltips.css" type="text/css" media="screen, projection"/> 
<link rel="stylesheet" href="blog/wp-content/themes/ptwall/css/style.css" type="text/css" media="screen, projection" /> 
<link rel="stylesheet" type="text/css" href="css/ptwall.css" />
 
<link rel="stylesheet" type="text/css" href="blog/wp-content/themes/ptwall/css/screen.css" /> 
<script type="text/javascript" src="scripts/js-core/mootools1.2.js" ></script> 
<script  type="text/javascript" src="scripts/js-core/mootools-1.2-more.js"></script> 
<!-- expander scripts --> 
<script type="text/javascript" src="scripts/js-expander/expander.js"></script> 
<!-- modalbox scripts --> 
<script type="text/javascript" src="scripts/js-modalbox/modalbox.js"></script> 
<!--tooltips--> 
<script src="scripts/js-tooltips/tooltips.js" type="text/javascript"></script> 

<!--ajax calls--> 
<script type="text/javascript">


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
function setOutput(id){
    if(httpObject.readyState == 4){
		alert(id); 
        var combo = document.getElementById(id);
        combo.options.length = 0;
 
        var response = httpObject.responseText;
		alert(response);
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
function doWork(id){   
    httpObject = getHTTPObject();
    if (httpObject != null) {
        httpObject.open("GET", "index.php?c=ajaxcalls&m=get_tags&group_id=1", true);
        httpObject.onreadystatechange = setOutput;
        httpObject.send(null);
    }
}
 
var httpObject = null;

</script> 
</head> 
<!-- start header content --> 
<body> 
<!-- TOP BAR --> 
<div id="top"> 	
	<div class="center"> 		
		<a href="index.php" id="production">Welcome to <span style="color:#6FC3E4;">PTWall USA</span> a Twitter App just for Personal Trainers  </a> 		
		<!-- SEARCH --> 
    	 <div id="network-dropdown" class="dropdown">
                <a href="/demos" class="dropdown-link"><span class="dropdown-label">My PTWall Account</span></a> 
                	<ul class="dropdown-list"> 
                    		<?php if ($user_logged_in) { ?>
                     	  	  <li>
                                  <a href=""><img src="./images/twitter.png" alt="twitter" width="64" /></a>
                                  <h3><a href="index.php?c=welcome&m=logoff">Logoff PTWall</a></h3>       
                                  <p>       
                                    Logoff from PTWall to signin as a different user.
                                  </p>      
                              </li>                             
                        	  <li>                              

                                  <a href=""><img src="<?php echo $user_image ?>" alt="twitter" width="64" /></a>
                                  <h3><a href="index.php?c=add&m=profile">My Ptwall Profile</a></h3>       
                                  <p>       
                                    Update your profile, let us know your qualifications and how others can get in touch with you.
                                  </p>      
                              </li>   
                              <?php } else { ?>
                        	  <li>
                                  <a href=""><img src="./images/twitter.png" alt="twitter" width="64" /></a>
                                  <h3><a href="<?php echo $request_url ?>">Login to PTWall using Twitter</a></h3>       
                                  <p>       
                                    Personal trainers use your twitter account to login to Ptwall.
                                  </p>      
                              </li> 
                        	  <li>                              
  
							  <?php } ?>
                                    
                    </ul>
          </div>         
<div id="search"> 
     	
                <form action="/" method="get"> 
                    <input type="text" name="s" id="s" value="Search for trainer.." size="30" /> 
                    <input type="submit" class="button" value="Search" /> 
                </form> 
    
		</div> 		
	</div> 	
</div> 
  <!-- end top bar -->