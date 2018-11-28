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

		<div class="header-p-mid">

			<div class="page-wrap-p header-p-mid-wrap">

				<div class="mid-circles">
					<span class="mid-circle"></span>
					<span class="mid-circle"></span>
					<span class="mid-circle"></span>
					<span class="mid-circle"></span>
					<span class="mid-circle"></span>
				</div>

				<div class="mid-imgs">
					<img src="{{asset('assets/img/header/laptop.png')}}" alt="" style="width: 35vw; height: auto;" class="mid-img">
					<img src="{{asset('assets/img/header/iphone.png')}}" alt="" style="width: 6vw; height: auto;" class="mid-img">
				</div>

				<div class="mid-title">Что такое Автоматическая система оптимизации  бизнес процессов и внедрение системных инструментов</div>
				<div class="mid-data">
					<div class="mid-data-itm">
						<span>800 +</span>
						<p>Прописанных, детализированных процессов готовых к внедрению боле чем для 40 разных видов бизнеса</p>
					</div>
					<div class="mid-data-itm">
						<span>400 +</span>
						<p>Отобранных постоянно развивающиеся   инструмента для внедрения и оптимизации процесов в вашем бизнесе</p>
					</div>
				</div>
				<div class="mid-info">
					<div class="mid-info-btn">
						<a href="#" class="btn">Зарегестрироваться</a>
						<a>Узнать подробнее...</a>
					</div>
					<div class="mid-info-mob">
						<span>+</span>
						<p>Контроль выполнения задач сотрудником с мобильного телефона</p>
					</div>

				</div>

			</div>

		</div>

	</header>

	<section class="audit">
		
		<div class="page-wrap-p">

			<h1>Главные этапы которые вам прийдется выполнить</h1>
			
			<div class="sliderr">
				<div class="slick">
			      <div class="itm idn-0">
			      	<img src="{{asset('assets/img/section1/img1.png')}}" alt="">
			      	<p>Аудит вашего бизнеса</p>
					<div class="audit-itm-h">
						<p>Система задаст все нужные вопросы, которые нужны для понимания состояния ресурсов и процессов, придаст вам оценку скорости относительно ваших конкурентов самостоятельно произойдет сигментация и рассчет рекомендационно построению или улучшению процессов, рассчитает сроки, предложит возможные результаты</p>
						<div href="#" class="audit-itm-btn audit-btn-one">Приступить к аудиту</div>
					</div>
			      </div>      
			      <div class="itm idn-1">
			        <img src="{{asset('assets/img/section1/img1.png')}}" alt="">
			      	<p>Адаптационные материалы</p>
					<div class="audit-itm-h">
						<p>Причины почему вы раньше не внедрили все те инструменты которые доступны на рынке, это то что их очень много, они все на высоком уровне в плане маркетинга и сложные для восприятия, высокий риск что она вам не подходит следующая боль это то как сотрудники это переживают, потому что у них у всех разная мотивация. Мы с помощью алгоритмов отобрали инструменты под вашу нишу, а чтобы заходило с минимальным стрессом мы создали адаптационные материалы и интсрукции под ваш формат бизнеса</p>
						<div href="#" class="audit-itm-btn audit-btn-two">Получить материалы</div>
					</div>
			      </div>      
			      <div class="itm idn-2">
			        <img src="{{asset('assets/img/section1/img1.png')}}" alt="">
			      	<p>Построение процессов</p>
					<div class="audit-itm-h">
						<p>Используя данные аудита, мы подберем вам инструменты, которые максимально сильно соответствуют вашим рессурсам и уже настроенным процессам. Дальше фокус на внедрение с теми же самыми оптимизированными обучающими материалами, задача чтобы это было, с оптимальной скоростью и минимальными рисками, помните весть риск это человеческий фактор, не правильно расчитаны рессурсы и ошибка в подборе инструментов все остальное отговорки. На этих этапах мы предоставим вам все свои разработки и покажем лучшие результаты в вашей нише для понимания их уровня развития</p>
						<div href="#" class="audit-itm-btn audit-btn-three">Получить инструменты</div>
					</div>
			      </div>      
			      <div class="itm idn-3 slick-current">
			        <img src="{{asset('assets/img/section1/img1.png')}}" alt="">
			      	<p>Фиксация и улучшение</p>
					<div class="audit-itm-h">
						<p>Зачастую из-за не созданных процессов бывают скачки в развитии но они либо создают кассовые разрывы либо просто снижаются в показателях. Мы строим процессы так чтобы каждый внедренный инструмент закреплялся и развивался. Потому что не внедрение приносит прибыль, а только лишь стабильная работа. На каждый из инструментов мы закладываем алгоритмы по их подбору, материалы для понимания выгод и как максимально экологично их внедрить, само внедрение, и дальнейшау оптимизацию Здесь вам будут уже помогать наши кураторы, которые разрабытвают эти материалы и являются экспертами в деталях.</p>
						<div href="#" class="audit-itm-btn audit-btn-four">Приступить</div>
					</div>
			      </div> 
			    </div>
			  </div>

			<div class="audit-steps">
				<div class="audit-step audit-step-one">
					<span>Этап 1</span><i class="far fa-check-circle"></i><p></p>
				</div>
				<div class="audit-step audit-step-two">
					<span>Этап 2</span><i class="far fa-check-circle"></i><p></p>
				</div>
				<div class="audit-step audit-step-three">
					<span>Этап 3</span><i class="far fa-check-circle"></i><p></p>
				</div>
				<div class="audit-step audit-step-four">
					<span>Этап 4</span><i class="far fa-check-circle"></i><p></p>
				</div>
			</div>

			<h3>Пройдя максимально точно аудит, вы сразу увидете слабые места в вашем бизнесе</h3>

		</div>

	</section>

	<section class="result">
		
		<div class="page-wrap-p">
			
			<h1>Итог прохождения аудита</h1>
			<div class="result-info">
				<div class="result-info-nums">
					<span>10</span>
					<span>9</span>
					<span>8</span>
					<span>7</span>
					<span>6</span>
					<span>5</span>
					<span>4</span>
					<span>3</span>
					<span>2</span>
					<span>1</span>
				</div>
				<canvas id="myCan" width="1450px" height="450" style="border-bottom: 1px solid #fff;">h</canvas>
				<div class="result-info-descr">
					<div class="result-info-descr-itm">
						<p>Уровень нормы</p>
						<div></div>
					</div>
					<div class="result-info-descr-itm">
						<p>Уровень комфорта</p>
						<div></div>
					</div>
					<div class="result-info-descr-itm">
						<p>Уровень риска</p>
						<div></div>
					</div>
				</div>
			</div>
			<div class="result-stats">
				<div class="result-stats-itm">
					<p>27%</p>
					<div>Показатели</div>
				</div>
				<div class="result-stats-itm">
					<p>52%</p>
					<div>Процессы</div>
				</div>
				<div class="result-stats-itm">
					<p>46%</p>
					<div>Ресурсы</div>
				</div>
			</div>

		</div>

	</section>

	<section class="services">
		
		<div class="page-wrap-p">
			
			<h1>Для кого сервис<span></span></h1>
			<div class="services-info">
				<img src="{{asset('assets/img/section3/monitor.png')}}" alt="">
				<div class="services-info-text">
					<span></span>
					<p>Все материалы разрабатываются практиками, которые являются действующими предпринимателями которые эти материалы используют у себя в бизнесе. Мы собрали наборы процессов для более 40 ниш с разным уровнем развития.</p>
					<p>Все предприниматели рано или поздно приходят к тому, что процессы явялются фундаментом в бизнессе и выливают массу денег для того чтобы контролировать деньги.</p>
					<p>Мы сделали модель кторая пылесосит лучшее с рынка и раздает его тем кто не успел еще напимать процессы самостоятельно, потому что это работа не которой не стыдно ошибиться но зачем если это уже делали многие компании.</p>
				</div>
			</div>
			<div class="services-icons">
				<div class="icons">
					<div class="icons-itm"><img src="{{asset('assets/img/section3/icon1.png')}}" alt=""></div>
					<div class="icons-itm"><img src="{{asset('assets/img/section3/icon2.png')}}" alt=""></div>
					<div class="icons-itm"><img src="{{asset('assets/img/section3/icon3.png')}}" alt=""></div>
					<div class="icons-itm"><img src="{{asset('assets/img/section3/icon4.png')}}" alt=""></div>
					<div class="icons-itm"><img src="{{asset('assets/img/section3/icon5.png')}}" alt=""></div>
					<div class="icons-itm"><img src="{{asset('assets/img/section3/icon6.png')}}" alt=""></div>
					<div class="icons-itm"><img src="{{asset('assets/img/section3/icon7.png')}}" alt=""></div>
					<div class="icons-itm"><img src="{{asset('assets/img/section3/icon8.png')}}" alt=""></div>
				</div>
				<div class="icons">
					<div class="icons-itm"><img src="{{asset('assets/img/section3/icon9.png')}}" alt=""></div>
					<div class="icons-itm"><img src="{{asset('assets/img/section3/icon10.png')}}" alt=""></div>
					<div class="icons-itm"><img src="{{asset('assets/img/section3/icon11.png')}}" alt=""></div>
					<div class="icons-itm"><img src="{{asset('assets/img/section3/icon12.png')}}" alt=""></div>
					<div class="icons-itm"><img src="{{asset('assets/img/section3/icon13.png')}}" alt=""></div>
					<div class="icons-itm"><img src="{{asset('assets/img/section3/icon14.png')}}" alt=""></div>
					<div class="icons-itm"><img src="{{asset('assets/img/section3/icon15.png')}}" alt=""></div>
					<div class="icons-itm"><img src="{{asset('assets/img/section3/icon16.png')}}" alt=""></div>
				</div>
			</div>

		</div>

	</section>

	<section class="materials">
		
		<div class="page-wrap-p">
			
			<h1>От куда у нас эти материалы<span></span></h1>
			<div class="materials-info">
				<div class="materials-info-text">
					<span></span>
					<p>Успешные модели построенны на четко отлаженных процессах. Так же есть не мало экспертов в отдельных отраслях которые изучают и разрабатывают эти все процессы.</p>
					<p>Мы лишь договорились чтобы эти материалы были в доступе на нашей площадке. Мы лишь создали экосистему которая за счет системы вынужденна постоянно улучшаться это всегда привлекает сильных.</p>
				</div>
				<img src="{{asset('assets/img/section4/video.png')}}" alt="">
			</div>

		</div>

	</section>

	<section class="offer">
		<img src="{{asset('assets/img/section5/laptop.png')}}" alt="">

		<div class="page-wrap-p">
			
			<div class="offer-info">
				<p>Мы часто встречаем системы которые по каким-то показателям или процессам точно будут полезны, как для нас так и для пользователей нашего сервиса, главное требование чтобы процесс был описан и успешно интегрируемый в бизнес модель.</p>
				<p>И был факт управления им удаленно. Если вы создали такой инструмент, то мы готовы предоставить вам место на площадке с целью пользы клиентам и пасивного заработка для вас.</p>
				<a class="btn">Предложить инструмент</a>
			</div>

		</div>

	</section>
	
	<section class="steps">

		<div class="page-wrap-p">
			
			<h1>Этапы создания процессов в бизнесе<span></span></h1>
			<div class="steps-info">
				<div class="step">
					<div class="step-title">
						Неописанные
						<span>01</span>
						<div class="btm">
							<img src="{{asset('assets/img/section6/btm.png')}}" alt="" style="width: 100%">
						</div>
					</div>
					<div class="step-info">
						Это момент когда вы уже поняли что нужно простраивать процессы в действиях вы уже действуете системно, но это нигде не описано и сильно зависит от создателя этого процесса
					</div>
				</div>
				<div class="step">
					<div class="step-title">
						Описанные
						<span>02</span>
						<div class="btm">
							<img src="{{asset('assets/img/section6/btm.png')}}" alt="" style="width: 100%">
						</div>
					</div>
					<div class="step-info">
						Процессы которые внедряются и работают в вашем бизнесе, описаиые их передать сотрудникам в виде инструкции
					</div>
				</div>
				<div class="step">
					<div class="step-title">
						Контролируемые
						<span>03</span>
						<div class="btm">
							<img src="{{asset('assets/img/section6/btm.png')}}" alt="" style="width: 100%">
						</div>
					</div>
					<div class="step-info">
						Процессы которые созданы, они стабильно работают и улучшаемые на уровне отдела. Но они еще не интегрируемые с общей матрицей вашого бизнеса.
					</div>
				</div>
				<div class="step">
					<div class="step-title">
						Интегрируемые
						<span>04</span>
						<div class="btm">
							<img src="{{asset('assets/img/section6/btm.png')}}" alt="" style="width: 100%">
						</div>
					</div>
					<div class="step-info">
						Новые процессы сработали в синергии с существующими процессами и это дает сводную статистику в операционный отдел
					</div>
				</div>
				<div class="step">
					<div class="step-title">
						Проактивно управляющие
						<span>05</span>
						<div class="btm">
							<img src="{{asset('assets/img/section6/btm.png')}}" alt="" style="width: 100%">
						</div>
					</div>
					<div class="step-info">
						Управление процесами возможно удаленно все цифры контролируемы и прогнозируемы
					</div>
				</div>
			</div>
			<h3>Итого что вы получите в этом приложении</h3>
			<p>
				Вы пройдете точный аудит который доступен и зависит от вашей ответов он подойдет под юбую нишу и научен подбирать вопросы которые позволят максимально точно определить узкие места в вашем бизнесе. Мы вам предоставим план по которому надо будетпройти все этапы внедрения, с помощью техподдержки на сложных этапах. Принцип как и везде в бизнесе информация без внедрения не работает. 
			</p>
			<p>
				Для этого мы и разрабатывали максимально удобрый процес по внедрению, на каждый из процессов расписаны чеклисты на каждый инструмент приложены кейсы где это и как работает записаны масса роликов. Разработанно десятки шаблонов таблиц под каждую сверу деятельности которую мы уже успели проработать.   
			</p>
			<div class="steps-btn">
				<a href="#" class="btn">Пройти аудит</a>
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
					<a><img src="{{asset('assets/img/footer-logo.png')}}" alt=""></a>
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
