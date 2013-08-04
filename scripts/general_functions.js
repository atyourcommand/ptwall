function getElementsByClass(strClass, obj, e) {
    if (typeof e != 'object') {
        e = new Array();
    }
    if (typeof obj.className != 'undefined') {
        classes = obj.className.split(' ');
        for (i = 0; i < classes.length; i++) {
            if (classes[i] == strClass) {
                e[e.length] = obj;
            }
        }
    }
    for (var i = 0; i < obj.childNodes.length; i++) {
        e = getElementsByClass(strClass, obj.childNodes[i], e);
    }
    
    return e;
}

function getElementsById(strId) {
    if (typeof strId != 'string') {
        return strId;
    }

    if (typeof document.getElementById != 'undefined') {
        return document.getElementById(strId);
    } else if (typeof document.all != 'undefined') {
        return document.all[strId];
    } else if (typeof document.layers != 'undefined') {
        return document.layers[strId];
    } else {
        return null;
    }
}

function getElementsByTag(strTag, obj, e) {
    if (typeof strTag != 'string') {
        return strTag;
    }

    if (typeof e != 'object') {
        e = new Array();
    }

    if (typeof obj != 'object') {
        obj = document.body;
    }

    if (obj.tagName.toLowerCase() == strTag.toLowerCase()) {
        e[e.length] = obj;
    }
    for (var i = 0; i < obj.childNodes.length; i++) {
        if (typeof obj.childNodes[i].tagName != 'undefined') {
            e = getElementsByTag(strTag, obj.childNodes[i], e);
        }
    }

    return e;
}

function showByClass(strClass, obj) {
    //default to the whole document
    if (typeof obj != 'object') {
        obj = document.body;
    }

    if (typeof strClass == 'string') {
        var el = getElementsByClass(strClass, obj);
        if(el.length > 0) {
            for (i = 0; i < el.length; i++) {
                el[i].style.display = 'block';
            }
        }
    }
    //added to address the <ol> problem in IE8/9
    document.getElementById('empty').innerHTML = ' ';
}

function hideByClass(strClass, obj) {
    //default to the whole document
    if (typeof obj != 'object') {
        obj = document.body;
    }

    if (typeof strClass == 'string') {
        var el = getElementsByClass(strClass, obj);
        if (el.length > 0) {
            for (i = 0; i < el.length; i++) {
                el[i].style.display = 'none';
            }
        }
    }
}

function showById(strID) {
    if (typeof strID == 'string') {
        var el = getElementsById(strID);
        if (el) {
            el.style.display = 'block';
        }
        //added to address the <ol> problem in IE8/9
        var empty = document.getElementById('empty');
        if(typeof empty != 'undefined') {
            empty.innerHTML = ' ';
        }
    }
}

function hideById(strID) {
    if (typeof strID == 'string') {

        var el = getElementsById(strID);

        if (el) {
            el.style.display = 'none';
        }
    }
}

/*
* **********************
* App specific functions
*
************************
*/


/*
* 
* Tabbed content based on an unordered list "navigation"
*
*/
function tabbedContent(ul_id) {
    //select the tabs
    var tab = getElementsById('tabs');
    var tabs = getElementsByTag('li', tab);

    for (var i = 0; i < tabs.length; i++) {
        var aTag = getElementsByTag('a', tabs[i]);
        if (aTag.length > 0) {
            for (var j = 0; j < aTag.length; j++) {
                var id = aTag[j].href.split('#');
                //hide all content except the first tab
                
				//Changed from 0 to 1 as the first tab is being used for an image. JB
				if (i > 0) {
                    hideById(id[1]);
                } else {
                    aTag[j].className += 'active';
                }

                //bind click event
                aTag[j].onclick = function (e) {
                    //hide other tabs
                    var active = getElementsByClass('active', tab);
                    if (active.length > 0) {
                        for (var k = 0; k < active.length; k++) {
                            a_id = active[k].href.split('#');
                            hideById(a_id[1]);
                            active[k].className = "";
                        }
                    }

                    //show current tab
                    this.className += 'active';
                    var id = this.href.split('#');
                    showById(id[1]);
                    
                    return false;
                }

            }
        }
    }
}