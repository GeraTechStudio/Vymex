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

	<header class="header-p">

		<div class="page-wrap-p">

			<div class="header-sm-p">
				<div class="lang">
					<a href="#" class="">RU</a>
					<a href="#" class="">EN</a>
				</div>
				<img src="{{asset('assets/img/header/logo.png')}}" alt="Logo" style="width: 50px; height: auto">
				<div onclick="$('.hidden').css('display', 'flex');"><i class="fas fa-bars"></i></div>
			</div>
			
			<div class="header-p-top">
				<div class="top-menu">
				<img src="{{asset('assets/img/header/logo.png')}}" alt="Logo" style="width: auto; height: 40px"  id="logo">
					<a href="{{url('/')}}" class="top-menu-itm">Главная</a>
					<a href="{{route('product')}}" class="top-menu-itm">Продукт</a>
					<a href="{{route('blog')}}" class="top-menu-itm">Блог</a>
					<a href="#" class="top-menu-itm">Контакты</a>
				</div>
				<div class="top-auth">
					<a href="#" class="top-auth-itm"><i class="fas fa-user"></i>Войти</a>
					<a href="#" class="top-auth-itm">Регистрация</a>
					<div class="lang-p">
						<a href="#" class="">RU</a>
						<a href="#" class="">EN</a>
					</div>
				</div>
			</div>

		</div>

	</header>

	<section class="blog">
		
		<div class="page-wrap-p">
			
			<div class="side-menu">
				<div class="side-menu-m">
					<a href="#" class="menu-m-itm menu-a" onclick="changeLink(this);">Свежые статьи</a>
					<a href="#" class="menu-m-itm" onclick="changeLink(this);">Новости</a>
					<a href="#" class="menu-m-itm" onclick="changeLink(this);">Найм сотрудников</a>
					<a href="#" class="menu-m-itm" onclick="changeLink(this);">Ошибки внедрения</a>
					<a href="#" class="menu-m-itm" onclick="changeLink(this);">Инструменты для бизнеса</a>
					<a href="#" class="menu-m-itm" onclick="changeLink(this);">Система в бизнесе</a>
				</div>
				<form action="post" class="side-menu-f">
					<p>Подпешитесь получайте на почту новые кейсы первыми</p>
					<input type="text" placeholder="Ваше Имя">
					<input type="email" placeholder="Введите почту">
					<a href="#" class="">Подписаться</a>
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
				<div class="breadcrumbs">
					Главная >> Блог
				</div>
				<div class="article">
					<a class="article-itm">
						<img src="{{asset('assets/img/blog/pic1.png')}}" alt="">
						<div>
							<h4>Система это совокупность процессов управления ресурсами, с возможностью контроля KPI</h4>
							<p>Что такое система</p>
						</div>
					</a>
					<a class="article-itm">
						<img src="{{asset('assets/img/blog/pic1.png')}}" alt="">
						<div>
							<h4>Инструменты для бизнеса которые помогут вам контролировать...</h4>
							<p>Инструменты для бизнеса</p>
						</div>
					</a>
					<a class="article-itm">
						<img src="{{asset('assets/img/blog/pic1.png')}}" alt="">
						<div>
							<h4>Инструменты для бизнеса которые помогут вам контролировать...</h4>
							<p>Инструменты для бизнеса</p>
						</div>
					</a>
					<a class="article-itm">
						<img src="{{asset('assets/img/blog/pic1.png')}}" alt="">
						<div>
							<h4>Инструменты для бизнеса которые помогут вам контролировать...</h4>
							<p>Инструменты для бизнеса</p>
						</div>
					</a>
					<a class="article-itm">
						<img src="{{asset('assets/img/blog/pic1.png')}}" alt="">
						<div>
							<h4>Инструменты для бизнеса которые помогут вам контролировать...</h4>
							<p>Инструменты для бизнеса</p>
						</div>
					</a>
				</div>
				<div class="article">
					<a class="article-itm">
						<img src="{{asset('assets/img/blog/pic1.png')}}" alt="">
						<div>
							<h4>Система это совокупность процессов управления ресурсами, с возможностью контроля KPI</h4>
							<p>Что такое система</p>
						</div>
					</a>
					<a class="article-itm">
						<img src="{{asset('assets/img/blog/pic1.png')}}" alt="">
						<div>
							<h4>Инструменты для бизнеса которые помогут вам контролировать...</h4>
							<p>Инструменты для бизнеса</p>
						</div>
					</a>
					<a class="article-itm">
						<img src="{{asset('assets/img/blog/pic1.png')}}" alt="">
						<div>
							<h4>Инструменты для бизнеса которые помогут вам контролировать...</h4>
							<p>Инструменты для бизнеса</p>
						</div>
					</a>
					<a class="article-itm">
						<img src="{{asset('assets/img/blog/pic1.png')}}" alt="">
						<div>
							<h4>Инструменты для бизнеса которые помогут вам контролировать...</h4>
							<p>Инструменты для бизнеса</p>
						</div>
					</a>
					<a class="article-itm">
						<img src="{{asset('assets/img/blog/pic1.png')}}" alt="">
						<div>
							<h4>Инструменты для бизнеса которые помогут вам контролировать...</h4>
							<p>Инструменты для бизнеса</p>
						</div>
					</a>
				</div>
				<div class="pagination">
					<a href="#" class="page page-a" onclick="changePage(this);">1</a>
					<a href="#" class="page" onclick="changePage(this);">2</a>
					<a href="#" class="page" onclick="changePage(this);">...</a>
					<a href="#" class="page" onclick="changePage(this);">6</a>
					<a href="#" class="">Вперед ></a>
					<a href="#"></a>
				</div>
			</div>

		</div>

	</section>


	<footer class="footer-p">
		<div class="footer-p-wrap">
				<div class="footer-p-itm">
					<h4>
						Последнее обновление
					</h4>
					<a>Сентябрь 2018</a>
				</div>
				<div class="footer-p-itm">
					<h4>
						API и виджеты
					</h4>
				</div>
				<div class="footer-p-itm">
					<h4>
						Блог о систематизации
					</h4>
					<a>Все</a>
					<a>Как системно улучшить систему</a>
				</div>
				<div class="footer-p-itm">
					<h4>
						Наши контакты
					</h4>
					<a href="tel:380445005555" class="grey">+38 (044) 500 55 55</a>
					<a href="tel:74955005555" class="grey">+7 (495) 500 55 55</a>
				</div>
				<div class="footer-p-itm">
					<h4>
						Разбор продукта
					</h4>
					<a>Анализ состояния процессов</a>
					<a>Расчет рекомендаций</a>
					<a>Обучающие материалы</a>
					<a>Рабочие инструменты</a>
					<a>Продукты</a>
				</div>
				<div class="footer-p-itm">
					<h4>
						Отзывы
					</h4>
					<a>Кейсы</a>
					<a>ЦЕНЫ</a>
					<a>Тарифы</a>
				</div>
				<div class="footer-p-itm">
					<h4>
						Партнеры
					</h4>
					<a>Программисты</a>
				</div>
				<div class="footer-p-itm">
					<h4>
						Мы в соцю сетях
					</h4>
					<a class="grey">(значки)</a>
					<a class="grey">Лицензеонное соглашение</a>
					<a class="grey">Политика компании</a>
					<a class="grey">Безопасность и надежность</a>
					<a><img src="img/footer-logo.png" alt=""></a>
				</div>
			</div>
	</footer>

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
