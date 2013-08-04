<?php /* Smarty version 2.6.2, created on 2010-09-13 00:54:09
         compiled from admin/newsletter_guest_form.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/newsletter_guest_form.html', 10, false),array('function', 'html_options', 'admin/newsletter_guest_form.html', 32, false),)), $this); ?>
<?php if ($this->_tpl_vars['add']): ?>
<?php $this->assign('title', 'Add Newsletter Guest'); ?>
<?php else: ?>
<?php $this->assign('title', 'Edit Newsletter Guest'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/email_nb.inc.html", 'smarty_include_vars' => array('selected' => 'guests')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<center>

<br /><h3><?php echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h3>

<table><tr><td><?php if ($this->_tpl_vars['errors']):  if (count($_from = (array)$this->_tpl_vars['errors'])):
    foreach ($_from as $this->_tpl_vars['e']):
?>
<font color=red><li><b><?php echo ((is_array($_tmp=$this->_tpl_vars['e'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</b></font>
<?php endforeach; unset($_from); endif;  endif; ?></td></tr></table>

<form method=post name=add_newsletter_guest action="<?php echo ((is_array($_tmp=$_SERVER['PHP_SELF'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<table class=vedit>
<tr>
    <th><b>Name</b></th>
    <td>
    <input type=text name=guest_name value="<?php echo ((is_array($_tmp=$this->_tpl_vars['vars']['guest_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size=41>  
    </td>
</tr>
<tr>
    <th><b>Email</b></th>
    <td><input type=text name=guest_email value="<?php echo ((is_array($_tmp=$this->_tpl_vars['vars']['guest_email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size=41></td>
</tr>
<tr>
    <th>Subscriptions</th>
    <td>
    <select name='threads[]' size=5 multiple>
    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['threads_list'],'selected' => $this->_tpl_vars['threads']), $this);?>

    </select>    
    </td>
</tr>
</table>
<br />
<input type=submit value="&nbsp;&nbsp;&nbsp;&nbsp;Save&nbsp;&nbsp;&nbsp;&nbsp;">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type=button value="&nbsp;&nbsp;&nbsp;&nbsp;Back&nbsp;&nbsp;&nbsp;&nbsp;" onclick="history.back(-1)">
<input type=hidden name=action value=<?php if ($this->_tpl_vars['add']): ?>create<?php else: ?>update<?php endif; ?>>
<input type=hidden name=guest_id value="<?php echo ((is_array($_tmp=$this->_tpl_vars['guest_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<br />

</form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
