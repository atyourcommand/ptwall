<?php /* Smarty version 2.6.2, created on 2010-10-20 22:49:58
         compiled from agreement.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'agreement.html', 12, false),)), $this); ?>
<?php $this->assign('title', @constant('_TPL_AGREEMENT_TITLE')); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "error.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

#_TPL_AGREEMENT_REED_AGREE#<br />
<table style='background-color: #e0e0e0; width: 80%'><tr><td>
<pre><center>...Place your agreement text here...
...it is better to insert already formatted text here...
</center></pre>
</td></tr></table>

<form method="post" action="<?php echo ((is_array($_tmp=$_SERVER['PHP_SELF'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
    <strong>#_TPL_AGREEMENT_AGREE#</strong> 
    <input type="checkbox" name="i_agree" value="1" />

    <input type="submit" value="&nbsp;&nbsp;&nbsp;#_TPL_AGREEMENT_CONTINUE_BUT#&nbsp;&nbsp;&nbsp;" />
    <input type="hidden" name="do_agreement" value="1" />
    <input type="hidden" name="data" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
</form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>