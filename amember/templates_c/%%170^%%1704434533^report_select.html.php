<?php /* Smarty version 2.6.2, created on 2011-02-10 21:09:42
         compiled from admin/report_select.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/report_select.html', 6, false),array('function', 'html_options', 'admin/report_select.html', 13, false),)), $this); ?>
<?php $this->assign('title', 'Choose Report Type'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<br /><h3><?php echo $this->_tpl_vars['title']; ?>
</h3>

<center>
<form action="<?php echo ((is_array($_tmp=$_SERVER['PHP_SELF'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<table class=vedit align=center>
<tr>
<th>
Please choose a report:
</th><td>
<select name=report size=5>
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['reports'],'selected' => $_REQUEST['report']), $this);?>

</select>
</td>
</tr>
</table>
<br />
<input class=small type=submit value="Proceed >">
</form>


</center>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
