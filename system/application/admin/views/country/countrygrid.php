<?
   $this->load->helper('url');
   $modify_url = site_url('country/modify/');
   $delete_url = site_url('country/delete/');
   $add_url    = site_url('country/add/');

?>


<form action='<?= $add_url; ?>' method='POST' id='frmcountry'>
<table width="100%" border="0" cellspacing="1" cellpadding="0">
<tr>
   <th align="left" class="formSecHeader">Browsing country values</th>
   <th align="right">
    <input class="redbutton" value="&nbsp;&nbsp;Add&nbsp;&nbsp;" type="submit" name='add' id='add' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   </th>
</table>
</form>

<br />
		<div id="example">
			<div class="tableFilter">
		  		<form id="tableFilter" onsubmit="myTable.filter(this.id); return false;">Filter: 
					<select id="column">
		  				<option value="1">ID</option>
						<option value="2">Country</option>
						<option value="3">Enabled</option>
					</select>
					<input type="text" id="keyword" />
					<input type="submit" value="Submit" />
					<input type="reset" value="Clear" />
				</form>
		  </div>
<table id="myTable" class="tbl" border="0" cellpadding="2" cellspacing="1" width="100%">
		  	<thead>
            	<th>Edit/Delete</th>
				<th axis="number">ID</th>
                <th axis="string">Country</th>
				<th axis="number">Enabled</th>
			</thead>
<tbody  class="scrollingContent">

      <?
         $i = 0;
         foreach ($country_list as $country) {
            $i++;
            if (($i%2)==0) { $bgColor = "#FFFFFF"; } else { $bgColor = "#C0C0C0"; }
      ?>
      <tr bgcolor="<?= $bgColor; ?>">
         <td align="center" nowrap="nowrap">
            <a href = "<?= $modify_url."/".$country["country_id"]; ?>" >Edit</a>
            &nbsp;&nbsp;&nbsp;
            <a href = "<?= $delete_url."/".$country["country_id"]; ?>" >Delete</a>
         </td>
   <td align="left" nowrap="nowrap"><?= $country['country_id']; ?></td>
   <td align="left" nowrap="nowrap"><?= $country['name']; ?></td>
   <td align="left" nowrap="nowrap"><?= $country['enabled']; ?></td>
</tr>
      <? } ?>
</tbody>
</table>
		<script type="text/javascript">
			var myTable = {};
			window.addEvent('domready', function(){
				myTable = new sortableTable('myTable', {overCls: 'over', onClick: function(){alert(this.id)}});
			});
		</script>
<br />




