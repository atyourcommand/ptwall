<?php /* Smarty version 2.6.2, created on 2010-08-24 08:07:55
         compiled from member_add_renew.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'member_add_renew.html', 11, false),array('function', 'html_options', 'member_add_renew.html', 45, false),)), $this); ?>
<h3>#_TPL_MEMBER_ADD_RENEW#</h3>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "error.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<form id="payment" name="payment" method="post" action="member.php?tab=add_renew">
<table class="vedit" width="100%">

<!-- product selection code -->
<tr><th>#_TPL_SIGNUP_MEMB_TYPE# *</th><td>
<?php if ($this->_tpl_vars['config']['member_select_multiple_products']): ?>
    <?php if (count($_from = (array)$this->_tpl_vars['products_to_renew'])):
    foreach ($_from as $this->_tpl_vars['p']):
?>
    <input type="checkbox" id="product<?php echo $this->_tpl_vars['p']['product_id']; ?>
" name="product_id[]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['p']['product_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"
        <?php if (in_array ( $this->_tpl_vars['p']['product_id'] , ( array ) $_REQUEST['product_id'] )): ?>checked="checked"<?php endif; ?>
        />
        <label for="product<?php echo $this->_tpl_vars['p']['product_id']; ?>
"><b><?php echo $this->_tpl_vars['p']['title']; ?>
 (<?php echo $this->_tpl_vars['p']['terms']; ?>
)</b><br />
        <span class="small"><?php echo $this->_tpl_vars['p']['description']; ?>
</span></label><br /><br />
    <?php if ($this->_tpl_vars['p']['price'] <= 0.0): ?>
    <?php $this->assign('paysys_id_not_required', '1'); ?>
    <?php endif; ?>
    <?php endforeach; unset($_from); endif; ?>
<?php else: ?>
<select name="product_id" size="1">
    <option value="">#_TPL_MEMBER_SELECT#</option>
<?php if (count($_from = (array)$this->_tpl_vars['products_to_renew'])):
    foreach ($_from as $this->_tpl_vars['p']):
?>
    <option value="<?php echo $this->_tpl_vars['p']['product_id']; ?>
"
    <?php if ($this->_tpl_vars['p']['product_id'] == $_REQUEST['product_id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['p']['title']; ?>
 (<?php echo $this->_tpl_vars['p']['terms']; ?>
)
    </option>
    <?php if ($this->_tpl_vars['p']['price'] <= 0.0): ?>
    <?php $this->assign('paysys_id_not_required', '1'); ?>
    <?php endif; ?>
<?php endforeach; unset($_from); endif; ?>
</select>
<?php endif; ?>
<?php if ($this->_tpl_vars['paysys_id_not_required']): ?>
      <input type="hidden" name="paysys_id_not_required" value="for javascript" />
<?php endif; ?>
</td></tr>

<!-- paysystem selection code -->
<?php if ($this->_tpl_vars['config']['product_paysystem']):  else: ?>
<?php if (count ( $this->_tpl_vars['paysystems_select'] ) > 1): ?>
<tr>
    <th>#_TPL_SIGNUP_PAYSYS# *</th>
    <td><select name="paysys_id" size="1">
    <option value=''>#_TPL_MEMBER_SELECT2#</option>
    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['paysystems_select'],'selected' => $_REQUEST['paysys_id']), $this);?>

</select></td></tr>
<?php else: ?>
<?php if (count($_from = (array)$this->_tpl_vars['paysystems_select'])):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['p']):
?>
    <input type="hidden" name="paysys_id" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['i'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<?php endforeach; unset($_from); endif; ?>
<?php endif; ?>
<?php endif; ?>

<!-- coupon text box -->
<?php if ($this->_tpl_vars['config']['use_coupons']): ?>
<tr>
    <th><b>#_TPL_SIGNUP_COUPON_CODE#</b></th>
<td>
<input type="text" name="coupon" value="<?php echo ((is_array($_tmp=$_REQUEST['coupon'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="15" />
</td></tr>
<?php endif; ?>
</table><!-- end of add/renew subscription controls -->
<input type="hidden" name="action" value="renew" />
<br /><div style="text-align: center;"><input type="submit" value="&nbsp;&nbsp;&nbsp;#_TPL_MEMBER_ORDER_BUT#&nbsp;&nbsp;&nbsp;" /></div>
</form>