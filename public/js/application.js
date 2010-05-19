$(function(){
	
	$('.ajax_enabled_form').submit(function(){
		var form = $(this);
		
		$.ajax({
			url: form.attr('action'),
			type: 'POST',
			dataType: 'script',
			data: form.serialize()
		});
		
		return false;
	});
	
});