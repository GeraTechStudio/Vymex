@extends(Config('page-settings.Folder') . '.layouts.admin.parent')


	@section("meta-tags")
		<meta name="next-page" value="{{route('userInfo')}}">	
	@endsection

	@section("base-styles")
		loadCSS( "{{asset(Config('page-settings.HelpersCSS'))}}", false, "all")
		loadCSS( "{{asset(Config('page-settings.AUserCardCSS'))}}", false, "all")
	@endsection
	

	@section("sidebar")
	@endsection	

	@section("main")
		<header class="users_header">
			<a href="{{route('users')}}" class="back-link"><i class="fas fa-long-arrow-alt-left"></i></a>
			<h1 class="page-title">Карта Пользователя</h1>
			<a href="{{url('/')}}" class="main-link"><img src="{{asset(Config('page-settings.Logo-w'))}}" alt="Logo"></a>
		</header>
		<main class="users_main">
			<h1 class="hello-admin">Здравствуйте, Герасименко Олег!</h1>
			<h3 class="smile-alert">Вы находитесь в персональной карточке пользователя.</h3>
			<div class="card-box">	
				<div class="card-first_column">
					<div class="personal_card">
						<h3 class="card_title">
							Пользователь
							<!-- <i class="fas fa-address-card"></i> Персональные данные -->
						</h3>
						<div class="user-card_avatar">
							<i class="fas fa-user-astronaut static_avatar"></i>
						</div>
					</div>
				</div>
				<div class="card-second_column">
					<div class="card_toolbar">
						<div class="card_title"><i class="fas fa-address-card"></i> Персональные данные</div>
					</div>
					<table class="personal_card-table">
						<tbody>
							<tr class="reverse-bg">
								<th class="c-1">ФИО Пользователя</th>
								<td class="c-2">Герасименко Олег Вадимович</td>
							</tr>
							<tr>
								<th class="c-1">Аккаунт</th>
								<td class="c-2">Владелец</td>
							</tr>
							<tr class="reverse-bg">
								<th class="c-1">Должность</th>
								<td class="c-2">СEO "GeraTechStudio"</td>
							</tr>
							<tr>
								<th class="c-1">Логин</th>
								<td class="c-2">Goldscorps</td>
							</tr>
							<tr class="reverse-bg">
								<th class="c-1">E-mail</th>
								<td class="c-2">99gerasimenko.oleg@gmail.com</td>
							</tr>
							<tr>
								<th class="c-1">День рождения</th>
								<td class="c-2">19 Августа 1999г.р.</td>
							</tr>
							<tr class="reverse-bg">
								<th class="c-1">Телефон</th>
								<td class="c-2">+380(50) 93-54-761</td>
							</tr>
							<tr>
								<th class="c-1">Рабочий Телефон</th>
								<td class="c-2">+380(50) 92-15-132</td>
							</tr>
							<tr class="reverse-bg">
								<th class="c-1">Домашний Телефон</th>
								<td class="c-2">+380(44) 91-17-681</td>
							</tr>
							<tr>
								<th class="c-1">Факс</th>
								<td class="c-2">+380(44) 11-11-252</td>
							</tr>
							<tr class="reverse-bg">
								<th class="c-1">Этап на Vymex</th>
								<td class="c-2">Нужно пройти "Туториал"</td>
							</tr>
							<tr>
								<th class="c-1">Последний IP-адрес</th>
								<td class="c-2">127.0.0.1</td>
							</tr>
							<tr class="reverse-bg">
								<th class="c-1">Дата последнего редактирования</th>
								<td class="c-2">16.11.2018</td>
							</tr>
							<tr>
								<th class="c-1">Дата создания профиля</th>
								<td class="c-2">11.11.2018</td>
							</tr>
							<tr class="reverse-bg">
								<th class="c-1">Дата создания аккаунта</th>
								<td class="c-2">11.11.2018</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="card-box">
				<div class="audit-column">
					<div class="adit_card-toolbar">
						<div class="card_title"><i class="fas fa-history"></i> История посещений</div>
					</div>
					<table class="adit_card-table">
						<tbody>
							<tr class="reverse-bg">
								<th class="c-1">Дата прохождение Аудита</th>
								<th class="c-2">Аудит/Ссылка на ответы аудита</th>
							</tr>
							<tr>
								<th class="c-1">15.11.2018</th>
								<td class="c-2"><a href="#"> (7.2) <b>/</b> <span><i class="fas fa-eye"></i>ПОДРОБНЕЕ</a></span></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="history-column">
					<div class="history_card-toolbar">
						<div class="card_title"><i class="fas fa-history"></i> История посещений</div>
					</div>
					<table class="history_card-table">
						<tbody>
							<tr class="reverse-bg">
								<th class="c-1">Дата посещения</th>
								<th class="c-2">Ссылка на карту посещения</th>
							</tr>
							<tr>
								<th class="c-1">15.11.2018</th>
								<td class="c-2"><a href="#"><i class="fas fa-eye"></i>ПОДРОБНЕЕ</a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</main>
	@endsection



	@section('scripts')
	<!-- Load Scripts Start -->
	<script>var scr = {"scripts":[
		{"src" : "{{asset('assets/js/libs.js')}}", "async" : false},
		{"src" : "{{asset(Config('page-settings.AUserJS'))}}", "async" : false},
		]};!function(t,n,r){"use strict";var c=function(t){if("[object Array]"!==Object.prototype.toString.call(t))return!1;for(var r=0;r<t.length;r++){var c=n.createElement("script"),e=t[r];c.src=e.src,c.async=e.async,n.body.appendChild(c)}return!0};t.addEventListener?t.addEventListener("load",function(){c(r.scripts);},!1):t.attachEvent?t.attachEvent("onload",function(){c(r.scripts)}):t.onload=function(){c(r.scripts)}}(window,document,scr);
	</script>
	
	<!-- Load Scripts End -->
	@show	