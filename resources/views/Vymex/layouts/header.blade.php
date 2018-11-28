<div class="header-sm">
	<div class="lang-sm">
		<a href="#" class="fl-lang">RU</a>
		<span class="lang-toggle"><i class="fas fa-caret-down"></i></span>
	</div>
	<img src="{{asset(Config('page-settings.Logo-b'))}}" alt="Logo" id="logo" style="width: 50px; height: auto">
	<div class="clients-burger"><i class="fas fa-bars"></i></div>
</div>

@if($color == "blue")
<header class="header header_reverse">
	<div class="header-menu">
		<img src="{{asset(Config('page-settings.Logo-w'))}}" alt="Logo" style="width: auto; height: 60px">
		<a href="{{url('/')}}" class="menu-itm">Главная</a>
		<a href="{{route('product')}}" class="menu-itm">Продукт</a>
		@if($page == "Blog")
			<a href="{{route('blog')}}" class="menu-itm active">Блог</a>
		@else
			<a href="{{route('blog')}}" class="menu-itm">Блог</a>
		@endif
		<a href="#" class="menu-itm">Контакты</a>
	</div>
	<div class="header-auth">
		@if($page == "login")
			<a href="#" class="auth-item active"><i class="fas fa-user"></i>Вход</a>
		@else
			<a href="#" class="auth-item"><i class="fas fa-user"></i>Вход</a>
		@endif
		<div class="lang">
			<a href="#" class="fl-lang">RU</a>
			<span class="lang-toggle"><i class="fas fa-caret-down"></i></span>
		</div>
	</div>
</header>
@else
<header class="header">
	<div class="header-menu">
		<img src="{{asset(Config('page-settings.Logo-b'))}}" alt="Logo" style="width: auto; height: 60px">
		@if($page == "App")
			<a href="{{url('/')}}" class="menu-itm active">Главная</a>
		@else
			<a href="{{url('/')}}" class="menu-itm">Главная</a>
		@endif
		
		<a href="{{route('product')}}" class="menu-itm">Продукт</a>

		@if($page == "Blog")
			<a href="{{route('blog')}}" class="menu-itm active">Блог</a>
		@else
			<a href="{{route('blog')}}" class="menu-itm">Блог</a>
		@endif

		
		<a href="#" class="menu-itm">Контакты</a>
	</div>
	<div class="header-auth">
		<a href="#" class="auth-item"><i class="fas fa-user"></i>Вход</a>
		<div class="lang">
			<a href="#" class="fl-lang">RU</a>
			<span class="lang-toggle"><i class="fas fa-caret-down"></i></span>
		</div>
	</div>
</header>
@endif