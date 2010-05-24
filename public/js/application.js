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
	
	
	/**
	  * Validations Begin Here
	  */
	$("#signupForm").validate({
		rules: {
			username: {
				required: true,
				minlength: 3
			},
			password: {
				required: true,
				minlength: 5
			},
			email: {
				required: true,
				email: true
			}
		},
		messages: {
			username: {
				required: "Why would you want a blank username?",
				minlength: "Your username must consist of at least 3 characters"
			},
			password: {
				required: "A blank password just doesn't seem very secure",
				minlength: "Your password must be at least 5 characters long"
			},
			email: "We don't spam.  So please, enter a valid e-mail."
		}
	});
	
	
	$("#editUserForm").validate({
		rules: {
			username: {
				required: true,
				minlength: 3
			},
			email: {
				required: true,
				email: true
			}
		},
		messages: {
			username: {
				required: "Why would you want a blank username?",
				minlength: "Your username must consist of at least 3 characters"
			},
			email: "We don't spam.  So please, enter a valid e-mail."
		}
	});
	
	
	$("#loginForm").validate({
		rules: {
			username: {
				required: true
			},
			password: {
				required: true
			}
		},
		messages: {
			username: {
				required: "Blank username?  Try again."
			},
			password: {
				required: "A blank password just doesn't seem very secure"
			}
		}
	});
	
	
	$("#journalForm").validate({
		rules: {
			title: "required",
			content: "required"
		},
		messages: {
			title: "Title, Please?!",
			content: "A Blank Entry?  Gotta be more to life than that."
		}
	});
	
	
	
	
});