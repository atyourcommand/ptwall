  
                     Images4 plugin notes

----------------------------------------------------------------------------
REQUIREMENTS:

4Images (tested with 1.7 version)
http://www.4homepages.de/

----------------------------------------------------------------------------
INSTALLATION:

0. Extract and upload plugin to amember/plugins/protect/images4/ folder

1. Enable plugin in aMember Admin CP/Setup, then go to plugin settings
   page and configure it.

2. Create User Groups in your 4Images script. Please note, that your
   paid/protected content must be restricted and available only
   for several groups.

2. Edit your products via aMember Pro Control Panel and set 4Images 
   Access value (you may choose several access groups), also set Product 
   URL to point to 4Images if you wish.

3. Check your installation by doing new signup. After signup completed,
   new member must appear in 4Images with the same username.

Important Notes:
----------------------------------------------------------------------------

 - if user deleted from aMember Pro, it will be kept in 4Images
   database. You may delete his record manually from 4Images

 - as customer subscription expires, user will be removed from
   corresponding user groups in 4Images. 
 
 - you should use groups to setup correct access rights and 
   make sure that only paid customers (who belongs to specific group)
   will see your paid content  

----------------------------------------------------------------------------