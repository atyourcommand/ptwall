	Moodle-aMember Integration:

Follow the steps given below in amember:

1. Create a folder named moodle in amember/plugins/protect
2. Copy moodle.inc.php, config.inc.php and readme.txt to amember/plugins/protect/moodle
3. Login as admin in to aMember CP and go to aMember CP -> Setup/Configuration from utilities menu
4. Click the Plugins module and enable moodle plugin from Protect Plugins list. 
   This would create Moodle plugin link in the control panel.
5. Go to the Moodle plugin and type in the moodle location (eg: /home/user/public_html/moodle).
   This enables aMember database to talk with Moodle database.
   This creates the list of courses available in moodle and
   'Short name' of the course will be listed in aMember product page.
6. Go to the aMember CP -> Manage Products page and create products by assigning Title and
   other descriptions and selecting the correct course from Moodle access list at the bottom of the screen.
   Preferably keep the product title same as 'Short name' of moodle course and note that it is case sensitive.


Follow the steps given below in moodle:

1. Copy auth folder from auth-amember.zip plugin in to moodle/auth folder.
   You should have a structure like moodle/atuh/amember/ and you should
   find four files auth.php, lib.php, config.html and config18.html.


For Moodle 1.8:	
1. Log on to Moodle as admin.
2. Go to Site Administration --> Users --> Authentication.
   Enable aMember authentication module.

You are now ready and aMember is fully integrated in to Moodle.

CAUTION CAUTION CAUTION CAUTION CAUTION CAUTION CAUTION 
You also use Alternate login URL in authentication page (something like http://yoursite/amember/login.php).
Before doing this create a login block in the front page of moodle.
