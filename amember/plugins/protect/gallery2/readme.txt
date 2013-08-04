                     Gallery2 Plugin
					 
----------------------------------------------------------------------------
REQUIREMENTS:

Gallery2 (tested with 2.2.3 version)
http://gallery.menalto.com/

----------------------------------------------------------------------------


INSTALLATION:

0. Extract and upload plugin to amember/plugins/protect/gallery2/ folder
   (Create 'gallery2' folder if not exist)
1. Login as admin in to aMember CP and go to aMember CP -> Setup/Configuration from 'Utilites' menu,
   click the 'Plugins' module and enable 'gallery2' plugin from 'Protect Plugins' list.
2. Go to the 'Gallery2' plugin configuration page at aMember CP -> Setup/Configuration -> Gallery2
   and configure it.
3. Go to the aMember CP -> Manage Products and click on 'edit' link (create some product if not created)
   Select correct group for 'Gallery2 access' in 'Additional Options' section (at the bottom of the screen)
   Also you can change 'Product URL' setting in 'Product URLs' section to your Gallery2 url
   for example to '/gallery2/' for auto redirection to Gallery2 after login.

   
TESTING: 
Try to register, login/logout from Gallery2.


Single-login questions:
----------------------------------------------------------------------------
This module implements single-login functionality between aMember and Gallery2.
It does the following operations during login:
 - when user logs-in to aMember, he becomes logged-in to Gallery2;
 - when user logs-out from aMember, he becomes logged-out from Gallery2;
 - when user logs-in to Gallery2, he becomes logged-in to aMember;
 
!!!WARNING!!!
----------------------------------------------------------------------------
Please don't create amember account with same login as your gallery2 admin login,
otherwise your gallery2 admin permissions will be lost. 