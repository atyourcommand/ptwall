<?php /* Smarty version 2.6.2, created on 2010-10-05 06:36:53
         compiled from newsletter_guests.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'newsletter_guests.html', 5, false),)), $this); ?>
<?php $this->assign('title', "#_TPL_NEWSLETTER_SUBSCRIPTIONS#"); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "error.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<form method="post" name="newsletter" id="newsletter" action="<?php echo ((is_array($_tmp=$_SERVER['PHP_SELF'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" >
<table class="vedit">
<tr><th>#_TPL_NEWSLETTER_SUBSCRIBE_TO_NEWSLETTERS#</th>
<td>
<?php if (count($_from = (array)$this->_tpl_vars['threads_list'])):
    foreach ($_from as $this->_tpl_vars['tr']):
?>
<?php if ($this->_tpl_vars['tr']['is_active']): ?>
<input type="checkbox" name="tr[]" value="<?php echo $this->_tpl_vars['tr']['thread_id']; ?>
" 
<?php if ($this->_tpl_vars['threads'][$this->_tpl_vars['tr']['thread_id']] == '1'): ?>checked="checked"<?php endif; ?> />
<strong><?php echo $this->_tpl_vars['tr']['title']; ?>
</strong> <div class="small"><?php echo $this->_tpl_vars['tr']['description']; ?>
</div>
<br />
<?php endif; ?>
<?php endforeach; unset($_from); endif; ?>
</td></tr>
<tr>
    <th>#_TPL_NEWSLETTER_NAME#</th>
    <td>
    <input type="text" name="n" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['vars']['n'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="40" />  
    </td>
</tr>
<tr>
    <th>#_TPL_NEWSLETTER_EMAIL#</th>
    <td><input type="text" name="e" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['vars']['e'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="40" /></td>
</tr>
</table>
<br />
<input type="hidden" name="a" value="add_guest" />
<input type="submit" value="&nbsp;&nbsp;&nbsp;#_TPL_NEWSLETTER_DO_SUBSCRIBE#&nbsp;&nbsp;&nbsp;" />
</form>


<script type="text/javascript" src="<?php echo $this->_tpl_vars['config']['root_surl']; ?>
/includes/jquery/jquery.js?smarty"></script><!--<?php echo ' '; ?>
-->
<script type="text/javascript" src="<?php echo $this->_tpl_vars['config']['root_surl']; ?>
/includes/jquery/jquery.select.js?smarty"></script><!--<?php echo ' '; ?>
-->
<script type="text/javascript" src="<?php echo $this->_tpl_vars['config']['root_surl']; ?>
/includes/jquery/jquery.metadata.min.js?smarty"></script><!--<?php echo ' '; ?>
-->
<script type="text/javascript" src="<?php echo $this->_tpl_vars['config']['root_surl']; ?>
/includes/jquery/jquery.validate.pack.js?smarty"></script><!--<?php echo ' '; ?>
-->

<!--<?php echo ' --><script type="text/javascript">
$(document).ready(function(){
    $("#signup").validate({
    rules: {
    	e: "required",
    	n: "required",
	},
  	errorPlacement: function(error, element) {
		error.appendTo( element.parent());
	}
    });
});
</script><!--{literal} '; ?>
-->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
