<?php /* Smarty version 2.6.2, created on 2010-08-24 16:24:39
         compiled from admin/user_payments.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'admin/user_payments.html', 58, false),array('modifier', 'amember_date_format', 'admin/user_payments.html', 79, false),array('modifier', 'escape', 'admin/user_payments.html', 99, false),array('function', 'cycle', 'admin/user_payments.html', 64, false),array('function', 'lookup', 'admin/user_payments.html', 69, false),array('function', 'html_options', 'admin/user_payments.html', 113, false),array('function', 'html_select_date', 'admin/user_payments.html', 116, false),)), $this); ?>
<?php $this->assign('title', "User Payments/Subscriptions"); ?>
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
<!-- JQuery Requered to handle expiration date change -->
<script type="text/javascript" src="<?php echo $this->_tpl_vars['config']['root_surl']; ?>
/includes/jquery/jquery.js?smarty"></script><!--<?php echo ' '; ?>
-->

<!--<?php echo ' --><script language="JavaScript">
    function recalculateExpire(){
        var pid = document.getElementById(\'pid\');
        var begin_day = document.getElementById(\'begin_day\');
        var begin_month = document.getElementById(\'begin_month\');
        var begin_year = document.getElementById(\'begin_year\');


        var data = {\'do\'            : \'get_expire\',
                \'product_id\'    : pid.options[pid.selectedIndex].value,
                \'begin_date\'   : begin_year.options[begin_year.selectedIndex].value+\'-\'+
                            begin_month.options[begin_month.selectedIndex].value+\'-\'+
                            begin_day.options[begin_day.selectedIndex].value
            }
    var resp = jQuery.ajax({
        url: "ajax_cnt.php",
        cache: false,
        type: "POST",
        dataType : "json",
        data: data,
        success :
        function (response,textStatus){
            var exp = response.expire_date.split(\'-\');
            var obj = {2:\'expire_day\', 1:\'expire_month\', 0:\'expire_year\'};
            for (i in obj){
                var v = document.getElementById(obj[i]);
                for(j=0;j<v.options.length;j++){
                    if(parseInt(v.options[j].value)==parseInt(exp[i])) v.selectedIndex = j;
                }

            }

        }
        });
    }
    $(document).ready(function () {
        recalculateExpire();
    });

</script><!--{literal} '; ?>
-->

<center>

<h3><?php echo $this->_tpl_vars['title']; ?>
</h3>

<table class=hedit width=95%>
<tr>    
    <th>Product</th>
    <th>Period</th>
    <th>Payment System</th>
    <th>Receipt #</th>
    <th>Amount, <?php echo ((is_array($_tmp=@$this->_tpl_vars['config']['currency'])) ? $this->_run_mod_handler('default', true, $_tmp, "$") : smarty_modifier_default($_tmp, "$")); ?>
</th>
    <th>Paid</th>
    <th>Status</th>
    <th>&nbsp;</th>
</tr>
<?php if (count($_from = (array)$this->_tpl_vars['payments'])):
    foreach ($_from as $this->_tpl_vars['p']):
?>
<tr class=<?php echo smarty_function_cycle(array('values' => "xx,odd"), $this);?>
>
    <td><?php if (( ! $this->_tpl_vars['p']['completed'] )): ?>
          <?php if (( $this->_tpl_vars['p']['items_count'] > 1 )): ?>
              <font color=#0000a0><?php echo $this->_tpl_vars['config']['multi_title']; ?>
 (<?php echo $this->_tpl_vars['p']['items_count']; ?>
 items)</font>
          <?php else: ?>
              <?php echo smarty_function_lookup(array('arr' => $this->_tpl_vars['products'],'key' => $this->_tpl_vars['p']['product_id']), $this);?>

          <?php endif; ?>
        <?php else: ?>           <?php if (( $this->_tpl_vars['p']['items_count'] > 1 )): ?>
              <font color=#0000a0><?php echo smarty_function_lookup(array('arr' => $this->_tpl_vars['products'],'key' => $this->_tpl_vars['p']['product_id']), $this);?>
</font>
          <?php else: ?>
              <?php echo smarty_function_lookup(array('arr' => $this->_tpl_vars['products'],'key' => $this->_tpl_vars['p']['product_id']), $this);?>

          <?php endif; ?>
        <?php endif; ?>
    </td>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['p']['begin_date'])) ? $this->_run_mod_handler('amember_date_format', true, $_tmp) : smarty_modifier_amember_date_format($_tmp)); ?>
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['p']['expire_date'])) ? $this->_run_mod_handler('amember_date_format', true, $_tmp, $this->_tpl_vars['config']['date_format']) : smarty_modifier_amember_date_format($_tmp, $this->_tpl_vars['config']['date_format'])); ?>

    </td>
    <td>
        <?php echo smarty_function_lookup(array('arr' => $this->_tpl_vars['paysystems'],'key' => $this->_tpl_vars['p']['paysys_id']), $this);?>

    </td>
    <td><?php echo $this->_tpl_vars['p']['receipt_id']; ?>
</td>
    <td><?php echo ((is_array($_tmp=@$this->_tpl_vars['config']['currency'])) ? $this->_run_mod_handler('default', true, $_tmp, "$") : smarty_modifier_default($_tmp, "$"));  echo $this->_tpl_vars['p']['amount']; ?>
</td>
    <td align=center><?php if ($this->_tpl_vars['p']['completed']): ?><b>YES</b><?php else: ?>NO<?php endif; ?></td>
    <td><?php if ($this->_tpl_vars['p']['completed']): ?>
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
    <?php if ($this->_tpl_vars['p']['restart_url']): ?><br /><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['p']['restart_url'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">ReStart Recurring</a><?php endif; ?>
    <?php if ($this->_tpl_vars['p']['cancel_url'] && $this->_tpl_vars['p']['completed']): ?><br /><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['p']['cancel_url'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">Stop Recurring</a><?php endif; ?>
    </td>
    <td nowrap><a href="users.php?action=edit_payment&payment_id=<?php echo $this->_tpl_vars['p']['payment_id']; ?>
&member_id=<?php echo $this->_tpl_vars['p']['member_id']; ?>
">Edit</a>
        <a href="users.php?action=del_payment&payment_id=<?php echo $this->_tpl_vars['p']['payment_id']; ?>
&member_id=<?php echo $this->_tpl_vars['p']['member_id']; ?>
" onclick="return confirm('Do you really want to delete this?')">Del</a>
    </td>
</tr>
<?php endforeach; unset($_from); endif; ?>
<tr>
    <th colspan=8 align=center style='border:black solid 0px; background-color: white;'><br /><b>ADD NEW PAYMENT/SUBSCRIPTION</b></th>
</tr>
<form method="post" action="<?php echo ((is_array($_tmp=$_SERVER['PHP_SELF'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<tr class=odd>
    <td><select class=small name=product_id size=1 id="pid" onChange='recalculateExpire();'>
        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['products']), $this);?>

        </select>
    </td>
    <td><nobr><?php echo smarty_function_html_select_date(array('all_extra' => "class=small onChange='recalculateExpire();'",'day_extra' => "id='begin_day'",'month_extra' => "id='begin_month'",'year_extra' => "id='begin_year'",'prefix' => 'begin_date','time' => "",'start_year' => "-10",'end_year' => '2037'), $this);?>
</nobr> -
        <nobr><?php echo smarty_function_html_select_date(array('all_extra' => "class=small",'day_extra' => "id='expire_day'",'month_extra' => "id='expire_month'",'year_extra' => "id='expire_year'",'prefix' => 'expire_date','time' => "",'start_year' => "-10",'end_year' => '2037'), $this);?>
</nobr>
    </td>
    <td>
    <select class=small name=paysys_id size=1>
        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['paysystems'],'selected' => 'manual'), $this);?>

    </select>
    </td>
    <td><input class=small type=text name=receipt_id value="manual" size=10 class=small></td>
    <td><input class=small type=text name=amount value="0" size=6 maxlength=6></td>
    <td align=center><input class=small type=checkbox name=completed value=1 checked></td>
    <td colspan=2 align=center><input class=small type=submit value="&nbsp;&nbsp;&nbsp;Add&nbsp;&nbsp;&nbsp;"></td>
    <input type=hidden name=payment_id value="">
    <input type=hidden name=member_id value="<?php echo ((is_array($_tmp=$this->_tpl_vars['member_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
    <input type=hidden name=action value=payment_add>
</tr>
</form>
</table>
<br />

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>