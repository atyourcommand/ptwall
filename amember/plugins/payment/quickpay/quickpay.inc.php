<?php

if (!defined('INCLUDED_AMEMBER_CONFIG')) 
    die("Direct access to this location is not allowed");

/*
*
*
*     Author: Alex Scott
*      Email: alex@cgi-central.net
*        Web: http://www.cgi-central.net
*    FileName $RCSfile$
*    Release: 3.1.9PRO ($Revision: 3601 $)
*
* Please direct bug reports,suggestions or feedback to the cgi-central forums.
* http://www.cgi-central.net/forum/
*
*/






class payment_quickpay extends amember_payment {
    var $title       = "Quickpay";
    var $description = "Credit card payment";
    var $fixed_price = 0;
    var $recurring   = 0;

    function do_payment($payment_id, $member_id, $product_id,
            $price, $begin_date, $expire_date, &$vars){

        global $config;
        global $db;
        $product = & get_product($product_id);
		/*
		cstr = concatenate(
    'protocol',
    'msgtype',
    'merchant',
    'language',
    'ordernumber',
    'amount',
    'currency',
    'continueurl',
    'cancelurl',
    'callbackurl',
    'autocapture',
    'cardtypelock',
    'description',
    'ipaddress',
    'testmode',
    'secret'
)
*/
		$md5str = "3".
		"authorize".
		$this->config['merchant_id'].
		"en".
		"000".$payment_id.
		intval($price*100).
		$this->config['currency'].
		$config['root_url']."/thanks.php".
		$config['root_url']."/plugins/payment/quickpay/cancel.php".
		$config['root_url']."/plugins/payment/quickpay/ipn.php".
		"1".
		$product->config['title'].
		$this->config['testing'].
		$this->config['secret'];
		
        $vars = array(
            'merchant' => $this->config['merchant_id'],
            'amount' =>intval($price*100),
            'currency' => $this->config['currency'],
            'ordernumber'        => $payment_id,
			'testmode' => $this->config['testing'],
			'description' => $product->config['title'],
            'md5check' => md5($md5str),
        );
		$t = &new_smarty();
		$t->assign('vars', $vars);
		$t->assign('config', $config);
		$t->display(dirname(__FILE__) . '/quickpay.html');
    }
    
    function log_debug($vars){
        global $db;
        $s = "QUICKPAY DEBUG:<br />\n";
        foreach ($vars as $k=>$v)
            $s .= "[$k] => '$v'<br />\n";
        $db->log_error($s);
    }
	
    function validate_ipn($vars){
		/*
		'msgtype',
		'ordernumber',
		'amount',
		'currency',
		'time',
		'state',
		'qpstat',
		'qpstatmsg',
		'chstat',
		'chstatmsg',
		'merchant',
		'merchantemail',
		'transaction',
		'cardtype',
		'cardnumber',
		'secret'
		*/
		
		$md5str= $vars['msgtype'].
		$vars['ordernumber'].
		$vars['amount'].
		$vars['currency'].
		$vars['time'].
		$vars['state'].
		$vars['qpstat'].
		$vars['qpstatmsg'].
		$vars['chstat'].
		$vars['chstatmsg'].
		$vars['merchant'].
		$vars['merchantemail'].
		$vars['transaction'].
		$vars['cardtype'].
		$vars['cardnumber'].
		$this->config['secret'];
        $md5_hash =  md5($md5str);
        if ($md5_hash==$vars['md5check'])
            return 1;
    	else
    	    return 0;
    }
    
    function process_postback($vars){
        global $db, $config;
		$this->log_debug($vars);
        if (!$this->validate_ipn($vars))
            $this->postback_error("IPN validation failed.");
		$err = $db->finish_waiting_payment(intval($vars['ordernumber']),'quickpay',$vars['transaction'],$vars['amount']/100, $vars);
		if ($err)
			$db->log_error("finish_waiting_payment error: $err");
    }
    function init(){
        parent::init();
    }
}

$pl = & instantiate_plugin('payment', 'quickpay');
?>
