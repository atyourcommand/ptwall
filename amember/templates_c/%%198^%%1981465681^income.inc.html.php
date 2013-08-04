<?php /* Smarty version 2.6.2, created on 2011-02-16 20:18:25
         compiled from income.inc.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_select_date', 'income.inc.html', 19, false),array('function', 'html_options', 'income.inc.html', 35, false),)), $this); ?>
<br /><h3><?php echo $this->_tpl_vars['title']; ?>
</h3>

<center>
<form>
<table class=vedit align=center>

<tr>
  <th>
  Report Type
  </th><td>
  <b><?php echo $this->_tpl_vars['report_title']; ?>
</b> <a href="report.php?"><small>another report type</small></a>
  </td>
</tr>

<tr>
  <th>
  Start date
  </th><td>
  <?php echo smarty_function_html_select_date(array('time' => $this->_tpl_vars['beg_date'],'prefix' => 'beg_date','start_year' => "-5"), $this);?>

  </td>
</tr>

<tr>
  <th>
  End date
  </th><td>
  <?php echo smarty_function_html_select_date(array('time' => $this->_tpl_vars['end_date'],'prefix' => 'end_date','start_year' => "-5"), $this);?>

  </td>
</tr>

<tr>
  <th>
  Discretion
  </th><td> <select name=discretion size=1>
    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['discretion_options'],'selected' => $this->_tpl_vars['discretion']), $this);?>

  </select></td>
</tr>

</table>
<br />
<input class=small type=submit value="Proceed >">
<input type=hidden name=build value=1>
<input type=hidden name=report value=<?php echo $_REQUEST['report']; ?>
>
</form>


</center>