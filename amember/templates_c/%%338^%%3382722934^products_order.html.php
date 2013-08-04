<?php /* Smarty version 2.6.2, created on 2010-11-06 16:46:30
         compiled from admin/products_order.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'admin/products_order.html', 16, false),array('modifier', 'escape', 'admin/products_order.html', 19, false),)), $this); ?>
<?php $this->assign('title', "Products/Subscriptions Types List"); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<center>
<br /><h3><?php echo $this->_tpl_vars['title']; ?>
</h3>

<form action="products.php" method=post>
<table class=hedit border=1 bordercolor=#a0a0a0>
<tr>
    <th>Product #</th>
    <th>Title</th>
    <th>Sort</th>
    <th>Price Group</th>
    <th>Renewal Group</th>
</tr>
<?php if (count($_from = (array)$this->_tpl_vars['pl'])):
    foreach ($_from as $this->_tpl_vars['p']):
?>
<tr class=<?php echo smarty_function_cycle(array('values' => "xx,odd"), $this);?>
>
    <td> <b><?php echo $this->_tpl_vars['p']['product_id']; ?>
</b></td>
    <td>&nbsp;&nbsp; <?php echo $this->_tpl_vars['p']['title']; ?>
 &nbsp;&nbsp;</td>
    <td align=center> <input type=text class=small name="order-<?php echo $this->_tpl_vars['p']['product_id']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['p']['order'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size=5> </td>
    <td align=center> <input type=text class=small name="price_group-<?php echo $this->_tpl_vars['p']['product_id']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['p']['price_group'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size=5> </td>
    <td align=center> <input type=text class=small name="renewal_group-<?php echo $this->_tpl_vars['p']['product_id']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['p']['renewal_group'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size=5> </td>
</tr>
<?php endforeach; unset($_from); endif; ?>
</table>
<input type=submit value="Save changes">
<input type=hidden name=action value=reorder_save>
</form>
<br />
<a href="products.php?">Return to product list</a>
<br />
<br />
<table width=40%><tr><td>
<b>Sorting order</b> - this is a numeric field. Products will be sorted according to this number, then alphabetically<br />
<br />
<b>Price Group ID</b> -
this is a numeric field. 
Products with a <b>negative</b> price_group will not be displayed on the default Signup page.<br />
You can link to an alternate Signup page like this <i>signup.php?price_group=-1</i>
to display products ONLY from Price Group -1.<br />
<br />
<b>Renewal Group</b> - Value in this field defines how aMember will calculate
subscription start date when user renews his membership.
If user has subscription to a product WITH THE SAME renewal
group already, aMember will use expiration date of previous
subscription as start date for new subscription. If user hasn't
such subscriptions, aMember will use current date as start date.
Basically, products which grants the same level of access must
have the same Renewal Group value. Example of this value : "BASIC".
If this field has negative numeric value, it will always set subscription
start date to current date, allowing member to have several subscriptions
to the same product.

</td></tr></table>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
