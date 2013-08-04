<?php /* Smarty version 2.6.2, created on 2010-08-24 16:24:29
         compiled from admin/user_actions.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/user_actions.html', 6, false),)), $this); ?>
<?php $this->assign('title', 'User Actions'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/user_nb.inc.html", 'smarty_include_vars' => array('selected' => 'actions')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<center>

<h3><?php echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h3>

<table align=center width=60%><tr><td>
<li><a href="users.php?action=delete&member_id=<?php echo $this->_tpl_vars['member_id']; ?>
">Delete 
User</a>
- Users are disabled automatically as their subscriptions expire.
Disabled users remain in the system and are able to renew their
subscriptions on the <i style="font-weight: bold;">member.php</i> page.<br /><br />
Important! - Use "Delete User" only if you want to completely remove a user
from the system. The user/customer along with all related
records will be permanently deleted when you use this function!<br /><br />
<li><a href="users.php?action=send_signup_email&member_id=<?php echo $this->_tpl_vars['member_id']; ?>
">Re-Send 
Signup Email</a>
- When a user/customer first signs up and payment is completed aMember
automatically sends them an email containing their Username, Password,
and URL for accessing the Members area on your site. If the user did
not receive or cannot find the original email use this function to have
aMember send the email again.<br /><br />
<li><a href="users.php?action=send_verification_email&member_id=<?php echo $this->_tpl_vars['member_id']; ?>
">Re-Send
Mail Verification Email</a><br /><br />


<form method="post" action="<?php echo ((is_array($_tmp=$_SERVER['PHP_SELF'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
</li><li><b>Move User Payments To A Different Account And Delete Current 
Customer Record</b>&nbsp; -&nbsp; Important! Please be careful with this 
option! Normally a customer should use the Signup form&nbsp; to create their
membership registration [ once ] and then use the <span style="font-style: italic; font-weight: bold;">member.php</span> form to add or
purchase additional subscriptions for their account. The
only time that you will probably need to use this is if a customer
instead adds additional subscriptions by using the Signup form more
than once,
thus creating more than one user/customer record for the same person.<br /><br />
Enter the Username here 
 <input type="text" name="new_login" size="10" style="font-size: 8pt;">
for the account that you want to move this user to and then click the "Move" 
button. The other account(s) will then be deleted.
<input type=submit value=Move style='font-size: 8pt'>
<input type=hidden name=member_id value=<?php echo ((is_array($_tmp=$this->_tpl_vars['member_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
>
<input type=hidden name=action value=move>
</form>

<br /><br />
<li><b>Email Customer:</b><br />
<form method="post" action="<?php echo ((is_array($_tmp=$_SERVER['PHP_SELF'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" name="mail">
From: "<?php echo ((is_array($_tmp=$this->_tpl_vars['admin_email_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" &lt;<?php echo ((is_array($_tmp=$this->_tpl_vars['admin_email_from'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&gt;<br />
To: "<?php echo ((is_array($_tmp=$this->_tpl_vars['u']['name_f'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['u']['name_l'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" &lt;<?php echo ((is_array($_tmp=$this->_tpl_vars['u']['email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&gt;<br />
Subject: <input type="text" name="subject" value="" size="40" /><br />
<textarea name="text" cols="80" rows="20" class="small">
</textarea><br />
<input type="submit" value="Send" />
<input type="hidden" name="member_id" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['member_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<input type="hidden" name="action" value="email" />
</form>
<!--<?php echo ' --><script language=JavaScript>
    function ins_tag(tag){
        elem = document.forms[\'mail\'].elements[\'text\'];
        elem.value = elem.value + \' \' + tag + \' \';
        elem.focus();
    }
</script><!--{literal} '; ?>
-->
<!--<?php echo ' --><style>
    .tag {
        background-color: #FCFCFC;
    }
</style><!--{literal} '; ?>
-->

<table bgcolor=#F0F0F0><tr><td>
You may use following tags to personalize email:
<ul><pre style='font-size: 9pt;'><?php echo '
    <span class=tag>{$user.name}</span>    - first and last name <a href="javascript:ins_tag(\'{$user.name}\')">(insert)</a>
    <span class=tag>{$user.email}</span>   - email <a href="javascript:ins_tag(\'{$user.email}\')">(insert)</a>
    <span class=tag>{$user.name_f}</span>  - first name <a href="javascript:ins_tag(\'{$user.name_f}\')">(insert)</a>
    <span class=tag>{$user.name_l}</span>  - last name <a href="javascript:ins_tag(\'{$user.name_l}\')">(insert)</a>
    <span class=tag>{$user.login}</span>   - login <a href="javascript:ins_tag(\'{$user.login}\')">(insert)</a>
    <span class=tag>{$user.pass}</span>    - password <a href="javascript:ins_tag(\'{$user.pass}\')">(insert)</a>
'; ?>
</pre></ul>
</td></tr></table>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>