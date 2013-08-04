<?php /* Smarty version 2.6.2, created on 2010-10-24 04:59:31
         compiled from admin/payments.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/payments.html', 13, false),array('modifier', 'date_format', 'admin/payments.html', 92, false),array('modifier', 'amember_date_format', 'admin/payments.html', 95, false),array('modifier', 'string_format', 'admin/payments.html', 131, false),array('function', 'html_select_date', 'admin/payments.html', 21, false),array('function', 'html_options', 'admin/payments.html', 38, false),array('function', 'span', 'admin/payments.html', 69, false),array('function', 'counter', 'admin/payments.html', 85, false),array('function', 'cycle', 'admin/payments.html', 90, false),array('function', 'math', 'admin/payments.html', 117, false),)), $this); ?>
<?php $this->assign('title', 'Payments'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!--<?php echo ' --><script language="JavaScript">
function sw1(frm, val){
    el = frm.elements[\'type\'];
    for (var i=0;i<el.length;i++){
        if (el[i].value == val) el[i].checked=true;
    }
}
</script><!--{literal} '; ?>
-->
<center>
<br /><h3><?php echo $this->_tpl_vars['title']; ?>
</h3>
<form action="<?php echo ((is_array($_tmp=$_SERVER['PHP_SELF'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<table class=hedit border=1 bordercolor=#909090>
<tr><th colspan=4 style='text-align: left'>
<input style='border: none;' type=radio name="type" value="date" <?php if ($_REQUEST['type'] != 'string'): ?>checked<?php endif; ?>> 
<b>Search by date</b></th></tr>
<tr>
    <td>From:</td>
    <td> 
      <?php echo smarty_function_html_select_date(array('time' => $this->_tpl_vars['beg_date'],'prefix' => 'beg_date','start_year' => -2,'all_extra' => "onclick=\"sw1(this.form, 'date')\"  onfocus=\"sw1(this.form, 'date')\""), $this);?>

    </td>
    <td>To:</td>
    <td>
      <?php echo smarty_function_html_select_date(array('time' => $this->_tpl_vars['end_date'],'prefix' => 'end_date','start_year' => -2,'all_extra' => "onclick=\"sw1(this.form, 'date')\" onfocus=\"sw1(this.form, 'date')\""), $this);?>

    </td>
</tr>
<tr><th colspan=4 style='text-align: left'>
<input style='border: none;' type=radio name="type" value="string" <?php if ($_REQUEST['type'] == 'string'): ?>checked<?php endif; ?>> 
<b>Search by string</td></tr>
<tr>
    <td>Search</td>
    <td colspan=2> 
        <input type=text onclick="return sw1(this.form, 'string')" onfocus="return sw1(this.form, 'string')" name=q value="<?php echo ((is_array($_tmp=$_REQUEST['q'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size=20 class=small>
    </td>
    <td>
        <select onclick="return sw1(this.form, 'search')" onfocus="return sw1(this.form, 'string')"  name=q_where size=1 class=small>
        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['q_where_options'],'selected' => $_REQUEST['q_where']), $this);?>

        </select>
    </td>
</tr>
<tr>
    <th colspan=4 style='text-align: center'>
    Display completed payments only
    <input type=checkbox name=only_completed value=1
    <?php if ($_REQUEST['only_completed']): ?>checked<?php endif; ?>
    onchange='this.form.submit()'> 
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    List payments by 
    <!--<?php echo ' --><script language="JavaScript">
        function list_by_change(elem){
            x = elem.options[ elem.selectedIndex ].value;
            frm = elem.form;
            if (x == "complete"){
                frm.elements[\'only_completed\'].checked = true;
            } else {
            }
        }
    </script><!--{literal} '; ?>
-->
    <select name=list_by size=1 class=small onchange='list_by_change(this); this.form.submit()'>     
    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['list_by_options'],'selected' => $_REQUEST['list_by']), $this);?>

    </select>     
     </td>
</tr>
</table>
<br />
<input type=submit value=Display>
</form>
<?php echo smarty_function_span(array(), $this);?>

<br /><br />
<table width=98% class=hedit border=1 bordercolor=#606060>
<tr>
    <th>#</th>
    <th><?php echo $this->_tpl_vars['list_by_title']; ?>
</th>
    <th>Member</th>
    <th>Product</th>
    <th>Period</th>
    <th>Payment System</th>
    <th>Receipt #</th>
    <th>Amount</th>
    <th>Paid</th>
    <th>Status</th>
    <th>&nbsp;</th>
</tr>
<?php echo smarty_function_counter(array('name' => 'count','start' => -1,'skip' => 1,'print' => false), $this);?>

<?php echo smarty_function_counter(array('name' => 'coupons_count','start' => -1,'skip' => 1,'print' => false), $this);?>

<?php $this->assign('amount', 0); ?>
<?php $this->assign('coupons_amount', 0); ?>
<?php if (count($_from = (array)$this->_tpl_vars['list'])):
    foreach ($_from as $this->_tpl_vars['p']):
?>
<tr class=<?php echo smarty_function_cycle(array('values' => "xx,odd"), $this);?>
>
    <td align=right><a href="users.php?action=edit_payment&member_id=<?php echo $this->_tpl_vars['p']['member_id']; ?>
&payment_id=<?php echo $this->_tpl_vars['p']['payment_id']; ?>
"><?php echo $this->_tpl_vars['p']['payment_id']; ?>
</a>&nbsp;</td>
    <td align=center><small><?php echo ((is_array($_tmp=$this->_tpl_vars['p'][$this->_tpl_vars['list_by_field']])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['config']['time_format']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['config']['time_format'])); ?>
</small></td>
    <td><a href="users.php?action=payments&member_id=<?php echo $this->_tpl_vars['p']['member_id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['p']['member_login'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></td>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['p']['product_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
    <td align=center><?php echo ((is_array($_tmp=$this->_tpl_vars['p']['begin_date'])) ? $this->_run_mod_handler('amember_date_format', true, $_tmp) : smarty_modifier_amember_date_format($_tmp)); ?>
 -
        <?php echo ((is_array($_tmp=$this->_tpl_vars['p']['expire_date'])) ? $this->_run_mod_handler('amember_date_format', true, $_tmp) : smarty_modifier_amember_date_format($_tmp)); ?>
</td>
    <td><?php echo $this->_tpl_vars['p']['paysys_id']; ?>
&nbsp;</td>
    <td><?php echo $this->_tpl_vars['p']['receipt_id']; ?>
&nbsp;</td>
    <td align=right><?php echo $this->_tpl_vars['p']['amount']; ?>
&nbsp;</td>
    <td><?php if ($this->_tpl_vars['p']['completed']): ?><b>YES</b><?php else: ?>NO<?php endif; ?></td>
    <td>
    <?php if ($this->_tpl_vars['p']['completed']): ?>
    <?php if ($this->_tpl_vars['p']['expire_date'] >= date ( 'Y-m-d' ) && $this->_tpl_vars['p']['begin_date'] <= date ( 'Y-m-d' )): ?>
    <b>Active</b>
    <?php elseif ($this->_tpl_vars['p']['expire_date'] < date ( 'Y-m-d' )): ?>
    <font color=red><b>Expired</b></font>
    <?php elseif ($this->_tpl_vars['p']['begin_date'] > date ( 'Y-m-d' )): ?>
    Future
    <?php endif; ?>
    <?php else: ?>
    Not-Paid
    <?php endif; ?>
    <?php if ($this->_tpl_vars['p']['data']['CANCELLED']): ?><br /><font color=red>CANCELLED</font><?php endif; ?>
    </td>
    <td><a href="users.php?action=edit_payment&payment_id=<?php echo $this->_tpl_vars['p']['payment_id']; ?>
&member_id=<?php echo $this->_tpl_vars['p']['member_id']; ?>
">Edit</a> 
    <a onclick="return confirm('Do you really want to delete this?')" href="users.php?action=del_payment&payment_id=<?php echo $this->_tpl_vars['p']['payment_id']; ?>
&member_id=<?php echo $this->_tpl_vars['p']['member_id']; ?>
">Del</a></td>
    <?php echo smarty_function_math(array('equation' => "a+y",'a' => $this->_tpl_vars['amount'],'y' => $this->_tpl_vars['p']['amount'],'assign' => 'amount'), $this);?>

    <?php if ($this->_tpl_vars['p']['coupon_id'] > 0):  echo smarty_function_math(array('equation' => "a+y",'a' => $this->_tpl_vars['coupons_amount'],'y' => $this->_tpl_vars['p']['amount'],'assign' => 'coupons_amount'), $this); endif; ?>
</tr>    
<?php echo smarty_function_counter(array('name' => 'count','print' => false), $this);?>

<?php if ($this->_tpl_vars['p']['coupon_id'] > 0):  echo smarty_function_counter(array('name' => 'coupons_count','print' => false), $this); endif; ?>
<?php endforeach; unset($_from); else: ?>
<tr>
    <td colspan=11 align=center><br /><b><font color=red>No payments found. 
    Try to select different criteria.</font></b><br /><br /></td>
</tr>    
<?php endif; ?>
<tr>
    <th colspan=6><?php echo smarty_function_counter(array('name' => 'count','skip' => 0), $this);?>
 displayed</th>
    <th style='text-align: right'>TOTAL</th>
    <th align=right><?php echo ((is_array($_tmp=$this->_tpl_vars['amount'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
</tr>    
<tr>
    <th colspan=6><?php echo smarty_function_counter(array('name' => 'coupons_count','skip' => 0), $this);?>
 displayed</th>
    <th style='text-align: right'>COUPONS TOTAL</th>
    <th align=right><?php echo ((is_array($_tmp=$this->_tpl_vars['coupons_amount'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
</tr>    
<?php if ($this->_tpl_vars['all_count'] > 20): ?>
<tr>
    <th colspan=6><?php echo $this->_tpl_vars['all_count']; ?>
 records found</th>
    <th style='text-align: right'> GRAND TOTAL</th>
    <th align=right><?php echo ((is_array($_tmp=$this->_tpl_vars['all_amount'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
</tr>    
<?php endif; ?>
</table>
<br />
<?php echo smarty_function_span(array(), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>