OneTime_Access plugin allows you to setup one or more files per product to access-control. 
This files should be protected with code example (see below), and aMember will 
count how much times every subscriber accessed this file(s). When configured 
limit is reached, member won't be allowed to access file(s) again.

INSTALLATION
                         
1. Put "onetime_access" folder to amember/plugins/protect/ directory
2. Go to aMember CP -> Setup -> Plugins and enable "onetime_access" plugin.
3. Go to aMember CP -> Setup -> One-Time Access and configure it
4. Go to aMember CP -> Setup -> Edit Products and set per-products option.

Just include {$config.root_dir}/plugins/onetime_access/check_access.inc.php
in your PHP page as follows:
============================================================================
&lt;?php
$_product_id = array(1,3); // or $_product_id = array(1) if it so
include("{$config.root_dir}/plugins/protect/onetime_access/check_access.inc.php"); 

.. your existing PHP code goes here
?&gt;
.. your html still here, if exists
============================================================================