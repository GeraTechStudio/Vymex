@extends(Config('page-settings.Folder') . '.layouts.admin.parent')


	@section("meta-tags")
		<meta name="next-page" value="{{route('userInfo')}}">	
	@endsection

	@section("base-styles")
		loadCSS( "{{asset(Config('page-settings.HelpersCSS'))}}", false, "all")
		loadCSS( "{{asset(Config('page-settings.AUserCSS'))}}", false, "all")
	@endsection
	

	@section("sidebar")
	@endsection	

	@section("main")
		<header class="users_header">
			<a href="{{route('admin-dashboard')}}" class="back-link"><i class="fas fa-long-arrow-alt-left"></i></a>
			<h1 class="page-title">Пользователи</h1>
			<a href="{{url('/')}}" class="main-link"><img src="{{asset(Config('page-settings.Logo-w'))}}" alt="Logo"></a>
		</header>
		<main class="users_main">
			<h1 class="hello-admin">Здравствуйте, Герасименко Олег!</h1>
			<h3 class="smile-alert">Здесь собрана вся информация по пользователям. Данные собрананы в порядке добавления.</h3>
			<div class="user_rows">
					<div class="users_box">
						<div class="users_toolbar">
							<div class="user_title">Все пользователи Vymex</div>
							<div class="user_toolbar-settings">
								<button>
									Фильтр <i class="fas fa-sliders-h"></i>
								</button>
								<button>
									<i class="fas fa-cogs"></i>
								</button>
							</div>
						</div>
						<table class="users_table">
							<thead>
								<tr>
									<th class="c-1">Пользователь</th>
									<th class="c-2">Этап на Vymex</th>
									<th class="c-3">Аудит</th>
									<th class="c-4">Сотрудников</th>
									<th class="c-5">Был в сети</th>
									<th class="c-6">Дата регистрации</th>
									<th class="c-7">
										<div class="checkbox">
											<i class="fas fa-check"></i>
										</div>
									</th>
								</tr>
							</thead>
							<tbody>
								<tr user-id="1">
									<td class="c-1">
										<div class="user-box">
											<div class="user-avatar">
												<i class="fas fa-user-astronaut"></i>
											</div>
											<div class="user_name">Герасименко Олег</div>
										</div>
									</td>
									<td class="c-2">
										Нужно придумать пароль
									</td>
									<td class="c-3">
										Пройден (5.2)
									</td>
									<td class="c-4">
										2
									</td>
									<td class="c-5">
										12:52:13 14.11.2018
									</td>
									<td class="c-6">
										28.08.2018
									</td>
									<td class="c-7">
										<div class="checkbox">
											<i class="fas fa-check"></i>
										</div>
									</td>
								</tr>
								<tr user-id="2" class="reverse-bg">
									<td class="c-1">
										<div class="user-box">
											<div class="user-avatar">
												<i class="fas fa-user-astronaut"></i>
											</div>
											<div class="user_name">Герасименко Олег</div>
										</div>
									</td>
									<td class="c-2">
										Нужно придумать пароль
									</td>
									<td class="c-3">
										Пройден (5.2)
									</td>
									<td class="c-4">
										5
									</td>
									<td class="c-5">
										10:12:58
									</td>
									<td class="c-6">
										28.08.2018
									</td>
									<td class="c-7">
										<div class="checkbox">
											<i class="fas fa-check"></i>
										</div>
									</td>
								</tr>
								<tr user-id="2">
									<td class="c-1">
										<div class="user-box">
											<div class="user-avatar">
												<i class="fas fa-user-astronaut"></i>
											</div>
											<div class="user_name">Герасименко Олег</div>
										</div>
									</td>
									<td class="c-2">
										Нужно придумать пароль
									</td>
									<td class="c-3">
										Пройден (5.2)
									</td>
									<td class="c-4">
										18
									</td>
									<td class="c-5">
										10:12:58
									</td>
									<td class="c-6">
										28.08.2018
									</td>
									<td class="c-7">
										<div class="checkbox">
											<i class="fas fa-check"></i>
										</div>
									</td>
								</tr>
								<tr user-id="2" class="reverse-bg">
									<td class="c-1">
										<div class="user-box">
											<div class="user-avatar">
												<i class="fas fa-user-astronaut"></i>
											</div>
											<div class="user_name">Герасименко Олег</div>
										</div>
									</td>
									<td class="c-2">
										Нужно придумать пароль
									</td>
									<td class="c-3">
										Пройден (5.2)
									</td>
									<td class="c-4">
										9
									</td>
									<td class="c-5">
										10:12:58
									</td>
									<td class="c-6">
										28.08.2018
									</td>
									<td class="c-7">
										<div class="checkbox">
											<i class="fas fa-check"></i>
										</div>
									</td>
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