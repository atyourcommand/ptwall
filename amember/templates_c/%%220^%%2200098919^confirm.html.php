<?php /* Smarty version 2.6.2, created on 2010-09-08 21:26:44
         compiled from admin/confirm.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/confirm.html', 7, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<center>
<br />
<h3><?php echo $this->_tpl_vars['title']; ?>
</h3>

<table width=60%><tr><td><b><?php echo $this->_tpl_vars['message']; ?>
</b></td></tr></table>
<form method="post" action="<?php echo ((is_array($_tmp=$_SERVER['PHP_SELF'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<?php if (count($_from = (array)$this->_tpl_vars['vars'])):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['i']):
?>
<input type=hidden name="<?php echo ((is_array($_tmp=$this->_tpl_vars['k'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['i'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<?php endforeach; unset($_from); endif; ?>
<table width=30%>
<tr>
<td align=left><input type=submit name=confirm value=" Yes "></td>
<td align=right><input type=submit name=confirm value=" No "></td>
</tr>
</table>

</form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
