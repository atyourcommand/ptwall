<div style="width:500px">
<b>Dolphin Plugin</b>         

Dolphin Plugin is designed to provide single-signon access 
for users of aMember Pro and the Dolphin.

Tested with Dolphin 7


<b>Installation</b>
1 - Enable plugin at aMember CP -> Setup/Configuration -> Plugins

2 - Configure plugin at 
aMember CP -> Setup/Comfiguration -> dolphin

3 - Go to aMember CP -> Add Fields -> and add 2 additional fields
for correct Dolphin Profile work.
Click "Add Field" and enter field name <b>sex</b> - within Field Title
and Field Description fileds enter whatever you want. 
Set <i>Field Type</i> to <b>SQL</b>
Set <i>SQL field type</i> to <b>String (varchar(255))</b>
Set <i>Display Type</i> to <b>RadioButtons</b>
Set <i>Field Values</i> to 
&nbsp;&nbsp;&nbsp;<b>Male|Male|1
&nbsp;&nbsp;&nbsp;Female|Female</b>
Set <i>Visibility of the field -> Display in signup form?</i> to
&nbsp;&nbsp;&nbsp;<b>Display and allow editing</b>

Click on the <b>Submit</b> button.

Enter field name <b>prof_type</b> - within Field Title
and Field Description fileds enter whatever you want. 
Set <i>Field Type</i> to <b>SQL</b>
Set <i>SQL field type</i> to <b>String (varchar(255))</b>
Set <i>Display Type</i> to <b>RadioButtons</b>
Set <i>Field Values</i> to 
&nbsp;&nbsp;&nbsp;<b>Single|Single|1
&nbsp;&nbsp;&nbsp;Couple|Couple|0</b>
Set <i>Visibility of the field -> Display in signup form?</i> to
&nbsp;&nbsp;&nbsp;<b>Display and allow editing</b>

Click on the <b>Submit</b> button.


<b>Services</b>
The plugin will insure the necessary user information is available 
to Dolphin and log the user in and out of the application. 
In cases where the data is out of sync, the aMember Pro 
&quot;Rebuild DB&quot; function can be run to resync the data.<br>

<b>Setup</b>
The plugin adds configuration field for database name and database
table prefix.
The plugin adds one product field for specifying whether Dolphin
is integrated with a selected product. 

<b><u>Database name and table prefix</u></b>:
Format is &quot;database_name.table_prefix&quot;. 
This value must be <b><u><font color="#ff3333">entered, then saved twice</font></u></b> before the remaining 
fields will be available.

</div>