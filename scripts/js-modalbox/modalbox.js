window.addEvent('domready',function(){

//* hide using opacity on page load 
$$('.fb-modal').setStyles({
opacity:0,
display:'block'
});

//* hiders 
$$('.fb-close').addEvent('click',function(e) { $$('.fb-modal').fade('out'); });
window.addEvent('keypress',function(e) { if(e.key == 'esc') { $$('.fb-modal').fade('out'); } });

// click to show 
$$('.fb-trigger').addEvent('click',function(e) {
$(e.target).getParent().getParent().getNext().fade('in')
});

});