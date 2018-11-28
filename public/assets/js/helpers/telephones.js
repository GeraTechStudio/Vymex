$(document).ready(function(){
	
	$('.main').on('click', '.vmx_country', function(){
		var lang = $(this).attr('lang');
		switch (lang) {
			case 'ua':
				$('.vmx_country').empty().append('<span class="сountry-phone"><b class="flag flag-ru"></b></span>');
				$(this).attr('lang', 'ru');
				$('#vmx_mask_tel').val('').attr('placeholder', '+7 ___ ___-__-__').mask("+7 999 999-99-99");
				break;
			case 'ru':
				$('.vmx_country').empty().append('<span class="сountry-phone"><b class="flag flag-ua"></b></span>');
				$(this).attr('lang', 'ua');
				$('#vmx_mask_tel').val('').attr('placeholder', '+380(__) __-__-___').mask("+380(99) 99-99-999");
				break;
		}
	});
});