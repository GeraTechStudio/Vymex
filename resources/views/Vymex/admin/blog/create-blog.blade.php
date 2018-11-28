@extends(Config('page-settings.Folder') . '.layouts.admin.parent')


	@section("meta-tags")
		<meta name="blog-id" value="{{$blog_data->id}}">
	@endsection

	@section("base-styles")
		loadCSS( "{{asset(Config('page-settings.HelpersCSS'))}}", false, "all")
		loadCSS( "{{asset(Config('page-settings.tEditorCSS'))}}", false, "all")
		loadCSS( "{{asset(Config('page-settings.ABlogCreateCSS'))}}", false, "all")
	@endsection	




	@section("sidebar")
	@endsection	

	@section("main")
		<header class="blog_header">
			<a href="{{route('tile-blog')}}" class="back-link"><i class="fas fa-long-arrow-alt-left"></i></a>
			<h1 class="page-title">Менеджер управления статьей Блога</h1>
			<a href="{{url('/')}}" class="main-link"><img src="{{asset(Config('page-settings.Logo-w'))}}" alt="Logo"></a>
		</header>
		<main class="blog_main">
			<h1 class="hello-admin">Здравствуйте, Герасименко Олег!</h1>
			<h3 class="smile-alert">Вы находитесь на странице создания статьи блога.</h3>
			<div class="creater-box">
				<div class="main-create">
					<div class="first-column">
						<h2 class="title-column">Превью статьи блога</h2>
						<form id="create-blog_img" enctype="multipart/form-data">
							<label class="blog-img">
								@if($blog_data->blog_img != 'E')
									<img src="{{asset('storage/blogs/blog-' . $blog_data->id . '/' . $blog_data->blog_img)}}">
								@else
									<i class="fas fa-image preview-fa"></i>
								@endif
								<input type="file" img-type="1" id="uploadBlogImg" name="uploadBlogImg" accept="image/*">
								<i class="fas fa-camera upload-fa"></i>
							</label>
						</form>
					</div>
					<div class="second-column">
						<h2 class="title-column">Основная информация статьи блога 
							<label class="switch">
								@if($blog_data->blog_show == '0')
									<input type="checkbox" id="show_blog">
								@else
									<input type="checkbox" id="show_blog" class="active">
								@endif
								
								<span class="slider round"></span>
							</label>
						</h2>
						<div class="main-info">
							<div class="blog-input_group">
								<label for="name_article">Название Блога</label>
								@if($blog_data->blog_name == 'E')
									<input type="text" id="name_article" placeholder="Название не должно превышать 140 символов">
									<input type="hidden" id="article_slug" value="">
								@else
									<input type="text" id="name_article" value="{{$blog_data->blog_name}}" placeholder="Название не должно превышать 140 символов">
									<input type="hidden" id="article_slug" value="{{$blog_data->blog_slug}}">
								@endif
							</div>
							<div class="blog-input_group">
								<label for="choose_category">Категория</label>
								@if($blog_data->blog_category == 0)
									<input type="text" id="choose_category" placeholder="Выберите категорию" autocomplete="off">
								@else
									<input type="text" id="choose_category" value="{{$blog_categories->where('id', $blog_data->blog_category)->first()->category_name}}" placeholder="Выберите категорию" autocomplete="off">
								@endif
							</div>
							<div class="blog-inline_group">
								<div class="textarea-group">
									<label for="SEO_description">SEO описание</label>
									@if($blog_data->blog_desk_SEO == 'E')
										<textarea placeholder="Длина мета тега description не должна превышать 300 знаков, оптимальный размер 170-290 символов" id="SEO_description"></textarea>
									@else
										<textarea placeholder="Длина мета тега description не должна превышать 300 знаков, оптимальный размер 170-290 символов" id="SEO_description">{{$blog_data->blog_desk_SEO}}</textarea>
									@endif
								</div>
								<div class="textarea-group">
									<label for="#">SEO ключи</label>
									@if($blog_data->blog_key_SEO == 'E')
										<textarea id="SEO_keys" placeholder="Введите 5-7 оригинальных ключевых слов через запятую, отражающих смысл страницы." onKeyUp="if(/[^a-zA-Zа-яА-ЯёЁ ,]/i.test(this.value)){this.value = this.value.substring(0, this.value.length - 1);}"></textarea>
									@else
										<textarea id="SEO_keys" placeholder="Введите 5-7 оригинальных ключевых слов через запятую, отражающих смысл страницы." onKeyUp="if(/[^a-zA-Zа-яА-ЯёЁ ,]/i.test(this.value)){this.value = this.value.substring(0, this.value.length - 1);}">{{$blog_data->blog_key_SEO}}</textarea>
									@endif
									
								</div>
							</div>
						</div>
						<h2 class="title-column">Управление статей блога</h2>
						<div class="blog-infos">
							@foreach($block_parts as $block_part)
								<div class="block-change bc-{{$block_part->id}}" block-type="{{$block_part->type}}">
									{!!$block_part->data!!}
									<span class="pencil-editor" data-edit="{{$block_part->id}}"><i class="fas fa-pencil-alt"></i></span>
									<span class="trash-delete" data-delete="{{$block_part->id}}"><i class="fas fa-trash-alt"></i></span>
								</div>
							@endforeach
						</div>

						<!-- Img block editor-->
						<!-- <div class="manager-block_img" id="change-block_img">
							<h2>Менеджер редактирования изображения</h2>
							<div class="reload-block_img">
								<i class="fas fa-camera"></i> Изменить изображение
							</div>
							<div class="choose-block_img_size">
								<div class="img_size" img-type="1"><i class="fas fa-camera"></i> По всей ширине</div>
								<div class="img_size_align">
									<div class="img_size" img-type="2"><i class="fas fa-camera"></i> Разместить слева</div>
									<div class="img_size" img-type="3"><i class="fas fa-camera"></i> Разместить по центру</div>
									<div class="img_size" img-type="4"><i class="fas fa-camera"></i> Разместить справа</div>
								</div>
							</div>
						</div> -->

						<!-- Img block creator -->
						<form class="manager-block_img" id="create-block_img" enctype="multipart/form-data">
							<h2>Менеджер загрузки изображения</h2>
							<div class="choose-block_img_size">
								<label class="img_size"><i class="fas fa-camera"></i> По всей ширине <input type="file" img-type="1" name="uploadBlockImg" accept="image/*" style="display:none;"></label>
								<div class="img_size_align">
									<label class="img_size"><i class="fas fa-camera"></i> Разместить слева <input type="file" img-type="2" name="uploadBlockImg" accept="image/*" style="display:none;"></label>
									<label class="img_size"><i class="fas fa-camera"></i> Разместить по центру <input type="file" img-type="3" name="uploadBlockImg" accept="image/*" style="display:none;"></label>
									<label class="img_size"><i class="fas fa-camera"></i> Разместить справа <input type="file" img-type="4" name="uploadBlockImg" accept="image/*" style="display:none;"></label>
								</div>
							</div>
						</form>
						<div id="scroll-img" class="pointScroll"></div>

						<!-- text block creator -->
						<form class="manager-block_text" id="create-block_text">
							<h2>Менеджер создания текста</h2>
						</form>
						<div id="scroll-text" class="pointScroll"></div>
					</div>
					<div class="third-column">
						<h2 class="title-column">Статистика статьи блога</h2>

					</div>
				</div>
			</div>




			<!-- Helper Pannel for adding blocks -->
				<div class="add_block-pannel">
					<div class="add_block-button" button-type="text">
						<i class="fas fa-pencil-alt"></i>
					</div>
					<div class="add_block-button" button-type="img">
						<i class="fas fa-image"></i>
					</div>	
				</div>
			<!-- End helper pannel -->
		</main>
		
	@endsection



	@section('scripts')

	<!-- Load Scripts Start -->
	<script>var scr = {"scripts":[
		{"src" : "{{asset('assets/js/libs.js')}}", "async" : false},
		{"src" : "{{asset(Config('page-settings.Notification'))}}", "async" : false},
		{"src" : "{{asset(Config('page-settings.tEditorJS'))}}", "async" : false},
		{"src" : "{{asset(Config('page-settings.tEditorLang'))}}", "async" : false},
		{"src" : "{{asset(Config('page-settings.AlertJS'))}}", "async" : false},
		{"src" : "{{asset(Config('page-settings.slugTranslit'))}}", "async" : false},
		{"src" : "{{asset(Config('page-settings.CreateBlogJS'))}}", "async" : false},
		
		]};!function(t,n,r){"use strict";var c=function(t){if("[object Array]"!==Object.prototype.toString.call(t))return!1;for(var r=0;r<t.length;r++){var c=n.createElement("script"),e=t[r];c.src=e.src,c.async=e.async,n.body.appendChild(c)}return!0};t.addEventListener?t.addEventListener("load",function(){c(r.scripts);},!1):t.attachEvent?t.attachEvent("onload",function(){c(r.scripts)}):t.onload=function(){c(r.scripts)}}(window,document,scr);
	</script>
	
	<!-- Load Scripts End -->
	@show	