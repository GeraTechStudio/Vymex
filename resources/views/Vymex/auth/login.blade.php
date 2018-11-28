@extends(Config('page-settings.Folder') . '.layouts.parent')

@section("meta-tags")
	@endsection

	@section("base-styles")
		loadCSS( "{{asset(Config('page-settings.fontsCSS'))}}", false, "all")
		loadCSS( "{{asset(Config('page-settings.headerCSS'))}}", false, "all")
		loadCSS( "{{asset(Config('page-settings.loginCSS'))}}", false, "all")
		loadCSS( "{{asset(Config('page-settings.libsCSS'))}}", false, "all")
		loadCSS( "{{asset(Config('page-settings.slickCSS'))}}", false, "all")
		loadCSS( "{{asset(Config('page-settings.slickTHEME'))}}", false, "all")
		loadCSS( "{{asset(Config('page-settings.footerCSS'))}}", false, "all")
		<!-- loadCSS( "{{asset(Config('page-settings.ScrollbarCSS'))}}", false, "all") -->
		loadCSS( "{{asset(Config('page-settings.HelpersCSS'))}}", false, "all")
	@endsection

	@section("header")
		{!!$header!!}
	@endsection	
		@section('main')
			
			<main class="main">
				<div class="clients_info_bar">
					<div class="slider vymex-info">
					    <div class="for_service">
					    	<div class="content">
						    	<h2>Для кого предназначен Сервис?</h2>
						    	<div class="content_group">
						    		<div class="img_service">
						    			<img src="{{asset(Config('page-settings.ClientsImg') . 'Login/monitor.png')}}" alt="">
						    		</div>
						    		<div class="info_service">
						    			Все материалы разрабатываются практиками, которые являются действующими предпринимателями которые эти материалы используют у себя в бизнесе. Мы собрали наборы процессов для более 40 ниш с разным уровнем развития.
										<br><br>
										Все предприниматели рано или поздно приходят к тому, что процессы явялются фундаментом в бизнессе и выливают массу денег для того чтобы контролировать деньги.
										<br><br>
										Мы сделали модель кторая пылесосит лучшее с рынка и раздает его тем кто не успел еще напимать процессы самостоятельно, потому что это работа не которой не стыдно ошибиться но зачем если это уже делали многие компании.
						    		</div>
						    	</div>
					    	</div>
					    </div>
					    <div class="for_service">
					    	<div class="content">
						    	<h2>Для кого предназначен Сервис?</h2>
						    	<div class="content_group">
						    		<div class="img_service">
						    			<img src="{{asset(Config('page-settings.ClientsImg') . 'Login/monitor.png')}}" alt="">
						    		</div>
						    		<div class="info_service">
						    			Все материалы разрабатываются практиками, которые являются действующими предпринимателями которые эти материалы используют у себя в бизнесе. Мы собрали наборы процессов для более 40 ниш с разным уровнем развития.
										<br><br>
										Все предприниматели рано или поздно приходят к тому, что процессы явялются фундаментом в бизнессе и выливают массу денег для того чтобы контролировать деньги.
										<br><br>
										Мы сделали модель кторая пылесосит лучшее с рынка и раздает его тем кто не успел еще напимать процессы самостоятельно, потому что это работа не которой не стыдно ошибиться но зачем если это уже делали многие компании.
						    		</div>
						    	</div>
					    	</div>
					    </div>
					    <div class="for_service">
					    	<div class="content">
						    	<h2>Для кого предназначен Сервис?</h2>
						    	<div class="content_group">
						    		<div class="img_service">
						    			<img src="{{asset(Config('page-settings.ClientsImg') . 'Login/monitor.png')}}" alt="">
						    		</div>
						    		<div class="info_service">
						    			Все материалы разрабатываются практиками, которые являются действующими предпринимателями которые эти материалы используют у себя в бизнесе. Мы собрали наборы процессов для более 40 ниш с разным уровнем развития.
										<br><br>
										Все предприниматели рано или поздно приходят к тому, что процессы явялются фундаментом в бизнессе и выливают массу денег для того чтобы контролировать деньги.
										<br><br>
										Мы сделали модель кторая пылесосит лучшее с рынка и раздает его тем кто не успел еще напимать процессы самостоятельно, потому что это работа не которой не стыдно ошибиться но зачем если это уже делали многие компании.
						    		</div>
						    	</div>
					    	</div>
					    </div>
					    <div class="for_service">
					    	<div class="content">
						    	<h2>Для кого предназначен Сервис?</h2>
						    	<div class="content_group">
						    		<div class="img_service">
						    			<img src="{{asset(Config('page-settings.ClientsImg') . 'Login/monitor.png')}}" alt="">
						    		</div>
						    		<div class="info_service">
						    			Все материалы разрабатываются практиками, которые являются действующими предпринимателями которые эти материалы используют у себя в бизнесе. Мы собрали наборы процессов для более 40 ниш с разным уровнем развития.
										<br><br>
										Все предприниматели рано или поздно приходят к тому, что процессы явялются фундаментом в бизнессе и выливают массу денег для того чтобы контролировать деньги.
										<br><br>
										Мы сделали модель кторая пылесосит лучшее с рынка и раздает его тем кто не успел еще напимать процессы самостоятельно, потому что это работа не которой не стыдно ошибиться но зачем если это уже делали многие компании.
						    		</div>
						    	</div>
					    	</div>
					    </div>
					</div>
				</div>
				<div class="clients_forms">
					<form class="login_form">
						<h3>Войти</h3>
						<div class="input_group">
							<input type="name" class="vmx_input" id="login" placeholder="Введите e-mail" required="">
							<div class="vmx_input_helper"></div>
						</div>
						<div class="input_group">
							<input type="password" class="vmx_input" id="password" placeholder="Введите пароль" required="">
							<div class="vmx_input_helper"></div>
						</div>
						<a class="lost_pass" href="">
                            Забыли свой пароль?
                        </a>


						<div class="input_group">
							<label class="vmx_check">
								<label class="switch">
								  <input type="checkbox" data-type="remember" id="remember" value="0">
								  <span class="slider round"></span>
							</label> Запомнить меня</label>
							<button tupe="submit" class="submit_form">Войти</button>
						</div>
						
					</form>

					<form class="register_form">
						<h3>Зарегистрироваться</h3>
						<div class="input_group">
							<input type="email" class="vmx_input email_input" placeholder="Введите e-mail" required="">
							<div class="vmx_input_helper"><i class="fas fa-info-circle"></i></div>
							<div class="helper_info registration">На указанный электронный адрес придет ссылка для перехода к созданию учетной записи</div>
						</div>
						<button tupe="submit" class="submit_form">Создать учетную запись</button>

					</form>
				</div>
			</main>
		@endsection

		@section('mobile-version')
	
		@section('footer')
			{!!$footer!!}
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
		{"src" : "{{asset('assets/libs/slick-1.8.1/slick/slick.min.js')}}", "async" : false},
		{"src" : "{{Config('page-settings.Notification')}}", "async" : false},
		{"src" : "{{Config('page-settings.LoginPageJS')}}", "async" : false},
		// {"src" : "{{Config('page-settings.ScrollbarJS')}}", "async" : false},
		// {"src" : "{{Config('page-settings.mousewheelJS')}}", "async" : false},
		
		]};!function(t,n,r){"use strict";var c=function(t){if("[object Array]"!==Object.prototype.toString.call(t))return!1;for(var r=0;r<t.length;r++){var c=n.createElement("script"),e=t[r];c.src=e.src,c.async=e.async,n.body.appendChild(c)}return!0};t.addEventListener?t.addEventListener("load",function(){c(r.scripts);},!1):t.attachEvent?t.attachEvent("onload",function(){c(r.scripts)}):t.onload=function(){c(r.scripts)}}(window,document,scr);
	</script>
	<!-- Load Scripts End -->
	@show