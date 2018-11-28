$(document).ready(function(){
	var disabled = function disabled(){
		$(".vymex-animation").fadeOut();
	}

	setTimeout(disabled, 1800);

	$('.btn-group').on('click', '.btn-vymex', function(){

		var type = $(this).attr('data-type');

		if($(this).hasClass("active")){
			return false;
		}else{
			$('.btn-vymex').removeClass('active');
			$(this).addClass('active');
		}

		var current = $('.btn-group').attr('current-type');
		$('.btn-group').attr('current-type', type);

		switch(type) {
			case "rate":
				$("#" + current).fadeOut('200', function(){
					$("#rate").fadeIn('0');
				});
				break;
			case "pie":
				$("#" + current).fadeOut('200', function(){
					$("#pie").fadeIn('0');
				});
				break;
			case "history":
				$("#" + current).fadeOut('200', function(){
					$("#history").fadeIn('0');
				});
				break;
		}
	});
});