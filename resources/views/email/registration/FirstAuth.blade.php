@component('mail::message')
# Приветствуем! 

Кто-то оставил заявку на регистрацию в VYMEX, указав электронный адрес {{$email}}. <br>
Если это были вы - то вы в одном шаге от цели! <hr>

Кликайте на кнопку или переходите по прямой ссылке, чтобы подтвердить регистрацию на vymex.com и начать повышать эффективность бизнес-процессов уже сегодня.

@component('mail::button', ['url' => route('activation', ['id'=>$id, 'remember_token'=>$remember_token]), 'color' => 'orange'])
Подтвердить
@endcomponent
<div style="text-align: center;width: 100%;">{{route('activation', ['id'=>$id, 'remember_token'=>$remember_token])}}</div>
<br>
<hr>
Если вы не оставляли заявку на регистрацию в VYMEX или {{$email}} это не ваш электронный адрес - просто игнорируйте это сообщение.

	
С верой в вас,<br>
команда VYMEX
@endcomponent
