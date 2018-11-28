@extends(Config('page-settings.Folder') . '.layouts.parent')
	
	@section("meta-tags")
	@endsection

	@section("base-styles")
		loadCSS( "{{asset(Config('page-settings.fontsCSS'))}}", false, "all")
		loadCSS( "{{asset(Config('page-settings.headerCSS'))}}", false, "all")
		loadCSS( "{{asset(Config('page-settings.appCSS'))}}", false, "all")
		loadCSS( "{{asset(Config('page-settings.libsCSS'))}}", false, "all")
	@endsection

	@section("header")
		{!!$header!!}
	@endsection	
		@section('main')
			<div class="page-wrap">
				<main class="main">
					<div class="main-bg">
						<img src="{{asset(Config('page-settings.ClientsImg') . 'app/bg-triangle.png')}}" class="bg-one" alt="">
						<img src="{{asset(Config('page-settings.ClientsImg') . 'app/iphone.png')}}" class="bg-two" alt="">
					</div>
					<div class="main-text">
						<div>Оприделите точки роста вашего бизнеса и получите инструменты для их развития</div>
						<p>1. Пройдите аудит за 20 минуи и 5$<br>2. ВАЙМЕКС сам рассчитает и предоставит вам пошаговый план и инструменты для систематизации</p>
					</div>
					<div class="main-btns">
						<a href="#" class="main-btn">Пройти аудит</a>
						<a href="#" class="get_more">Узнать подробнее...</a>
					</div>
				</main>
			</div>
		@endsection

		@section('mobile-version')
	
		

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
		{"src" : "{{asset('assets/js/common.js')}}", "async" : false}
		]};!function(t,n,r){"use strict";var c=function(t){if("[object Array]"!==Object.prototype.toString.call(t))return!1;for(var r=0;r<t.length;r++){var c=n.createElement("script"),e=t[r];c.src=e.src,c.async=e.async,n.body.appendChild(c)}return!0};t.addEventListener?t.addEventListener("load",function(){c(r.scripts);},!1):t.attachEvent?t.attachEvent("onload",function(){c(r.scripts)}):t.onload=function(){c(r.scripts)}}(window,document,scr);
	</script>
	<!-- Load Scripts End -->
	@show



