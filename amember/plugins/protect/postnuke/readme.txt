                     PostNuke plugin notes

----------------------------------------------------------------------------
REQUIREMENTS:

The plugin has been tested with PostNuke 0.800, but should work with any 
other version.

----------------------------------------------------------------------------
INSTALLATION:

1. Edit file postnuke/includes/pnSession.php
find line
        ini_set('session.cookie_path', $path);
and replace it to
//        ini_set('session.cookie_path', $path);

2. Enable plugin in aMember Admin CP/Setup, then go to plugin settings
page and configure it.

3. Edit your products via aMember Pro Control Panel and set postnuke 
   Access value (you may choose several groups), also set Product 
   URL to point to PostNuke installation.

4. Check your installation by doing new signup. Once signup is completed,
   new member must appear in PostNuke with the same username.
