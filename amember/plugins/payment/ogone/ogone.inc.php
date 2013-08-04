<?php

if (!defined('INCLUDED_AMEMBER_CONFIG')) 
    die("Direct access to this location is not allowed");
 
/*
*
*
*     Author: Alex Scott
*      Email: alex@cgi-central.net
*        Web: http://www.cgi-central.net
*    Details: ogone Payment Plugin
*    FileName $RCSfile$
*    Release: 3.1.8PRO ($Revision: 3834 $)
*
* Please direct bug reports,suggestions or feedback to the cgi-central forums.
* http://www.cgi-central.net/forum/
*                                                                          
*
* aMember PRO is a commercial software. Any distribution is strictly prohibited.
*
*
*/


class payment_ogone extends amember_payment {
    var $title = _PLUG_PAY_OGONE_TITLE;
    var $description = _PLUG_PAY_OGONE_DESC;
    var $fixed_price=0;
    var $recurring=0;
    var $built_in_trials=0;
    function get_plugin_features()
    {
        $title = $config['payment']['ogone']['title'] ? $config['payment']['ogone']['title'] : _PLUG_PAY_OGONE_TITLE;
        $description = $config['payment']['ogone']['description'] ? $config['payment']['ogone']['description'] : _PLUG_PAY_OGONE_DESC;
    }
    ///
    function sha1($key,$data) {
       $blocksize=64;
       $hashfunc='sha1';
       if (strlen($key)>$blocksize)
           $key=pack('H*', $hashfunc($key));
       $key=str_pad($key,$blocksize,chr(0x00));
       $ipad=str_repeat(chr(0x36),$blocksize);
       $opad=str_repeat(chr(0x5c),$blocksize);
       $hmac = pack(
                   'H*',$hashfunc(
                       ($key^$opad).pack(
                           'H*',$hashfunc(
                               ($key^$ipad).$data
                           )
                       )
                   )
               );
       return bin2hex($hmac);
    }
    function do_bill($amount, $title, $products, $u, $invoice){
        global $config;
        $vars = array(  
            'PSPID'  => $this->config['company_id'],
            'amount'      => str_replace('.', '', sprintf('%.2f', $amount)),
            'currency'    => 'EUR',
            'Language'    => 'en_US',
            'TITLE'   => $title,
            'ACCEPTURL' => $config['root_url'] . '/thanks.php?payment_id='.$invoice,
            'declineurl' => $config['root_url'] . '/cancel.php',
            'exceptionurl' => $config['root_url'] . '/cancel.php',
            'cancelurl' => $config['root_url'] . '/cancel.php',
            
            'orderID'    => $invoice,
            'CN' => $u['name_f'] . ' ' . $u['name_l'],
            'owneraddress'   => $u['street'],
            'ownercity'      => $u['city'],
            'ownerZIP'       => $u['zip'],
            'EMAIL'       => $u['email'],
//            'operation'       => "SAL",
//            'SHASign'       => sha1($invoice.($amount*100)."EUR".$this->config['company_id']."SAL".$this->config['sha_id']),
            'SHASign'       => sha1($invoice.($amount*100)."EUR".$this->config['company_id'].$this->config['sha_id']),
        );
//echo $invoice.($amount*100)."EUR".$this->config['company_id'].$this->config['sha_id']."<br>".sha1($invoice.($amount*100)."EUR".$this->config['company_id'].$this->config['sha_id']);die;
        if($this->config['testing'])
		$url="https://secure.ogone.com/ncol/test/orderstandard.asp";
	else
		$url="https://secure.ogone.com/ncol/prod/orderstandard.asp";
        return $this->encode_and_redirect($url, $vars);
    }

    function process_postback($vars){
        global $db;

        $invoice      = $vars['PAYID'];
        $amount       = $vars['amount'];
        $payment_id   = intval($vars['orderID']);
        $status       = $vars['STATUS'];
        $post_type    = $vars['post_type'];
        
        if (!in_array(substr($status,0,1), array(5,9))){
            $this->postback_error(sprintf(_PLUG_PAY_OGONE_ERROR, $status));
            return false;
        }
        if (!$amount){
            $this->postback_error(_PLUG_PAY_OGONE_ERROR2);
            return false;
        }

        // process payment
        $err = $db->finish_waiting_payment(
            $payment_id, $this->get_plugin_name(), 
            $invoice, $amount, $vars);

        if ($err) 
            $this->postback_error("finish_waiting_payment error: $err");
    
    }
}

$pl = & instantiate_plugin('payment', 'ogone');

?>
