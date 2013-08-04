<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"> 
  <head> 
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/> 
    <title>Google Maps API Example: Simple Geocoding</title> 
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAA7mqEJzNb06x41VPkO08VqBQAcbgRolCsYOGbJiP6rHcEKxVvLhTK0A_xZUulycRnnNzTTojWzv0oWA"
      type="text/javascript"></script>
<script type="text/javascript">
 
    var map = null;
    var geocoder = null;
 
    function initialize() {
      if (GBrowserIsCompatible()) {
        map = new GMap2(document.getElementById("map_canvas"));
        map.setCenter(new GLatLng(37.4419, -122.1419), 13);
		map.setUIToDefault();
        geocoder = new GClientGeocoder();
      }
    }
 
    function showAddress(address) {
      if (geocoder) {
        geocoder.getLatLng(
          address,
          function(point) {
            if (!point) {
              alert(address + " not found");
            } else {
              map.setCenter(point, 13);
              var marker = new GMarker(point);
              map.addOverlay(marker);
              marker.openInfoWindowHtml(address);
            }
          }
        );
      }
    }
    </script> 
  </head> 
 
  <body onload="initialize();showAddress('<?php echo $_GET['geo'] ?>');" onunload="GUnload()"> 
      <div id="map_canvas" class="" style="width: 100%; height: 430px;"> </div>
  </body> 
</html> 