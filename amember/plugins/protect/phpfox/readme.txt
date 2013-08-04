					 phpFoX Plugin

phpFoX plugin is designed to provide single-signon access 
for users of aMember Pro and the phpFoX.
This plugin has been tested with PhpFox version 1.5.1 and 1.6 RC1

phpFoX Plugin installation
-----------------------------------------------
0. Copy phpfox.inc.php, config.inc.php and readme.txt into your aMember plugins/protect/phpfox folder (create phpfox folder if necessary)
1. Enable phpfox plugin at aMember CP -> Setup/Configuration -> Plugins from Protect Plugins list
2. Go to aMember CP -> Setup/Configuration -> phpFoX and configure it.
3. Go to aMember CP -> Manage Products -> edit and set correspoding 
   "phpFoX access" group.
4. Go to folder where your phpFoX script was installed
   Open include/modules/Account/classes/PhpFox_ServiceSecurity.class.php
   in your favorite text editor.
   Right after:
	setcookie('phpfox_id',  -1, time() - 1, '/');
	setcookie('phpfox_h',   '', time() - 1, '/');
   Add:
	setcookie(session_name(), '', time()-42000, '/');
	setcookie(session_id(), '', time()-42000, '/');
   Save file.
5. To transfer your active members to phpFoX, click aMember CP -> Rebuild Db


Notes
-----------------------------------------------
User will be reset to Standard Membership if no active subscriptions exists.
