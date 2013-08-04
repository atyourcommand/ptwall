                     PhotoPost module installation

========================================================================

  THERE IS NO WARRANTY FOR THE THIS PLUGIN AND ENTIRE aMember SCRIPT, 
TO THE EXTENT PERMITTED BY APPLICABLE LAW. THE ENTIRE RISK AS
TO THE QUALITY AND PERFORMANCE OF THE PROGRAM IS WITH YOU. SHOULD THE
PROGRAM PROVE DEFECTIVE, YOU ASSUME THE COST OF ALL NECESSARY SERVICING,
REPAIR OR CORRECTION.

========================================================================
This module tested with PhotoPost v.4.1 RC1

1. Enable plugin in aMember Admin CP/Setup, then go to plugin settings
page and configure it.

2. If you want to setup different levels of access to PhotoPost for 
different products, just add new user groups into your PhotoPost database.

3. Login into aMember Control Panel. Add Products and set correspoding 
PhotoPost Group for every product. Members will get this level of access
in PhotoPost as subscription bought. When subscription expires it will be
reset to default level. 

4. After you set it, click on Rebuild Db link in Admin Panel. It will 
case database syncronisation (aMember Pro ----> PhotoPost, but
never PhotoPost ----> aMember Pro)

---
5. There are numerous configuration possible from PhotoPost point of view.

 5.1. PhotoPost folder is already protected by aMember (using aMember CP -> Protect
  Folders). It is not the best method, but it is working. In this case you don't 
  need any additional configuration to your PhotoPost.
  
 5.2. Members area is NOT protected by aMember. In this case, you have to:
  - disable free registrations in PhotoPost admin panel;
    (This way member can register in your PhotoPost only via aMember)
  - in the PhotoPost admin panel change "default" group
    permissions, that these users don't have access to your paid content;
    (This way expired members can login, but cannot see any content)
---

6. Enjoy!

NOTES:
If user do signup with the same login AND email as in PhotoPost, then 
it is allowed to do signup. If user do login with existing (in PhotoPost)
login and ANOTHER email, it will get message that username is already
used. 

If you have existing PhotoPost members database contact CGI-Central
for free advice about import/integration.
