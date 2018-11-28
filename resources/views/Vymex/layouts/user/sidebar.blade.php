<aside class="user_sidebar">
	<a href="{{url('/')}}" class="logo">
		<img src="{{asset(Config('page-settings.Logo-w'))}}" alt="Logo">
	</a>
	<nav class="navigation_pannel">
		<div class="main_link">
			<a href="{{route('home')}}" class="active"><i class="fas fa-chart-area"></i>Статистика</a>
			<a href="{{route('dashboard')}}"><i class="fas fa-columns"></i>Кабинет</a>
			<a href=""><i class="fas fa-history"></i>История</a>
		</div>
		<div class="helper_link">
			<a href=""><i class="far fa-comments"></i>Личные консультации</a>
			<a href=""><i class="fas fa-wrench"></i>Тех поддержка</a>
		</div>
	</nav>
</aside>