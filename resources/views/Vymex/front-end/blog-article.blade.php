@extends(Config('page-settings.Folder') . '.layouts.parent')

@section("meta-tags")
	@endsection

	@section("base-styles")
		loadCSS( "{{asset(Config('page-settings.fontsCSS'))}}", false, "all")
		loadCSS( "{{asset(Config('page-settings.headerCSS'))}}", false, "all")
		loadCSS( "{{asset(Config('page-settings.libsCSS'))}}", false, "all")
		loadCSS( "{{asset(Config('page-settings.footerCSS'))}}", false, "all")
		loadCSS( "{{asset(Config('page-settings.HelpersCSS'))}}", false, "all")
		loadCSS( "{{asset(Config('page-settings.blogArticleCSS'))}}", false, "all")
	@endsection

	@section("header")
		{!!$header!!}
	@endsection	
		@section('main')
			<main class="blog">
				<div class="page-wrap-p">
					<div class="side-menu">
						<div class="side-menu-m">
							<h2 href="#" class="menu-a">Свежые статьи</h2>
							<a href="#" class="menu-m-itm" onclick="changeLink(this);">Новости</a>
							<a href="#" class="menu-m-itm" onclick="changeLink(this);">Найм сотрудников</a>
							<a href="#" class="menu-m-itm" onclick="changeLink(this);">Ошибки внедрения</a>
							<a href="#" class="menu-m-itm" onclick="changeLink(this);">Инструменты для бизнеса</a>
							<a href="#" class="menu-m-itm" onclick="changeLink(this);">Система в бизнесе</a>
							<a href="#" class="menu-m-itm" onclick="changeLink(this);">Что такое Vymex?</a>
							<a href="#" class="menu-m-itm" onclick="changeLink(this);">Этапы внедрения процессов</a>
							<a href="#" class="menu-m-itm" onclick="changeLink(this);">Что такое Vymex?</a>
							<a href="#" class="menu-m-itm" onclick="changeLink(this);">Бизнес как математическая модель</a>
						</div>
						<form action="post" class="side-menu-f">
							<p>Подпишитесь и получайте на e-mail новые кейсы первыми</p>
							<div class="input_group">
								<input type="name"  class="subscribers" placeholder="Ваше Имя" input-number="1">
								<div class="border_line bl-1"></div>
							</div>
							<div class="input_group">
								<input type="email"  class="subscribers" placeholder="Введите почту" input-number="2">
								<div class="border_line bl-2"></div>
							</div>
							<button>Подписаться</button>
						</form>
						<div class="side-menu-s">
							<h6>Присоединяйтесь</h6>
							<p>в социальных сетях</p>
							<div class="menu-s-social">
								<a href="#" class="s-social-itm"><i class="fab fa-instagram"></i></a>
								<a href="#" class="s-social-itm"><i class="fab fa-vk"></i></a>
								<a href="#" class="s-social-itm"><i class="fab fa-telegram-plane"></i></a>
								<a href="#" class="s-social-itm"><i class="fab fa-facebook-square"></i></a>
								<a href="#" class="s-social-itm"><i class="fab fa-youtube"></i></a>
							</div>
						</div>
					</div>
					<div class="blog-main">
						<h1 class="blog-title">{{$blog->blog_name}}</h1>
						<div class="breadcrumbs">
							<a href="{{route('blog')}}" class="allow-link"> Vymex Блог</a>
							<a href="#" class="current-link">{{$blog->blog_name}}</a>
						</div>
						<?php 
							$date = explode(' ', $blog->created_at);
						?>
						<div class="bar_article">
							<div class="socials-shares">
								<div class="link-share gg-share"><i class="fab fa-google"></i> +1</div>
								<div class="link-share tw-share"><i class="fab fa-twitter"></i> Tweet</div>
								<div class="link-share fb-share"><i class="fab fa-facebook-f"></i> Like</div>
							</div>
							<span class="date">{{$date[0]}}</span>
						</div>
						<div class="blog-article">
							<img class="preview-img" src="{{asset('storage/blogs/blog-' . $blog->id . '/' . $blog->blog_img)}}">
							@foreach($articles as $article)
								{!!$article->data!!}
							@endforeach
						</div>
					</div>
					<aside class="blog-sidebar">
						
					</aside>
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
		{"src" : "{{asset(Config('page-settings.BlogJS'))}}", "async" : false},
		// {"src" : "{{Config('page-settings.ScrollbarJS')}}", "async" : false},
		// {"src" : "{{Config('page-settings.mousewheelJS')}}", "async" : false},
		
		]};!function(t,n,r){"use strict";var c=function(t){if("[object Array]"!==Object.prototype.toString.call(t))return!1;for(var r=0;r<t.length;r++){var c=n.createElement("script"),e=t[r];c.src=e.src,c.async=e.async,n.body.appendChild(c)}return!0};t.addEventListener?t.addEventListener("load",function(){c(r.scripts);},!1):t.attachEvent?t.attachEvent("onload",function(){c(r.scripts)}):t.onload=function(){c(r.scripts)}}(window,document,scr);
	</script>
	<!-- Load Scripts End -->
	@show