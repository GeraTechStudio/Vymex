@component('mail::message')
# Приветствуем, {!!$name!!} {!!$middle_name!!}!

<div style="text-align: justify;">Вы успешно зарегистрировались на vymex.com. Это значит, что вы на верном пути! Без хорошо отлаженных процессов невозможно развитие и масштабирование ни одного бизнеса. VYMEX поможет выявить слабые стороны вашей компании и усилить их, используя лучшие мировые практики и инструменты.</div>

<hr>

<h3 style="margin-bottom: 0">Ваши данные для авторизации на сайте:</h3>
<span class="flex">
<div style="color: #000; margin-left: 30%"><b>Ваш логин:</b> {!!$login!!}</div>
<div style="color: #000; margin-left: 30%"><b>Ваш пароль:</b> {!!$password!!}</div>
<h6 style="color: #000; text-align: center;"><b>Никогда никому не сообщайте данные для авторизации.<br>Администрация никогда не запросит данные от вашего аккаунта!</b></h6>
</span>

<hr>

<h3 style="margin-bottom: 0">Нажмите по кнопке или скопируйте ссылку, чтобы приступить к аудиту:
</h3>
@component('mail::button', ['url' => route('home'), 'color' => 'orange'])
Пройти аудит
@endcomponent

<div style="text-align: center;width: 100%;">{{route('home')}}</div>	

<hr>
<div style="text-align: justify;">
После прохождения аудита, вы увидите текущий уровень развития процессов в вашем бизнесе, а также получите рекомендации по работе над повышение процессной зрелости компании. Все рекомендации будут подкреплены практическими руководствами и инструментами, доступными в VYMEX. Вы сможете работать над улучшениями самостоятельно, привлекать коллег или подчиненных, общаться с единомышленниками, которые тоже используют VYMEX. Вам всегда будет доступна поддержка специалистов по продукту, а также возможность получить консультации от экспертов в любой сфере бизнеса.</div>
<br>

	
С верой в вас,<br>
команда VYMEX
@endcomponent
