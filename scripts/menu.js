// JavaScript Document

//once the DOM is ready
window.addEvent('domready', function() {

  if ($("SORTS")) {
    $("SORTS").addEvent('change', function() { $("sortSet").submit() });
  }

  var myLinks = $$('a.saveList');
  myLinks.each(function(link, i) {
    link.onclick = function() {
      if (link.hasClass('removeList') == true)
        toggleSaveListLink(link, link.getAttribute("id"), 'removeList');
      else
        toggleSaveListLink(link, link.getAttribute("id"), 'addList');
      return false;
    };
  });

  //TO hide the My Account dropdown menu
  document.onclick = hideMyAccountOptions;
});

function showSpydusPopup(myLink) {
  var opts = "width=800,height=600,menubar=yes,toolbar=yes,status=yes,resizable=yes,scrollbars=yes";
  var popup = window.open(myLink, "spydusPopup", opts);
  popup.focus();
  return false;
};

function toggleSaveListLink(myLink) {
  var myURL = myLink.getAttribute("href");

  var request = new Request({
    url: myURL,
    method: 'get',

    onRequest: function() {
    },
    onComplete: function(responseXml) {
      //Toggle Cookies
      toggleSavelistCookies(responseXml);

      //Toggle href, Class, and span innerText
      var span = $E('span', myLink);
      if (myLink.hasClass('removeList')) {
        myLink.removeClass('removeList');
        myLink.addClass('addList');
        myURL = myURL.replace('?RSVL', '?SVL');
        myLink.setAttribute('href', myURL);
        if (span) {
          span.set({ 'html': 'Add to List' });
        }
      }
      else {
        myLink.removeClass('addList');
        myLink.addClass('removeList');
        myURL = myURL.replace('?SVL', '?RSVL');
        myLink.setAttribute('href', myURL);
        if (span) {
          span.set({ 'html': 'Remove from List' });
        }
      }
    }
  }).send();
};

function toggleSavelistCookies(responseXml) {
  var xmlDoc = getDomObject(responseXml); //Get DOM object

  if (xmlDoc.documentElement != null) {
    var xNodes = xmlDoc.documentElement.firstChild.childNodes;
    if (xNodes.length > 0) {
      for (var i = 0; i < xNodes.length; i++) {
        if (xNodes[i].attributes.getNamedItem('VALUE').value != "")
          Cookie.set(xNodes[i].attributes.getNamedItem('NAME').value, xNodes[i].attributes.getNamedItem('VALUE').value);
        else
          Cookie.remove(xNodes[i].attributes.getNamedItem('NAME').value);
      }
    }
  }
};

function showTag(tagName) {
  if ($(tagName)) $(tagName).style.display = "block";
};

function hideTag(tagName) {
  if ($(tagName)) $(tagName).style.display = "none";
};

function getDomObject(strXML) {
  try //Internet Explorer
    {
    xmlDoc = new ActiveXObject("Microsoft.XMLDOM");
    xmlDoc.async = "false";
    xmlDoc.loadXML(strXML);
    return xmlDoc;
  }
  catch (e) {
    try //Firefox, Mozilla, Opera, etc.
    {
      parser = new DOMParser();
      xmlDoc = parser.parseFromString(strXML, "text/xml");
      return xmlDoc;
    }
    catch (e) { alert(e.message) }
  }
  return null;
};

//Apply Class to Elements
function applyClass(myClass, meElement) {
  var el_array = $$(meElement);

  if (el_array) {
    el_array.each(
			function(el) {
			  el.addClass(myClass);
			}
		);
  }
};

//Remove Class from Elements
function removeClass(myClass, meElement) {
  var el_array = $$(meElement);

  if (el_array) {
    el_array.each(
			function(el) {
			  el.removeClass(myClass);
			}
		);
  }
};

function getIEVersionNumber() {
  var ua = navigator.userAgent;
  var MSIEOffset = ua.indexOf("MSIE ");

  if (MSIEOffset == -1) {
    return 0;
  } else {
    return parseFloat(ua.substring(MSIEOffset + 5, ua.indexOf(";", MSIEOffset)));
  }
};

function $E(selector, filter) {
  return ($(filter) || document).getElement(selector);
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

var Cookie = new Abstract({
  options: {
    domain: false, path: false, duration: false, secure: false
  }
   , set: function(key, value, options) {
     options = $merge(this.options, options); value = encodeURIComponent(value); if (options.domain) value += '; domain=' + options.domain; if (options.path) value += '; path=' + options.path; if (options.duration) {
       var date = new Date(); date.setTime(date.getTime() + options.duration * 24 * 60 * 60 * 1000); value += '; expires=' + date.toGMTString();
     }
     if (options.secure) value += '; secure'; document.cookie = key + '=' + value; return $extend(options, {
       'key': key, 'value': value
     }
      );
   }

   , get: function(key) {
     var value = document.cookie.match('(?:^|;)\\s*' + key.escapeRegExp() + '=([^;]*)'); return value ? decodeURIComponent(value[1]) : false;
   }

   , remove: function(cookie, options) {
     if ($type(cookie) == 'object') this.set(cookie.key, '', $merge(cookie, {
       duration: -1
     }
      )); else this.set(cookie, '', $merge(options, {
        duration: -1
      }
      ));
   }
}
);

function showMyAccountOptions() {
  if ($('myAccountBox')) {
    if ($('myAccountBox').style.display != 'block') {
      $('myAccountBox').style.display = 'block';
      $('myAccountTrigger').addClass('active');
      $('myAccountBox').focus();
    }
    else {
      $('myAccountBox').style.display = 'none';
      if ($('myAccountTrigger').hasClass("active")) $('myAccountTrigger').removeClass('active');
    } 
  }
}

function hideMyAccountOptions(e) {
  if ($('myAccountBox')) {
    var target = e ? e.target : event.srcElement;
    if (target.id == 'myAccountTrigger')
      return;
    if (target != $('myAccountBox')) {
      $('myAccountBox').style.display = 'none';
      if ($('myAccountTrigger').hasClass("active")) $('myAccountTrigger').removeClass('active');
    }
  }
}
