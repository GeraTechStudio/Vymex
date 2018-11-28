$(document).ready(function(){

	$('.subscribers').hover(
		function(){
			$('.bl-' + $(this).attr('input-number')).css('width', '100%');
			console.log('.bl-' + $(this).attr('input-number'));
			$( ".subscribers" ).click(function() {
			  	$('.bl-' + $(this).attr('input-number')).css('width', '100%');
			  	return false;
			});
		},
		function(){
			$('.bl-' + $(this).attr('input-number')).css('width', '0%');
		}
	);


});
	

