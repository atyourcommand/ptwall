<div style="width:500px">
<b>FusionBB Plugin</b>         

FusionBB Plugin is designed to provide single-signon access 
for users of aMember Pro and FusionBB.

<b>Installation</b>
1 - Enable plugin at aMember CP -> Setup/Configuration -> Plugins

2 - Configure plugin at 
aMember CP -> Setup/Comfiguration -> FusionBB

3 - Go to your FusionBB Admin Area -> Edit -> Configuration Settings<br>
-> Cookie Settings -> Edit Setings (button) -> and set<br>
<i>Cookie Domain</i> field to your domain, for example<br>
<b><i>mysite.com</i></b> the same value you need to type within<br>
<i>your domain name</i> field at aMember CP -> Setup/Configuration -> <br>
FusinBB. <br>
Click <i>UPDATE SETTINGS</i> button.

4 - Open register.php file at your /fusionbb/ folder and 
add this line after <i>&lt?</i> : <br>
<i>header("Location: /amember/signup.php");</i>
That's the way your users will be able to register only via aMember.

5 - Open logout.php file at your /fusionbb/ folder and add
this line after <i>&lt?</i> : <br>
<i>header("Location: /amember/logout.php?amember_redirect_url=/fusionbb/");</i>

6 - <b>Services</b>
The plugin will insure the necessary user information is available 
to FusionBB and log the user in and out of the application. 
In cases where the data is out of sync, the aMember Pro 
&quot;Rebuild DB&quot; function can be run to resync the data.<br>

<b>Setup</b>
The plugin adds configuration fields for database name and database
table prefix, field for your domain name, field for cookie prefix 
and for options about deleting users from FusionBB.

The plugin adds one product field for specifying whether FusionBB
is integrated with a selected product. 

<b><u>Database name and table prefix</u></b>:
Format is &quot;database_name.table_prefix&quot;. 

<b><u>your domain name</u></b>:
Format is mysite.com. 

<b><u>FusionBB cookie prefix</u></b>:
Default value is : fbb_
It must be same with value stored at FusinBB Admin Area ->
-> Edit -> Configuration Settings -> Cookie Settings -> Cookie Prefix.

<b><u>Remove users</u></b>:
You need to choose what actions aMember Pro must perform, 
when user removed from aMember.

</div>