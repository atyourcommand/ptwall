//JavaScript Document
//Place functions within this document
//Call functions within the dom ready in the html page

window.addEvent('domready', function() {
var customTips = $$('.tooltip');

var toolTips = new Tips(customTips, {
	//this will set how long before 
	//the tooltip will wait to show up
	//when you mouseover the element
	//in milliseconds
	showDelay: 100,    //default is 100
	
	//this is how long the tooltip
	//will delay bofore hiding
	//when you leave
	hideDelay: 50,   //default is 100
	
	//this will add a wrapper div 
	//with the following class to your tooltips
	//this lets you have different styles of tooltips
	//on the same page
	className: 'anything', //default is null
	
	//this sets the x and y offets
	offsets: {
		'x': 0,       //default is 16
		'y': 68        //default is 16
	},
	
	//this determines whether the tooltip
	//remains staitionary or follows your cursor
	//true makes it stationary
 	fixed: true,      //default is false
	
	//if you call the functions outside of the options
	//then it may "flash" a bit on transitions
	//much smoother if you leave them in here
	onShow: function(toolTipElement){
	    //passes the tooltip element
		//you can fade in to full opacity
		//or leave them a little transparent
    	toolTipElement.fade(.9);
		//$('show').highlight('#FFF504');
	},
	onHide: function(toolTipElement){
    	toolTipElement.fade(0);
		//$('hide').highlight('#FFF504');//
	}
});


//var toolTipsTwo = new Tips('.tooltip2', {	
//	className: 'something_else', //default is null
//});

//you can change the tooltips values by using .store();
//to override the rel, you can use the following code
//$('tooltipID1').store('tip:text', 'You can replace the href with whatever text you want.');
//$('tooltipID1').store('tip:title', 'Here is a new title.');

//the following code will not change the tooltip text
//$('tooltipID1').set('rel', 'This will not change the tooltips text');
//$('tooltipID1').set('title', 'This will not change the tooltips title');

//toolTips.detach('#tooltipID2');
//toolTips.detach('#tooltipID4');
//toolTips.attach('#tooltipID4');

});

//great article on how to customize the tooltips
//http://davidwalsh.name/mootools-12-tooltips-customize
