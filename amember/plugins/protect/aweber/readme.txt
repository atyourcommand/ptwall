<b>Aweber plugin</b>

Installation:

1. Upload plugin files (aweber.inc.php, config.inc.php, readme.txt, thanks.php, thanks.html)
to amember/plugins/protect/aweber/ folder.

2. Replace the following code in your amember/templates/thanks.html file -
&lt;strong&gt;&#35;_TPL_THX_ENJOY|&lt;a href="{$config.root_url}/login.php"&gt;|&lt;/a&gt;#&lt;/strong&gt;
&lt;br /&gt;&lt;br /&gt;
with this code -
<div style='color: gray'>
<pre>
 {if function_exists('aweber_deleted') }
  &lt;strong&gt;&#35;_TPL_THX_AWEBER#&lt;/strong&gt;
&lt;br /&gt;&lt;br /&gt;
      &lt;table width="50%" height="100" border="{if $config.protect.aweber.formborder}&#x7B;$config.protect.aweber.formborder|escape}{else}0{/if}" cellspacing="5" cellpadding="5" align="center" bordercolor="{if $config.protect.aweber.formbordercolor}&#x7B;$config.protect.aweber.formbordercolor|escape}{else}#FFFFFF{/if}" bgcolor="{if $config.protect.aweber.formbgcolor}&#x7B;$config.protect.aweber.formbgcolor|escape}{else}#FFFFFF{/if}"&gt;
  &lt;tr&gt;
    &lt;td&gt;&lt;form method="post" action="http://www.aweber.com/scripts/addlead.pl"&gt;
    &lt;input type="hidden" name="websiteloginurl" value="&#x7B;$config.root_url}/login.php"&gt;
&lt;input type="hidden" name="meta_web_form_id" value="&#x7B;$config.protect.aweber.webformid|escape}"&gt;
&lt;input type="hidden" name="meta_split_id" value="&#x7B;$config.protect.aweber.splitid|escape}"&gt;
&lt;input type="hidden" name="unit" value="{if $product.aweber_subscription}&#x7B;$product.aweber_subscription|escape}{else}&#x7B;$config.protect.aweber.unit}{/if}"&gt;
&lt;input type="hidden" name="redirect" value="{if $config.protect.aweber.redirect}&#x7B;$config.protect.aweber.redirect|escape}{else}&#x7B;$config.root_url}/plugins/protect/aweber/thanks.php{/if}"&gt;
&lt;input type="hidden" name="meta_adtracking" value="{if $product.ad_tracking}{$product.ad_tracking|escape}{else}&#x7B;$config.protect.aweber.adtracking|escape}{/if}"&gt;
&lt;input type="hidden" name="meta_message" value="{if $config.protect.aweber.message}&#x7B;$config.protect.aweber.message|escape}{else}1{/if}"&gt;
&lt;input type="hidden" name="meta_required" value="&#x7B;$config.protect.aweber.required|escape}"&gt;
&lt;input type="hidden" name="meta_forward_vars" value="{if $config.protect.aweber.forwardvars}&#x7B;$config.protect.aweber.forwardvars|escape}{else}0{/if}"&gt;
        &lt;table align="center" border="0" bordercolor="#000000" cellpadding="5" cellspacing="10"&gt;
          &lt;tr&gt; 
      &lt;td colspan=2&gt; 
        &lt;div align="center"&gt;&#x7B;$config.protect.aweber.formtext|escape}&lt;/div&gt;
      &lt;/td&gt;
    &lt;/tr&gt;

    
    &lt;tr&gt; 
      &lt;td width="271"&gt; 
        &lt;div align="right"&gt;Email:  &lt;/div&gt;
      &lt;/td&gt;
      &lt;td width="332"&gt;  
        &lt;input type="text" name="from" value="{$member.email|escape}" size="25"&gt;
        &lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt; 
      &lt;td width="271"&gt; 
        &lt;div align="right"&gt;First Name:  &lt;/div&gt;
      &lt;/td&gt;
      &lt;td width="332"&gt;  
        &lt;input type="text" name="name (awf_first)" value="{$member.name_f|escape}" size="25"&gt;
        &lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt; 
      &lt;td width="271"&gt; 
        &lt;div align="right"&gt;Second Name:  &lt;/div&gt;
      &lt;/td&gt;
      &lt;td width="332"&gt;  
        &lt;input type="text" name="name (awf_last)" value="{$member.name_l|escape}" size="25"&gt;
        &lt;/td&gt;
    &lt;/tr&gt;
    &lt;input type="hidden" name="custom Login Name" value="{$member.login|escape}" size="20"&gt;
    &lt;input type="hidden" name="custom Password" value="{$member.pass|escape}" size="20"&gt;
    &lt;input type="hidden" name="custom Street Address" value="{$member.street|escape}" size="20"&gt;
    &lt;input type="hidden" name="custom City" value="{$member.city|escape}" size="20"&gt;
    &lt;input type="hidden" name="custom Zip" value="{$member.zip|escape}" size="20"&gt;
    &lt;input type="hidden" name="custom State" value="{$member.state|escape}" size="20"&gt;
    &lt;input type="hidden" name="custom Country" value="{$member.country|escape}" size="20"&gt;
    &lt;tr&gt; 
      &lt;td align="center" colspan="2"&gt; 
        &lt;input type="submit" name="submit" value="{if $config.protect.aweber.submittext}&#x7B;$config.protect.aweber.submittext|escape}{else}submit{/if}"&gt;
        &lt;/td&gt;
    &lt;/tr&gt;
  &lt;/table&gt;
