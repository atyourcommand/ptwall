                     PHPNUKE plugin notes

----------------------------------------------------------------------------
REQUIREMENTS:

phpNuke 6.5
NSN_Groups phpNuke Plugin v.650_130

(both is not shipped with aMember and aMember phpNuke Plugin)
----------------------------------------------------------------------------
HOW DOES IT WORK:
This plugin requires you to have NSNGroups phpNuke module installed 
(available at http://nukescripts.com/ ) 
One you have this module installed, you will be able to choose a NSN usergroup
for every aMember product. When user sign-ups for a product, corresponding
user account will be created in NSNGroups and assigned to specific usergroup.
When user subscription expires, his account will be deleted from usergroup.

You may define different access permissions of different usergroups. Please
install NSNGroups module and ensure that it gives you enough freedom to 
define permissions to solve your tasks.

It is not full integration between aMember and phpNuke, full integration is 
impossible. 
----------------------------------------------------------------------------
INSTALLATION:

1. Enable plugin in aMember Admin CP/Setup, then go to plugin settings
page and configure it.

2. Edit your products via aMember Pro Control Panel and set phpNuke 
   Access value (you may choose several NSN_Groups), also set Product 
   URL to point to phpNuke installation.

3. If your phpNuke is not installed into root folder, then in files: 
   /includes/usercp_register.php
   /modules/Your_Account/index.php
   /modules/News/article.php
   find and replace lines:
   - replace  
    setcookie("user");
   to
    setcookie("user", "", time()-3600, "/");

   - replace 
    setcookie("user","$info",time()+15552000);
   to
    setcookie("user","$info",time()+15552000, "/");
                                                                
   - replace
    setcookie("user","$info",time()+2592000);
   to
    setcookie("user","$info",time()+2592000, "/");

4. Check your installation by doing new signup. After sigup completed,
   new member must appear in phpNuke with the same username.

Important Notes:
----------------------------------------------------------------------------

 - if user deleted from aMember Pro, it will be DISABLED in phpNuke 
   database. You may delete his record manually from phpNuke

 - as customer subscription expires, user will be removed from
   NSN_Groups. 
 
 - you should use NSN_Groups to setup correct access rights and 
 make sure that only paid customers (who belongs to specific NSN group)
 will see your paid content  

----------------------------------------------------------------------------

