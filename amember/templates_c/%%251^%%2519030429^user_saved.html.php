<?php /* Smarty version 2.6.2, created on 2010-08-24 16:24:55
         compiled from admin/user_saved.html */ ?>
<?php $this->assign('title', 'Information has been saved'); ?>
<?php $this->assign('text', 'Member Info Updated'); ?>
<html><head>
<title><?php echo $this->_tpl_vars['title']; ?>
</title>
<meta http-equiv="Refresh" CONTENT="3; URL=<?php echo $this->_tpl_vars['link']; ?>
">
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['config']['root_surl']; ?>
/templates/css/admin.css" />
</head>
<body bgcolor=white leftmargin=0 rightmargin=0 topmargin=0><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/user_nb.inc.html", 'smarty_include_vars' => array()));
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
<font size=1 face="Verdana"><a href="<?php echo $this->_tpl_vars['link']; ?>
">Click here if you do not
want to wait any longer (or if your browser does not automatically forward you).</a>  
</p>

</td></tr></table>
</body></html>