&lt;/form&gt;&lt;/td&gt;
  &lt;/tr&gt;
&lt;/table&gt;


{else}

&lt;strong&gt;&#35;_TPL_THX_ENJOY|&#36;config.root_url}/login.php"&gt;|&lt;/a&gt;#&lt;/strong&gt;
&lt;br /&gt;&lt;br /&gt;

{/if}
</pre>
</div>

3. Optionally, you can add this line -

define ('_TPL_THX_AWEBER', 'Congratulations, your membership is now active!');

to your amember/languages/en-custom.php file. If you dont have an en-custom.php file then copy 
the amember/languages/sample-custom.php and rename it en-custom.php and add the above line. 
You can then change the text to whatever you want to appear on the aweber subscribe page.

4. Enable the aweber plugin at aMember CP -&gt; Setup/Configuration -&gt; Plugins

5. Configure the aweber plugin at aMember CP -&gt; Setup/Configuration -&gt; aweber

6. Visit aMember CP -&gt; Edit Products and set the aweber autoresponder list for each product.

 7. Login to your aweber control panel, choose your aweber list and then choose 'List Settings' 
 for that list.

8. Add your amember admin email address and admin name to the  'Autoresponder Admin Emails' 
 section of the 'List Settings' section of your aweber list.
 
 9. An optional step is to create custom fields in your aweber control panel for each aweber 
 list for each of the customer you would like passed from amember to your aweber list.
If you don't add these custom fields then you will get just your subscriber name and email address
by default.
 
 The custom fields you can have are (besides name and email which are standard fields) - 
Login Name 
Password
Street Address
City
Zip
State
Country

10. Your first message in your aweber list should be something like -

Hi {!firstname_fix},

Thank you for joining The XYZ members area. 

Here are your access details for for your membership -
 Your User ID: {!custom login name}  
 Your Password: {!custom password}

Your personal details we have on record are -
 Your Name:   {!name_fix}
 Your Email:  {!email}
 Address :    {!custom street address} 
 City :       {!custom city}  Zip: {!custom zip}
 State:       {!custom state} Country: {!custom country}
You signed up from the IP Address:  {!add_ip}
 

You can log-on to your member pages at:
http://yoursite.com/amember/member.php

Please don't hesitate to contact us if you have any questions or queries.

{!signature}