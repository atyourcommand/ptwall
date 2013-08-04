<?php /* Smarty version 2.6.2, created on 2011-02-26 02:23:11
         compiled from admin/admins.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/admins.html', 21, false),)), $this); ?>
<?php $this->assign('title', 'Admin accounts'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<center>
<h3><?php echo $this->_tpl_vars['title']; ?>
</h3>

<?php if ($this->_tpl_vars['error']): ?>
<font color=red><b><?php echo $this->_tpl_vars['error']; ?>
</b></font>
<br /><br />
<?php endif; ?>

<table class=hedit width=70%>
<tr>
    <th>Admin</th>
    <th>E-Mail</th>
    <th>Last login</th>
    <th width=5%>Superuser</th>
    <th width=5%>&nbsp;</th>
</tr>
<?php if (count($_from = (array)$this->_tpl_vars['list'])):
    foreach ($_from as $this->_tpl_vars['r']):
?>
<tr>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['r']['login'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['r']['email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
    <td><?php if ($this->_tpl_vars['r']['last_login']):  echo ((is_array($_tmp=$this->_tpl_vars['r']['last_login'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 / <?php echo ((is_array($_tmp=$this->_tpl_vars['r']['last_ip'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?></td>
    <td><?php if ($this->_tpl_vars['r']['super_user']): ?><b>Yes</b><?php else: ?>No<?php endif; ?></td>
    <td><nobr>
    <a href="admins.php?action=edit&admin_id=<?php echo $this->_tpl_vars['r']['admin_id']; ?>
">Edit</a>
    / 
    <a href="admins.php?action=delete&admin_id=<?php echo $this->_tpl_vars['r']['admin_id']; ?>
" onclick="return confirm('Are you sure?')">Delete</a>
    </nobr></td>
<?php endforeach; unset($_from); endif; ?>
</table>

<br />
<a href="admins.php?action=add">Add admin</a>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
