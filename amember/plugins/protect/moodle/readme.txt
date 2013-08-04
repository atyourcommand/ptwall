                     Moodle Plugin
					 
This plugin has been tested with Moodle 1.7 and 1.8 and single-login should work 
fine.

Moodle Plugin Pre-installation steps
-----------------------------------------
1. Copy "auth" directory from auth-amember.zip archive to your Moodle directory
2. Copy "lang" directory from auth-amember.zip archive to your Moodle Data directory

Moodle Plugin installation 
-----------------------------------------
1. Enable plugin in aMember Admin CP -> Setup -> Plugins
2. Go to aMember CP -> Setup -> Moodle and configure it. 
3. Go to aMember CP -> Edit Products and set correspoding Moodle courses.

For Moodle 1.8:	
1. Log on to Moodle as admin.
2. Go to Site Administration --> Users --> Authentication.
   Enable aMember authentication module.
 
Try to register, login, change details, and finally logout from Moodle.
Also you can change all courses in Moodle to 'not enrollable'.

Single-login questions
---------------------------------------------
This module implements single-login functionality between aMember and Moodle.
It does the following operations during login:
 - when user logs-in to aMember, he becomes logged-in to Moodle;
 - when user logs-out from aMember, he becomes logged-out from Moodle;
 - when user logs-in to Moodle, he becomes logged-in to Moodle;
 - !when user logs-out from Moodle, he becomes logged-out from aMember (only with moodle/login/logout.php modification!)
   find in moodle/login/logout.php "redirect("$CFG->wwwroot/");" and replace with "redirect("/your_amember_dir/logout.php");"
   also you can add "amember_redirect_url" for example:
   "redirect("/your_amember_dir/logout.php?amember_redirect_url=$CFG->wwwroot/");"
 
 
 