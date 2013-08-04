PHP Invoice Plugin is designed to copy aMember Pro users in to 
PHP Invoice database as described at http://www.amember.com/p/Integration/

It does not provide any integration for ordering process.

INSTALLATION

1 - Enable plugin at aMember CP -> Setup/Configuration -> Plugins

2 - Configure plugin at "aMember CP -> Setup/Configuration -> PHP Invoice"
Database name:
  Format is "phpinvoice." (with dot)

3 - Make sure you redirect customer to phpinvoice/home.php after login,
not to phpinvoice/index.php (that will always show customer as not
logged-in).
