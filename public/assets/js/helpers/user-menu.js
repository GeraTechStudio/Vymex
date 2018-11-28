$(document).ready(function(){
	$(".group_navigation").on('click', '.btn-profile', function(){
		$('#umenu').addClass('active');
		$('.user_header').addClass('active');
		$('.profile_header').addClass('active');
	});


	$(document).mouseup(function (e){ // событие клика по веб-документу
		var div = $("#umenu"); // тут указываем ID элемента
		if (!div.is(e.target) // если клик был не по нашему блоку
		    && div.has(e.target).length === 0) { // и не по его дочерним элементам
			$('#umenu').removeClass('active'); // скрываем его
			$('.user_header').removeClass('active'); // и хедер
			$('.profile_header').removeClass('active');
		}
	});
});