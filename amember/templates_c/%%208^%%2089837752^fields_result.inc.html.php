<?php /* Smarty version 2.6.2, created on 2011-02-10 21:09:55
         compiled from fields_result.inc.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'fields_result.inc.html', 17, false),)), $this); ?>
<br /><h3><?php echo $this->_tpl_vars['title']; ?>
</h3>

<center>


<?php if (count($_from = (array)$this->_tpl_vars['report'])):
    foreach ($_from as $this->_tpl_vars['field'] => $this->_tpl_vars['rep']):
?>
<h3><?php echo $this->_tpl_vars['field']; ?>
</h3>

<table class=hedit>
<tr>
    <th>Value</th>
    <th>Count</th>
    <th>Percentage</th>
</tr>

<?php if (count($_from = (array)$this->_tpl_vars['rep'])):
    foreach ($_from as $this->_tpl_vars['v'] => $this->_tpl_vars['i']):
?>
<tr class=<?php echo smarty_function_cycle(array('values' => "xx,odd"), $this);?>
>
<td align=right><?php echo $this->_tpl_vars['v']; ?>
</td>
<td align=right><?php echo $this->_tpl_vars['i']['count']; ?>
</td>
<td align=right><?php echo $this->_tpl_vars['i']['percent']; ?>
</td>
</tr>
<?php endforeach; unset($_from); endif; ?>

</table>
<?php endforeach; unset($_from); endif; ?>

<br /><a href="report.php"><small>New Report</small></a>

</center>