$(document).ready(function(event) {
	console.log(APP_ENV);
	$('.delete').click(function(event) {

		event.preventDefault();
		var ids = $(this).attr('id');
		var id = ids.split("-").pop();
		var host = window.location.host;
		if (APP_ENV != 'local') {
			host = window.location.hostname;
		}
		var url = 'http://'+host+'/comment/'+ id +'/delete';

		ajaxCall(url);
	});
		
});
/**
* ajax call and reload page on success
**/
function ajaxCall(url) {
	$.ajax({
		url: url,
		data: {
		 format: 'json'
		},
		error: function(error) {
	      console.log(error);
		},
		success: function(data) {
			location.reload();
		},
		type: 'GET'
   });
}