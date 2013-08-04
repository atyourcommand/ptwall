<?php /* Smarty version 2.6.2, created on 2010-08-24 19:18:41
         compiled from admin/users.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/users.html', 4, false),array('modifier', 'default', 'admin/users.html', 25, false),array('function', 'span', 'admin/users.html', 8, false),array('function', 'cycle', 'admin/users.html', 21, false),array('function', 'html_options', 'admin/users.html', 54, false),)), $this); ?>
<?php $this->assign('title', 'Users List'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<center>
<br /><h3><?php echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 (<?php echo ((is_array($_tmp=$this->_tpl_vars['users_total'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
)</h3>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/users_az.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo smarty_function_span(array(), $this);?>

<br /><br />

<table width=80% class=hedit border=1 bordercolor=#909090>
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
"><b><?php echo ((is_array($_tmp=$this->_tpl_vars['u']['login'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</b></a> </td>
    <td> <?php echo ((is_array($_tmp=$this->_tpl_vars['u']['name_f'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['u']['name_l'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 </td>
    <td> <a href="mailto: <?php echo ((is_array($_tmp=$this->_tpl_vars['u']['email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['u']['email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a> </td>
    <td> <a href="users.php?action=payments&member_id=<?php echo ((is_array($_tmp=$this->_tpl_vars['u']['member_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" title="Edit or Add Subscriptions"><?php if ($this->_tpl_vars['u']['count_of_completed']):  echo $this->_tpl_vars['u']['count_of_completed']; ?>
 - <?php echo ((is_array($_tmp=@$this->_tpl_vars['config']['currency'])) ? $this->_run_mod_handler('default', true, $_tmp, "$") : smarty_modifier_default($_tmp, "$"));  echo $this->_tpl_vars['u']['summa_of_completed'];  else: ?>Never<?php endif; ?></a> </td>
    <td> <?php if ($this->_tpl_vars['u']['data']['is_active']): ?>
    <b>Active</b>
    <?php elseif ($this->_tpl_vars['u']['count_of_completed'] > 0): ?>
    <font color=red><b>Expired</b></font>
    <?php else: ?>
    Pending
    <?php endif; ?>
    </td>
    <td nowrap>
            <a href="users.php?action=edit&member_id=<?php echo ((is_array($_tmp=$this->_tpl_vars['u']['member_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">Edit</a>
            <a href="users.php?action=delete&member_id=<?php echo ((is_array($_tmp=$this->_tpl_vars['u']['member_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="return confirm('You want to delete user <?php echo ((is_array($_tmp=$this->_tpl_vars['u']['login'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
?')">Delete</a>
     </td>
</tr>
<?php endforeach; unset($_from); endif; ?>
</table>
<br />
<?php echo smarty_function_span(array(), $this);?>


<?php if ($this->_tpl_vars['status_options']): ?>
<form action="users.php">
<?php 
foreach ($_GET as $k=>$v){
    $k = htmlspecialchars($k);
    $v = htmlspecialchars($v);
    print "<input type=hidden name=\"$k\" value=\"$v\">\n";
}
 ?>
Filter: <select name=status size=1 onchange='this.form.submit()'>
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['status_options'],'selected' => $_REQUEST['status']), $this);?>

</select>
<input type=hidden name='start' value=0>
</form>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
