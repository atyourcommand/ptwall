  
                     Classifieds plugin notes

----------------------------------------------------------------------------
REQUIREMENTS:

Classifieds (tested with 1.3 version)
http://classifieds.phpoutsourcing.com/

----------------------------------------------------------------------------
INSTALLATION:

1. Extract and upload plugin to amember/plugins/protect/classifieds/ folder.

2. Enable plugin in aMember Admin CP -> Setup/Configuration,
   then go to plugin settings page and configure it.

3. Integrate aMember pages into Classifieds menu as follows (1.3 version):
   Edit file /gorum/roll.php within Classifieds installation folder,
        find function makeUrl($type="withScript")
   and code below it:
        foreach( $object_vars as $attr=>$value )
        {
   and add these rows after:

        // aMember menu integration
        $ret = "";
        if ($attr == 'method'){
            switch ($value){
                case 'change_password_form':
                    $ret = "{$config.root_url}/profile.php";
                    break;
                case 'logout':
                    $ret = "{$config.root_url}/logout.php";
                    break;
                case 'create_form':
                    $ret = "{$config.root_url}/signup.php";
                    break;
                case 'modify_form':
                    $ret = "{$config.root_url}/member.php";
                    break;
                case 'login_form':
                    $ret = "{$config.root_url}/login.php";
                    break;
            }
            if ($ret && $object_vars['list'] == 'classifiedsuser')
                return $ret;
        }
        // end aMember menu integration


Or do these changes for 2.3.0 version:

                                                   
Find function makeLoginMenu() in /app/init.php file
Replace:
   $ctrl =& new AppController("user/create_form");
to:
   $ctrl =& new AppController("{$config.root_url}/signup.php");

replace:
   $ctrl =& new AppController("user/login_form");
to:
   $ctrl =& new AppController("{$config.root_url}/login.php");

replace:
   $ctrl =& new AppController("user/logout");
to:
   $ctrl =& new AppController("{$config.root_url}/logout.php");

replace:
   $ctrl =& new AppController("user/modify_form");
to:
   $ctrl =& new AppController("{$config.root_url}/profile.php");


4. Check your installation by doing new signup. After signup completed,
   new member must appear in Classifieds with the same username.

----------------------------------------------------------------------------
