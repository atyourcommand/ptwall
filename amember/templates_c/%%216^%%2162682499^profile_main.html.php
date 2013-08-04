<?php /* Smarty version 2.6.2, created on 2010-08-24 08:17:36
         compiled from profile_main.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'profile_main.html', 12, false),)), $this); ?>
<!-- display links to protected areas for customer -->
<div>
<p>This feature is not available right now.
</p>
</div>
<!--<div style="width:50%; float:left">
<h3>#_TPL_MEMBER_USEFUL_LINKS#</h3>
<ul>
<li><a href="<?php echo $this->_tpl_vars['config']['root_url']; ?>
/logout.php">#_TPL_MEMBER_LOGOUT#</a></li>
<li><a href="<?php echo $this->_tpl_vars['config']['root_url']; ?>
/profile.php">#_TPL_MEMBER_CH_PSWD#</a></li>
<?php if (count($_from = (array)$this->_tpl_vars['member_links'])):
    foreach ($_from as $this->_tpl_vars['u'] => $this->_tpl_vars['t']):
?>
<li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['u'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo $this->_tpl_vars['t']; ?>
</a></li>
<?php endforeach; unset($_from); endif; ?>
</ul>
</div>-->
<div style="clear:both"></div>