<?php /* Smarty version 2.6.2, created on 2010-08-29 20:34:53
         compiled from admin/redirect.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/redirect.html', 3, false),)), $this); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"><html><head>
<title><?php echo $this->_tpl_vars['title']; ?>
</title>
<meta http-equiv="Refresh" CONTENT="1; URL=<?php echo ((is_array($_tmp=$this->_tpl_vars['url'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<?php if ($this->_tpl_vars['target_top']): ?>
<!--<?php echo ' --><script language="JavaScript">
<!--
if (self.location.href != top.location.href) {
    top.location.href = "';  echo ((is_array($_tmp=$this->_tpl_vars['url'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript'));  echo '";
}
// -->
</script><!--{literal} '; ?>
-->
<?php endif; ?>
</head>
<body>
<br /><br />
<table height="90%" width="70%" border="0" align="center"><tr valign="middle" align=center><td>
<b><?php echo $this->_tpl_vars['text']; ?>
</b><br />
<br />
<font size=1 face="Verdana"><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['url'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">Click here if you do not want to wait any longer (or if your browser does not automatically forward you).</a></font>


</td></tr></table>
</body></html>