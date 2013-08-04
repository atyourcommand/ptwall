<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<!-- MAKE SURE TO REFERENCE THIS FILE! -->
		<script type="text/javascript" src="scripts/ajaxupload.js"></script>
		<!-- END REQUIRED JS FILES -->
	</head>
	<body>
<div id="container">

			<!-- THIS IS THE IMPORTANT STUFF! -->
			<div id="demo_area">
				<div id="left_col">
				  </fieldset>
					<fieldset>
						<form action="scripts/ajaxupload.php?filename=name&amp;maxSize=9999999999&amp;maxW=200&amp;fullPath=http://ptwall.com/multibox_pages/uploads/&amp;relPath=../uploads/&amp;colorR=255&amp;colorG=255&amp;colorB=255&amp;maxH=300" method="post">
							<p><input type="file" name="name" onChange="ajaxUpload(this.form,'scripts/ajaxupload.php?filename=name&amp;maxSize=9999999999&amp;maxW=200&amp;fullPath=http://ptwall.com/multibox_pages/uploads/&amp;relPath=../uploads/&amp;colorR=255&amp;colorG=255&amp;colorB=255&amp;maxH=300','upload_area','File Uploading Please Wait...&lt;br /&gt;&lt;img src=\'images/loader_light_blue.gif\' width=\'128\' height=\'15\' border=\'0\' /&gt;','&lt;img src=\'images/error.gif\' width=\'16\' height=\'16\' border=\'0\' /&gt; Error in Upload, check settings and path info in source code.'); return false;" /></p>
						</form>
					    <br />
					    <small style="font-weight: bold; font-style:italic;">Supported File Types: gif, jpg, png</small>
				</fieldset>
					</div>
				<div id="right_col">
					<div id="upload_area">
						Images Will Be uploaded here for the demo.<br /><br />
						You can direct them to do any thing you want!
					</div>
			  </div>
				<div class="clear"> </div>
			</div>
			<!-- END IMPORTANT STUFF -->
			<p style="text-align:center;"><br />
			  <br />
			  <br />
	</p>
	</div>	
		
</body>
</html>