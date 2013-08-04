<?php /* Smarty version 2.6.2, created on 2011-02-26 00:14:44
         compiled from admin/protect.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'admin/protect.html', 15, false),)), $this); ?>
<?php $this->assign('title', 'Protected Folders'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<center>
<br /><h3><?php echo $this->_tpl_vars['title']; ?>
</h3>

<table class=hedit width=95% border=1 bordercolor=#a0a0a0>
<tr>
    <th>Path</th>
    <th>URL</th>
    <th>Method</th>
    <th>Products allowed</th>
    <th width=5%><font color=606060>Actions</font></th>
</tr>
<?php if (count($_from = (array)$this->_tpl_vars['folders'])):
    foreach ($_from as $this->_tpl_vars['p']):
?>
<tr class=<?php echo smarty_function_cycle(array('values' => "xx,odd"), $this);?>
>
    <td> <?php echo $this->_tpl_vars['p']['path']; ?>
 </td>
    <td> <a href="<?php echo $this->_tpl_vars['p']['url']; ?>
" target=_blank><?php echo $this->_tpl_vars['p']['url']; ?>
</a> </td>
    <td> <?php echo $this->_tpl_vars['p']['method']; ?>
 </td>
    <td> <?php echo $this->_tpl_vars['p']['product_ids']; ?>
 </td>
    <td nowrap>
            <a href="protect.php?action=edit&folder_id=<?php echo $this->_tpl_vars['p']['folder_id']; ?>
">Edit</a>
            <a href="protect.php?action=delete&folder_id=<?php echo $this->_tpl_vars['p']['folder_id']; ?>
" onclick="return confirm('Are you sure you want to remove protection from folder?')">Delete</a>
     </td>
</tr>
<?php endforeach; unset($_from); else: ?>
<tr class=<?php echo smarty_function_cycle(array('values' => "xx,odd"), $this);?>
>
    <td bgcolor=white align=center colspan=5>
    -- No protected folders yet --
     </td>
</tr>
<?php endif; ?>
</table>
<br />
<a href="protect.php?action=add">Protect Another Folder</a>
<br />
<br /><br />

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>