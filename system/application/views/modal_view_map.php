<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"> 
  <head> 
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/> 
    <title><?php echo $name.",".$geo ?></title> 
	<link rel="stylesheet" href="<?php echo base_url(); ?>blog/wp-content/themes/ptwall/css/style.css" type="text/css" media="screen" charset="utf-8" />
  </head> 
<!--Flip-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
 
<body> 
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAA7mqEJzNb06x41VPkO08VqBQAcbgRolCsYOGbJiP6rHcEKxVvLhTK0A_xZUulycRnnNzTTojWzv0oWA"
      type="text/javascript"></script>
<script type="text/javascript">
 
    var map2 = null;
    var geocoder2 = null;
 
    function initialize2() {
      if (GBrowserIsCompatible()) {
        map2 = new GMap2(document.getElementById("map_canvas"));
        //map.setCenter(new GLatLng(37.4419, -122.1419), 30);
		map2.setUIToDefault();
        geocoder2 = new GClientGeocoder();
      }
    }
 
    function showAddress2(address) {
      if (geocoder2) {
        geocoder2.getLatLng(
          address,
          function(point) {
            if (!point) {
              //alert(address + " not found");
			  g = 0;
            } else {
              map2.setCenter(point, 15);
              var marker2 = new GMarker(point);
              map2.addOverlay(marker2);
              marker2.openInfoWindowHtml("<strong><?php echo $name ?></strong><br><img src=\"<?php echo $profile_image_url ?>\" alt=\"<?php echo $name ?> \" width=\"48px\"><?php echo $geo ?>");
            }
          }
        );
      }
    }
		
	jQuery(document).ready(function() {
	 initialize2();
	 showAddress2('<?php echo $geo; ?>');
	  
	}) 	
</script>   
  <div id="map_canvas" class="" style="width: 700; height: 500px;"> </div>
  </body> 
</html> 