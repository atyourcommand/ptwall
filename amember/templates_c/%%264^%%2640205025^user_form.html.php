<?php /* Smarty version 2.6.2, created on 2010-08-24 16:24:25
         compiled from admin/user_form.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/user_form.html', 16, false),array('modifier', 'date_format', 'admin/user_form.html', 143, false),array('function', 'country_options', 'admin/user_form.html', 65, false),array('function', 'state_options', 'admin/user_form.html', 80, false),array('function', 'html_options', 'admin/user_form.html', 115, false),array('function', 'html_select_date', 'admin/user_form.html', 172, false),)), $this); ?>
<?php if ($this->_tpl_vars['add']): ?>
<?php $this->assign('title', 'Add User'); ?>
<?php else: ?>
<?php $this->assign('title', 'Edit User'); ?>
<?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/user_nb.inc.html", 'smarty_include_vars' => array('selected' => 'user')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<center>

<h3><?php echo $this->_tpl_vars['title']; ?>
</h3>

<table><tr><td><?php if ($this->_tpl_vars['errors']):  if (count($_from = (array)$this->_tpl_vars['errors'])):
    foreach ($_from as $this->_tpl_vars['e']):
?>
<font color=red><li><b><?php echo $this->_tpl_vars['e']; ?>
</b></font>
<?php endforeach; unset($_from); endif;  endif; ?></td></tr></table>

<form method="post" action="<?php echo ((is_array($_tmp=$_SERVER['PHP_SELF'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<table class=vedit>
<tr>
    <th><b>Member ID#</b></th>
    <td><?php echo $this->_tpl_vars['u']['member_id']; ?>
<input type=hidden name=member_id value="<?php echo $this->_tpl_vars['u']['member_id']; ?>
"></td>
</tr>
<tr>
    <th><b>Username</b></th>
    <td><input type=text name=login value="<?php echo ((is_array($_tmp=$this->_tpl_vars['u']['login'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size=32>
    <?php if ($this->_tpl_vars['u']['login'] == ""): ?>
    <input type=checkbox style='border: none;' name=generate_login value=1><font size=1>generate</font>
    <?php endif; ?>
    </td>
</tr>
<tr><?php if ($this->_tpl_vars['u']['pass'] != ""): ?>
    <th><b>Change Password</b>
    <br><?php if ($this->_tpl_vars['config']['hide_password_cp']): ?><small>enter new password here,<br>
    or just leave this field blank<br>
    </small><?php endif; ?>
    </th>
    <?php else: ?>
    <th><b>Password</b>
    </th>
    <?php endif; ?>
    <td> <input type=text name=pass 
    <?php if (! $this->_tpl_vars['config']['hide_password_cp']): ?> value="<?php echo ((is_array($_tmp=$this->_tpl_vars['u']['pass'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" <?php endif; ?>
    size=32>
    <?php if ($this->_tpl_vars['u']['pass'] == ""): ?>
    <input type=checkbox style='border: none;' name=generate_pass value=1><font size=1>generate</font>
    <?php elseif ($this->_tpl_vars['config']['hide_password_cp']): ?>
    <small><br>current password is not displayed</small>
    <?php endif; ?>
    </td>
</tr>
<tr>
    <th><b>Email</b></th>
    <td> <input type=text name=email value="<?php echo ((is_array($_tmp=$this->_tpl_vars['u']['email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size=32></td>
</tr>
<tr>
    <th><b>Real Name</b></th>
    <td nowrap> 
    <input type=text name=name_f value="<?php echo ((is_array($_tmp=$this->_tpl_vars['u']['name_f'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size=14>
    <input type=text name=name_l value="<?php echo ((is_array($_tmp=$this->_tpl_vars['u']['name_l'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size=15>
    </td>
</tr>
<?php if ($this->_tpl_vars['config']['use_address_info']): ?>
<tr>
    <th><b>Country</b></th>
    <td><select name="country" id="f_country" size=1>
    <?php echo smarty_function_country_options(array('selected' => $this->_tpl_vars['u']['country']), $this);?>

    </select></td>
</tr>
<tr>
    <th><b>Street Address</b></th>
    <td> <input type=text name=street value="<?php echo ((is_array($_tmp=$this->_tpl_vars['u']['street'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size=32></td>
</tr>
<tr>
    <th><b>City</b></th>
    <td><input type=text name=city value="<?php echo ((is_array($_tmp=$this->_tpl_vars['u']['city'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size=32></td>
</tr>
<tr>
    <th><b>State</b></th><td>
    <input type="text" name="state" id="t_state" size="30" value="<?php echo $this->_tpl_vars['u']['state']; ?>
" />
    <select name="state" id="f_state" size="1" disabled="true" style='display: none;'>
    <?php echo smarty_function_state_options(array('selected' => $this->_tpl_vars['u']['state'],'country' => $this->_tpl_vars['u']['country']), $this);?>

    </select>
    </td>
</tr>
<tr>
    <th><b>ZIP Code</b></th>
    <td><input type=text name=zip value="<?php echo ((is_array($_tmp=$this->_tpl_vars['u']['zip'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size=8 maxlength=8></td>
</tr>
<?php endif; ?>

<?php echo $this->_tpl_vars['additional_fields_html']; ?>


<tr>
    <th><b>Unsubscribe</b><br />
    <small>this will unsubscribe customer from:<br />
    - messages that you send from aMember Cp;<br />
    - autoresponder messages;<br />
    - subscription expiration notices;
    </small>
    </th>
    <td>
    <input type=hidden name=unsubscribed value=0>
    <input type=checkbox name=unsubscribed value=1 <?php if ($this->_tpl_vars['u']['unsubscribed'] == '1'): ?>checked<?php endif; ?>>
    check this box to unsubscribe
    </td>
</tr>

<tr>
    <th><b>Newsletter threads</b><br />
    <small>this will subscribe customer to<br />
    newsletter messages
    </small>
    </th>
    <td>
    <select name='threads[]' size=5 multiple>
    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['threads_list'],'selected' => $this->_tpl_vars['threads']), $this);?>

    </select>    
    </td>
</tr>


<?php if ($this->_tpl_vars['config']['use_affiliates']): ?>
<tr>
    <th><b>Is Affiliate?</b><br />
    </th>
    <td><select name=is_affiliate size=1>
    <option value=0 <?php if (! $this->_tpl_vars['u']['is_affiliate']): ?>selected<?php endif; ?>>No</option>
    <option value=1 <?php if ($this->_tpl_vars['u']['is_affiliate'] == '1'): ?>selected<?php endif; ?>>Yes, member</option>
    <option value=2 <?php if ($this->_tpl_vars['u']['is_affiliate'] == '2'): ?>selected<?php endif; ?>>Yes, only affiliate</option>
    </select></td>
</tr>
<tr>
    <th><b>Affiliate Payout Type</b><br />
    </th>
    <td><select name=aff_payout_type size=1>
    <option value=''>Not selected
    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['aff_payout_types'],'selected' => $this->_tpl_vars['u']['aff_payout_type']), $this);?>

    </select></td>
</tr>
<?php endif; ?>

<tr>
    <th><b>Signup Info:</b></th>
    <td><b>Time:</b> <i><?php echo ((is_array($_tmp=$this->_tpl_vars['u']['added'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['config']['time_format']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['config']['time_format'])); ?>
</i> <b>IP:</b> <i><?php echo $this->_tpl_vars['u']['remote_addr']; ?>
</i></td>
</tr>
<?php if ($this->_tpl_vars['aff']): ?>
<tr>
    <th><b>Affiliate</b></th>
    <td>
    #<?php echo ((is_array($_tmp=$this->_tpl_vars['aff']['member_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

    <a href="users.php?action=edit&member_id=<?php echo $this->_tpl_vars['aff']['member_id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['aff']['login'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a>
    <?php echo ((is_array($_tmp=$this->_tpl_vars['aff']['name_f'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['aff']['name_l'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<br />
    <u><?php echo ((is_array($_tmp=$this->_tpl_vars['aff']['email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</u>
    </td>
</tr>
<?php endif; ?>
</table>
<?php 
global $member_additional_fields;
foreach ((array)$member_additional_fields as $f){
     if ($f['name'] == 'cc-hidden'){
 ?>
<br />
<b>ADD/REPLACE CREDIT CARD INFO</b>
<table class=vedit>
<tr>
    <th><b>Credit Card Number</b></th>
    <td><input type=text name=cc_number size=20 maxlength=22></td>
</tr>
<tr>
    <th><b>Credit Card Expiration</b></th>
    <td><?php echo smarty_function_html_select_date(array('prefix' => 'cc_expire_','end_year' => "+10",'display_days' => 0,'year_empty' => "[Select]",'month_empty' => "[Select]",'time' => "0000-00-00"), $this);?>
</td>
</tr>
</table>
<?php  } }  ?>

<br />
<input type=submit onclick="confirm_cc_expire_change(this.form);" value="&nbsp;&nbsp;&nbsp;&nbsp;Save&nbsp;&nbsp;&nbsp;&nbsp;">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type=button value="&nbsp;&nbsp;&nbsp;&nbsp;Back&nbsp;&nbsp;&nbsp;&nbsp;" onclick="history.back(-1)">
<input type=hidden name=action value=<?php if ($this->_tpl_vars['add']): ?>add_save<?php else: ?>edit_save<?php endif; ?>>
</form>

<br /><br />

<!-- display payment details (from payment systems -->
<?php if (is_array ( $this->_tpl_vars['u']['data']['status'] )): ?>
    <table style='font-size: 8pt;' bgcolor=#e0e0e0>
    <tr>
    <th align=right>ACTIVE</th><td>&nbsp;<?php echo $this->_tpl_vars['u']['data']['is_active']; ?>
</td></tr>
    <?php if (count($_from = (array)$this->_tpl_vars['u']['data']['status'])):
    foreach ($_from as $this->_tpl_vars['kk'] => $this->_tpl_vars['pp']):
?>
        <tr><th align=right><?php echo ((is_array($_tmp=$this->_tpl_vars['kk'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&nbsp;</th><td>&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['pp'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td></tr>
    <?php endforeach; unset($_from); endif; ?>
    </table>
<?php endif; ?>
<!--<?php echo ' --><script type="text/javascript">

function confirm_cc_expire_change(obj) {
    if (obj.cc_expire_Month.value!=\'\' && obj.cc_expire_Year.value!=\'\' && obj.cc_number.value==\'\') {
        if ( !confirm("Do you realy want to change Credit Card expiration date?") ) {
            obj.cc_expire_Month.value =\'\';
            obj.cc_expire_Year.value  =\'\';
        }
    }
}

</script><!--{literal} '; ?>
-->

<script type="text/javascript" src="<?php echo $this->_tpl_vars['config']['root_surl']; ?>
/includes/jquery/jquery.js?smarty"></script><!--<?php echo ' '; ?>
-->
<script type="text/javascript" src="<?php echo $this->_tpl_vars['config']['root_surl']; ?>
/includes/jquery/jquery.select.js?smarty"></script><!--<?php echo ' '; ?>
-->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "js.country_state.js", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
