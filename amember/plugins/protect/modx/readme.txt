                     MODx plugin notes

----------------------------------------------------------------------------
REQUIREMENTS:
  Plugin has been tested with MODx Version: 0.9.6.1p2

----------------------------------------------------------------------------
INSTALLATION:
  1. Copy plugin files to amember/plugins/protect/modx/ folder
  2. Enable plugin at aMember CP -> Setup -> Plugins
  3. Configure plugin at aMember CP -> Setup -> MODx
  4. Adjust product settings at aMember CP -> Edit Products
  5. Click aMember CP -> Rebuild Db to transfer existing members to MODx
----------------------------------------------------------------------------


For single login working

Edit file
manager/includes/config.inc.php

line 58:
find string:
session_name($site_sessionname);

replace to:
//session_name($site_sessionname);