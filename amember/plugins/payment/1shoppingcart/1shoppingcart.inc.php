<?php

if (!defined('INCLUDED_AMEMBER_CONFIG'))
    die("Direct access to this location is not allowed");

/*
*
*
*     Author: Alex Scott
*      Email: alex@cgi-central.net
*        Web: http://www.cgi-central.net
*    Details: 1ShoppingCart Payment Plugin
*    FileName $RCSfile: paypal_r.inc.php,v $
*    Release: 3.1.9PRO ($Revision: 1.8 $)
*
* Please direct bug reports,suggestions or feedback to the cgi-central forums.
* http://www.cgi-central.net/forum/
*
* aMember PRO is a commercial software. Any distribution is strictly prohibited.
* 
* TODO - tax saving / calculation
*/

class payment_1shoppingcart extends amember_payment {
    var $title = "1ShoppingCart";
    var $description = "All major credit cards accepted";
    var $fixed_price=1;
    var $recurring=1;

    function do_bill($amount, $title, $products, $u, $invoice){
        global $config;
        
        $_SESSION['_amember_payment_id'] = $invoice;
        $vars = array(
            'MerchantID' => $this->config['merchant_id'],
            'ProductID'  => $products[0]['1shoppingcart_id'],
            'AMemberID'  => $invoice,
            'PostBackURL' => $config['root_url'] . "/plugins/payment/1shoppingcart/ipn.php",
        );
        return $this->encode_and_redirect("http://www.marketerschoice.com/app/netcart.asp", $vars);
    }
    
    function validate_ipn($vars){
        //print_rr($vars, "POST we received from you");
        
        $sign = $vars['VerifySign'];
        unset($vars['VerifySign']);
        $vars['PostbackPassword'] = $this->config['postback_password'];
        $str = join('', array_values($vars));
        $md5 = md5($str);
        
        if ($md5 != $sign){
            global $db;
            $db->log_error( "DEBUG: Validation error: verifysign incorrect. Make sure you set the same password in both 1ShoppingCart and aMember Pro CP<br>
            [md5($str)] != [$sign] <Br>
            ");
            return "Validation error: verifysign incorrect. Make sure you set the same password in both 1ShoppingCart and aMember Pro CP";
        }
        
        //print_rr($vars, "vars to contactenate");
        //print_rr($str, "str");
        //print_rr($md5, "md5(str) (should be the same as sign)");
        //print_rr($sign, "sign (we received from you), it is anything but MD5 hash of str");
        //exit();
    }

    function process_postback($vars){
        global $db, $config;

        // validate if it is true PayPal IPN
        if (($err = $this->validate_ipn($vars)) != '')
            $this->postback_error($err);
        
        $invoice = intval($vars['AMemberID']);

        $next_rebill = date('Y-m-d', strtotime($vars['NextRebillDate']));
/*
        if ($vars['NextRebillDate']){
            $next_rebill = date('Y-m-d', strtotime($vars['NextRebillDate']));
        } else {
            $p = $db->get_payment($invoice);
            $pr = & get_product($p['product_id']);
            $begin_date = $this->get_next_begin_date($invoice);
            $next_rebill = get_expire($begin_date);
        }
*/

        switch ($vars['Status']){
            case 'start_recurring':
            case 'payment': 
                $err = $db->finish_waiting_payment(
                    $invoice, $this->get_plugin_name(),
                    $vars['OrderID'], '', $vars);
                if ($err)
                    $this->postback_error("finish_waiting_payment error: $err");
                
                if ($vars['Status'] != 'start_recurring') break;
                
                $p = $db->get_payment($invoice);
                $p['expire_date'] = $next_rebill;
                $db->update_payment($p['payment_id'], $p);
                break;
           case 'rebill':
                $p = $db->get_payment($invoice);
                if (!$p['payment_id'])
                    $this->postback_error("Cannot find original payment for [$invoice]");
                $begin_date = $this->get_next_begin_date($invoice);
                $newp = array();
                $newp['member_id']   = $p['member_id'];
                $newp['product_id']  = $p['product_id'];
                $newp['paysys_id']   = $this->get_plugin_name();
                $newp['receipt_id']  = $vars['OrderID'];
                $newp['begin_date']  = $begin_date;
                $newp['expire_date'] = $next_rebill;
                $newp['amount']      = $vars['Amount'];
//                $newp['completed']   = $p['completed'];
                $newp['completed']   = 1;
                $newp['data']        = array('RENEWAL_ORIG' => "RENEWAL ORIG: $invoice");
                $newp['data'][]      = $vars;
                $db->add_payment($newp);
                break;
           case 'recurring_eot':
                $yesterday = date('Y-m-d', time()-3600*24);
                $orig_p = $db->get_payment($invoice);
                if (!$orig_p['payment_id'])
                    $this->postback_error("Cannot find original payment for [$invoice]");
                foreach ($db->get_user_payments($orig_p['member_id'], 1) as $p){
                    if (($p['product_id'] == $orig_p['product_id']) 
                        && (($p['data']['RENEWAL_ORIG'] == "RENEWAL ORIG: $invoice")
                            || ($p['payment_id'] == $invoice))
                        && ($p['expire_date'] >= $yesterday)){
                        $p['expire_date'] = $yesterday;
                        $p['data'][] = $vars;
                        $db->update_payment($p['payment_id'], $p);
                    }
                }
                break;
           default: $this->postback_error("Unknown status: [$vars[Status]]");                
        }
    }
    
    function get_next_begin_date($invoice){
        global $db;
        $orig_p = $db->get_payment($invoice);
        $ret = $orig_p['expire_date'];
        foreach ($db->get_user_payments($orig_p['member_id'], 1) as $p){
            if (($p['product_id'] == $orig_p['product_id']) 
                && ($p['data']['RENEWAL_ORIG'] == "RENEWAL ORIG: $invoice")
                && ($p['expire_date'] > $ret))
                $ret = $p['expire_date'];
        }
        return $ret;
    }
    /*
    function get_cancel_link($payment_id){
        return "http://www.1shoppingcart.com/cancel_payment.php";
    }
    */
    function init(){
        parent::init();
        add_product_field('1shoppingcart_id',
            '1ShoppingCart Product ID#',
            'text',
            "please take product ID# from 1ShoppingCart control panel<br>
             and enter here. To avoid confusion, product must have the same<br>
             price and duration settings"
            );
		add_product_field('trial1_days',
		    'Trial 1 Duration',
		    'period',
		    'read docs for explanation, leave empty to not use trial'
		    );

		add_product_field('trial1_price',
		    'Trial 1 Price',
		    'money',
		    'set 0 for free trial'
		    );

    }
}

$pl = & instantiate_plugin('payment', '1shoppingcart');

?>