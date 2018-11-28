<div class="umenu" id="umenu">
	<div class="uprofile">
		<div class="umenu-hedaer">
			<div href="#" class="uprofile-avatar"><i class="fas fa-user-circle"></i></div>
			<div class="uname">{{$auth->first_name}} {{$auth->last_name}}</div>
			<a href="{{ route('logout') }}" class="umenu-exit" onclick="event.preventDefault();
	                                                     document.getElementById('logout-form').submit();">
	            Выход
	        </a>
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	        	{{ csrf_field() }}
	        </form>	
		</div>
		<div class="editors_link">
			<a href="#">Профиль</a>
			<a href="#">Аккаунт</a>
		</div>
	</div>
	<div class="underline"></div>
</div>