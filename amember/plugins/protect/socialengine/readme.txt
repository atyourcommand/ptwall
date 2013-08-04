                     Social Engine plugin notes

----------------------------------------------------------------------------
REQUIREMENTS:
  Plugin has been tested with Social Engine Version:2.82

----------------------------------------------------------------------------
INSTALLATION:
  1. Copy plugin files to amember/plugins/protect/socialengine/ folder
  2. Enable plugin at aMember CP -> Setup -> Plugins
  3. Configure plugin at aMember CP -> Setup -> Social Engine
  4. Adjust product settings at aMember CP -> Edit Products
  5. Click aMember CP -> Rebuild Db to transfer existing members to Social Engine
----------------------------------------------------------------------------



To avoid loss of communication between bases
you should exclude an opportunity
to change an e-mail address and password from SE.
The user can always
change an e-mail address and password
on page amember/member.php
if it is necessary.


edit file: user_acount.php

line 14
find string:
$user_email = $_POST['user_email'];

replace to:
$user_email = $user->user_info['user_email'];


edit file: templates/user_account.tpl
remove lines from 53 to 60


edit files templates/user_account.tpl and 
templates/user_account_delete.tpl

and delete strings at line 7-8
&lt;td class='tab'&gt;&nbsp;&lt;/td&gt;
&lt;td class='tab2' NOWRAP&gt;&lt;a href='user_account_pass.php'&gt;{$user_account13}&lt;/a&gt;&lt;/td&gt; 


-----------------------------------------------

If you want that users can sign up only via aMember:

Edit file signup.php in your Social Engine installation derictory:
line 1:

find string:
&lt;?

replace to:
&lt;?
header("Location: /amember/signup.php");
exit;

-----------------------------------------------

If you want that user logout from aMember if he logout from socialnetwork:


Edit file user_loguot.php in your Social Engine installation derictory:
line 1:

find string:
&lt;?

replace to:
&lt;?
header("Location: /amember/logout.php?amember_redirect_url=/socialnetwork/");
exit;
