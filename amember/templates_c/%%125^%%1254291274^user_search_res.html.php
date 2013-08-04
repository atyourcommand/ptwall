<?php /* Smarty version 2.6.2, created on 2010-08-24 16:24:20
         compiled from admin/user_search_res.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'span', 'admin/user_search_res.html', 8, false),array('function', 'cycle', 'admin/user_search_res.html', 20, false),array('modifier', 'escape', 'admin/user_search_res.html', 22, false),array('modifier', 'default', 'admin/user_search_res.html', 24, false),)), $this); ?>
<?php $this->assign('title', 'Search Users'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<center>
<h3><?php echo $this->_tpl_vars['title']; ?>
 (<?php print intval($GLOBALS['all_count']) ?>)</h3>

<b>Search resuls. You may refine your search <a href="users.php?action=search_form">here</a></b>
<br /><br />
<?php echo smarty_function_span(array(), $this);?>

<br /><br />
<table width=80% class=hedit>
<tr>
    <th>Login</th>
    <th>Name</th>
    <th>Email</th>
    <th>Payments</th>
    <th>Status</th>
    <th width=5%><font color=606060>Actions</font></th>
</tr>
<?php if (count($_from = (array)$this->_tpl_vars['ul'])):
    foreach ($_from as $this->_tpl_vars['u']):
?>
<tr class=<?php echo smarty_function_cycle(array('values' => "xx,odd"), $this);?>
>
    <td> <a href="users.php?action=edit&member_id=<?php echo $this->_tpl_vars['u']['member_id']; ?>
"><b><?php echo $this->_tpl_vars['u']['login']; ?>
</b></a> </td>
    <td> <?php echo ((is_array($_tmp=$this->_tpl_vars['u']['name_f'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['u']['name_l'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 </td>
    <td> <a href="mailto: <?php echo ((is_array($_tmp=$this->_tpl_vars['u']['email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['u']['email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a> </td>
    <td> <a href="users.php?action=payments&member_id=<?php echo $this->_tpl_vars['u']['member_id']; ?>
" title="Edit or Add Subscriptions"><?php if ($this->_tpl_vars['u']['count_of_completed']):  echo $this->_tpl_vars['u']['count_of_completed']; ?>
 - <?php echo ((is_array($_tmp=@$this->_tpl_vars['config']['currency'])) ? $this->_run_mod_handler('default', true, $_tmp, "$") : smarty_modifier_default($_tmp, "$"));  echo $this->_tpl_vars['u']['summa_of_completed'];  else: ?>Never<?php endif; ?></a> </td>
    <td><?php if ($this->_tpl_vars['u']['data']['is_active']): ?>
    <b>Active</b>
    <?php elseif ($this->_tpl_vars['u']['count_of_completed'] > 0): ?>
    <font color=red><b>Expired</b></font>
    <?php else: ?>
    Pending
    <?php endif; ?>    
    </td>
    <td nowrap>
            <a href="users.php?action=edit&member_id=<?php echo $this->_tpl_vars['u']['member_id']; ?>
">Edit</a>
            <a href="users.php?action=delete&member_id=<?php echo $this->_tpl_vars['u']['member_id']; ?>
" onclick="return confirm('You want to delete user <?php echo ((is_array($_tmp=$this->_tpl_vars['u']['login'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
?')">Delete</a>
     </td>
</tr>
<?php endforeach; unset($_from); endif; ?>
</table>
<br />
<?php echo smarty_function_span(array(), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
