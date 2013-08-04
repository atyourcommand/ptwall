<?php

if (!defined('INCLUDED_AMEMBER_CONFIG')) 
    die("Direct access to this location is not allowed");
 
$notebook_page = 'Clickbank';
config_set_notebook_comment($notebook_page, 'ClickBank plugin configuration');
if (file_exists($rm = dirname(__FILE__)."/readme.txt"))
    config_set_readme($notebook_page, $rm);

add_config_field('payment.clickbank.account', 'Account Name',
    'text', "your ClickBank account name",
    $notebook_page, 
    '');
add_config_field('payment.clickbank.secret', 'Secret Key',
    'text', "ClickBank -> Account Settings -> My site: Advanced Tools",
    $notebook_page, 
    '');

add_config_field('payment.clickbank.developer_key', 'Developer key',
    'text', "will be used for cancelation request (see <a href=\"http://www.clickbank.com/help/account-help/account-tools/clickbank-api/\" target=\"_blank\">manual</a>)",
    $notebook_page, 
    '');
add_config_field('payment.clickbank.clerk_user_key', 'Clerk user key',
    'text', "will be used for cancelation request",
    $notebook_page, 
    '');

add_config_field('payment.clickbank.allow_create', 'Allow create new accounts', 'select', 
    'aMember will create member (if not exists) after purchase at ClickBank directly', $notebook_page, '','','',
    array('options' => array(0 => 'No', 1 => 'Yes'))
);

add_config_field('payment.clickbank.title', 'Payment Method Title',
    'text', "displayed on signup page and on renewal page",
    $notebook_page, 
    '', '', '',
    array('default' => 'Clickbank'));
add_config_field('payment.clickbank.description', 'Payment Method Description',
    'text', "displayed on signup page",
    $notebook_page, 
    '', '', '',
    array('default' => 'Credit Card Payment'));
?>
