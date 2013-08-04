function $E(selector, filter) {

   return($(filter) || document).getElement(selector);

   };

function SetInnerHTML(t, newHTML) {

   t.innerHTML = $A(newHTML).join('');

   };

var Abstract = function(obj) {

   obj = obj || {

      };

   obj.extend = $extend;

   return obj;

   };

var Cookie = new Abstract( {

   options : {

      domain : false, path : false, duration : false, secure : false }

   , set : function(key, value, options) {

      options = $merge(this.options, options); value = encodeURIComponent(value); if(options.domain) value += '; domain=' + options.domain; if(options.path) value += '; path=' + options.path; if(options.duration) {

         var date = new Date(); date.setTime(date.getTime() + options.duration * 24 * 60 * 60 * 1000); value += '; expires=' + date.toGMTString(); }

      if(options.secure) value += '; secure'; document.cookie = key + '=' + value; return $extend(options, {

         'key':key, 'value':value}

      ); }

   , get : function(key) {

      var value = document.cookie.match('(?:^|;)\\s*' + key.escapeRegExp() + '=([^;]*)'); return value ? decodeURIComponent(value[1]) : false; }

   , remove : function(cookie, options) {

      if($type(cookie) == 'object') this.set(cookie.key, '', $merge(cookie, {

         duration :- 1}

      )); else this.set(cookie, '', $merge(options, {

         duration :- 1}

      )); }

   }

);



var Site = {

	start: function(){

		if($('expanders')) Site.vertical();
		

      	

	},

	vertical: function(){

      	var list = $$('#expanders li div.collapse');

      	var headings = $$('#expanders li h3');

      	var collapsibles = new Array();

		var cookieFound = false;

	  	headings.each(function(heading, i){

			var collapsible = new Fx.Slide(list[i], {

				duration: 500,

				transition: Fx.Transitions.linear,

				onComplete: function(request){}

			});
			
			
			
			
			
			
			
			
			
			
			
			

			collapsibles[i] = collapsible;

			

			var span = $E('span', heading);

			if(span){

				span.set({'html':'+'});

			}

			

			heading.onclick = function(){

				var span = $E('span', heading);

				if(span){

					span.set({'html':(span.innerHTML == '+' ? '-' : '+')});

				}

				if(Cookie.get('menu_'+i)){

					Cookie.remove('menu_'+i);

				}else{

					Cookie.set('menu_'+i);

				}

				collapsible.toggle();

				return false;

			}



			list[i].setStyle('display','block');

			

			if(Cookie.get('menu_'+i)){

cookieFound = true;

collapsible.show();

var span = $E('span', heading);

if(span){

span.set({'html':'-'});

}

}else{

var dontCollapse = list[i].getProperty('rel');

        if(dontCollapse != 'dontcollapse' || cookieFound){

collapsible.hide();

}else{

var span = $E('span', heading);

if(span){

span.set({'html':'-'});

}

}

}

});

}

};

window.addEvent('domready', Site.start); 