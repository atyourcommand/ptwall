<?php /* Smarty version 2.6.2, created on 2010-09-11 02:13:33
         compiled from admin/user_payment.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/user_payment.html', 8, false),array('modifier', 'default', 'admin/user_payment.html', 45, false),array('modifier', 'amember_date_format', 'admin/user_payment.html', 105, false),array('modifier', 'string_format', 'admin/user_payment.html', 135, false),array('function', 'html_options', 'admin/user_payment.html', 13, false),array('function', 'html_select_date', 'admin/user_payment.html', 19, false),array('function', 'counter', 'admin/user_payment.html', 131, false),)), $this); ?>
<?php $this->assign('title', "Edit Payment/Subscription"); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/user_nb.inc.html", 'smarty_include_vars' => array('selected' => 'payments')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<center>

<h3><?php echo $this->_tpl_vars['title']; ?>
</h3>

<form method="post" action="<?php echo ((is_array($_tmp=$_SERVER['PHP_SELF'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<table class=vedit>
<tr>
    <th><b>Product</b></th>
    <td><select name=product_id size=1>
        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['products'],'selected' => $this->_tpl_vars['p']['product_id']), $this);?>

        </select>
    </td>
</tr>
<tr>
    <th><b>Subscription Begin</b></th>
    <td><?php echo smarty_function_html_select_date(array('prefix' => 'begin_date','time' => $this->_tpl_vars['p']['begin_date'],'start_year' => "-10",'end_year' => '2037'), $this);?>

    </td>
</tr>
<tr>
    <th><b>Subscription End</b></th>
    <td><?php echo smarty_function_html_select_date(array('prefix' => 'expire_date','time' => $this->_tpl_vars['p']['expire_date'],'start_year' => "-10",'end_year' => '2037'), $this);?>

    <?php if ($this->_tpl_vars['p']['expire_date'] == @constant('RECURRING_SQL_DATE')): ?>
    <br /><b>This date reserved to internally
    <br />represent end of recurring subscription
    <br />(that we does not known yet)</b>
    <?php endif; ?>
    
    </td>
</tr>
<tr>
    <th><b>Payment System</b></th>
    <td><select name=paysys_id size=1>
        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['paysystems'],'selected' => $this->_tpl_vars['p']['paysys_id']), $this);?>

    </select>
    </td>
</tr>
<tr>
    <th><b>Receipt #</b><br /><small>as received from payment system</small></th>
    <td><input type=text name=receipt_id value="<?php echo ((is_array($_tmp=$this->_tpl_vars['p']['receipt_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="25" class=small></td>
</tr>
<tr>
    <th><b>Amount, <?php echo ((is_array($_tmp=@$this->_tpl_vars['config']['currency'])) ? $this->_run_mod_handler('default', true, $_tmp, "$") : smarty_modifier_default($_tmp, "$")); ?>
</b></th>
    <td><input type=text name=amount value="<?php echo ((is_array($_tmp=$this->_tpl_vars['p']['amount'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="10" ></td>
</tr>
<tr>
    <th><b>Completed</b></th>
    <td><input type=checkbox name=completed value=1 <?php if ($this->_tpl_vars['p']['completed']): ?>checked<?php endif; ?>></td>
</tr>
<?php if (count($_from = (array)$this->_tpl_vars['payment_additional_fields'])):
    foreach ($_from as $this->_tpl_vars['f']):
?>
<?php if ($this->_tpl_vars['f']['type'] == 'select'): ?>
<tr>
    <th><b><?php echo $this->_tpl_vars['f']['title']; ?>
</b><br /><small><?php echo $this->_tpl_vars['f']['description']; ?>
</small></th>
    <?php $this->assign('field_name', $this->_tpl_vars['f']['name']); ?>
    <td><select name="<?php echo ((is_array($_tmp=$this->_tpl_vars['field_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size='<?php echo $this->_tpl_vars['f']['size']; ?>
'>
    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['f']['options'],'selected' => $this->_tpl_vars['p']['data'][$this->_tpl_vars['field_name']]), $this);?>

    </select></td>
</tr>
<?php elseif ($this->_tpl_vars['f']['type'] == 'readonly'): ?>
<tr>
    <th><b><?php echo $this->_tpl_vars['f']['title']; ?>
</b><br /><small><?php echo $this->_tpl_vars['f']['description']; ?>
</small></th>
    <?php $this->assign('field_name', $this->_tpl_vars['f']['name']); ?>
    <td><?php echo $this->_tpl_vars['p']['data'][$this->_tpl_vars['field_name']]; ?>
</td>
</tr>
<?php elseif ($this->_tpl_vars['f']['type'] == 'hidden'): ?>
<?php else: ?>
<tr>
    <th><b><?php echo $this->_tpl_vars['f']['title']; ?>
</b><br /><small><?php echo $this->_tpl_vars['f']['description']; ?>
</small></th>
    <?php $this->assign('field_name', $this->_tpl_vars['f']['name']); ?>
    <td><input type=text name=<?php echo $this->_tpl_vars['field_name']; ?>
 value="<?php echo ((is_array($_tmp=$this->_tpl_vars['p']['data'][$this->_tpl_vars['field_name']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
    </td>
</tr>
<?php endif; ?>
<?php endforeach; unset($_from); endif; ?>
</table>
<br />

    <input type=submit value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Save&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"></td>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type=button value="&nbsp;&nbsp;&nbsp;&nbsp;Back&nbsp;&nbsp;&nbsp;&nbsp;" onclick="history.back(-1)">
    <input type=hidden name=payment_id value="<?php echo $this->_tpl_vars['p']['payment_id']; ?>
">
    <input type=hidden name=member_id value="<?php echo ((is_array($_tmp=$this->_tpl_vars['member_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
    <input type=hidden name=action value=payment_save>
</form>

<?php if ($this->_tpl_vars['commissions']): ?>
<h3>Related Affiliate Commissions</h3>
<table class=hedit>
<tr>
    <th>Affiliate</th>
    <th>Date/Payment Ref#</th>
    <th>Commission</th>
    <th>Paid to affiliate?</td>
    <th>Void</td>
</tr>    
<?php if (count($_from = (array)$this->_tpl_vars['commissions'])):
    foreach ($_from as $this->_tpl_vars['c']):
?>
<tr>
<form method="get" action="<?php echo ((is_array($_tmp=$_SERVER['PHP_SELF'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
    <td><a href="users.php?action=edit&member_id=<?php echo $this->_tpl_vars['c']['caff_id']; ?>
"><?php echo $this->_tpl_vars['c']['email']; ?>
</a></td>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['c']['date'])) ? $this->_run_mod_handler('amember_date_format', true, $_tmp) : smarty_modifier_amember_date_format($_tmp)); ?>
 - <?php echo ((is_array($_tmp=@$this->_tpl_vars['c']['receipt_id'])) ? $this->_run_mod_handler('default', true, $_tmp, "&lt;empty&gt;") : smarty_modifier_default($_tmp, "&lt;empty&gt;")); ?>
</td>
    <td><?php echo $this->_tpl_vars['c']['amount']; ?>
</td>
    <td><?php if ($this->_tpl_vars['c']['payout_id']): ?>Yes, <?php echo ((is_array($_tmp=$this->_tpl_vars['c']['payout_id'])) ? $this->_run_mod_handler('amember_date_format', true, $_tmp) : smarty_modifier_amember_date_format($_tmp));  else: ?>No<?php endif; ?></td>
    <input type=hidden name=void value="-1">
    <td><input type=checkbox name=void value=1 <?php if ($this->_tpl_vars['c']['void_date']): ?>checked<?php endif; ?> onclick="this.form.submit()">
    <?php if ($this->_tpl_vars['c']['void_date']):  echo ((is_array($_tmp=$this->_tpl_vars['c']['void_date'])) ? $this->_run_mod_handler('amember_date_format', true, $_tmp) : smarty_modifier_amember_date_format($_tmp));  endif; ?>
    </td>
    <input type=hidden name=member_id value="<?php echo ((is_array($_tmp=$_REQUEST['member_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
    <input type=hidden name=payment_id value="<?php echo ((is_array($_tmp=$_REQUEST['payment_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
    <input type=hidden name=commission_id value="<?php echo ((is_array($_tmp=$this->_tpl_vars['c']['commission_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
    <input type=hidden name=void_id value="<?php echo ((is_array($_tmp=$this->_tpl_vars['c']['void_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
    <input type=hidden name=action value="edit_payment">
</form>
</tr>
<?php endforeach; unset($_from); endif; ?>
</table>
<?php endif; ?>

<?php if (count ( $this->_tpl_vars['p']['data']['0']['BASKET_PRODUCTS'] ) > 1): ?>
<font color=#0000a0><b>Several products has been selected during this 
order.<br /> This record is 'parent' for all that:</b></font>
<table bgcolor=#f0f0f0 style='font-size: 9pt; font-family: "MS Sans Serif", Helvetica;'>
<tr bgcolor=#e0e0e0>
    <th><b>Product</b></th>
    <th><b>Price</b></th>
</tr>
<?php echo smarty_function_counter(array('print' => false,'assign' => 'k','start' => 0), $this);?>

<?php if (count($_from = (array)$this->_tpl_vars['p']['data']['0']['BASKET_PRICES'])):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['pr']):
?>
<tr>
    <td><?php echo $this->_tpl_vars['i']; ?>
 - <?php echo $this->_tpl_vars['products'][$this->_tpl_vars['i']]; ?>
</td>
    <td align=right><?php echo ((is_array($_tmp=$this->_tpl_vars['pr'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
</td>
</tr>
<?php endforeach; unset($_from); endif; ?>
</table>
<?php endif; ?>
<?php if ($this->_tpl_vars['p']['data']['0']['ORIG_ID'] > 0): ?>
<font color=#0000a0>This record has been created during multiple order. 
View <a 
href="users.php?payment_id=<?php echo $this->_tpl_vars['p']['data']['0']['ORIG_ID']; ?>
&action=edit_payment&member_id=<?php echo $this->_tpl_vars['p']['member_id']; ?>
">original 
record</a>.<br /></font>
<?php endif; ?>    

<?php if ($this->_tpl_vars['p']['data']['0']): ?><br />
<b>DEBUG INFO: payment system actions</b>
<!-- display payment details (from payment systems --><?php endif; ?>
<?php if (count($_from = (array)$this->_tpl_vars['p']['data'])):
    foreach ($_from as $this->_tpl_vars['pp']):
 if (is_array ( $this->_tpl_vars['pp'] )): ?>
<table style='font-size: 8pt;' bgcolor=#e0e0e0>
    <?php if (count($_from = (array)$this->_tpl_vars['pp'])):
    foreach ($_from as $this->_tpl_vars['kkk'] => $this->_tpl_vars['ppp']):
?>
    <tr><th align=right><?php echo ((is_array($_tmp=$this->_tpl_vars['kkk'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&nbsp;</th><td>&nbsp;<?php if (is_array ( $this->_tpl_vars['ppp'] )):  if (count($_from = (array)$this->_tpl_vars['ppp'])):
    foreach ($_from as $this->_tpl_vars['kkkk'] => $this->_tpl_vars['pppp']):
 echo ((is_array($_tmp=$this->_tpl_vars['kkkk'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
=><?php echo ((is_array($_tmp=$this->_tpl_vars['pppp'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<br /><?php endforeach; unset($_from); endif;  else:  echo ((is_array($_tmp=$this->_tpl_vars['ppp'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?></td></tr>
    <?php endforeach; unset($_from); endif; ?>
</table>
<br /><br />
<?php endif;  endforeach; unset($_from); endif; ?>

<?php if ($this->_tpl_vars['p']['data']['CANCELLED']): ?>
<table style='font-size: 8pt;' bgcolor=#e0e0e0>
    <tr><th align=right><b>CANCELLED</b>&nbsp;</th><td>&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['p']['data']['CANCELLED_AT'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td></tr>
</table>
<br /><br />
<?php endif; ?>

<?php if ($this->_tpl_vars['p']['data']['orig_expire_date'] != ""): ?>
<table style='font-size: 8pt;' bgcolor=#e0e0e0>
    <tr><th align=right>This subscription has been prorated to the following number of days:
     <?php echo ((is_array($_tmp=$this->_tpl_vars['p']['data']['prorated'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<br />
     Original expiration date: <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['p']['data']['orig_expire_date'])) ? $this->_run_mod_handler('amember_date_format', true, $_tmp) : smarty_modifier_amember_date_format($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

     </td></tr>
</table>
<br /><br />
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>