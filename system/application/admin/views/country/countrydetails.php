<?
$this->load->helper('url');
$action_url = site_url() . "/country/$action/";

?>

<h2>Enter country Details</h2>

<form name="countrydetails" id="countrydetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='country_id' id='country_id' value='<?= $country_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> country_id:  </b> </td>

            <td>
               <?= $country_id; ?>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> name:  </b> </td>

            <td>
               <input type='text' name='name' id='name' value='<?= $name; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> iso_code_2:  </b> </td>

            <td>
               <input type='text' name='iso_code_2' id='iso_code_2' value='<?= $iso_code_2; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> iso_code_3:  </b> </td>

            <td>
               <input type='text' name='iso_code_3' id='iso_code_3' value='<?= $iso_code_3; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> address_format:  </b> </td>

            <td>
               <textarea cols=35 rows=7 NAME='address_format' id='address_format' ><?= $address_format; ?></textarea>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> enabled:  </b> </td>

            <td>
               <input type='text' name='enabled' id='enabled' value='<?= $enabled; ?>' />
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>