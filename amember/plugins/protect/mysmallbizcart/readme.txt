                     MySmallBizCart plugin notes

----------------------------------------------------------------------------
INSTALLATION:
  1. Copy plugin files to amember/plugins/protect/mysmallbizcart/ folder
  2. Enable plugin at aMember CP -&gt; Setup -&gt; Plugins
  3. Configure plugin at aMember CP -&gt; Setup -&gt; MySmallBizCart
  4. Adjust product settings at aMember CP -&gt; Edit Products
  5. Edit templates within mysmallbizcart installation (signup, login, logout and profile changes should be handled by aMember).
  In file templates/members/template.menu_left.htm replace:
        &lt;?=$data['Members']?&gt;/settings.account.php
  to:
        {$config.root_url}/profile.php
  and:        
        &lt;?=$data['Members']?&gt;/logout.php
  to:
        {$config.root_url}/logout.php
  
  In file templates/template.menu_top.htm replace:
        &lt;?=$data['Members']?&gt;.php
  to:
        {$config.root_url}/member.php
  
  In file templates/template.menu_left.htm replace:
        &lt;?=$data['Members']?&gt;.php
  to:
        {$config.root_url}/member.php
  and:
      &lt;form method="post" action="&lt;?=$data['Members']?&gt;/login.php?id=&lt;?=$data['AffiliateId']?&gt;"&gt;
       &lt;tr&gt;&lt;td&gt;E-mail:&lt;/td&gt;&lt;/tr&gt;
       &lt;tr&gt;&lt;td align="center"&gt;&lt;input type="text" class="flat" name="user" size="18" maxlength="32"&gt;&lt;/td&gt;&lt;/tr&gt;
       &lt;tr&gt;&lt;td&gt;Password:&lt;/td&gt;&lt;/tr&gt;
       &lt;tr&gt;&lt;td align="center"&gt;&lt;input type="password" class="flat" name="pass" size="18" maxlength="32"&gt;&lt;/td&gt;&lt;/tr&gt;
       &lt;tr&gt;
        &lt;td align="right"&gt;
          &lt;div align="center"&gt;&lt;img src="&lt;?=$data['Images']?&gt;/px.gif" width="1" height="16"&gt;
              &lt;input type="submit" class="send" name="send" value="Login"&gt;
          &lt;/div&gt;&lt;/td&gt;
       &lt;/tr&gt;
       &lt;tr&gt;&lt;td align="center"&gt;&lt;a class="small" href="&lt;?=$data['Members']?&gt;/password.php?id=&lt;?=$data['AffiliateId']?&gt;"&gt;Forgot your password?&lt;/a&gt;&lt;br /&gt;&lt;br /&gt;&lt;/td&gt;&lt;/tr&gt;
       &lt;tr&gt;
        &lt;td&gt;
         &lt;table width="100%" border="0" cellspacing="3" cellpadding="0"&gt;
          &lt;tr&gt;&lt;td background="&lt;?=$data['Images']?&gt;/hr.gif"&gt;&lt;img src="&lt;?=$data['Images']?&gt;/px.gif" width="1" height="1"&gt;&lt;/td&gt;&lt;/tr&gt;
         &lt;/table&gt;
        &lt;/td&gt;
       &lt;/tr&gt;
       &lt;tr&gt;&lt;td align="center"&gt;&lt;input type="button" class="send" value="Sign Up" onclick="go('&lt;?=$data['Members']?&gt;/signup.php?id=&lt;?=$data['AffiliateId']?&gt;')"&gt;&lt;/td&gt;&lt;/tr&gt;
      &lt;/form&gt;
 
  to:

        &lt;form name="login" method="post" action="{$config.root_url}/login.php"&gt;
        &lt;table&gt;
            &lt;tr&gt;
                &lt;th&gt;Username&lt;/th&gt;
                &lt;td&gt;&lt;input type="text" name="amember_login" size="15" value="" /&gt;&lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;th&gt;Password&lt;/th&gt;
                &lt;td&gt;&lt;input type="password" name="amember_pass" size="15" /&gt;&lt;/td&gt;
            &lt;/tr&gt;
        &lt;/table&gt;
        
        &lt;input type="submit" value="Login" /&gt;
        &lt;/form&gt;
        &lt;br /&gt;
        &lt;p&gt;Not registered yet? &lt;a href="{$config.root_url}/signup.php"&gt;Signup here&lt;/a&gt;&lt;/p&gt;
        &lt;br /&gt;
        
        &lt;h3&gt;Lost password?&lt;/h3&gt;
        &lt;form name="sendpass" method="post" action="{$config.root_url}/sendpass.php"&gt;
        &lt;table align="center"&gt;
            &lt;tr&gt;
                &lt;th&gt;Enter your &lt;b&gt;E-Mail Address&lt;/b&gt; or &lt;b&gt;Username&lt;/b&gt;&lt;/th&gt;
                &lt;td&gt;&lt;input type="text" name="login" size="12" /&gt;&lt;/td&gt;
            &lt;/tr&gt;
        &lt;/table&gt;
        &lt;input type="submit" value="Get Password" /&gt;
        &lt;/form&gt;

----------------------------------------------------------------------------

