<?php /* Smarty version 2.6.2, created on 2010-10-21 00:05:40
         compiled from changepass.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'changepass.html', 15, false),)), $this); ?>
<?php $this->assign('title', @constant('_TPL_CHANGEPASSWORD_TITLE')); ?>
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

<form name="changepass" method="post" action="sendpass.php">
<table class="vedit">

<tr>
    <th><b>#_TPL_CHANGEPASSWORD_USERNAME#</b></th>
    <td><strong><?php echo $this->_tpl_vars['login']; ?>
</strong></td>
</tr>

<tr>
    <th>#_TPL_CHANGEPASSWORD_CHPWD#</th>
    <td><input type="password" name="pass0" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['user']['pass0'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="15" maxlength="15" /></td>
</tr>

<tr>
    <th>#_TPL_CHANGEPASSWORD_CONFPWD#</th>
    <td><input type="password" name="pass1" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['user']['pass1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="15" maxlength="15" /></td>
</tr>
</table>

<br />
<input type="hidden" name="do_change" value="1" />
<input type="hidden" name="s" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['code'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<input type="submit" value="&nbsp;&nbsp;&nbsp;&nbsp;#_TPL_CHANGEPASSWORD_SAVEBUT#&nbsp;&nbsp;&nbsp;&nbsp;" />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" value="&nbsp;&nbsp;&nbsp;&nbsp;#_TPL_CHANGEPASSWORD_BACKBUT#&nbsp;&nbsp;&nbsp;&nbsp;" onclick="window.location.href='<?php echo $this->_tpl_vars['config']['root_url']; ?>
/member.php'" />
</form>

<br /><br />
<p class="powered">#_TPL_POWEREDBY|<a href="http://www.amember.com/">|</a>#</p>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>