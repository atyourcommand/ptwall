                     e107 plugin notes

----------------------------------------------------------------------------
REQUIREMENTS:
  Plugin has been tested with e107 v.0.7

----------------------------------------------------------------------------
INSTALLATION:
  1. Copy plugin files to amember/plugins/protect/e107/ folder
  2. Enable plugin at aMember CP -> Setup -> Plugins
  3. Configure plugin at aMember CP -> Setup -> e107
  4. Login to e107 and create user classes from e107 admin panel 
     (for example: "paid", "members", etc.)
  5. Adjust product settings at aMember CP -> Edit Products
  6. Try it - add "Paid" subscription to member and this user 
     will be added to e107 database. Delete this subscription,
     or mark it as "Not-Paid" and user will be blocked. Delete
     user from aMember database (using aMember CP controls) and
     user will be deleted from e107 database.
----------------------------------------------------------------------------

