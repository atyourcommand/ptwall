<div style="width:500px">
<b>punBB Plugin</b>         

punBB Plugin is designed to provide single-signon access 
for users of aMember Pro and the punBB.

<b>Installation</b>
1 - Enable plugin at aMember CP -> Setup/Configuration -> Plugins

2 - Configure plugin at 
aMember CP -> Setup/Comfiguration -> punbb

3 - Add string <b>setcookie ('punbb_id',$user_id,0,'/');</b>
at functions.php file : /punbb/include/functions.php
to the <i>function pun_setcookies()</i>
This function must must looks like : 
<i>
function pun_setcookie($user_id, $password_hash, $expire)
{
   global $cookie_name, $cookie_path, $cookie_domain, 
          $cookie_secure, $cookie_seed;
   setcookie($cookie_name, serialize(array($user_id, 
      md5($cookie_seed.$password_hash))), $expire, 
      $cookie_path, $cookie_domain, $cookie_secure);
   <b>setcookie ('punbb_id',$user_id,0,'/');</b>
}
</i> 

<b>Services</b>
The plugin will insure the necessary user information is available 
to punBB and log the user in and out of the application. 
In cases where the data is out of sync, the aMember Pro 
&quot;Rebuild DB&quot; function can be run to resync the data.<br />

<b>Setup</b>
The plugin adds configuration field for database name and database
table prefix.
The plugin adds one product field for specifying whether punBB
is integrated with a selected product. 

<b><u>Database name and table prefix</u></b>:
Format is &quot;database_name.table_prefix&quot;. 
This value must be <b><u><font color="#ff3333">entered, then saved twice</font></u></b> before the remaining 
fields will be available.

</div>