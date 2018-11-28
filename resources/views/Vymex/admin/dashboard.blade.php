@extends(Config('page-settings.Folder') . '.layouts.admin.parent')


	@section("meta-tags")
	@endsection

	@section("base-styles")
		loadCSS( "{{asset(Config('page-settings.HelpersCSS'))}}", false, "all")
		loadCSS( "{{asset(Config('page-settings.AdminCSS'))}}", false, "all")
	@endsection
	

	@section("sidebar")
		{!!$sidebar!!}
	@endsection	

	@section("main")
		<main class="admin_content-box">
			<header class="admin_header">
				<h1 class="hello-admin">Здравствуйте, Герасименко Олег!</h1>
				<h3 class="smile-alert">Я подготовил для вас аналитику на сегодня.</h1>
			</header>
			<div class="dashboard">
				<div class="statisic_rows">
					<div class="statistic-box followers_statistic">
						<div class="statistic-title">Пользователи Vymex</div>
						<div class="statistic-info">
							<div class="statistic-value">3456</div>
							<div class="statistic-changes"><span class="value-sign">+</span>250</div>
							<div class="statistic-changes deleted"><span class="value-sign">-</span>10</div>
							<div class="canvas-group">
								<canvas class="canvas-graphs" id="followers"></canvas>
								<div class="canvas-value">85%</div>
							</div>
							
						</div>
					</div>
					<div class="statistic-box guest_statistic">
						<div class="statistic-title">Уникальные посещение Vymex</div>
						<div class="statistic-info">
							<div class="statistic-value">3456</div>
							<div class="statistic-changes"><span class="value-sign">+</span>10</div>
							<div class="canvas-group">
								<canvas class="canvas-graphs" id="guest"></canvas>
								<div class="canvas-value">65%</div>
							</div>
						</div>
					</div>
					<div class="statistic-box audit_statistic">
						<div class="statistic-title">Прошли аудит Vymex</div>
						<div class="statistic-info">
							<div class="statistic-value">1506</div>
							<div class="statistic-changes"><span class="value-sign">+</span>8000</div>
							<div class="canvas-group">
								<canvas class="canvas-graphs" id="audit"></canvas>
								<div class="canvas-value">35%</div>
							</div>
						</div>
					</div>
				</div>
				<div class="user_rows">
					<div class="users_box">
						<div class="users_toolbar">
							<div class="user_title">Новые пользователи Vymex</div>
							<a href="{{route('users')}}" class="look_all">
								Подробнее <i class="fas fa-eye"></i>
							</a>
						</div>
						<table class="users_table">
							<thead>
								<tr>
									<th class="c-1">Пользователь</th>
									<th class="c-2">Этап на Vymex</th>
									<th class="c-3">Аудит</th>
									<th class="c-4">Дата Регистрации</th>
									<th class="c-5">Карточка пользователя</th>
								</tr>
							</thead>
							<tbody>
								<tr>
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
										28.08.2018
									</td>
									<td class="c-5">
										<button class="look_all">
											<i class="fas fa-eye"></i>
										</button>
									</td>
								</tr>
								<tr class="reverse-bg">
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
										28.08.2018
									</td>
									<td class="c-5">
										<button class="look_all">
											<i class="fas fa-eye"></i>
										</button>
									</td>
								</tr>
								<tr>
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
										28.08.2018
									</td>
									<td class="c-5">
										<button class="look_all">
											<i class="fas fa-eye"></i>
										</button>
									</td>
								</tr>
								<tr class="reverse-bg">
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
										28.08.2018
									</td>
									<td class="c-5">
										<button class="look_all">
											<i class="fas fa-eye"></i>
										</button>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</main>
	@endsection



	@section('scripts')
	<!-- Load Scripts Start -->
	<script>var scr = {"scripts":[
		{"src" : "{{asset('assets/js/libs.js')}}", "async" : false},
		{"src" : "{{asset(Config('page-settings.AdminStatisticsCanvasJS'))}}", "async" : false},
		]};!function(t,n,r){"use strict";var c=function(t){if("[object Array]"!==Object.prototype.toString.call(t))return!1;for(var r=0;r<t.length;r++){var c=n.createElement("script"),e=t[r];c.src=e.src,c.async=e.async,n.body.appendChild(c)}return!0};t.addEventListener?t.addEventListener("load",function(){c(r.scripts);},!1):t.attachEvent?t.attachEvent("onload",function(){c(r.scripts)}):t.onload=function(){c(r.scripts)}}(window,document,scr);
	</script>
	
	<!-- Load Scripts End -->
	@show	