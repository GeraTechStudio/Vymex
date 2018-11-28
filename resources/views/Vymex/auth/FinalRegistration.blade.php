@extends(Config('page-settings.Folder') . '.layouts.parent')

	@section("meta-tags")
		<meta name="user_id" value={{$user_id}}>
	@endsection

	@section("base-styles")
		loadCSS( "{{asset(Config('page-settings.fontsCSS'))}}", false, "all")
		loadCSS( "{{asset(Config('page-settings.libsCSS'))}}", false, "all")
		loadCSS( "{{asset(Config('page-settings.FinalRegistrationCSS'))}}", false, "all")
		loadCSS( "{{asset(Config('page-settings.HelpersCSS'))}}", false, "all")
		loadCSS( "{{asset(Config('page-settings.CountriesCSS'))}}", false, "all")
		loadCSS( "{{asset(Config('page-settings.TelephonesCSS'))}}", false, "all")

		/*the function prohibiting the input of Cyrillic characters*/
			function Latin(obj) {
			   if (/^[a-zA-Z0-9 ,.\-:"()]*?$/.test(obj.value)) 
			      obj.defaultValue = obj.value;
			   else 
			      obj.value = obj.defaultValue;
			}
		/*end function*/
	@endsection


		@section("header")
		@endsection	
		@section('main')
			<main class="main">
				<div class="square_registration">
					<header class="header_registration">
						<div class="header_img">
							<img src="{{asset(Config('page-settings.Logo-b'))}}" alt="Logo" id="logo">
						</div>
						<h1 class="header_title">
							онлайн ресурс для<br>оптимизации предприятий
						</h1>
					</header>
					
					<!-- First Stage -->
						<form class="form_field" id="stage-1" style="display:@if($stage == 1) block @else none @endif">
							<h3 class="form_title">
								Регистриция на Vymex <span>(1/3)</span>
							</h3>

							<label for="user_login" class="input_label">Придумайте Логин</label>
							<div class="input_group">
								<input type="name" class="vmx_input" id="user_login" name="user_login" required="">
								<div class="vmx_input_helper" data-type="reg_login"><i class="fas fa-info-circle"></i></div>
								<div class="helper_info reg_login">Данный логин вы будете использовать при авторизации</div>
							</div>

							<label for="user_country" class="input_label">Выберите вашу страну</label>
							<div class="input_group">
								<div class="vmx_input selector_input" id="user_country" toggle="off"><span class="сountry"><b class="flag flag-ua"></b>Украина</span><span class="lang-toggle"><i class="fas fa-caret-down"></i></span></div>
								<div class="vmx_input_helper" data-type="reg_country"><i class="fas fa-info-circle"></i></div>
								<div class="selector_accordion"></div>
								<input type="hidden" id="hidden_country" name="country" value="1">
								<div class="helper_info reg_country">Для подбора информации по вашей стране</div>
							</div>

							<label for="user_name" class="input_label">Введите ваш номер телефона</label>
							<div class="input_group">
								<div class="vmx_country" id="user_phone" lang="ua"><span class="сountry-phone"><b class="flag flag-ua"></b></span></div>
								<input type="tel" id="vmx_mask_tel" class="vmx_input_tel" placeholder="+380(__) __-__-___">
								<div class="vmx_input_helper" data-type="reg_phone"><i class="fas fa-info-circle"></i></div>
								<div class="helper_info reg_phone">Данный номер телефона будет использоваться для авторизации и восстановления пароля</div>
							</div>
							<div class="input_group btm-m">
								<button type="submit" class="submit_form" value="1">Продолжить</button>
							</div>
						</form>

					<!-- Second Stage -->
						<form class="form_field" id="stage-2" style="display:@if($stage == 2) block @else none @endif">
							<h3 class="form_title">
								Регистриция на Vymex <span>(2/3)</span>
							</h3>

							<label for="user_name" class="input_label">Ваше Имя</label>
							<div class="input_group">
								<input type="name" class="vmx_input" id="user_name" required="">
								<div class="vmx_input_helper" data-type="reg_name"><i class="fas fa-info-circle"></i></div>
								<div class="helper_info reg_name">Введите ваше имя</div>
							</div>
							<label for="user_middlename" class="input_label">Ваше Отчество</label>
							<div class="input_group">
								<input type="name" class="vmx_input" id="user_middlename" required="">
								<div class="vmx_input_helper" data-type="reg_middlename"><i class="fas fa-info-circle"></i></div>
								<div class="helper_info reg_middlename">Введите ваше отчество</div>
							</div>
							<label for="user_lastname" class="input_label">Ваша Фамилия</label>
							<div class="input_group">
								<input type="name" class="vmx_input" id="user_lastname" required="">
								<div class="vmx_input_helper" data-type="reg_lastname"><i class="fas fa-info-circle"></i></div>
								<div class="helper_info reg_lastname">Введите вашу фамилию</div>
							</div>
							<div class="input_group">
								<button type="submit" class="submit_form" value="2">Продолжить</button>
							</div>
						</form>

					<!-- Third Stage -->
						<form class="form_field" id="stage-3" style="display:@if($stage == 3) block @else none @endif">
							<h3 class="form_title">
								Регистриция на Vymex <span>(3/3)</span>
							</h3>

							<label for="user_pass" class="input_label">Придумайте пароль</label>
							<div class="input_group">
								<input type="password" class="vmx_input" id="user_pass" required="" onkeyup="Latin(this);">
								<div class="vmx_input_helper show_pass" data-type="reg_main"><i class="far fa-eye"></i></div>
								<div class="vmx_input_helper" data-type="reg_pass"><i class="fas fa-info-circle"></i></div>
								<div class="helper_info reg_pass">Пароль должен содержать не менее 6 символов включая только латинские буквы (нижнего и верхнего регистра) и цифры</div>
							</div>

							<label for="user_pass_rep" class="input_label" onkeyup="Latin(this);">Повторите пароль</label>
							<div class="input_group">
								<input type="password" class="vmx_input" id="user_pass_rep" required="">
								<div class="vmx_input_helper show_pass" data-type="reg_rep"><i class="far fa-eye"></i></div>
								<div class="vmx_input_helper" data-type="reg_pass_rep"><i class="fas fa-info-circle"></i></div>
								<div class="helper_info reg_pass_rep">Пароли должны быть идентичными</div>
							</div>
							<div class="input_group btm-m">
								<button type="submit" class="submit_form" value="3">Продолжить</button>
							</div>
						</form>
				</div>
			</main>
		@endsection

	
		@section('footer')
		@endsection

	

	<!--[if lt IE 9]>
	<script src="libs/html5shiv/es5-shim.min.js"></script>
	<script src="libs/html5shiv/html5shiv.min.js"></script>
	<script src="libs/html5shiv/html5shiv-printshiv.min.js"></script>
	<script src="libs/respond/respond.min.js"></script>
	<![endif]-->

	@section('scripts')
	<!-- Load Scripts Start -->
	<script>var scr = {"scripts":[
		{"src" : "{{asset('assets/js/libs.js')}}", "async" : false},
		{"src" : "{{asset(Config('page-settings.Notification'))}}", "async" : false},
		{"src" : "{{asset(Config('page-settings.MaskedJS'))}}", "async" : false},
		{"src" : "{{asset(Config('page-settings.CountriesJS'))}}", "async" : false},
		{"src" : "{{asset(Config('page-settings.TelephonesJS'))}}", "async" : false},
		{"src" : "{{asset(Config('page-settings.Guidance'))}}", "async" : false},
		{"src" : "{{asset(Config('page-settings.FinalRegistrationJS'))}}", "async" : false},
		
		]};!function(t,n,r){"use strict";var c=function(t){if("[object Array]"!==Object.prototype.toString.call(t))return!1;for(var r=0;r<t.length;r++){var c=n.createElement("script"),e=t[r];c.src=e.src,c.async=e.async,n.body.appendChild(c)}return!0};t.addEventListener?t.addEventListener("load",function(){c(r.scripts);},!1):t.attachEvent?t.attachEvent("onload",function(){c(r.scripts)}):t.onload=function(){c(r.scripts)}}(window,document,scr);
	</script>
	<!-- Load Scripts End -->
	@show