<?php /* Smarty version 2.6.2, created on 2010-09-12 23:57:59
         compiled from admin/newsletter_thread_saved.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/newsletter_thread_saved.html', 5, false),)), $this); ?>
<?php $this->assign('title', 'Information has been saved'); ?>
<?php $this->assign('text', 'Newsletter Thread Info Updated'); ?>
<html><head>
<title><?php echo $this->_tpl_vars['title']; ?>
</title>
<meta http-equiv="Refresh" CONTENT="3; URL=<?php echo ((is_array($_tmp=$this->_tpl_vars['link'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['config']['root_surl']; ?>
/templates/css/admin.css" />
</head>
<body bgcolor=white leftmargin=0 rightmargin=0 topmargin=0><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/email_nb.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<br /><br />

<?php if ($this->_tpl_vars['msg']): ?>
<?php echo $this->_tpl_vars['msg']; ?>

<br /><br />
<?php endif; ?>

<table height="25%" width="70%" border="0" align="center"><tr valign="middle" align=center><td>
<b><?php echo $this->_tpl_vars['text']; ?>
</b><br />
<br />
<font size=1 face="Verdana"><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['link'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">Click here if you do not
want to wait any longer (or if your browser does not automatically forward you).</a>  
</p>

</td></tr></table>
</body></html>

