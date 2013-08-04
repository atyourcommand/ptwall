                     OsCommerce plugin notes

----------------------------------------------------------------------------
REQUIREMENTS:
  Plugin has been tested with OsCommerce v.2.2ms2-060817

----------------------------------------------------------------------------
INSTALLATION:
  1. Copy plugin files to amember/plugins/protect/oscommerce/ folder
  2. Enable plugin at aMember CP -> Setup -> Plugins
  3. Configure plugin at aMember CP -> Setup -> OsCommerce
  4. Adjust product settings at aMember CP -> Edit Products
  5. It is NECESSARY to enable aMember CP -> Setup -> E-Mail : 
     Verify E-Mail on Signup. Else your OsCommerce can be abused.
     You are WARNED!
----------------------------------------------------------------------------
MODIFICATIONS TO OSCOMMERCE
  1. Edit file oscommerce/admin/configure.php
     Find text "STORE_SESSIONS" and change entire line to the following (with empty value)
     define('STORE_SESSIONS', ''); // leave empty '' for default handler or set to 'mysql'
  2. Edit file oscommerce/includes/application_top.php
     
     Find line:
    session_set_cookie_params(0, $cookie_path, $cookie_domain);
     replace to:
    session_set_cookie_params(0, '/', $cookie_domain);
    
     Find lines
  tep_session_name('osCsid');
  tep_session_save_path(SESSION_WRITE_DIRECTORY);
    replace to
//  tep_session_name('osCsid');
//  tep_session_save_path(SESSION_WRITE_DIRECTORY);
