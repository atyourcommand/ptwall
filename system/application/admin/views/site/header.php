<html>
<head>
<title>PTWall - USA</title>
<?= isset($field2)?$field2:''; ?>
<!-- ----------------------------------------------------------------------- -->
<!-- The following code extract is for the site navigator. Renove it if you  -->
<!-- ...are using your own navigation system.                                -->
<!-- ----------------------------------------------------------------------- -->
<link rel="stylesheet" href="./_common/css/main.css" type="text/css" media="all">

<link href="sortableTable.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="./_common/js/mootools.js"></script>
<script type="text/javascript" src="sortableTable.js"></script>


<script type="text/javascript">

//SuckerTree Vertical Menu (Aug 4th, 06)
//By Dynamic Drive: http://www.dynamicdrive.com/style/

var menuids=["navigator"] //Enter id(s) of SuckerTree UL menus, separated by commas

function buildsubmenus(){
for (var i=0; i<menuids.length; i++){
  var ultags=document.getElementById(menuids[i]).getElementsByTagName("ul")
    for (var t=0; t<ultags.length; t++){
    ultags[t].parentNode.getElementsByTagName("a")[0].className="subfolderstyle"
    ultags[t].parentNode.onmouseover=function(){
    this.getElementsByTagName("ul")[0].style.display="block"
    }
    ultags[t].parentNode.onmouseout=function(){
    this.getElementsByTagName("ul")[0].style.display="none"
    }
    }
  }
}

if (window.addEventListener)
window.addEventListener("load", buildsubmenus, false)
else if (window.attachEvent)
window.attachEvent("onload", buildsubmenus)

</script>
<!-- ----------------------------------------------------------------------- -->
<!--                               END OF EXTRACT                            -->
<!-- ----------------------------------------------------------------------- -->


</head>
<BODY>
