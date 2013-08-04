<div style="width:500px">
<b>Vanilla Plugin</b>         

Vanilla Plugin is designed to provide single-signon access
for users of aMember Pro and Vanilla.

<b>Installation</b>
1 - Enable plugin at aMember CP -> Setup/Configuration -> Plugins

2 - Configure plugin at 
aMember CP -> Setup/Comfiguration -> vanilla

3 - Open file <i>people.php</i> at your vanilla folder and add
after &lt;php this one : 
header(&quot;Location:{$config.root_url}/member.php&quot;);
</b>
That's the way your users will be able to register only via aMember.
Save changes.

4 - <b>Services</b>
The plugin will insure the necessary user information is available 
to vanilla and log the user in and out of the application. 
In cases where the data is out of sync, the aMember Pro 
&quot;Rebuild DB&quot; function can be run to resync the data.<br>

<b>Setup</b>
The plugin adds configuration fields for database name and database
table prefix and for options about deleting users from vanilla.

The plugin adds one product field for specifying whether vanilla
is integrated with a selected product. 

<b><u>Database name and table prefix</u></b>:
Format is &quot;database_name.table_prefix&quot;. 

<b><u>Default Level</u></b>:
Select user Role to reset him after deleting his
subscribtion or removing him from aMember database.

<b><u>Remove users</u></b>:
You need to choose what actions aMember Pro must perform, 
when user removed from aMember.

</div>