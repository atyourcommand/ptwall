<?php /* Smarty version 2.6.2, created on 2010-08-29 20:34:19
         compiled from admin/email_preview.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'admin/email_preview.html', 12, false),array('modifier', 'escape', 'admin/email_preview.html', 35, false),)), $this); ?>
<?php $this->assign('title', "Email To Users: Preview"); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/email_nb.inc.html", 'smarty_include_vars' => array('selected' => 'email')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<center>

<br /><h3><?php echo $this->_tpl_vars['title']; ?>
</h3>

<i>Format - <?php if ($this->_tpl_vars['preview']['is_html']): ?>HTML<?php else: ?>Plain-text<?php endif; ?></i><br />
<i>This email will be sent to <?php echo $this->_tpl_vars['total_members']; ?>
 members</i><br />
<table bgcolor=#F0F0F0>
<tr>
<td><b>From:</b> <?php echo ((is_array($_tmp=@$this->_tpl_vars['config']['admin_email_from'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['config']['admin_email']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['config']['admin_email'])); ?>
<br />
<b>Subject:</b> <?php echo $this->_tpl_vars['preview']['subj']; ?>
<br />
<b>To:</b> <?php echo $this->_tpl_vars['preview']['to']; ?>
<br />
<?php if ($this->_tpl_vars['uploaded_files']): ?>
<small><b>Attachments:</b></small><br />
<?php if (count($_from = (array)$this->_tpl_vars['uploaded_files'])):
    foreach ($_from as $this->_tpl_vars['f']):
?>
<font color=red><small><?php echo $this->_tpl_vars['f']; ?>
</small></font><br />    
<?php endforeach; unset($_from); endif; ?>
<?php endif; ?>
<hr>
<br />
</td>
</tr><tr>
<td>
<?php if ($this->_tpl_vars['preview']['is_html']): ?>
    <?php echo $this->_tpl_vars['preview']['text']; ?>

<?php else: ?>
    <pre style='font-size: 9pt;'><?php echo $this->_tpl_vars['preview']['text']; ?>
</pre>
<?php endif; ?>
</td>
</tr>
</table>

<form method="post" action="<?php echo ((is_array($_tmp=$_SERVER['PHP_SELF'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<input type=hidden name=email_type value="<?php echo $this->_tpl_vars['vars']['email_type']; ?>
">
<input type=hidden name=subj value="<?php echo ((is_array($_tmp=$this->_tpl_vars['vars']['subj'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<input type=hidden name=text value="<?php echo ((is_array($_tmp=$this->_tpl_vars['vars']['text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<input type=hidden name=is_html value="<?php echo ((is_array($_tmp=$this->_tpl_vars['vars']['is_html'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<input type=hidden name=vars value="<?php echo ((is_array($_tmp=$this->_tpl_vars['svars'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<input type=hidden name=action value=send>
<br />
<input type=checkbox name=to_archive value=1 <?php if ($this->_tpl_vars['to_archive'] == 1): ?>checked<?php endif; ?>>Archive message
<input type=checkbox name=to_send value=1 <?php if ($this->_tpl_vars['to_send'] == 1): ?>checked<?php endif; ?>>Send message
<br /><br />
<input type=submit value="&nbsp;&nbsp;&nbsp;&nbsp;Send&nbsp;&nbsp;&nbsp;&nbsp;">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type=submit value="&nbsp;&nbsp;&nbsp;&nbsp;Back&nbsp;&nbsp;&nbsp;&nbsp;" name=back>
</form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
