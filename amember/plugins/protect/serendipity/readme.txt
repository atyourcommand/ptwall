<div style="width:500px">
<b>Serendipity Plugin</b>         
<i>has been tested with Serendipity 1.6-alpha1</i>

Serendipity Plugin is designed to provide single-signon access 
for users of aMember Pro and the Serendipity.

<b>Installation</b>
1 - Enable plugin at aMember CP -> Setup/Configuration -> Plugins

2 - Configure plugin at 
aMember CP -> Setup/Configuration -> serendipity

3 - Open file <b>functions_config.inc.php</b> that is located at your
serendipity folder -> include folder (for example : 
<b>/serendipity/include/functions_config.inc.php</b>)
Find function <b>function serendipity_setCookie($name,$value)</b>
and replace string
<b>setcookie("serendipity[$name]", $value, time()+60*60*24*30, 
$serendipity['serendipityHTTPPath']);</b>
with this one : 
<b><i>setcookie("serendipity[$name]", $value, time()+60*60*24*30, '/');</i></b>


<b>Services</b>
The plugin will insure the necessary user information is available 
to Serendipity and log the user in and out of the application. 
In cases where the data is out of sync, the aMember Pro 
&quot;Rebuild DB&quot; function can be run to resync the data.<br>

<b>Setup</b>
The plugin adds configuration field for database name and database
table prefix.
The plugin adds two product fields : for specifying whether Serendipity
is integrated with a selected product and to specify Serendipity 
user level for chosen user group.

<b><u>Database name and table prefix</u></b>:
Format is &quot;database_name.table_prefix&quot;. 
This value must be <b><u><font color="#ff3333">entered, then saved twice</font></u></b> before the remaining 
fields will be available.

</div>
