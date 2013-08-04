		Incremental Content plugin (v.2.2) 

Incremental Content Mod installation instruction:

0. First you need to check new_rewrite functionality otherwise this mod will not work
   You can check this at aMember CP -> Protect Folders (new_rewrite should be active)
1. Copy all files from this archive into <aMember>/plugins/protect/incremental_content folder.
2. Enable "incremental_content" at AmemberCp->Setup/COnfiguration->Plugins->ProtectPlugins.
3. Go to ( {$config.root_url}/admin ) aMember CP -> Manage Products -> Edit 
and try to add/edit/delete 'Links' in 'Incremental Content Membership' table at the page bottom.
4. Login into {$config.root_url}/member.php and check for added links.

To add links to any php page use this code:
&lt;?php
session_start();
if ($_SESSION['_amember_links'])
{
	echo "&lt;ul&gt;";
	foreach ($_SESSION['_amember_links'] as $link_id =&gt; $link)
	{
		echo "&lt;li&gt;&lta href=\"".$link['link_url']."\">".$link['link_title']."&lt;/a&gt;&lt;/li&gt;";
	}
	echo "&lt;/ul&gt;";
}
?&gt;

5. Try to access if you log in as member
{$config.root_url}/plugins/protect/incremental_content/?product_id=1

where 1 is 'Product #' of product

All additional links for this product will be displayed here.