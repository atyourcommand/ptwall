                     SigmaChat plugin notes

----------------------------------------------------------------------------
INSTALLATION ON aMEMBER SIDE:
  1. Copy plugin files to amember/plugins/protect/sigmachat/ folder
  2. Enable plugin at aMember CP -> Setup -> Plugins
  3. Configure plugin at aMember CP -> Setup -> SigmaChat
     there are optional parameters only. To start, keep settings
     default (empty values)
  4. Adjust product settings at aMember CP -> Edit Products
  
CONFIGURATION ON SigmaChat SIDE:
  1. Login into your SigmaChat account at http://www.sigmachat.com/  
  
  2. Configure
    Site Integration -> Site Authentication:
     set URL to {$config.root_url}/plugins/protect/sigmachat/sc_login.php
     enable this feature in select box, press Save Changes button
     
  3. Configure 
    Site Integration -> Site Registration:
     set URL to {$config.root_url}/signup.php
     enable this feature in select box, press Save Changes button
     
  4. Now when user logs-in into SigmaChat applet, it asks aMember for
     authorization. User must also have active subscription to a 
     product in aMember.
     
----------------------------------------------------------------------------

NOTE:
You will have to add an account for yourself into aMember, and in member profile
set yourself as a SigmaChat admin. 
