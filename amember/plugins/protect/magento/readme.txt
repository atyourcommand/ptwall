                     Magento module installation

1. Enable plugin in aMember Admin CP/Setup, then go to plugin settings
page and configure it.

2. Login into aMember Control Panel. Add Products and set correspoding 
Magento group for every product. Members will get 
this group in Magento as subscription bought. When 
subscription expires user group in Magento will be reset to 'NOT LOGGED IN'. 

3. After you set it, click on Rebuild Db link in Admin Panel. It will 
case database syncronisation (aMember Pro ----> Magento, but
never Magento ----> aMember Pro)

4. Remove selection from 'E-mail' in 'User can change the following fields' 
field in order to prevent occurrence of users with identical e-mail.
To do this, navigate to 
aMember CP -> Setup/Configuration, and select the Advanced tab. 
 

5. You need some editing magento files for single login enable.

Edit file in your Magento installation
\magento\app\code\core\Mage\Core\Model\Config\Options.php

    Line 130:
    find string:
    $dir = $this->getDataSetDefault('session_dir', $this->getVarDir().DS.'session');
    change it to:
    $dir = $this->getDataSetDefault('session_dir', session_save_path());


\magento\app\code\core\Mage\Core\Model\Session\Abstract\Varien.php

    Line 26: 
    Set line:
    $sessionName=null; 
    before 'if (isset'



