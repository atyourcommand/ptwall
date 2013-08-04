                     vBulletin3 module installation
                     
 =========================================================================
 * IMPORTANT! If you are upgrading from old version of the vBulletin3    *
 * plugin, please RE-SET "vBulletin3 Access" fields at "Manage Products" *
 =========================================================================                    
                     
                     
The plugin has been tested with vBulletin v. 3.6.0. This plugin offers
lot better integration than before - single-login is working nice 
for cookie-based logins, it also redirects customers to aMember
for password changes, logout and new registrations, also it has built-in
vB export functionality.
                     
1. Upload plugin to amember/plugins/protect/ folder, so there must be
file amember/plugins/protect/vbulletin3/vbulletin3.inc.php on your FTP

2. Go to vBulletin3 AdminCP, go to vBulletin Options, go to "Plugin/Hook System",
choose "Yes" for "Enable Plugin/Hook System", and click "Save".

3. Enable plugin in aMember Admin CP/Setup, then go to plugin settings
page and configure it. Make sure you click Save button twice after
entering database settings.

You will have to enter something like
vbulletindatabasename.vb_
into "database and prefix" field. You may find "vbulletindatabasename" 
and prefix in file "vbulletin/includes/config.php" on your website.

4. Login into aMember Control Panel. Edit/Add Products and set 
desired vbulletin access parameters for every product. 

WARNING! Until you finish the following 2 steps, your aMember installation
will not work. Disable the vBulletin plugin if there are any troubles.

=== INSTALL a "product" into vBulletin for integration from vB side == 

5. Click vBulletin3 AdminCP -> Plugins and Products -> Manage Products,
click "Add/Import Product" link. In the 
"EITHER upload the XML file from your computer" field, choose file
"product-amember.xml" contained in vBulletin3 aMember plugin ZIP file.
Click "Import".

6. Go to vBulletin3 AdminCP -> vBulletin Options, there is a new settings
group now: "aMember Pro Integration". Go to inside. Set
aMember Root URL: {$config.root_url}
aMember Signup URL: {$config.root_url}/signup.php
Redirect All Registrations to aMember : YES (you can do that later when configuration finished).

7. If necessary, go to vBulletin 3 Admin CP -> aMember Pro Integration
(it appears in bottom of left frame menu, you may need to logout and login
again to see it), and do Export of vBulletin users to aMember as described.

8. You may click "aMember CP -> Rebuild Db" to transfer existing active 
users from aMember to vBulletin.