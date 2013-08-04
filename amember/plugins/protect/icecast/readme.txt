<b>IceCast plugin</b>

Installation:

1. Upload plugin files to amember/plugins/protect/icecast/ folder.
2. Enable plugin at aMember CP -> Setup -> Plugins.
3. Go to aMember CP -> Setup -> IceCast and enter some username/password
   for authentication. 
4. Into your IceCast config file, add the following:
 Username and password must be the same as you entered on step (3).
 Listener URL may be in 2 forms:
   * {$config.root_url}/amember/plugins/protect/icecast/i.php
     it will give access to all members having "completed" and 
     non-expired subscription to any aMember product;
   * {$config.root_url}/amember/plugins/protect/icecast/i.php?product_ids=1,2
     will give access only to customers having subscription to products #1 and #2
 
    &lt;mount&gt;
        &lt;mount-name&gt;/example.ogg&lt;/mount-name&gt;
        &lt;authentication type="url"&gt;
            &lt;option name="listener_add" value="{$config.root_url}/amember/plugins/protect/icecast/i.php"/&gt;
            &lt;option name="username" value="username_from_plugin_config"/&gt;
            &lt;option name="password" value="password_from_plugin_config"/&gt;
            &lt;option name="auth_header" value="icecast-auth-user: 1"/&gt;
        &lt;/authentication&gt;
    &lt;/mount&gt;
  
    (to see correct XML code, open this readme at aMember CP->Setup->IceCast)