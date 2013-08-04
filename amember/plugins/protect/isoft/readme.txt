                     InfusionSoft plugin


----------------------------------------------------------------------------
INSTALLATION:

  1. Copy plugin files to /amember/plugins/protect/isoft/ folder

  2. Enable plugin at aMember CP -> Setup/Configuration -> Plugins

  3. Configure plugin at aMember CP -> Setup/Configuration -> iSoft
     Correct API URL should be like: https://***.infusionsoft.com:443/api/xmlrpc/

  4. Adjust product settings at aMember CP -> Manage Products -> Edit: InfusionSoft access

  5. Setup Cron Job to run every 1-2 minutes
     http://manual.amember.com/Setup_a_Cron_Job
     InfusionSoft cron URL is: {$config.root_url}/plugins/protect/isoft/cron.php

----------------------------------------------------------------------------