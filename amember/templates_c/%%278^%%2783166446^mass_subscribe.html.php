<?php /* Smarty version 2.6.2, created on 2011-03-01 17:29:16
         compiled from admin/mass_subscribe.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/mass_subscribe.html', 4, false),array('function', 'html_options', 'admin/mass_subscribe.html', 33, false),)), $this); ?>
<?php $this->assign('title', 'Mass Subscribe'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<center>
<br /><h3><?php echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h3>

<table width=70% bgcolor=#F0F0F0><tr><td>
<small>
This function allows you to mass subscribe members. It is useful,
for example, if you have created a new product and want to subscribe
all your current members to this product. There is a lot of settings
and this operation CANNOT be reversed. Make backup before using this
function.
</small>
</td><tr></table>
<br /><br />


<form method=post action="mass_subscribe.php#e">
<a name="e">&nbsp;</a>
<?php if ($this->_tpl_vars['error']): ?>
<table><tr><td>
<?php if (count($_from = (array)$this->_tpl_vars['error'])):
    foreach ($_from as $this->_tpl_vars['e']):
?>
<li><font color=red><b><?php echo ((is_array($_tmp=$this->_tpl_vars['e'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</b></font>
<?php endforeach; unset($_from); endif; ?>
</td></tr></table>
<?php endif; ?>

<table class=vedit>
<tr>
  <th><b>Select members to subscribe:</b><br />
  <small>hold Ctrl to select multiple records</small></th>
  <td><select name='select_from[]' size=7 multiple>
  <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['select_from_options'],'selected' => $_REQUEST['select_from']), $this);?>

  </select>
  </td>
</tr>

<tr>
  <th><b>Period assigment policy</b><br />
  <small>how should aMember assign subscription dates for <br />
  added subscriptions</small></th>
  <td><select name='assign_date' size=3>
  <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['assign_date_options'],'selected' => $_REQUEST['assign_date']), $this);?>

  </select>
  
  <br /><small>if you choosed "Fixed dates" in selection above,<br />
             please enter necessary dates (format <i>mm/dd/yyyy</i><br />
              or <i>dd-mm-yyyy</i>):<br />
  from: <input type=text name=period_begin size=10 maxlength=10 value="<?php echo ((is_array($_tmp=$_REQUEST['period_begin'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
  to: <input type=text name=period_end size=10 maxlength=10  value="<?php echo ((is_array($_tmp=$_REQUEST['period_end'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
  </td>
</tr>

<tr>
  <th><b>Product for new subscription</b><br />
  <small>user will get subscription to this product</small></th>
  <td><select name='product_id' size=1>
  <option value=''>*** Please choose a product ***
  <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['products'],'selected' => $_REQUEST['product_id']), $this);?>

  </select>
  
  </td>
</tr>

<tr>
  <th><b>Payment comment for new subscription</b><br />
  <small>you can label added subscriptions with some word,<br />
  it will be assigned to receipt # field,<br />
  so it will be easier to track it later.<br />
  This comment will be visible for member<br />
  Keep empty or enter "GRANT" if you are <br />
  not sure what to enter.
  </small></th>
  <td>
  <input type=text name=receipt_id value="<?php echo ((is_array($_tmp=$_REQUEST['receipt_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size=11 maxlength=10>
  </td>
</tr>

</table>
<br />
<input type=submit value="&nbsp;&nbsp;&nbsp;&nbsp;Continue&nbsp;&nbsp;&nbsp;&nbsp;">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type=button value="&nbsp;&nbsp;&nbsp;&nbsp;Back&nbsp;&nbsp;&nbsp;&nbsp;" onclick="history.back(-1)">
<input type=hidden name=action value=mass_subscribe_confirm>
</form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>