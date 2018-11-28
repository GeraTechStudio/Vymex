$(document).ready(function(){

	var countries = [
	    {"id": 0, "co":"ru","ph":"+7","na":"Россия"},
	    {"id": 1, "co":"ua","ph":"+380","na":"Украина"},
	],
	html = '';

	countries.forEach( function(element, index) {
		html +='<div class="country_row country_' + index + '" data-type="' + index + '"><span class="сountry"><b class="flag flag-' + element.co + '"></b>' + element.na + '</span></div>'
		console.log(html);
	});

	$('.selector_accordion').empty().append(html);

	$('.main').on('click', '.selector_input', function(){
		var toggle = $(this).attr('toggle');
		switch (toggle) {
			case 'off':
				$('.selector_accordion').addClass('active');
				$(this).attr('toggle', 'on');
				break;
			case 'on':
				$('.selector_accordion').removeClass('active');
				$(this).attr('toggle', 'off');
				break;
		}
	});


	$('.main').on('click', '.country_row', function(){
		var index = $(this).attr('data-type');
		var newSelector = '<div class="vmx_input selector_input" id="user_country" toggle="off"><span class="сountry"><b class="flag flag-' + countries[index].co + '"></b>' + countries[index].na + '</span><span class="lang-toggle"><i class="fas fa-caret-down"></i></span></div>';
		$('#user_country').replaceWith(newSelector);
		$('.selector_accordion').removeClass('active');
		$(this).attr('toggle', 'off');
	});












	// HTML makets
	/*<div class="vmx_input selector_input" id="user_country" required="">
		<span class="Country" data-type="ua"><b class="flag flag-ua"></b>Украина</span><span class="lang-toggle"><i class="fas fa-caret-down"></i></span>
	</div>
	<div class="vmx_input_helper"><i class="fas fa-info-circle"></i></div>
	<div class="selector_accordion"></div>*/



})