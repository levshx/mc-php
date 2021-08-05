$(document).ready(function() {
	$('form').submit(function(event) {
		var json;
		event.preventDefault();
		$.ajax({
			type: $(this).attr('method'),
			url: $(this).attr('action'),
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(result) {
				json = jQuery.parseJSON(result);
				if (json.url) {
					window.location = '/' + json.url;
				} else if (json.status) {
					alert(json.status + ' - ' + json.message);
				} else if (json.method) {
					if (json.method == 'reload')
					window.location+=''; 
				}
			},
		});
	});
});