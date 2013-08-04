<?php /* Smarty version 2.6.2, created on 2010-08-24 16:24:15
         compiled from admin/user_search.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/user_search.html', 11, false),array('function', 'html_options', 'admin/user_search.html', 46, false),array('function', 'html_select_date', 'admin/user_search.html', 60, false),)), $this); ?>
<?php $this->assign('title', 'Search Users'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<center>
<br /><h3><?php echo $this->_tpl_vars['title']; ?>
</h3>

<?php if ($this->_tpl_vars['error']): ?>
<font color=red><b><?php echo $this->_tpl_vars['error']; ?>
</b></font>
<br /><br />
<?php endif; ?>

<form method="get" action="<?php echo ((is_array($_tmp=$_SERVER['PHP_SELF'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<table class=vedit>
    <tr>
        <th width=50%><b>Search String</b></th>
        <td><input type=text name=q value="<?php echo ((is_array($_tmp=$_REQUEST['q'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></td>
    </tr>
    <tr>
        <th><b>Search</b></th>
        <td><input style='border: none;' type=radio name=q_where value="anywhere" checked> 
        <b>Anywhere</b>
        <br /><input style='border: none;' type=radio name=q_where value="login"> By Login
        <br /><input style='border: none;' type=radio name=q_where value="name"> By Name
        <br /><input style='border: none;' type=radio name=q_where value="email"> By Email
        <?php if ($this->_tpl_vars['config']['use_address_info']): ?>
        <br /><input style='border: none;' type=radio name=q_where value="street"> By Street
        <br /><input style='border: none;' type=radio name=q_where value="city"> By City
        <br /><input style='border: none;' type=radio name=q_where value="state"> By State
        <br /><input style='border: none;' type=radio name=q_where value="country"> By Country
        <br /><input style='border: none;' type=radio name=q_where value="zip"> By ZIP code
        <?php endif; ?>
        <?php if (count($_from = (array)$this->_tpl_vars['member_fields'])):
    foreach ($_from as $this->_tpl_vars['n'] => $this->_tpl_vars['t']):
?>
        <br /><input style='border: none;' type=radio name=q_where value="additional:<?php echo $this->_tpl_vars['n']; ?>
"> By <?php echo $this->_tpl_vars['t']; ?>

        <?php endforeach; unset($_from); endif; ?>
    </td>
    </tr>
</table>
<input type=hidden name=action value=search_by_string>
<input type=submit value=Search>
</form>

<form method="get" action="<?php echo ((is_array($_tmp=$_SERVER['PHP_SELF'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<table class=vedit>
    <tr>
        <th width=50%><b>Search by Subscriptions</b></th>
        <td> <select name=product_id size=1>
    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['products'],'selected' => $_REQUEST['product_id']), $this);?>

    </select>
    <br /><input type=checkbox name=include_expired value=1>Include Expired
    </td>
    </tr>
</table>
<input type=hidden name=action value=search_by_product>
<input type=submit value=Search>
</form>

<form method="get" action="<?php echo ((is_array($_tmp=$_SERVER['PHP_SELF'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<table class=vedit>
    <tr>
        <th width=50%><b>Search by Date</b></th>
        <td><?php echo smarty_function_html_select_date(array('prefix' => 'date','start_year' => "-10",'end_year' => '2037'), $this);?>
</td>
    </tr>
    <tr>
        <th width=50%><b>Search Type</b></th>
        <td><select name=search_type size=1>
            <option value=begin_date_before>Subscribed before specified date
            <option value=begin_date>Subscribed exactly on specified date        
            <option value=begin_date_after>Subscribed after specified date        
            <option value=expire_date_before>Subscription expires before specified date
            <option value=expire_date>Subscription expires on specified date        
            <option value=expire_date_after>Subscription expires after specified date        
        </select>
        </td>
    </tr>
</table>
<input type=hidden name=action value=search_by_date>
<input type=submit value=Search>
</form>

<form method="get" action="<?php echo ((is_array($_tmp=$_SERVER['PHP_SELF'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<input type=hidden name=action value=search_locked>
<input type=submit value="Show all locked accounts (locked by password sharing prevention system)">
</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
