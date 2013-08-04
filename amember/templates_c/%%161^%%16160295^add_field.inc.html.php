<?php /* Smarty version 2.6.2, created on 2010-08-24 16:24:25
         compiled from add_field.inc.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'add_field.inc.html', 12, false),array('modifier', 'default', 'add_field.inc.html', 12, false),array('function', 'state_options', 'add_field.inc.html', 18, false),array('function', 'html_options', 'add_field.inc.html', 29, false),array('function', 'html_radios', 'add_field.inc.html', 38, false),array('function', 'html_checkboxes', 'add_field.inc.html', 41, false),)), $this); ?>
<tr>
<th><b><?php echo $this->_tpl_vars['f']['title']; ?>

<?php if ($this->_tpl_vars['f']['validate_func'] != ""): ?> *<?php endif; ?>
</b>
<?php if ($this->_tpl_vars['f']['description']): ?><br />
<div class="small"><?php echo $this->_tpl_vars['f']['description']; ?>
</div><?php endif; ?>
</th>
<td>
<?php if ($this->_tpl_vars['f']['type'] == 'text'): ?>
    <input type="text" id="f_<?php echo ((is_array($_tmp=$this->_tpl_vars['f']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['f']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="<?php echo ((is_array($_tmp=@$this->_tpl_vars['f']['size'])) ? $this->_run_mod_handler('default', true, $_tmp, 20) : smarty_modifier_default($_tmp, 20)); ?>
"
        <?php if ($this->_tpl_vars['f']['validate_func'] != ""): ?>class="required"<?php endif; ?>
        <?php if ($this->_tpl_vars['f']['maxlength']): ?>maxlength=<?php echo $this->_tpl_vars['f']['maxlength'];  endif; ?> value="<?php echo ((is_array($_tmp=$this->_tpl_vars['value'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<?php elseif ($this->_tpl_vars['f']['type'] == 'state'): ?>
  <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['f']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" id="t_<?php echo ((is_array($_tmp=$this->_tpl_vars['f']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="30" value="<?php echo $this->_tpl_vars['value']['0']; ?>
" />
    <select name="<?php echo ((is_array($_tmp=$this->_tpl_vars['f']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" id="f_<?php echo ((is_array($_tmp=$this->_tpl_vars['f']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="1" disabled="true" style='display: none;'>
    <?php echo smarty_function_state_options(array('selected' => $this->_tpl_vars['value']['0'],'country' => $this->_tpl_vars['value']['1']), $this);?>

    </select>    
<?php elseif ($this->_tpl_vars['f']['type'] == 'textarea'): ?>
    <textarea id="f_<?php echo ((is_array($_tmp=$this->_tpl_vars['f']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['f']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" cols="<?php echo ((is_array($_tmp=@$this->_tpl_vars['f']['cols'])) ? $this->_run_mod_handler('default', true, $_tmp, 20) : smarty_modifier_default($_tmp, 20)); ?>
"
    <?php if ($this->_tpl_vars['f']['validate_func'] != ""): ?>class="required"<?php endif; ?>
     rows="<?php echo ((is_array($_tmp=@$this->_tpl_vars['f']['rows'])) ? $this->_run_mod_handler('default', true, $_tmp, 5) : smarty_modifier_default($_tmp, 5)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</textarea>
<?php elseif ($this->_tpl_vars['f']['type'] == 'select'): ?>
    <select name="<?php echo ((is_array($_tmp=$this->_tpl_vars['f']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="<?php echo ((is_array($_tmp=@$this->_tpl_vars['f']['size'])) ? $this->_run_mod_handler('default', true, $_tmp, 1) : smarty_modifier_default($_tmp, 1)); ?>
"
        id="f_<?php echo ((is_array($_tmp=$this->_tpl_vars['f']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"
        <?php if ($this->_tpl_vars['f']['validate_func'] != ""): ?>class="required"<?php endif; ?>
    >        
    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['f']['options'],'selected' => $this->_tpl_vars['value']), $this);?>

    </select>
<?php elseif ($this->_tpl_vars['f']['type'] == 'multi_select'): ?>
    <select id="f_<?php echo ((is_array($_tmp=$this->_tpl_vars['f']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['f']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
[]" size="<?php echo ((is_array($_tmp=@$this->_tpl_vars['f']['size'])) ? $this->_run_mod_handler('default', true, $_tmp, 5) : smarty_modifier_default($_tmp, 5)); ?>
" multiple
        <?php if ($this->_tpl_vars['f']['validate_func'] != ""): ?>class="required"<?php endif; ?>
    >
    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['f']['options'],'selected' => $this->_tpl_vars['value']), $this);?>

    </select>
<?php elseif ($this->_tpl_vars['f']['type'] == 'radio'): ?>
    <?php echo smarty_function_html_radios(array('name' => $this->_tpl_vars['f']['name'],'options' => $this->_tpl_vars['f']['options'],'checked' => $this->_tpl_vars['value'],'separator' => "<br />"), $this);?>

<?php elseif ($this->_tpl_vars['f']['type'] == 'checkbox'): ?>
    <input type=hidden name="<?php echo ((is_array($_tmp=$this->_tpl_vars['f']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
[]" value="" />
    <?php echo smarty_function_html_checkboxes(array('name' => $this->_tpl_vars['f']['name'],'options' => $this->_tpl_vars['f']['options'],'checked' => $this->_tpl_vars['value'],'separator' => "<br />"), $this);?>

<?php elseif ($this->_tpl_vars['f']['type'] == 'cc-number'): ?>
    <input type=text id="f_<?php echo ((is_array($_tmp=$this->_tpl_vars['f']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['f']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="<?php echo ((is_array($_tmp=@$this->_tpl_vars['f']['size'])) ? $this->_run_mod_handler('default', true, $_tmp, 20) : smarty_modifier_default($_tmp, 20)); ?>
"
        <?php if ($this->_tpl_vars['f']['maxlength']): ?>maxlength=<?php echo $this->_tpl_vars['f']['maxlength'];  endif; ?> value="<?php echo ((is_array($_tmp=$this->_tpl_vars['value'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<?php elseif ($this->_tpl_vars['f']['type'] == 'readonly'): ?>
    <?php echo $this->_tpl_vars['value']; ?>

<?php endif; ?>
</td>
</tr>