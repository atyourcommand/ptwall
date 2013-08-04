<div style="width:500px">
<b>PHPFusion Plugin</b>         

PHPFusion Plugin is designed to provide single-signon access 
for users of aMember Pro and PHPFusion.

<b>Installation</b>
1 - Enable plugin at aMember CP -> Setup/Configuration -> Plugins

2 - Configure plugin at 
aMember CP -> Setup/Comfiguration -> phpfusion

3 - Open file <i>register.php</i> at your phpfusion folder and replace
first line (&lt;br&gt;) with this 2 lines :
<b>&lt;br&gt;
header(&quot;Location:{$config.root_url}/signup.php&quot;);
</b>
That's the way your users will be able to register only via aMember.
Save changes.

5 - Open <i>setuser.php</i> file at your phpfusion folder.
Find line : 
<i>if (isset($_REQUEST['logout']) && $_REQUEST['logout'] == "yes"){</i>
And add this line after it : <br>
<i>header(&quot;Location:{$config.root_url}/logout.php?amember_redirect_url=/phpfusion/&quot;);</i>
Place instead  /phpfusion/ path to your PHPFusion folder. For example,
if your forum address is http://www.yoursite.com/forum/phpfusion
type /forum/phpfusion/ instead of /phpfusion/.
That's the way your users will automatically get logged out from
aMember 


6 - <b>Services</b>
The plugin will insure the necessary user information is available 
to PHPFusion and log the user in and out of the application. 
In cases where the data is out of sync, the aMember Pro 
&quot;Rebuild DB&quot; function can be run to resync the data.<br>

<b>Setup</b>
The plugin adds configuration fields for database name and database
table prefix and for options about deleting users from FusionBB.

The plugin adds one product field for specifying whether PHPFusion
is integrated with a selected product. 

<b><u>Database name and table prefix</u></b>:
Format is &quot;database_name.table_prefix&quot;. 

<b><u>Remove users</u></b>:
You need to choose what actions aMember Pro must perform, 
when user removed from aMember.

</div>