<?php /* Smarty version 2.6.2, created on 2011-02-16 20:18:35
         compiled from income_result.inc.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'income_result.inc.html', 12, false),)), $this); ?>
<br /><h3><?php echo $this->_tpl_vars['title']; ?>
</h3>

<center>

<table class=hedit>
<tr>
<?php if (count($_from = (array)$this->_tpl_vars['header'])):
    foreach ($_from as $this->_tpl_vars['i']):
?><th><?php echo $this->_tpl_vars['i']; ?>
</th>
<?php endforeach; unset($_from); endif; ?>
</tr>

<?php if (count($_from = (array)$this->_tpl_vars['report'])):
    foreach ($_from as $this->_tpl_vars['r']):
?>
<tr class=<?php echo smarty_function_cycle(array('values' => "xx,odd"), $this);?>
>
<?php if (count($_from = (array)$this->_tpl_vars['r'])):
    foreach ($_from as $this->_tpl_vars['i']):
?>
<td align=right><?php echo $this->_tpl_vars['i']; ?>
</td>
<?php endforeach; unset($_from); endif; ?>
</tr>
<?php endforeach; unset($_from); endif; ?>

<tr class=<?php echo smarty_function_cycle(array('values' => "xx,odd"), $this);?>
>
<?php if (count($_from = (array)$this->_tpl_vars['totals'])):
    foreach ($_from as $this->_tpl_vars['i']):
?>
<th align=right>&nbsp;<?php echo $this->_tpl_vars['i']; ?>
</th>
<?php endforeach; unset($_from); endif; ?>
</tr>


</table>

<br /><a href="report.php"><small>New Report</small></a>

</center>