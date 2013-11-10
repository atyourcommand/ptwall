// JavaScript Document
//Collapse containers for UI
$(document).ready(function(){
/* Collapse Widgets */
/* toggler Search Containers */

 var c = 0;
 var panel = $("li.widget ul");
 var l = $('li.widget a.toggler').length - 1;
 $("li.widget a.toggler").addClass("active");

 for (c=0;c<=l;c++){

 var cvalue = $.cookie('panel' + c);

 if ( cvalue != 'open' + c ) {
 $(panel).eq(c).slideUp(500);
 $(panel).eq(c).prev().removeClass('active').addClass('inactive');
 };
};

$("li.widget a.toggler.inactive").toggle(
 function () {
 var num = $("li.widget a.toggler").index(this);
 var cooky = 'panel' + num;
 var value = 'open' + num;
 $(this).next("ul").slideDown(500);
 $(this).removeClass('inactive');
 //added this
 $(this).addClass("active");
 //
 $.cookie(cooky, value, { path: '/', expires: 10 });

 },
 
 function () {
 var num = $("li.widget a.toggler").index(this);
 var cooky = 'panel' + num;
 $(this).next("ul").slideUp(500);
 $(this).addClass("inactive");
 //added this
 $(this).removeClass("active");
 
 $.cookie(cooky, null, { path: '/', expires: 10 });
 }
 );

$("li.widget a.toggler.active").toggle(
 function () {
 var num = $("li.widget a.toggler").index(this);
 var cooky = 'panel' + num;
 $(this).next("ul").slideUp(500);
 $(this).addClass("inactive");
 $(this).removeClass('active');
 $.cookie(cooky, null, { path: '/', expires: 10 });

 },
function () {
var num = $("li.widget a.toggler").index(this);
var cooky = 'panel' + num;
var value = 'open' + num;
$(this).next("ul").slideDown(500);
$(this).removeClass('inactive');

$.cookie(cooky, value, { path: '/', expires: 10 });
}

);

/* toggler Form Containers */

 var c = 0;
 var box = $("li.expanders .expander-container");
 var l = $('li.expanders h3 a.toggler').length - 1;
 $("h3 a.toggler").addClass("active");

 for (c=0;c<=l;c++){

 var cvalue = $.cookie('box' + c);

 if ( cvalue != 'open' + c ) {
 //$(box).eq(c).slideUp(500);
 $(box).eq(c).prev().removeClass('active').addClass('inactive');
 };
};

$("li.expanders a.toggler.inactive").toggle(
 function () {
 var num = $("li.expanders h3 a.toggler").index(this);
 var cooky = 'box' + num;
 var value = 'open' + num;
 $(this).closest("h3").next("ul").slideDown(500);
 $(this).removeClass('inactive');
 //added this
 $(this).addClass("active");
 //
 $.cookie(cooky, value, { path: '/', expires: 10 });

 },
 
 function () {
 var num = $("li.expanders h3 a.toggler").index(this);
 var cooky = 'box' + num;
 $(this).closest("h3").next("ul").slideUp(500);
 $(this).addClass("inactive");
 //added this
 $(this).removeClass("active");
 
 $.cookie(cooky, null, { path: '/', expires: 10 });
 }
 );

$("li.expanders a.toggler.active").toggle(
 function () {
 var num = $("li.expanders h3 a.toggler").index(this);
 var cooky = 'box' + num;
 $(this).closest("h3").next("ul").slideUp(500);
 $(this).removeClass('active');
 //added this
 $(this).addClass("inactive");
 $.cookie(cooky, null, { path: '/', expires: 10 });

 },
function () {
var num = $("li.expanders h3 a.toggler").index(this);
var cooky = 'box' + num;
var value = 'open' + num;
$(this).closest("h3").next("ul").slideDown(500);
$(this).removeClass('inactive');
//added this
$(this).addClass("active");
$.cookie(cooky, value, { path: '/', expires: 10 });
}

);
 



//added this to close when no cookies present
//if (document.cookie.indexOf('panel') != -1)
//{
//alert('cookie is here');
//}
//else
//{
//alert('cookie is not here');
//$("li.widget ul").slideUp(500);
// };
});