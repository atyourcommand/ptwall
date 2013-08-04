<?php /* Smarty version 2.6.2, created on 2011-05-21 18:33:47
         compiled from member_main.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'member_main.html', 29, false),)), $this); ?>
<!-- display links to protected areas for customer -->
<p>
<strong>Personal Trainers:</strong> - for <strong>express</strong> page approval and an <strong>upgraded page</strong>, support us with a <strong>PT Upgrade</strong> subscription. 
</p>

<?php if ($_SESSION['_amember_products']): ?>    <h3>#_TPL_MEMBER_SUBSCR#</h3>
    <ul>
    <?php if (count($_from = (array)$this->_tpl_vars['member_products'])):
    foreach ($_from as $this->_tpl_vars['p']):
?>
    <li>
    <?php if ($this->_tpl_vars['p']['url'] > ""): ?>
        <a href="<?php echo $this->_tpl_vars['p']['url']; ?>
"><?php echo $this->_tpl_vars['p']['title']; ?>
</a>
    <?php else: ?>
        <b><?php echo $this->_tpl_vars['p']['title']; ?>
</b>
    <?php endif; ?>
    </li>
    <?php if (count($_from = (array)$this->_tpl_vars['p']['add_urls'])):
    foreach ($_from as $this->_tpl_vars['url'] => $this->_tpl_vars['t']):
?>
        <li><a href="<?php echo $this->_tpl_vars['url']; ?>
"><?php echo $this->_tpl_vars['t']; ?>
</a></li>
    <?php endforeach; unset($_from); endif; ?>
    <?php endforeach; unset($_from); endif; ?>
    </ul>
<?php else: ?>    <h3>#_TPL_MEMBER_NO_SUBSCR#</h3>
    #_TPL_MEMBER_USE|<i>|</i>#&nbsp;
    #_TPL_MEMBER_ORDER_SUBSCR#<br />
<?php endif; ?>
<ul>
<?php if (count($_from = (array)$this->_tpl_vars['left_member_links'])):
    foreach ($_from as $this->_tpl_vars['u'] => $this->_tpl_vars['t']):
?>
    <li> <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['u'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo $this->_tpl_vars['t']; ?>
</a></li>
<?php endforeach; unset($_from); endif; ?>
</ul>
<!-- end of display links to protected areas for customer -->

<!-- newsletters form -->
<h3>#_TPL_NEWSLETTER_SUBSCRIPTIONS#</h3>
<!--<?php echo ' --><script language="JavaScript" type="text/javascript">

function checkboxes(num){
    if (num == 1){
        is_checked = document.subs.unsubscribe.checked;
        for (i = 0; i < document.subs.elements.length; i++){
            if (document.subs.elements[i].name == \'threads[]\' && document.subs.elements[i].checked){
                is_checked = false;
            }
        }
        document.subs.unsubscribe.checked = is_checked;
    }
    if (num == 2){
        for (i = 0; i < document.subs.elements.length; i++){
            if (document.subs.elements[i].name == \'threads[]\'){
                if (document.subs.unsubscribe.checked){
                    document.subs.elements[i].checked = false;
                }
                document.subs.elements[i].disabled = document.subs.unsubscribe.checked;

            }
        }
        if (document.subs.unsubscribe.checked){
            document.getElementById(\'newsletters_td\').className = \'disabled\';
        } else {
            document.getElementById(\'newsletters_td\').className = \'\';
        }
    }
}

</script><!--{literal} '; ?>
-->

<form method="post" name="subs" action="<?php echo ((is_array($_tmp=$_SERVER['PHP_SELF'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">

<div id="newsletters_td" <?php if ($this->_tpl_vars['unsubscribed']): ?>class="disabled"<?php else:  endif; ?>>

<?php if (count($_from = (array)$this->_tpl_vars['threads_list'])):
    foreach ($_from as $this->_tpl_vars['tr']):
 if ($this->_tpl_vars['tr']['is_active']): ?>
<label for="tr<?php echo $this->_tpl_vars['tr']['thread_id']; ?>
"><input type="checkbox" id="tr<?php echo $this->_tpl_vars['tr']['thread_id']; ?>
" class="chk" name="threads[]" value="<?php echo $this->_tpl_vars['tr']['thread_id']; ?>
"
    <?php if ($this->_tpl_vars['threads'][$this->_tpl_vars['tr']['thread_id']] == '1'): ?>checked="checked"<?php endif; ?>
    onclick="checkboxes(1)" <?php if ($this->_tpl_vars['unsubscribed']): ?>disabled="disabled"<?php endif; ?> /><?php echo $this->_tpl_vars['tr']['title']; ?>
</label><br />
<div class="small"><?php echo $this->_tpl_vars['tr']['description']; ?>
</div>
<?php endif;  endforeach; unset($_from); endif; ?>
</div>

<!--Hide unsubscribe from emails-->
<!--<p class="inputs clearfix">
<label for="unsubscribe"><input type="checkbox" id="unsubscribe" name="unsubscribe" value="1" <?php if ($this->_tpl_vars['unsubscribed']): ?>checked="checked"<?php endif; ?> onclick="checkboxes(2)" class="chk"/>#_TPL_NEWSLETTER_UNSUBSCRIBE#</label>
</p>-->

<p class="button clearfix" style="margin-top:20px;">
<input type="hidden" name="action" value="newsletters_update" />
<span class="btn-std alt">
<input type="submit" value="#_TPL_NEWSLETTER_UPDATE_SUBSCRIPTIONS#" class="btn-std" />
</span>
</p>
</form>
<!-- end of newsletters form -->
</div>

<!--<div style="width:50%; float:left">
<h3>#_TPL_MEMBER_USEFUL_LINKS#</h3>
<ul>
<li><a href="<?php echo $this->_tpl_vars['config']['root_url']; ?>
/logout.php">#_TPL_MEMBER_LOGOUT#</a></li>
<li><a href="<?php echo $this->_tpl_vars['config']['root_url']; ?>
/profile.php">#_TPL_MEMBER_CH_PSWD#</a></li>
<?php if (count($_from = (array)$this->_tpl_vars['member_links'])):
    foreach ($_from as $this->_tpl_vars['u'] => $this->_tpl_vars['t']):
?>
<li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['u'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo $this->_tpl_vars['t']; ?>
</a></li>
<?php endforeach; unset($_from); endif; ?>
</ul>
</div>-->
<div style="clear:both"></div>