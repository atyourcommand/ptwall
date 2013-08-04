<?php /* Smarty version 2.6.2, created on 2010-09-12 23:56:38
         compiled from admin/newsletter_thread_form.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/newsletter_thread_form.html', 11, false),array('function', 'html_options', 'admin/newsletter_thread_form.html', 37, false),)), $this); ?>
<?php if ($this->_tpl_vars['add']): ?>
<?php $this->assign('title', 'Add Newsletter Thread'); ?>
<?php else: ?>
<?php $this->assign('title', 'Edit Newsletter Thread'); ?>
<?php endif; ?>
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

<table><tr><td><?php if ($this->_tpl_vars['errors']):  if (count($_from = (array)$this->_tpl_vars['errors'])):
    foreach ($_from as $this->_tpl_vars['e']):
?>
<font color=red><li><b><?php echo ((is_array($_tmp=$this->_tpl_vars['e'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</b></font>
<?php endforeach; unset($_from); endif;  endif; ?></td></tr></table>

<form method=post name=add_newsletter_thread action="<?php echo ((is_array($_tmp=$_SERVER['PHP_SELF'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<table class=vedit>
<tr>
    <th><b>Title</b></th>
    <td>
    <input type=text name=thread_title value="<?php echo ((is_array($_tmp=$this->_tpl_vars['vars']['thread_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size=41>  
    </td>
</tr>
<tr>
    <th>Description</th>
    <td><textarea name=thread_description cols=40 rows=5><?php echo ((is_array($_tmp=$this->_tpl_vars['vars']['thread_description'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea></td>
</tr>
<tr>
    <th>Active</th>
    <td><input style='border: none;' type=checkbox name=is_active value=1 <?php if ($this->_tpl_vars['vars']['is_active'] || $this->_tpl_vars['add']): ?>checked<?php endif; ?>></td>
</tr>
<tr>
    <th><b>Available to</b></th>
    <td>
    <select name='available_to[]' size=5 multiple>
    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['available_to_list'],'selected' => $this->_tpl_vars['vars']['available_to']), $this);?>

    </select>    
    </td>
</tr>
<tr>
    <th>Automatically subscribe</th>
    <td>
    <select name='auto_subscribe[]' size=5 multiple>
    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['auto_subscribe_list'],'selected' => $this->_tpl_vars['vars']['auto_subscribe']), $this);?>

    </select>    
    </td>
</tr>
<?php if ($this->_tpl_vars['add']): ?>
<tr>
    <th>Subscribe existing members</th>
    <td><input style='border: none;' type=checkbox name=is_subscribe_members value=1 <?php if ($this->_tpl_vars['vars']['is_subscribe_members']): ?>checked<?php endif; ?>></td>
</tr>
<?php endif; ?>
</table>
<br />
<input type=submit value="&nbsp;&nbsp;&nbsp;&nbsp;Save&nbsp;&nbsp;&nbsp;&nbsp;">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type=button value="&nbsp;&nbsp;&nbsp;&nbsp;Back&nbsp;&nbsp;&nbsp;&nbsp;" onclick="history.back(-1)">
<input type=hidden name=action value=<?php if ($this->_tpl_vars['add']): ?>create<?php else: ?>update<?php endif; ?>>
<input type=hidden name=thread_id value="<?php echo ((is_array($_tmp=$this->_tpl_vars['thread_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<br />

</form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
