$('.helper_info').css({
	'box-shadow': '2px 2px 5px #5d5a5b',
	position: 'absolute',
	'background-color': '#3e77ac',
    color: '#fff',
	'font-family': 'ULightItalic',
	padding: '5px 8px',
	right: '35px',
	// width: '112%',
	'font-size': '1em',
	'border-radius': '4px',
	cursor: 'default',
	display: 'none',
	'z-index': 99999,
});

$('.vmx_input_helper i').hover(
	function(){
		var typeHover = $(this).parent().attr('data-type');
		$('.helper_info.' + typeHover).css('display', 'block');
	},
	function(){
		var typeHover = $(this).parent().attr('data-type');
		$('.helper_info.' + typeHover).css('display', 'none');
	}
);



$('.show_pass i').hover(
	function(){
		var typeHover = $(this).parent().attr('data-type');
		switch (typeHover) {
			case 'reg_main':
				$('#user_pass').attr('type', 'name');
				break;
			case 'reg_rep':
				$('#user_pass_rep').attr('type', 'name');
				break;
		}
	},
	function(){
		var typeHover = $(this).parent().attr('data-type');
		switch (typeHover) {
			case 'reg_main':
				$('#user_pass').attr('type', 'password');
				break;
			case 'reg_rep':
				$('#user_pass_rep').attr('type', 'password');
				break;
		}
	}
);