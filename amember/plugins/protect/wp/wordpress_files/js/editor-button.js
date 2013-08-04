/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
(function(){
tinymce.create('tinymce.plugins.amember_protect',
{
	init : function(ed, url){
		ed.addCommand('insertaMemberProtect',
                    function(){
			var win = window.dialogArguments || opener || parent || top;
			win.send_to_editor('[amember_protect]');
                    });
		ed.addButton('Protect', {title:'Protect Block', cmd:'insertaMemberProtect', label:'[amember_protect]'});
	}
}
);
tinymce.PluginManager.add('amember_protect', tinymce.plugins.amember_protect);
})();


