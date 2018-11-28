@extends(Config('page-settings.Folder') . '.layouts.user.parent')


	@section("meta-tags")
	@endsection

	@section("base-styles")
		loadCSS( "{{asset(Config('page-settings.HelpersCSS'))}}", false, "all")
		loadCSS( "{{asset(Config('page-settings.UserMenuCSS'))}}", false, "all")
	@endsection
	

	@section("sidebar")
		{!!$sidebar!!}
	@endsection	

	@section("main")
		<main class="user_content-box">
			{!!$cap!!}
		</main>
	@endsection

	@section("umenu")
		{!!$umenu!!}
	@endsection


	@section('scripts')
	<!-- Load Scripts Start -->
	<script>var scr = {"scripts":[
		{"src" : "{{asset('assets/js/libs.js')}}", "async" : false},
		{"src" : "{{asset(Config('page-settings.StatisticJS'))}}", "async" : false},
		{"src" : "{{asset(Config('page-settings.UserMenuJS'))}}", "async" : false},
		]};!function(t,n,r){"use strict";var c=function(t){if("[object Array]"!==Object.prototype.toString.call(t))return!1;for(var r=0;r<t.length;r++){var c=n.createElement("script"),e=t[r];c.src=e.src,c.async=e.async,n.body.appendChild(c)}return!0};t.addEventListener?t.addEventListener("load",function(){c(r.scripts);},!1):t.attachEvent?t.attachEvent("onload",function(){c(r.scripts)}):t.onload=function(){c(r.scripts)}}(window,document,scr);
	</script>
	
	<!-- Load Scripts End -->
	@show	