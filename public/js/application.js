$(function(){
	
	$('textarea').autoResize({
	    // On resize:
	    onResize : function() {
	        $(this).css({opacity:0.8});
	    },
	    // After resize:
	    animateCallback : function() {
	        $(this).css({opacity:1});
	    },
	    // Quite slow animation:
	    animateDuration : 300,
	
	    // More extra space:
	    extraSpace : 100
	});
	
	$('form.deleteObjectLink').submit(function(){
		if(!confirm('Once you delete this, it is gone forever.  Continue?')){
			return false;
		}
	});
	
});