@extends(Config('page-settings.Folder') . '.layouts.user.parent')


	@section("meta-tags")
	@endsection

	@section("base-styles")
		loadCSS( "{{asset(Config('page-settings.HelpersCSS'))}}", false, "all")
		loadCSS( "{{asset(Config('page-settings.CountriesCSS'))}}", false, "all")
		loadCSS( "{{asset(Config('page-settings.TelephonesCSS'))}}", false, "all")
		loadCSS( "{{asset(Config('page-settings.UserMenuCSS'))}}", false, "all")
		loadCSS( "{{asset(Config('page-settings.ProfileCSS'))}}", false, "all")
		loadCSS( "{{asset(Config('page-settings.CalendarCSS'))}}", false, "all")

	@endsection
	

	@section("main")
		<header class="profile_header">
			<h1 class="title_page">Настройки Профиля</h1>
			<h3 class="uname_tittle">Олег Герасименко</h4>
			<div class="row_header">
				<div class="group_links">
					<a href="#" class="return_link"><i class="fas fa-arrow-left"></i></a>
					<a href="{{url('/')}}" class="logo">
						<img src="{{asset(Config('page-settings.Logo-w'))}}" alt="Logo">
					</a>
				</div>
				<nav class="group_navigation">
					<div class="blind_area"></div>
					<a class="btn-profile"><i class="fas fa-user-circle"></i></a>
				</nav>
			</div>
		</header>
		<main class="main profile_main">
			<div class="profile_main_column">
				<div class="edit-box">
					<h3 class="edit-box_title"><i class="fas fa-address-card"></i>Персональные Данные</h3>
					<div class="form_profile">
							<div class="avatar_form">
								@if($user->avatar == "E")
									<div class="loaded_avatar" data-avatar="false">
										<i class="fas fa-user-astronaut static_avatar"></i>
										<i class="fas fa-camera hover_avatar"></i>
									</div>
								@else
									<div class="loaded_avatar" data-avatar="true" style="background-image: url({{'storage/avatars/' . $user->avatar}});">
										<i class="fas fa-camera hover_avatar"></i>
									</div>
								@endif
								<div class="avatar_tittle">
									Аватар
								</div>
							</div>
							<label for="user_name" class="input_label">Ваше Имя</label>
							<div class="input_group">
								@if($user->first_name == "E")
									<input type="name" class="vmx_input" id="user_name" required="">
								@else
									<input type="name" class="vmx_input" id="user_name" required="" value="{{$user->first_name}}">
								@endif
								<div class="vmx_input_helper" data-type="reg_name"><i class="fas fa-info-circle"></i></div>
								<div class="helper_info reg_name">Введите ваше имя</div>
							</div>
							<label for="user_middlename" class="input_label">Ваше Отчество</label>
							<div class="input_group">
								@if($user->middle_name == "E")
									<input type="name" class="vmx_input" id="user_middlename" required="">
								@else
									<input type="name" class="vmx_input" id="user_middlename" required="" value="{{$user->middle_name}}">
								@endif
								<div class="vmx_input_helper" data-type="reg_middlename"><i class="fas fa-info-circle"></i></div>
								<div class="helper_info reg_middlename">Введите ваше отчество</div>
							</div>
							<label for="user_lastname" class="input_label">Ваша Фамилия</label>
							<div class="input_group">
								@if($user->last_name == "E")
									<input type="name" class="vmx_input" id="user_lastname" required="">
								@else
									<input type="name" class="vmx_input" id="user_lastname" required="" value="{{$user->last_name}}">
								@endif
								<div class="vmx_input_helper" data-type="reg_lastname"><i class="fas fa-info-circle"></i></div>
								<div class="helper_info reg_lastname">Введите вашу фамилию</div>
							</div>

							<label for="user_country" class="input_label">Выберите вашу страну</label>
							<div class="input_group">
								@if($user->country == '1')
									<div class="vmx_input selector_input" id="user_country" toggle="off"><span class="сountry"><b class="flag flag-ua"></b>Украина</span><span class="lang-toggle"><i class="fas fa-caret-down"></i></span></div>
								@else
									<div class="vmx_input selector_input" id="user_country" toggle="off"><span class="сountry"><b class="flag flag-ru"></b>Россия</span><span class="lang-toggle"><i class="fas fa-caret-down"></i></span></div>
								@endif
								<div class="vmx_input_helper" data-type="reg_country"><i class="fas fa-info-circle"></i></div>
								<div class="selector_accordion"></div>
								<div class="helper_info reg_country">Для подбора информации по вашей стране</div>
							</div>

							<label for="user_country" class="input_label">Дата и год рождения</label>
							<div class="input_group calendar">
								@if($user->day == "E")
									<div class="cal calendar-day" data-value="None">День</div>
								@else
									<div class="cal calendar-day" data-value="{{$user->day}}">{{$user->day}}</div>
								@endif

								@if($user->month == "E")
									<div class="cal calendar-month"  data-value="None">Месяц</div>
								@else
									<div class="cal calendar-month"  data-value="{{$user->month}}">{{$month_birth}}</div>
								@endif
								
								@if($user->year == "E")
									<input type='text' data-value="None" id='cal_year' class='cal' placeholder='Год'/>
								@else
									<input type='text' data-value="{{$user->year}}" id='cal_year' class='cal' value="{{$user->year}}" placeholder='Год'/>
								@endif
							</div>
					</div>
				</div>
			</div>
			<div class="profile_main_column">
				<div class="edit-box" style="margin-bottom: 25px;">
					<h3 class="edit-box_title"><i class="fas fa-sign-in-alt"></i>Авторизационные Данные</h3>
					<div class="form_profile">
							<label for="login" class="input_label">Логин</label>
							<div class="input_group">
								<input type="name" class="vmx_input" id="login" required="" value="{{$user->login}}">
								<div class="vmx_input_helper" data-type="reg_login"><i class="fas fa-info-circle"></i></div>
								<div class="helper_info reg_login">Данный логин вы будете использовать при авторизации</div>
							</div>
							<label for="email" class="input_label">E-mail</label>
							<div class="input_group">
								<input type="email" class="vmx_input" id="email" required="" value="{{$user->email}}">
								<div class="vmx_input_helper" data-type="reg_middlename"><i class="fas fa-info-circle"></i></div>
								<div class="helper_info reg_middlename">Введите ваше отчество</div>
							</div>
							<label for="vmx_mask_tel" class="input_label">Телефон</label>
							<div class="input_group">
								@if(substr($user->telephone, 1, 1) == "3")
									<div class="vmx_country" id="user_phone" lang="ua"><span class="сountry-phone"><b class="flag flag-ua"></b></span></div>
									<input type="tel" id="vmx_mask_tel" class="vmx_input_tel" placeholder="+380(__) __-__-___" value="{{$user->telephone}}">
								@else
									<div class="vmx_country" id="user_phone" lang="ru"><span class="сountry-phone"><b class="flag flag-ru"></b></span></div>
									<input type="tel" id="vmx_mask_tel" class="vmx_input_tel" placeholder="+7 ___ ___-__-__" value="{{$user->telephone}}">
								@endif
								<div class="vmx_input_helper" data-type="reg_phone"><i class="fas fa-info-circle"></i></div>
								<div class="helper_info reg_phone">Данный номер телефона будет использоваться для авторизации и восстановления пароля</div>
							</div>
							<button class="change_password">Изменить пароль</button>
					</div>
				</div>
			<!-- 	<div class="edit-box" style="margin-bottom: 25px;">
					<h3 class="edit-box_title"><i class="fas fa-sitemap"></i>Привязка к соц.сетям</h3>
					<div class="form_profile">
						<div class="notification_group link_wires">
							<label class="input_label">Новости</label>
							<label class="switch">
							  <input type="checkbox">
							  <span class="slider round"></span>
							</label>
						</div>
					</div>	
				</div> -->
				<div class="edit-box">
					<h3 class="edit-box_title"><i class="fas fa-sitemap"></i>Ваша Роль</h3>
					<div class="form_profile">
							<label for="seat" class="input_label">Должность</label>
							<div class="input_group">
								@if($user->seat == "E")
									<input type="text" class="vmx_input" id="seat" required="" placeholder="CEO, Sales Manager ...">
								@else
									<input type="text" class="vmx_input" id="seat" required="" placeholder="CEO, Sales Manager ..." value="{{$user->seat}}">
								@endif
								
								<div class="vmx_input_helper" data-type="seat"><i class="fas fa-info-circle"></i></div>
								<div class="helper_info seat">Введите вашу должность в компании</div>
							</div>
							<label for="account_role" class="input_label">Роль аккаунта</label>
							<div class="input_group disabled">
								<input type="text" class="vmx_input" id="account_role" required="" value="Владелец" disabled="">
								<div class="vmx_input_helper" data-type="account_role"><i class="fas fa-info-circle"></i></div>
								<div class="helper_info account_role">Статус отношение к аккаунту</div>
							</div>
					</div>
				</div>
			</div>
			<div class="profile_main_column">
				<div class="edit-box" style="margin-bottom: 25px;">
					<h3 class="edit-box_title"><i class="far fa-bell"></i>Настройка уведомлений</h3>
					<div class="form_profile">
						<div class="email_notifications">
							<h4 class="label">E-mail</h4>
							<div class="notification_group">
								<label class="input_label">Новости</label>
								<label class="switch">
								  <input type="checkbox" data-type="enews" @if($user->enews == 1)checked="" sw-toggle="on"@else sw-toggle="off"@endif>
								  <span class="slider round"></span>
								</label>
							</div>
							<div class="notification_group">
								<label class="input_label">Обновления</label>
								<label class="switch">
								  <input type="checkbox" data-type="eupd" @if($user->eupd == 1)checked="" sw-toggle="on"@else sw-toggle="off"@endif>
								  <span class="slider round"></span>
								</label>
							</div>
						</div>
						<h4 class="label">Меню</h4>
						<div class="notification_group">
							<label class="input_label">Новости</label>
							<label class="switch">
							  <input type="checkbox" data-type="mnews" @if($user->mnews == 1)checked="" sw-toggle="on"@else sw-toggle="off"@endif>
							  <span class="slider round"></span>
							</label>
						</div>
						<div class="notification_group">
							<label class="input_label">Обновления</label>
							<label class="switch">
							  <input type="checkbox" data-type="mupd" @if($user->mupd == 1)checked="" sw-toggle="on"@else sw-toggle="off"@endif>
							  <span class="slider round"></span>
							</label>
						</div>
					</div>		
				</div>
				<div class="edit-box">
					<h3 class="edit-box_title"><i class="far fa-file-alt"></i>Дополнительные Данные</h3>
					<div class="form_profile">
							<label for="wtel" class="input_label">Робочий Телефон</label>
							<div class="input_group">
								@if($user->wtel == "E")
									<input type="text" class="vmx_input additional_info" data-type="wtel" id="wtel" required="" placeholder="(По желанию)">
								@else
									<input type="text" class="vmx_input additional_info" data-type="wtel" id="wtel" value="{{$user->wtel}}" required="" placeholder="(По желанию)">
								@endif
								<div class="vmx_input_helper" data-type="wtel"><i class="fas fa-info-circle"></i></div>
								<div class="helper_info wtel">(По желанию) Введите ваш рабочий номер телефона</div>
							</div>
							<label for="htel" class="input_label">Домашний Телефон</label>
							<div class="input_group">
								@if($user->htel == "E")
									<input type="text" class="vmx_input additional_info" data-type="htel" id="htel" required="" placeholder="(По желанию)">
								@else
									<input type="text" class="vmx_input additional_info" data-type="htel" id="htel" value="{{$user->htel}}" required="" placeholder="(По желанию)">
								@endif
								<div class="vmx_input_helper" data-type="htel"><i class="fas fa-info-circle"></i></div>
								<div class="helper_info htel">(По желанию) Введите ваш домашний номер телефона</div>
							</div>
							<label for="fax" class="input_label">Факс</label>
							<div class="input_group">
								@if($user->fax == "E")
									<input type="text" class="vmx_input additional_info" data-type="fax" id="fax" required="" placeholder="(По желанию)">
								@else
									<input type="text" class="vmx_input additional_info" data-type="fax" id="fax" value="{{$user->fax}}" required="" placeholder="(По желанию)">
								@endif
								<div class="vmx_input_helper" data-type="fax"><i class="fas fa-info-circle"></i></div>
								<div class="helper_info fax">(По желанию) Введите ваш факс</div>
							</div>
					</div>
				</div>
			</div>

			<div class="claendar-modal" id="cmodal">
				<div class="modal-wrap">
					<div class="modal-header">
						<h3 class="title"></h3>
						<button id="hide_modal">Закрыть</button> 
					</div>
					<div class="modal-body">
					</div>
				</div>
			</div>	
		</main>
	@endsection

	@section("umenu")
		{!!$umenu!!}
	@endsection


	@section('scripts')
	<!-- Load Scripts Start -->
	<script>var scr = {"scripts":[
		{"src" : "{{asset('assets/js/libs.js')}}", "async" : false},
		{"src" : "{{asset(Config('page-settings.Notification'))}}", "async" : false},
		{"src" : "{{asset(Config('page-settings.UserMenuJS'))}}", "async" : false},
		{"src" : "{{asset(Config('page-settings.MaskedJS'))}}", "async" : false},
		{"src" : "{{asset(Config('page-settings.CountriesJS'))}}", "async" : false},
		{"src" : "{{asset(Config('page-settings.TelephonesJS'))}}", "async" : false},
		{"src" : "{{asset(Config('page-settings.Guidance'))}}", "async" : false},
		{"src" : "{{asset(Config('page-settings.CalendarJS'))}}", "async" : false},
		{"src" : "{{asset(Config('page-settings.ProfileJS'))}}", "async" : false},
		]};!function(t,n,r){"use strict";var c=function(t){if("[object Array]"!==Object.prototype.toString.call(t))return!1;for(var r=0;r<t.length;r++){var c=n.createElement("script"),e=t[r];c.src=e.src,c.async=e.async,n.body.appendChild(c)}return!0};t.addEventListener?t.addEventListener("load",function(){c(r.scripts);},!1):t.attachEvent?t.attachEvent("onload",function(){c(r.scripts)}):t.onload=function(){c(r.scripts)}}(window,document,scr);
	</script>
	
	<!-- Load Scripts End -->
	@show	