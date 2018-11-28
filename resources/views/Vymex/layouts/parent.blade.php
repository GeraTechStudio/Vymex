<!DOCTYPE html>
<html class="no-js" lang="ru">
<head>
	
	<!-- Defaults Tags -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="shortcut icon" href="{{asset('assets/img/favicon/favicon.ico')}}" type="image/x-icon">
	<link rel="apple-touch-icon" href="{{asset('assets/img/favicon/apple-touch-icon.png')}}">
	<link rel="apple-touch-icon" sizes="72x72" href="{{asset('assets/img/favicon/apple-touch-icon-72x72.png')}}">
	<link rel="apple-touch-icon" sizes="114x114" href="{{asset('assets/img/favicon/apple-touch-icon-114x114.png')}}">
	<meta name="csrf-token" content="{!! csrf_token() !!}" />
	@yield("meta-tags")
	
	<!-- Preloader Style -->
	<style>
    body{margin:0;}.vymex-animation{width: 100vw; height: 100vh; top: 0; bottom: 0; position: fixed; z-index: 9999999; background-color: #fff;} .field-animation{overflow: hidden; position: absolute; height: 100vh; top:0; left:0; background-color: #029fe3; -webkit-animation: bounceField 2.2s linear forwards; animation: bounceField 2.2s linear forwards; } @keyframes bounceField {0% {width: 0vw; } 25% {width: 50vw; } 50% {width: 100vw; height: 100vh; } 75% {height: 50vh; } 100% {height: 0vh; } } .loaders ol {margin: 0; padding: 0; list-style: none; display: -webkit-box; display: -moz-box; display: -ms-flexbox; display: -webkit-flex; display: flex; -webkit-box-orient: horizontal; -webkit-box-direction: normal; -webkit-flex-flow: row wrap; -ms-flex-flow: row wrap; flex-flow: row wrap; -webkit-justify-content: flex-start; justify-content: flex-start; } .loaders ol li {position: relative; width: 100vw; height: 100vh; transition: background 0.35s; display: -webkit-box; display: -moz-box; display: -ms-flexbox; display: -webkit-flex; display: flex; -webkit-box-orient: vertical; -webkit-box-direction: normal; -webkit-flex-flow: column wrap; -ms-flex-flow: column wrap; flex-flow: column wrap; -webkit-justify-content: center; justify-content: center; /* Spinning Sun */ /* Luminous Circles */ /* Wave */ /* Spinning Square */ /* Drawing Frame */ /* Image Loading */ } .loaders ol li .loader {position: fixed; margin: 0 auto; z-index: 10; } .loaders-blue{z-index: 1; } .loaders ol li .pl-imgloading .loader {width: 76px; height: auto; left: 47.5%; top: 47.5%; } .loaders ol li .pl-imgloading .loader span {position: absolute; bottom: 0; left: 0; display: block; width: 100%; height: 0%; background: url({{asset(Config('page-settings.Logo-w'))}}) center bottom; background-repeat: no-repeat; background-size: cover; -webkit-animation: imgLoading 1.3s linear backwards ; animation: imgLoading 1.3s linear backwards ; animation-delay: .4s; transition: 0s; } .loaders ol li .pl-imgloading .loader img {position: relative; z-index: 1; display: block; width: 100%; height: auto; opacity: 0.3; } /* Animations */ @-webkit-keyframes imgLoading {0% {width: 100%; height: 0%; opacity: 1; } 95% {width: 100%; height: 100%; opacity: 1; } 100% {width: 100%; height: 100%; opacity: 0; } } @keyframes imgLoading {0% {width: 100%; height: 0%; opacity: 1; } 95% {width: 100%; height: 100%; opacity: 1; } 100% {width: 100%; height: 100%; opacity: 0; } } .app_name{position: fixed;color: #fff;width: 100%;text-align: center;font-size: 4em;top: 10vh;}.app_ver{position: fixed;color: #fff;width: 100%;text-align: center;font-size:2em;bottom: 10vh;}
  </style>

	<!-- Load CSS, CSS Localstorage & WebFonts Main Function -->
	<script>!function(e){"use strict";function t(e,t,n){e.addEventListener?e.addEventListener(t,n,!1):e.attachEvent&&e.attachEvent("on"+t,n)}function n(t,n){return e.localStorage&&localStorage[t+"_content"]&&localStorage[t+"_file"]===n}function a(t,a){if(e.localStorage&&e.XMLHttpRequest)n(t,a)?o(localStorage[t+"_content"]):l(t,a);else{var s=r.createElement("link");s.href=a,s.id=t,s.rel="stylesheet",s.type="text/css",r.getElementsByTagName("head")[0].appendChild(s),r.cookie=t}}function l(e,t){var n=new XMLHttpRequest;n.open("GET",t,!0),n.onreadystatechange=function(){4===n.readyState&&200===n.status&&(o(n.responseText),localStorage[e+"_content"]=n.responseText,localStorage[e+"_file"]=t)},n.send()}function o(e){var t=r.createElement("style");t.setAttribute("type","text/css"),r.getElementsByTagName("head")[0].appendChild(t),t.styleSheet?t.styleSheet.cssText=e:t.innerHTML=e}var r=e.document;e.loadCSS=function(e,t,n){var a,l=r.createElement("link");if(t)a=t;else{var o;o=r.querySelectorAll?r.querySelectorAll("style,link[rel=stylesheet],script"):(r.body||r.getElementsByTagName("head")[0]).childNodes,a=o[o.length-1]}var s=r.styleSheets;l.rel="stylesheet",l.href=e,l.media="only x",a.parentNode.insertBefore(l,t?a:a.nextSibling);var c=function(e){for(var t=l.href,n=s.length;n--;)if(s[n].href===t)return e();setTimeout(function(){c(e)})};return l.onloadcssdefined=c,c(function(){l.media=n||"all"}),l},e.loadLocalStorageCSS=function(l,o){n(l,o)||r.cookie.indexOf(l)>-1?a(l,o):t(e,"load",function(){a(l,o)})}}(this);</script>
	
	<script>
		// loadCSS( "{{asset(Config('page-settings.jScrollPaneCSS'))}}", false, "all")
	</script>

	<script>@yield("base-styles")</script>
	<!-- <script>loadCSS( "{{asset('assets/css/main.min.css?ver=1.0.0')}}", false, "all" );</script>
	<script>loadCSS( "{{asset('assets/css/header.min.css?ver=1.0.0')}}", false, "all" );</script> -->
	<!-- Load CSS End -->

	<!-- Load CSS Compiled without JS -->
	<!-- <noscript>
		<link rel="stylesheet" href="{{asset('assets/css/fonts.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/main.min.css')}}">
	</noscript> -->
</head>
	
<body>
	<!-- Preloader -->
<!-- 	<div class="vymex-animation" id="vymexAnim">
	  <div class="field-animation">
	    <div class="loaders">
	      <h1 class="app_name">Vymex</h1>
	      <ol>
	        <li>
	          <div class="loftloader-wrapper pl-imgloading">
	            <div class="loader">
	              <span></span>
	              <img src="{{asset(Config('page-settings.Logo-w'))}}" alt="loftloader">
	            </div>
	          </div>
	        </li>
	      </ol>
	       <h3 class="app_ver">1.0b ver.</h1>
	    </div>
	  </div>
	</div>   -->

		@yield("header")
		
		
		@yield('main')

	
		@yield('mobile-version')
	
		@yield('footer')


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
		]};!function(t,n,r){"use strict";var c=function(t){if("[object Array]"!==Object.prototype.toString.call(t))return!1;for(var r=0;r<t.length;r++){var c=n.createElement("script"),e=t[r];c.src=e.src,c.async=e.async,n.body.appendChild(c)}return!0};t.addEventListener?t.addEventListener("load",function(){c(r.scripts);},!1):t.attachEvent?t.attachEvent("onload",function(){c(r.scripts)}):t.onload=function(){c(r.scripts)}}(window,document,scr);
	</script>
	<!-- Load Scripts End -->
	@endsection


</body>
</html>
