$(document).ready(function(){
	
	/*Redirect to user-info*/
	$('.users_table').on('click', 'tr', function(){
		var user_id = $(this).attr('user-id'),			
			url = $('meta[name="next-page"]').attr('value');
			window.location.replace(url + '/' + user_id);
	});

	$('.users_table').on('click', 'tr .checkbox', function(){
			return false;
	});
});