<!DOCTYPE html>
<html class="no-js" lang="ru">

<head>

	<meta charset="utf-8">

	<title>Vymex</title>
	<meta name="description" content="">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<meta property="og:image" content="path/to/image.jpg">

	<!-- <link rel="shortcut icon" href="{{asset('assets/img/favicon/favicon.ico')}}" type="image/x-icon"> -->
	<!-- <link rel="apple-touch-icon" href="{{asset('assets/img/favicon/apple-touch-icon.png')}}">
	<link rel="apple-touch-icon" sizes="72x72" href="{{asset('assets/img/favicon/apple-touch-icon-72x72.png')}}">
	<link rel="apple-touch-icon" sizes="114x114" href="{{asset('assets/img/favicon/apple-touch-icon-114x114.png')}}"> -->

	

	<!-- Header CSS (First Sections of Website: paste after release from header.min.css here) -->
	<style></style>

	<!-- Load CSS, CSS Localstorage & WebFonts Main Function -->
	<script>!function(e){"use strict";function t(e,t,n){e.addEventListener?e.addEventListener(t,n,!1):e.attachEvent&&e.attachEvent("on"+t,n)}function n(t,n){return e.localStorage&&localStorage[t+"_content"]&&localStorage[t+"_file"]===n}function a(t,a){if(e.localStorage&&e.XMLHttpRequest)n(t,a)?o(localStorage[t+"_content"]):l(t,a);else{var s=r.createElement("link");s.href=a,s.id=t,s.rel="stylesheet",s.type="text/css",r.getElementsByTagName("head")[0].appendChild(s),r.cookie=t}}function l(e,t){var n=new XMLHttpRequest;n.open("GET",t,!0),n.onreadystatechange=function(){4===n.readyState&&200===n.status&&(o(n.responseText),localStorage[e+"_content"]=n.responseText,localStorage[e+"_file"]=t)},n.send()}function o(e){var t=r.createElement("style");t.setAttribute("type","text/css"),r.getElementsByTagName("head")[0].appendChild(t),t.styleSheet?t.styleSheet.cssText=e:t.innerHTML=e}var r=e.document;e.loadCSS=function(e,t,n){var a,l=r.createElement("link");if(t)a=t;else{var o;o=r.querySelectorAll?r.querySelectorAll("style,link[rel=stylesheet],script"):(r.body||r.getElementsByTagName("head")[0]).childNodes,a=o[o.length-1]}var s=r.styleSheets;l.rel="stylesheet",l.href=e,l.media="only x",a.parentNode.insertBefore(l,t?a:a.nextSibling);var c=function(e){for(var t=l.href,n=s.length;n--;)if(s[n].href===t)return e();setTimeout(function(){c(e)})};return l.onloadcssdefined=c,c(function(){l.media=n||"all"}),l},e.loadLocalStorageCSS=function(l,o){n(l,o)||r.cookie.indexOf(l)>-1?a(l,o):t(e,"load",function(){a(l,o)})}}(this);</script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fastclick/1.0.6/fastclick.min.js"></script>
	
	<!-- Load CSS Start -->
	<!-- <script>loadLocalStorageCSS( "webfonts", "{{asset('assets/css/fonts.min.css?ver=1.0.0')}}" );</script> -->
	<script>//loadCSS( "css/header.min.css?ver=1.0.0", false, "all" );</script>
	<script>loadCSS( "{{asset('assets/css/main.min.css?ver=1.0.0')}}", false, "all" );</script>
	<script>loadCSS( "{{asset('assets/css/header.min.css?ver=1.0.0')}}", false, "all" );</script>
	<!-- Load CSS End -->

	<!-- Load CSS Compiled without JS -->
	<noscript>
		<link rel="stylesheet" href="{{asset('assets/css/fonts.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/main.min.css')}}">
	</noscript>

	
</head>
	
