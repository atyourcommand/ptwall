					 WordPress plugin

The plugin has been tested with WordPress 2.0.5, 2.3.2, 2.4, 2.5.1, 2.6


WordPress Plugin installation
-----------------------------------------------
0. Copy wordpress.inc.php, config.inc.php and readme.txt into your aMember plugins/protect/wordpress folder
   (create wordpress folder if necessary)
1. Enable wordpress plugin at aMember CP -> Setup/Configuration -> Plugins from Protect Plugins list
2. Go to aMember CP -> Setup/Configuration -> WordPress and configure it.
   You will have to enter something like 'worpress_databasename.wp_'
   into "WordPress Board Db and Prefix" field. You may find database name and prefix 
   in "wp-config.php" file of your WordPress installation.
3. Go to aMember CP -> Manage Products -> edit and set "WordPress Role" and 
   "WordPress Level" to desired values. 
4. To transfer your active members to WordPress, click aMember CP -> Rebuild Db

Protecting your Posts in WordPress
----------------------------------------------
If you followed the steps described above, aMember will create users in WordPress
with configured "Roles". However, by default, WordPress has no ability to protect
posts from visitors. It is easy to fix by installing WordPress plugins:
* A plugin that allows you to restrict access to posts and pages based upon the user level
   http://wordpress.org/extend/plugins/post-levels/
* Protect part of your post or links by using [hidepost] and [/hidepost] around the
  protected content in WordPress article
   http://wordpress.org/extend/plugins/hidepost/

aMember sidebar widget for WordPress installation
-----------------------------------------------
Upload the widget(plugin) file(ma-amember_widget.php) to your wordpress plugin directory and enable it.
Then in the wordpress admin / presentation / widget / place the widget in the sidebar, and click on it to edit the settings.
It will place a login form or aMember links in your sidebar.


WordPress installation folder protection
-----------------------------------------------
If you need to protect folder where WordPress installed with new_rewrite method please follow these steps:

1. rename existing .htaccess file in WordPress folder (/blog for example) to .htaccess.wp
2. protect /blog folder in aMember CP -> Protect folders
3.1. edit /blog/.htaccess file, add code from .htaccess.wp file BEFORE aMember protection code
3.2. add this code:
        RewriteCond %{REQUEST_URI} ^/blog/wp-admin(.*) [OR]
        RewriteCond %{REQUEST_URI} ^/blog/wp-login\.php(.*)
        RewriteRule ^(.*)$ - [L]
     before row:
        ## if user is not authorized, redirect to login page 

