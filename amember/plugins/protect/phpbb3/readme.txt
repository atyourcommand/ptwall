                     phpBB3 plugin installation

This plugin has been tested with phpBB3. 


PHPBB3 Plugin installation
-----------------------------------------
0. Copy phpbb3.inc.php, config.inc.php and readme.txt to amember/plugins/protect/phpbb3 
1. Enable plugin in aMember Admin CP -> Setup -> Plugins from Protect Plugins list
2. Go to aMember CP -> Setup -> phpBB3 and configure it.
   (Note: 'Cookie Name' setting can be found in 'cache/data_global.php' file,
   find 'cookie_name' string and copy value right after '=>')
3. Go to aMember CP -> Manage Products -> edit and set correspoding 
   "phpBB3 access" and "phpBB3 additional access" group. 
4. To transfer your active members to phpBB3, click aMember CP -> Rebuild Db
=====================


Edit file ucp.php, find:
$module->load('ucp', 'register');

and before this line add:
header("Location: /path_to_amember/signup.php"); exit();

This way user will be redirected to aMember signup page when he clicks "Register" link in phpBB3