<body>
	<div class="page-wrap">
		<div class="header-sm">
			<div class="lang">
				<a href="#" class="active lang-ru">RU</a>
				<a href="#" class="lang-en">EN</a>
			</div>
			<img src="{{asset('assets/img/vymex.png')}}" alt="Logo" id="logo" style="width: 50px; height: auto">
			<div onclick="$('.hidden').css('display', 'flex');"><i class="fas fa-bars"></i></div>
		</div>
		<header class="header">
			<div class="header-menu">
				<img src="{{asset('assets/img/vymex.png')}}" alt="Logo" style="width: auto; height: 40px">
				<a href="{{url('/')}}" class="menu-itm">Главная</a>
				<a href="{{route('product')}}" class="menu-itm">Продукт</a>
				<a href="{{route('blog')}}" class="menu-itm">Блог</a>
				<a href="#" class="menu-itm">Контакты</a>
			</div>
			<div class="header-auth">
				<a href="#" class="auth-item"><i class="fas fa-user"></i>Войти</a>
				<a href="#" class="auth-item">Регистрация</a>
				<div class="lang">
					<a href="#" class="active lang-ru">RU</a>
					<a href="#" class="lang-en">EN</a>
				</div>
			</div>
		</header>
		<main class="main">
			<div class="main-bg">
				<img src="{{asset('assets/img/bg.png')}}" class="bg-one" alt="">
				<img src="{{asset('assets/img/iphone.png')}}" class="bg-two" alt="">
			</div>
			<div class="main-text">
				<div>Оприделите точки роста вашего бизнеса и получите инструменты для их развития</div>
				<p>1. Пройдите аудит за 20 минуи и 5$<br>2. ВАЙМЕКС сам рассчитает и предоставит вам пошаговый план и инструменты для систематизации</p>
			</div>
			<div class="main-btns">
				<p>
					<span>1</span><span>2</span> <span>3</span> <span>4</span><span>5</span> <span>6</span> <span>7</span> <span>8</span> <span>9</span> <span>10</span></p>
				<p>
					<span>1</span><span>2</span> <span>3</span> <span>4</span><span>5</span> <span>6</span> <span>7</span> <span>8</span> <span>9</span> <span>10</span></p>
				<p>
					<span>1</span><span>2</span> <span>3</span> <span>4</span><span>5</span> <span>6</span> <span>7</span> <span>8</span> <span>9</span> <span>10</span></p>
				<p>
					<span>1</span><span>2</span> <span>3</span> <span>4</span><span>5</span> <span>6</span> <span>7</span> <span>8</span> <span>9</span> <span>10</span></p>
				<p>
					<span>1</span><span>2</span> <span>3</span> <span>4</span><span>5</span> <span>6</span> <span>7</span> <span>8</span> <span>9</span> <span>10</span></p>
				<p>
					<span>1</span><span>2</span> <span>3</span> <span>4</span><span>5</span> <span>6</span> <span>7</span> <span>8</span> <span>9</span> <span>10</span></p>
				<a href="#" class="main-btn">Узнать больше</a>
			</div>
		</main>
	</div>

	<div class="hidden">
		<a onclick="$('.hidden').css('display', 'none');">X</a>
		<div class="auth-sm">
			<i class="fas fa-user"></i>
			<a href="#" class="auth-item">Войти</a>
			<a href="#" class="auth-item">Регистрация</a>
		</div>
		<div class="menu-sm">
			<a href="index.html" class="menu-itm">Главная</a>
			<a href="products.html" class="menu-itm">Продукт</a>
			<a href="blog.html" class="menu-itm">Блог</a>
			<a href="#" class="menu-itm">Контакты</a>
		</div>
	</div>
	

	<!--[if lt IE 9]>
	<script src="libs/html5shiv/es5-shim.min.js"></script>
	<script src="libs/html5shiv/html5shiv.min.js"></script>
	<script src="libs/html5shiv/html5shiv-printshiv.min.js"></script>
	<script src="libs/respond/respond.min.js"></script>
	<![endif]-->


	<!-- Load Scripts Start -->
	<script>var scr = {"scripts":[
		{"src" : "{{asset('assets/js/libs.js')}}", "async" : false},
		{"src" : "{{asset('assets/js/common.js')}}", "async" : false}
		]};!function(t,n,r){"use strict";var c=function(t){if("[object Array]"!==Object.prototype.toString.call(t))return!1;for(var r=0;r<t.length;r++){var c=n.createElement("script"),e=t[r];c.src=e.src,c.async=e.async,n.body.appendChild(c)}return!0};t.addEventListener?t.addEventListener("load",function(){c(r.scripts);},!1):t.attachEvent?t.attachEvent("onload",function(){c(r.scripts)}):t.onload=function(){c(r.scripts)}}(window,document,scr);
	</script>
	<!-- Load Scripts End -->


</body>
</html>
