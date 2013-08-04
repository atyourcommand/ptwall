                     PHPMatchMaker plugin notes

open file PHPMatchMaker/includes/pnSession.php
find line
        ini_set('session.cookie_path', $path);
and replace it to
//        ini_set('session.cookie_path', $path);

----------------------------------------------------------------------------
REQUIREMENTS:

PHPMatchMaker installed on the server
(it is not shipped with aMember and aMember PHPMatchMaker Plugin)
The plugin has been tested with version 125FLS of PHPMatchMaker.
----------------------------------------------------------------------------
INSTALLATION:

1. Enable plugin in aMember Admin CP/Setup, then go to plugin settings
page and configure it.

2. Edit your products via aMember Pro Control Panel and set PHPMatchMaker 
   Access value (you may choose several NSN_Groups), also set Product 
   URL to point to phpNuke installation.

3. Check your installation by doing new signup. After sigup completed,
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

