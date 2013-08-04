WP plugin intallation instructions

PLUGIN  VERSION: 0.1

1. Plugin was tested with Wordpress 2.9  + aMember 3.x
2. Upload config.inc.php functions.php server.php wp.inc.php and readme.txt from plugin package into your 
    /amember/plugins/protect/wp/ folder. 
3. Upload amember.php amember_api.php settings.php shortodes.php widget.php  files from wordpress_files folder 
   into your_wordpress_folder/wp-content/plugins/amember folder 
4. Enable WP plugin from amember CP -> Setup -> Plugins  
5. Go to aMember CP -> Setup -> WordpRess Plugin  and set Integration Security Key . 
   Use any big string  for this key for example: gh839m708f9dxg7903byvh7g5890mxg78903yg7859y 
6. Go to your Wordpress admin area -> Plugins -> Installed and activate aMember Integration Plugin for Wordpress
7. Go to Settings -> aMember Settings and set amember Root URL (should be exactly the same as in aMember CP -> Setup -> Global -> Root URL)
    and aMember Integration Security Key should be set to the same value as in step 5    


If plugin configuration was correct and wordpress plugin can conmmunicate with amember you should see "Connection successfull!" notification at the top of aMember Settings Page. 

Now you should go to Wordpress Admin -> Settings -> aMember Levels and create protection levels. These levels will be used later in post/page and category protection screens. 
When levels will be created you can protect Posts from Wordpress admin -> Posts -> Edit -> amember Protection Settings. (the same for posts)
Categories can be protected from Wordpress admin -> Settings -> Protect Categories

You can also enable widget that display login form and some usefull aMember links. Wordpress admin -> Appearance -> Widgets -> aMember Woidget

Please send feedback to support@cgi-central.net  with subject: For Alexander: NEW WORDPRESS PLUIGN
This plugin is beta, so we are open for suggestions about new features and  bug reports.











