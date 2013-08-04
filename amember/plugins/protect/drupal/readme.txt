                     Drupal plugin notes

----------------------------------------------------------------------------
REQUIREMENTS:
  Plugin has been tested with Drupal v.4.4.0 and v.5.3

----------------------------------------------------------------------------
INSTALLATION:
  1. Copy drupal.inc.php, config.inc.php and readme.txt plugin files to amember/plugins/protect/drupal/ folder
  2. Enable 'drupal' plugin in aMember Admin CP -> Setup -> Plugins from Protect Plugins lis
  3. Configure plugin at aMember CP -> Setup -> Drupal
  4. Login to Drupal and create user roles using Drupal admin panel 
     (for example: "paid", "members", etc.)
  5. Go to aMember CP -> Manage Products -> edit and set correspoding 
     "Drupal access" role.
  6. Make Drupal logout working better with aMember Pro. Edit file
     in your drupal installation modules/user/user.module (line 781)
     find string:
     $items[] = array('path' => 'logout', 'title' => t('Log out'),     
     change it to:
     $items[] = array('path' => 'amember/logout.php', 'title' => t('Log out'),

     For ver. 6.2

     Edit file in your drupal installation 
     modules/user/user.page.inc (line 143)
     find string:
     drupal_goto();     
     change it to:
     //drupal_goto();
     header('Location: /amember/logout.php');
     exit;
  
  7. Try it - add "Paid" subscription to member and this user 
     will be added to Drupal database. Delete this subscription,
     or mark it as "Not-Paid" and user will be blocked. Delete
     user from aMember database (using aMember CP controls) and
     user will be locked in Drupal database.
----------------------------------------------------------------------------
 
