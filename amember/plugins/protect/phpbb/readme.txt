<TABLE cellpadding="0" cellspacing="15" border="0" width="500">
    <TR>
        <td colspan="3" align="center"><b>phpBB Plugin</b></td>
    </TR>
    <TR>
        <td colspan="3">
phpBB Plugin is designed to provide single-signon access for users of aMember Pro and phpBB.<br />
            <br />
            <b>Services</b><br />
            The plugin will insure the necessary user information is available to phpBB and log the user in and out of the application. In cases where the data is out of sync, the aMember Pro &quot;Rebuild DB&quot; function can be run to resync the data.<br />
            <br />
            <b>Please note</B> - this plugin never
            deletes customer from phpBB, it always just disable customer account.
            To change this behaviour, please contact support via helpdesk.
            <br /><br />
            <b>Setup</b><br />
                The plugin adds configuration fields for database name, database table prefix, cookie name, cookie path, cookie domain, secure cookie and default user group. The plugin adds one product field for specifying whether phpBB is integrated with a selected product. The plugin adds one member field allowing select members to be assigned with administrator rights in phpBB.<br />
        </td>
        </td>
    </TR>
    <tr>
        <td></td>
        <td><b><u>Database name and table prefix</u></b>:<br />
            Default is BLANK. Format is &quot;database_name.table_prefix&quot;. This value must be <b><u><font color="#ff3333">entered, then saved twice</font></u></b> before the remaining fields will be available.<br />
            <br />
            <b><u>Cookie Name</u></b>:<br />
            Default is &quot;phpbb&quot;.<br />
            <br />
            <b><u>Cookie Path</u></b>:<br />
            Default is &quot;/&quot;.<br />
            <br />
            <b><u>Cookie Domain</u></b>:<br />
                Default is BLANK.<br />
            <br />
            <b><u>Use Encrypted Cookie</u></b>:<br />
                Default is &quot;No&quot;. If &quot;Yes&quot; is selected, cookies will only be transmitted if there is a secure connection such as SSL.<br />
            <br />
            <b><u><font color="#ff3333">IMPORTANT</font></u></b>: DO NOT CHANGE the cookie settings unless you know what you are doing. This plugin will retrieve the current cookie settings from your installation of phpBB and display them as the default. When changes are saved, this plugin will modify the phpBB configuration settings with any new cookie values. If any of these values are wrong, phpBB may not work.<br />
            <br />
            <b><u>Default Group</u></b>:<br />
            Default is &quot;** Default&quot;. Provides new member default group assignment. The default setting obtains the group from the product integration setting if phpBB is integrated with a product. If additional groups are available, one can be selected overriding the product integration setting.<br />
        </td>
        <td></td>
    </tr>
    <tr><td colspan=3><div align="left">
           SAMPLE CONFIGURATION OF PHPBB: 
    <ul>
        <li>Login into your PHPBB admin panel   
    <li>Go to "General Admin" -> "Configuration", and set "Enable account activation" => "Admin". This way users are unable to register in the forum for free;
    <li>Go to "Forum Admin" -> "Permissions" and set Forum Permissions Control for each your forum to "Registered [hidden]". This way only registered 
            members will be able to access your forums. Of course, you may keep several forums open for guests - it is on your choice.
        <li>Finally edit file phpbb/profile.php, replace first line
<pre>&lt;?php</pre>
to the following 3:
<pre>&lt;?php if (($_GET['mode'] == 'register') || ($_POST['mode'] == 'register')){
   header("Location: /amember/signup.php"); exit();
}
</pre>
This way user will be redirected to aMember signup page when he clicks "Register" link in phpBB
    </ul>

    </div></td></tr>
    <tr>
        <td colspan="3">
            <div align="left">
                <b>Rebuild</b><small> (aMember Control Panel)</small>:<br />
                    Rebuild insures that the member is included in user list. If the member is not included, all necessary records are added. If the member is already included, the current records are updated according the member's information. Rebuild does not remove records.<br />
                <br />
                <b>phpBB support</b><br />
                Support for phpBB is available through the phpBB website:<br />
                <br />
                <center>
                    http://www.phpbb.com/
                </center>
            </div>
        </td>
    </tr>
    <TR>
        <td colspan="3" align="center"><font size="-3">
                    Copyright© CGI-Central.net<br />
                    Portions written by Woodland Company<br />
                    All Rights Reserved.</font></td>
    </TR>
</TABLE>