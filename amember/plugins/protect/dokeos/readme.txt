                     Dokeos Plugin
					 
----------------------------------------------------------------------------
REQUIREMENTS:

Dokeos (tested with 1.8.2 version)
http://www.dokeos.com/

----------------------------------------------------------------------------


INSTALLATION:

0. Extract and upload plugin to amember/plugins/protect/dokeos/ folder
   (Create 'dokeos' folder if not exist)
1. Login as admin in to aMember CP and go to aMember CP -> Setup/Configuration from 'Utilites' menu,
   click the 'Plugins' module and enable 'dokeos' plugin from 'Protect Plugins' list.
2. Go to the 'Dokeos' plugin configuration page at aMember CP -> Setup/Configuration -> Dokeos
   and configure it.
3. Go to the aMember CP -> Manage Products and click on 'edit' link (create some product if not created)
   Select correct course for 'Dokeos access' in 'Additional Options' section (at the bottom of the screen)
   Also you can change 'Product URL' setting in 'Product URLs' section to your Dokeos url
   for example to '/dokeos/' for auto redirection to Dokeos after login.

   
TESTING: 
Try to register, login/logout from Dokeos.


Single-login questions:
----------------------------------------------------------------------------
This module implements single-login functionality between aMember and Dokeos.
It does the following operations during login:
 - when user logs-in to aMember, he becomes logged-in to Dokeos;
 - when user logs-out from aMember, he becomes logged-out from Dokeos;
 - when user logs-in to Dokeos, he becomes logged-in to aMember;
 - !when user logs-out from Dokeos, he becomes logged-out from aMember 
   (will not logout from third party plugins)