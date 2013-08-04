<?php /* Smarty version 2.6.2, created on 2010-09-08 20:18:43
         compiled from admin/newsletter_archive_form.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/newsletter_archive_form.html', 10, false),array('modifier', 'amember_date_format', 'admin/newsletter_archive_form.html', 52, false),array('function', 'html_options', 'admin/newsletter_archive_form.html', 28, false),)), $this); ?>
<?php if ($this->_tpl_vars['add']): ?>
<?php $this->assign('title', 'Add Newsletter'); ?>
<?php else: ?>
<?php $this->assign('title', 'Edit Newsletter'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/email_nb.inc.html", 'smarty_include_vars' => array('selected' => 'archive')));
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

<form method=post name=add_newsletter action="<?php echo ((is_array($_tmp=$_SERVER['PHP_SELF'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<table class="vedit">
<tr>
    <th><b>Subject</b></th>
    <td>
    <input type=text name=subject value="<?php echo ((is_array($_tmp=$this->_tpl_vars['vars']['subject'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size=41>  
    </td>
</tr>
<tr>
    <th>Newsletter threads</th>
    <td>
    <select name='threads[]' size=5 multiple>
    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['threads_list'],'selected' => $this->_tpl_vars['threads']), $this);?>

    </select>    
    </td>
</tr>
<tr>
    <th><b>Message</b></th>
    <td><textarea name=message cols=90 rows=30><?php echo ((is_array($_tmp=$this->_tpl_vars['vars']['message'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea></td>
</tr>
<tr>
    <td colspan="2" align="center">
    <input type=submit value="&nbsp;&nbsp;&nbsp;&nbsp;Save&nbsp;&nbsp;&nbsp;&nbsp;">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type=button value="&nbsp;&nbsp;&nbsp;&nbsp;Back&nbsp;&nbsp;&nbsp;&nbsp;" onclick="history.back(-1)">
    <input type=hidden name=action value=<?php if ($this->_tpl_vars['add']): ?>create<?php else: ?>update<?php endif; ?>>
    <input type=hidden name=archive_id value="<?php echo $this->_tpl_vars['archive_id']; ?>
">
    </td>
</tr>
<?php if ($this->_tpl_vars['a']): ?>
<tr><td colspan="2" align="left">
<h2 style='text-align:left; margin-left: 0px;'><?php echo $this->_tpl_vars['a']['subject']; ?>
</h2>
<?php if (! $this->_tpl_vars['a']['is_html']): ?><pre><?php endif;  echo $this->_tpl_vars['a']['message'];  if (! $this->_tpl_vars['a']['is_html']): ?></pre><?php endif; ?>
<div class="small"><?php echo ((is_array($_tmp=$this->_tpl_vars['a']['add_date'])) ? $this->_run_mod_handler('amember_date_format', true, $_tmp) : smarty_modifier_amember_date_format($_tmp)); ?>
</div>
</td></tr>
<?php endif; ?>
</table>
</form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
