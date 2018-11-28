@extends(Config('page-settings.Folder') . '.layouts.admin.parent')


	@section("meta-tags")
	@endsection

	@section("base-styles")
		loadCSS( "{{asset(Config('page-settings.HelpersCSS'))}}", false, "all")
		loadCSS( "{{asset(Config('page-settings.ABlogCSS'))}}", false, "all")
	@endsection
	

	@section("sidebar")
		{!!$sidebar!!}
	@endsection	

	@section("main")
		<main class="admin_content-box">
			<header class="admin_header">
				<h1 class="hello-admin">Здравствуйте, Герасименко Олег!</h1>
				<h3 class="smile-alert">Вы находитесть на странице администрирования блога.</h1>
			</header>
			<div class="blog-tile">
				<div class="blog-toolbar">
					<div class="blog-title">Блог Vymex</div>			
					<div class="button-group">
						<button>Фильтр <i class="fas fa-sliders-h"></i></button>
						<button><i class="fas fa-cogs"></i></button>
					</div>
				</div>
				<div class="blog-rows">
					<a href="{{route('create-blog')}}" class="blog-itm add-blog">
						<i class="fas fa-plus-circle"></i>
					</a>
					@foreach($blogs as $blog)
						@if($blog->blog_show == 0)
							<a href="{{route('manager-blog', ['id'=> $blog->id])}}" class="blog-itm" style="box-shadow: 1px 1px 5px rgba(219, 29, 29, .6);">
						@else
							<a href="{{route('manager-blog', ['id'=> $blog->id])}}" class="blog-itm">
						@endif
							@if($blog->blog_img == 'E')
								<i class="fas fa-image preview-fa"></i>
							@else
								<img src="{{asset('storage/blogs/blog-' . $blog->id . '/' . $blog->blog_img)}}">
							@endif
							
							<div class="blog-info">
								@if($blog->blog_name == 'E')
									<h3>Нет названия</h3>
								@else
									<h3>{{$blog->blog_name}}</h3>
								@endif
								
								@if($blog->blog_category == 0)
									<p>Категория не выбрана</p>
								@else
									<p>{{$blog_categories->where('id', $blog->blog_category)->first()->category_name}}</p>
								@endif
							</div>
						</a>
					@endforeach
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