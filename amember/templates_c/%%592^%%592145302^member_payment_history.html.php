<?php /* Smarty version 2.6.2, created on 2011-02-28 06:44:40
         compiled from member_payment_history.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lookup', 'member_payment_history.html', 12, false),array('modifier', 'amember_date_format', 'member_payment_history.html', 17, false),array('modifier', 'default', 'member_payment_history.html', 27, false),)), $this); ?>
<h3>#_TPL_MEMBER_PYMNT_HIST#</h3>
<table class="hedit" width="100%">
<tr>
    <th>#_TPL_MEMBER_PRODUCT#</th>
    <th colspan="2">#_TPL_MEMBER_PERIOD#</th>
    <th>#_TPL_MEMBER_PAYSYS#</th>
    <th>#_TPL_MEMBER_AMOUNT#</th>
    <?php if ($this->_tpl_vars['config']['send_pdf_invoice']): ?><th>#_TPL_MEMBER_PDF_INVOICE#</th><?php endif; ?>
</tr>
<?php if (count($_from = (array)$this->_tpl_vars['payments'])):
    foreach ($_from as $this->_tpl_vars['p']):
?>
<tr <?php if ($this->_tpl_vars['p']['is_active']): ?>style='font-weight: bold;'<?php endif; ?>>
    <td><?php echo smarty_function_lookup(array('arr' => $this->_tpl_vars['products'],'key' => $this->_tpl_vars['p']['product_id']), $this);?>

    <?php if ($this->_tpl_vars['p']['data']['CANCELLED']): ?><br /><div class="small" style="font-color: red; font-weight: bold;">#_TPL_MEMBER_CANCELLED#</div>
    <?php elseif ($this->_tpl_vars['p']['cancel_url']): ?><br /><a href="<?php echo $this->_tpl_vars['p']['cancel_url']; ?>
" target=top onclick="return confirm('#_TPL_MEMBER_CANCEL_SUBSCR#')">#_TPL_MEMBER_CANCEL#</a>
    <?php endif; ?>
    </td>
    <td nowrap="nowrap"><?php echo ((is_array($_tmp=$this->_tpl_vars['p']['begin_date'])) ? $this->_run_mod_handler('amember_date_format', true, $_tmp) : smarty_modifier_amember_date_format($_tmp)); ?>
</td>
    <td nowrap="nowrap"><?php if ($this->_tpl_vars['p']['expire_date'] == "2012-12-31"): ?> - <?php else: ?>
         <?php echo ((is_array($_tmp=$this->_tpl_vars['p']['expire_date'])) ? $this->_run_mod_handler('amember_date_format', true, $_tmp) : smarty_modifier_amember_date_format($_tmp));  endif; ?></td>
    <td>
        <?php if ($this->_tpl_vars['p']['paysys_id'] == 'manual'): ?>
            #_PLUG_PAY_MANUAL_TITLE#
        <?php else: ?>
            <?php echo smarty_function_lookup(array('arr' => $this->_tpl_vars['paysystems'],'key' => $this->_tpl_vars['p']['paysys_id']), $this);?>

        <?php endif; ?>
    </td>
    <td style="text-align: right"><?php echo ((is_array($_tmp=@$this->_tpl_vars['config']['currency'])) ? $this->_run_mod_handler('default', true, $_tmp, "$") : smarty_modifier_default($_tmp, "$"));  echo $this->_tpl_vars['p']['amount']; ?>
&nbsp;</td>
<?php if ($this->_tpl_vars['config']['send_pdf_invoice']): ?><td style="text-align: center">
<?php if (true || ! ( ( $this->_tpl_vars['config']['member_select_multiple_products'] || $this->_tpl_vars['config']['select_multiple_products'] ) && $this->_tpl_vars['p']['data']['0']['ORIG_ID'] )): ?><a href="member.php?action=get_invoice&amp;id=<?php echo $this->_tpl_vars['p']['payment_id']; ?>
">#_TPL_MEMBER_INVOICE#</a><?php else: ?>&nbsp;<?php endif; ?>
</td><?php endif; ?>

</tr>
<?php endforeach; unset($_from); endif; ?>
</table>