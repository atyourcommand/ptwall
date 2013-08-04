<div style="width:500px">
<b>OmniSupport Plugin</b>         

OmniSupport Plugin is designed to provide single-signon access 
for users of aMember Pro and the OmniSupport.

<b>Installation</b>
1 - Enable plugin at aMember CP -> Setup/Configuration -> Plugins

2 - Configure plugin at 
aMember CP -> Setup/Comfiguration -> omni_support

3 - Replase string <i>setcookie($sid_name,'',0,dirname($PHP_SELF));</i>
with <b><i>setcookie($sid_name,'',0,'/');</i></b> in login.php file within
your OmniSuport folder -> users. For example, if you have installed 
OmniSupport into folder <i>/sup/</i> - login.php 
will be at /sup/users/login.php.

<b>Services</b>
The plugin will insure the necessary user information is available 
to OmniSupport and log the user in and out of the application. 
In cases where the data is out of sync, the aMember Pro 
&quot;Rebuild DB&quot; function can be run to resync the data.<br>

<b>Setup</b>
The plugin adds configuration field for database name and database
table prefix.
The plugin adds one product field for specifying whether OmniSupport
is integrated with a selected product. 
The plugin adds one member field allowing selection of group assignment 
for each member. 

<b><u>Database name and table prefix</u></b>:
Format is &quot;database_name.table_prefix&quot;. 
This value must be <b><u><font color="#ff3333">entered, then saved twice</font></u></b> before the remaining 
fields will be available.

</div>