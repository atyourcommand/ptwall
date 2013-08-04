                     Joomla module installation

This plugin has been tested with Joomla 1.0.11, 1.0.12, 1.0.13 and 1.5 and single-login should work 
fine. 

This module does not work JoomlaCommunityBuilder. There is a special module 
instead of this one. Read more about CommunityBuilder integration:
  http://www.amember.com/p/Integration/Joomla-CommunityBuilder

Joomla Plugin installation
-----------------------------------------
0. Copy joomla.inc.php, config.inc.php and readme.txt to amember/plugins/protect/joomla 
1. Enable plugin in aMember Admin CP -> Setup -> Plugins from Protect Plugins list
2. Go to aMember CP -> Setup -> Joomla and configure it.
   You will have to visit Joomla Administrator -> Global Configuration -> Server Tab
   and copy&paste some settings to aMember. Make sure you do that correctly,
   else single-login will not work.
3. Go to aMember CP -> Manage Products -> edit and set correspoding 
   "Joomla access" group. 
4. To transfer your active members to Joomla, click aMember CP -> Rebuild Db
=====================

For better integration, you can install a plugin or mambot to Joomla, that will make
redirects to aMember for the following events:
  1) Registration (/amember/signup.php)
  2) User Details Change (/amember/profile.php)
  3) Get Lost Password (/amember/login.php)
  4) Logout (/amember/logout.php)
(1) and (2) may not be suitable for all users. Make sure you really need
this and it will work as expected. To don't confuse your members, you will 
need to edit aMember templates (at least header and footer) to more or less
match your Joomla look.
  
aMember <-> Joomla Plugin or Mambot installation
---------------------------------------------
1. Go to Joomla Administrator -> Extensions -> Install/Uninstall or 
   Joomla Administrator -> Installers -> Mambots
2. Choose Upload package file : amember-plugin.zip for Joomla 1.5 
   and amember-mambot.zip for other Joomla versions (the file is inside this ZIP)
3. Click Upload File & Install, if there are any installation problems, 
   check permissions for "joomla/plugins/" or "joomla/mambots/content/" folder -
   it must be  writeable (chmod it 777)
4. Go to Joomla Administrator -> Plugins or Mambots
5. In the "aMember Plugin" or "aMember Mambot" row, click in the "Published" row to enable it.

Try to register, login, change details, get lost password, and finally 
logout from joomla.

Single-login questions
---------------------------------------------
This module implements single-login functionality between aMember and Joomla.
It does the following operations during login:
 - when user logs-in to aMember, he becomes logged-in to Joomla;
 - when user logs-out from aMember, he becomes logged-out from Joomla;
 - when user logs-in to Joomla, he becomes logged-in to aMember;
 - when user logs-out from Joomla, he becomes logged-out from aMember (with mambot only!)
 
Unfortunately, it is very tricky and does not work correctly with remembered passwords.
For example, if a user remembered password in Joomla, then closed all browser windows,
and opens aMember page, he won't be logged-in. However, if he first opens Joomla,
then aMember - it will work. Usually it is not a big problem, but you should know.

If single-login does not work, there can be 2 often problems:
 - aMember and Joomla are in 2 different domains, so cookies are not passed
   over (Please NOTE - "www.site.com" and "site.com" are different domains!)
 - Settings in aMember CP -> Setup -> Joomla doesn't match settings at 
   Joomla Administrator -> Global Configuration -> Server Tab. Please check carefully
   and use only copy&paste.
