<?
$this->load->helper('url');
$action_url = site_url() . "/school/$action/";

?>

<h2>Enter school Details</h2>

<form name="schooldetails" id="schooldetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='college_id' id='college_id' value='<?= $college_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> college_id:  </b> </td>

            <td>
               <?= $college_id; ?>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> name:  </b> </td>

            <td>
               <input type='text' name='name' id='name' value='<?= $name; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> country_id:  </b> </td>

            <td>
               <input type='text' name='country_id' id='country_id' value='<?= $country_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> state_id:  </b> </td>

            <td>
               <input type='text' name='state_id' id='state_id' value='<?= $state_id; ?>' />
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>