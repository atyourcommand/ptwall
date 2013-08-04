<?php /* Smarty version 2.6.2, created on 2010-09-12 23:56:28
         compiled from admin/newsletter_threads.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/newsletter_threads.html', 5, false),array('function', 'span', 'admin/newsletter_threads.html', 7, false),array('function', 'cycle', 'admin/newsletter_threads.html', 19, false),)), $this); ?>
<?php $this->assign('title', 'Newsletter Threads'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/email_nb.inc.html", 'smarty_include_vars' => array('selected' => 'threads')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<center>
<br /><h3><?php echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h3>

<?php echo smarty_function_span(array(), $this);?>

<br /><br />

<table width=80% class=hedit border=1 bordercolor=#909090>
<tr>
    <th>Title</th>
    <th>Description</th>
    <th>Active</th>
    <th>View Subscribers</th>
    <th width=5%><font color=606060>Actions</font></th>
</tr>
<?php if (count($_from = (array)$this->_tpl_vars['tl'])):
    foreach ($_from as $this->_tpl_vars['t']):
?>
<tr class=<?php echo smarty_function_cycle(array('values' => "xx,odd"), $this);?>
>
    <td> <a href="newsletter_threads.php?action=edit&thread_id=<?php echo $this->_tpl_vars['t']['thread_id']; ?>
"><b><?php echo ((is_array($_tmp=$this->_tpl_vars['t']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</b></a> </td>
    <td> <?php echo ((is_array($_tmp=$this->_tpl_vars['t']['description'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 </td>
    <td align=center> <?php if ($this->_tpl_vars['t']['is_active']): ?>Yes<?php else: ?>No<?php endif; ?> </td>
    <td align=center> <?php echo $this->_tpl_vars['t']['subscribers']; ?>
 </td>
    <td nowrap>
            <a href="newsletter_threads.php?action=edit&thread_id=<?php echo ((is_array($_tmp=$this->_tpl_vars['t']['thread_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">Edit</a>
            <a href="newsletter_threads.php?action=delete&thread_id=<?php echo ((is_array($_tmp=$this->_tpl_vars['t']['thread_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="return confirm('You want to delete thread <?php echo ((is_array($_tmp=$this->_tpl_vars['t']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
?')">Delete</a>
     </td>
</tr>
<?php endforeach; unset($_from); endif; ?>
</table>
<br />
<?php echo smarty_function_span(array(), $this);?>

<br />
<a href="newsletter_threads.php?action=new">Add Newsletter Thread</a>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
