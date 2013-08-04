                     PHPList plugin installation       

This plugin has been tested with PHPList 2.10.4

PHPList plugin is designed to provide automatic list subscribtion for aMember users.

Installation 
-----------------------------------------
1 - Enable plugin at aMember CP -> Setup/Configuration -> Plugins

2 - Configure plugin at 
    aMember CP -> Setup/Configuration -> PHPList

3 - Configure plugin "Exclude lists" at
    aMember CP -> Setup/Configuration -> PHPList -> Exclude lists

4 - Configure phplist subscribtion access for your products
    at aMember CP -> Manage Products -> under "Edit" link ->
    -> PHPList Subscribtion

Services
-----------------------------------------
The plugin will insure the necessary user information is available 
to PHPList and add user to application database. 
If user subscribtion will expire/remove - aMember will remove user only from 
aMember subsription.
If user will be completely removed from aMember - he will be
automatically removed from PHPList database if no other subscription exist.
In cases where the data is out of sync, the aMember Pro 
"Rebuild DB" function can be run to resync the data.

Setup
-----------------------------------------
The plugin adds configuration fields for database name and database
table prefix.

Database name and table prefix
Format is "phplistdb.phplist_". 

The plugin adds product multi-fields for specifying whether PHPList
is integrated with a selected product.

The plugin add "Exclude lists" fields. aMember will never touch this PHPList list(s).
Use very careful! If You set this configuration after user subscription
 he will stay in this PHPList list(s) forever!