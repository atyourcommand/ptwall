<?php /* Smarty version 2.6.2, created on 2011-04-21 23:44:23
         compiled from admin/countries.html */ ?>
<?php $this->assign('title', 'aMember Pro Configuration'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script type="text/javascript" src="<?php echo $this->_tpl_vars['config']['root_surl']; ?>
/includes/jquery/jquery.js?smarty"></script><!--<?php echo ' '; ?>
-->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/js.other_db.js", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $this->assign('selected', $this->_tpl_vars['notebook']); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/setup_nb.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<center>
<h3><?php echo $this->_tpl_vars['title']; ?>
 : <?php echo $this->_tpl_vars['notebook']; ?>
<br />
<font color=gray size=1><b><?php echo $this->_tpl_vars['notebooks'][$this->_tpl_vars['notebook']]['comment']; ?>
</b></font><br />
</h3>

<script type="text/javascript" src="<?php echo $this->_tpl_vars['config']['root_url']; ?>
/includes/jquery/jquery.js?smarty"></script><!--<?php echo ' '; ?>
-->
<script type="text/javascript" src="<?php echo $this->_tpl_vars['config']['root_url']; ?>
/includes/jquery/jquery.select.js?smarty"></script><!--<?php echo ' '; ?>
-->
<!--<?php echo ' --><script language="javascript">
<!--
$(document).ready(function(){
  refresh();
 });


function refresh()
{
	load_countries();
	load_countries_disabled();

}

function refresh_states ()
{
	load_states();
	load_states_disabled();
}

function load_form(form) {
  //alert(forms[form]);
  $("#placeholder").empty().append(forms[form]);
}
function load_form_states(form) {
  //alert(forms[form]);
  $("#placeholder_states").empty().append(forms[form]);
}


function save_country() {
    var v = { \'do\' : \'save_country\',
			\'country\' : $("#country")[0].value,
			\'title\' : $("#title")[0].value,
			\'tag\' : $("#tag")[0].value,
			\'act\' : $("#act")[0].value
			};
    $.ajax({
        \'type\' : \'POST\',
        \'url\'  : "ajax_cnt.php", 
        \'data\' : v,
        \'dataType\' : \'json\', 
        \'success\' : save_country_result});	
}


function save_country_result(res) {
    alert(res.msg);
    refresh();
}

function save_state() {
    var v = { \'do\' : \'save_state\',
			\'country\' : $("#country")[0].value,
			\'state\' : $("#state")[0].value,
			\'title\' : $("#title")[0].value,
			\'tag\' : $("#tag")[0].value,
			\'act\' : $("#act")[0].value
			};
    $.ajax({
        \'type\' : \'POST\',
        \'url\'  : "ajax_cnt.php", 
        \'data\' : v,
        \'dataType\' : \'json\', 
        \'success\' : save_state_result});	
}


function save_state_result(res) {
    alert(res.msg);
    refresh_states();
}

function load_data_to_new_states() {
    if ($("#countries > option:selected").attr("value")) {
        $("#country")[0].value=$("#countries > option:selected").attr("value");
    }
}


function load_data_to_edit_states() {
    vlist=$("#states > option:selected").attr("value");
    var v = { \'do\' : \'get_state\', \'state\' : vlist };
    vlist=\'\';
    $.ajax({
        \'type\' : \'POST\',
        \'url\'  : "ajax_cnt.php", 
        \'data\' : v,
        \'dataType\' : \'json\', 
        \'success\' : load_data_to_edit_states_do});
}

function load_data_to_edit_states_do(res) {
    
    $("#country")[0].value=res.country;
    $("#state")[0].value=res.state;
    $("#title")[0].value=res.title;
    $("#tag")[0].value=res.tag;
}

function load_data_to_edit_countries() {
    vlist=$("#countries > option:selected").attr("value");
    var v = { \'do\' : \'get_country\', \'country\' : vlist };
    vlist=\'\';
    $.ajax({
        \'type\' : \'POST\',
        \'url\'  : "ajax_cnt.php", 
        \'data\' : v,
        \'dataType\' : \'json\', 
        \'success\' : load_data_to_edit_countries_do});
}

function load_data_to_edit_countries_do(res) {
    
    $("#country")[0].value=res.country;
    $("#title")[0].value=res.title;
    $("#tag")[0].value=res.tag;
}

function load_states()
{
    vlist=$("#countries > option:selected").attr("value");
    var v = { \'do\' : \'load_states\', \'country\' : vlist };
    vlist=\'\';
    $.ajax({
        \'type\' : \'POST\',
        \'url\'  : "ajax_cnt.php", 
        \'data\' : v,
        \'dataType\' : \'json\', 
        \'success\' : load_states_do});
}

function load_states_do(res)
{
	$("#states").empty().append(res.msg);
	$("#states > option:selected").removeAttr("selected");
}

function load_states_disabled()
{
    vlist=$("#countries > option:selected").attr("value");
    var v = { \'do\' : \'load_states_disabled\', \'country\' : vlist };
    vlist=\'\';
    $.ajax({
        \'type\' : \'POST\',
        \'url\'  : "ajax_cnt.php", 
        \'data\' : v,
        \'dataType\' : \'json\', 
        \'success\' : load_states_disabled_do});
}

function load_states_disabled_do(res)
{
	$("#states_disabled").empty().append(res.msg);
	$("#states_disabled > option:selected").removeAttr("selected");
}


function load_countries()
{
    var v = { \'do\' : \'load_countries\' };
    $.ajax({
        \'type\' : \'POST\',
        \'url\'  : "ajax_cnt.php", 
        \'data\' : v,
        \'dataType\' : \'json\', 
        \'success\' : load_countries_do});
}

function load_countries_do(res)
{
	$("#countries").empty().append(res.msg);
	$("#countries > option:selected").removeAttr("selected");
}

function load_countries_disabled()
{
    var v = { \'do\' : \'load_countries_disabled\' };
    $.ajax({
        \'type\' : \'POST\',
        \'url\'  : "ajax_cnt.php", 
        \'data\' : v,
        \'dataType\' : \'json\', 
        \'success\' : load_countries_disabled_do});
}

function load_countries_disabled_do(res)
{
	$("#countries_disabled").empty().append(res.msg);
	$("#countries_disabled > option:selected").removeAttr("selected");
}

var vlist=\'\';
function disabled_countries(id) { 
  var tmp;
  tmp="#"+id+" > option:selected";
  $(tmp).each(function() {
      vlist=(vlist==\'\') ? this.value : vlist+","+this.value;
      }
  );
  var v = { \'do\' : \'disabled_countries\', \'countries\' : vlist};
  vlist=\'\';
  $.ajax({
        \'type\' : \'POST\',
        \'url\'  : "ajax_cnt.php", 
        \'data\' : v,
        \'dataType\' : \'json\', 
        \'success\' : message});   
}

function disabled_states(id) { 
  var tmp;
  tmp="#"+id+" > option:selected";
  $(tmp).each(function() {
      vlist=(vlist==\'\') ? this.value : vlist+","+this.value;
      }
  );
  var v = { \'do\' : \'disabled_states\', \'states\' : vlist};
  vlist=\'\';
  $.ajax({
        \'type\' : \'POST\',
        \'url\'  : "ajax_cnt.php", 
        \'data\' : v,
        \'dataType\' : \'json\', 
        \'success\' : message_states});   
}

function message(res) {
    //alert(res.msg);
    load_form(\'hide\');
    refresh();
}

function message_states(res) {
    //alert(res.msg);
    load_form_states(\'hide\');
    refresh_states();
}


var forms = new Array;
forms["new_countries"]=\'<br /><table class="vedit" width="100%"><tr class="odd"><td colspan=2 style="text-align: center; font-weight: bold">New country</td></tr><tr><th width="50%"><b>Country</b><br />2 latter code (for example US)</th><td><input type="text" name="country" id="country"></td></tr><tr><th><b>Title</b></th><td><input type="text" name="title" id="title"></td></tr><tr><th><b>Sort Order</b></th><td><input type="text" name="tag" id="tag"></td></tr></table><input type="hidden" name="act" id="act" value="1"><br /><center><input type="button" value="&nbsp;&nbsp;&nbsp;Save&nbsp;&nbsp;&nbsp;" onClick="save_country();"></center>\';

forms["edit_countries"]=\'<br /><table class="vedit" width="100%"><tr class="odd"><td colspan=2 style="text-align: center; font-weight: bold">Edit country</td></tr>      <tr><th width="50%"><b>Country</b></th><td><input type="text" id="country" name="country" disabled="disabled"></td></tr><tr><th><b>Title</b></th><td><input type="text" id="title" name="title"></td></tr><tr><th><b>Sort Order</b></th><td><input id="tag" type="text" name="tag"></td></tr></table><input type="hidden" name="act" id="act" value="2"><br /><center><input type="button" value="&nbsp;&nbsp;&nbsp;Save&nbsp;&nbsp;&nbsp;" onClick="save_country();"></center>\';

forms["states"]=\'<br /><table cellspacing="0" cellpadding="0"><tr><td>Active States<br /><select id="states" name="states[]" multiple="multiple" style="width:200px; height:200px" onChange="load_form_states(\\\'hide\\\');"></select></td><td><h3>&nbsp;<a href="javascript:;" onclick="disabled_states(\\\'states\\\'); return false;">&rarr;</a>&nbsp;</h3><br /><h3><a href="javascript:;" onclick="disabled_states(\\\'states_disabled\\\'); return false;">&larr;</a></h3></td><td>Disabled States<br /><select id="states_disabled" name="states_disabled[]" multiple="multiple" style="width:200px; height:200px"></select></td></tr><tr><td colspan="3"><center><a href="javascript:;" onClick="load_form_states(\\\'new_states\\\'); load_data_to_new_states(); return false;">New States</a> | <a href="javascript:;" onClick="load_form_states(\\\'edit_states\\\'); load_data_to_edit_states(); return false;">Edit state</a> | <a href="javascript:;" onClick="load_form_states(\\\'hide\\\'); return false;">Hide</a></center></td></tr><tr><td colspan="3"><div id="placeholder_states"></div></td></tr></table>\';

forms["new_states"]=\'<br /><table class="vedit" width="100%"><tr class="odd"><td colspan=2 style="text-align: center; font-weight: bold">New state</td></tr>      <tr><th width="50%"><b>Country</b><td><input type="text" name="country" id="country" disabled="disabled"></td></tr><tr><th><b>State</b></th></th></td><td><input type="text" id="state" name="state"></td></tr><tr><th><b>Title</b></th><td><input type="text" name="title" id="title"></td></tr><tr><th><b>Sort Order</b></th><td><input type="text" name="tag" id="tag"></td></tr></table><input type="hidden" name="act" id="act" value="1"><br /><center><input type="button" value="&nbsp;&nbsp;&nbsp;Save&nbsp;&nbsp;&nbsp;" onClick="save_state();"></center>\';

forms["edit_states"]=\'<br /><table class="vedit" width="100%"><tr class="odd"><td colspan=2 style="text-align: center; font-weight: bold">New state</td></tr>      <tr><th width="50%"><b>Country</b><td><input type="text" name="country" id="country" disabled="disabled"></td></tr><tr><th><b>State</b></th></td><td><input type="text" id="state" name="state" disabled="disabled"></td></tr><tr><th><b>Title</b></th><td><input type="text" name="title" id="title"></td></tr><tr><th><b>Sort Order</b></th><td><input type="text" name="tag" id="tag"></td></tr></table><input type="hidden" name="act" id="act" value="2"><br /><center><input type="button" value="&nbsp;&nbsp;&nbsp;Save&nbsp;&nbsp;&nbsp;" onClick="save_state();"></center>\';

forms["hide"]=\'\';
-->
</script><!--{literal} '; ?>
-->
<!--<?php echo ' --><style>
<!--
#country_mng a {text-decoration:none}
-->
</style><!--{literal} '; ?>
-->
<center id="country_mng">
<br />
<form method="POST">
<table cellspacing="0" cellpadding="0">
<tr>
<td>
Active Countries<br />
<select id="countries" name="countries[]" multiple="multiple" style="width:200px; height:200px" onChange="load_form('hide');">
</select>
</td>
<td><h3>&nbsp;<a href="javascript:;" onclick="disabled_countries('countries'); return false;">&rarr;</a>&nbsp;</h3><br /><h3><a href="javascript:;" onclick="disabled_countries('countries_disabled'); return false;">&larr;</a></h3></td>
<td>Disabled Countries<br />
<select id="countries_disabled" name="countries_disabled[]" multiple="multiple" style="width:200px; height:200px">
</select>
</td>
</tr>
<tr>
<td colspan="3">
<center>
<a href="javascript:;" onClick="load_form('new_countries'); return false;">New country</a> | <a href="javascript:;" onClick="load_form('edit_countries'); load_data_to_edit_countries(); return false;">Edit country</a> | <a href="javascript:;" onClick="load_form('states'); refresh_states(); return false;">Load states</a> | <a href="javascript:;" onClick="load_form('hide'); return false;">Hide</a>
</center>
</td>
</tr>
<tr>
    <td colspan="3">
    <div id="placeholder">
    
    </div>
    </td>
</tr>
</table>
</form>
</center>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>



