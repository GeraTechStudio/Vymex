@extends(Config('page-settings.Folder') . '.layouts.admin.parent')


	@section("meta-tags")
	@endsection

	@section("base-styles")
		loadCSS( "{{asset(Config('page-settings.HelpersCSS'))}}", false, "all")
		loadCSS( "{{asset(Config('page-settings.AAuditCSS'))}}", false, "all")
	@endsection
	

	@section("sidebar")
		{!!$sidebar!!}
	@endsection	

	@section("main")
		<main class="admin_content-box">
			<header class="admin_header">
				<h1 class="hello-admin">Здравствуйте, Герасименко Олег!</h1>
				<h3 class="smile-alert">Вы находитесть на странице администрирования аудита.</h1>
			</header>
			<div class="audit-list">
				<div class="audit-toolbar">
					<div class="audit-title">Вопросы Аудита Vymex</div>			
					<div class="button-group">
						<button>Фильтр <i class="fas fa-sliders-h"></i></button>
						<button><i class="fas fa-cogs"></i></button>
						<button id="create-audit-ask"><i class="fas fa-plus"></i></button>
					</div>
				</div>
				<table class="audit_list_table">
					<thead>
						<tr>
							<th class="c-1">ID</th>
							<th class="c-2">Вопрос</th>
							<th class="c-3">Тип Вопроса</th>
							<th class="c-4">Варианты Ответов</th>
							<th class="c-5">Дата Обновления</th>
							<th class="c-6">
								<div class="checkbox">
									<i class="fas fa-check"></i>
								</div>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php $count_row = 1; ?>
						@foreach($audit_asks as $audit_ask)
							<?php if($count_row%2 == 0){$class="reverse-bg";}else{$class=" ";} ?>
							<tr audit-id="{{$audit_ask->id}}" class="{{ $class }}">
								<td class="c-1">
									{{$audit_ask->id}}
								</td>
								<td class="c-2">
									{{$audit_ask->text_ask}}
								</td>
								<td class="c-3">
									{{$ask_types->where('id', $audit_ask->id_ask_type)->first()->type}}
								</td>
								<td class="c-4">
									<?php $this_audit_answers = $audit_answers->where('id_ask', $audit_ask->id);$audit_answers_count = count($this_audit_answers);$aswer_counter = 1?>
									@foreach($this_audit_answers as $audit_answer)
										@if($aswer_counter == $audit_answers_count)
											{{$audit_answer->text_answer}}={{$audit_answer->value_answer}}
										@else
											{{$audit_answer->text_answer}}={{$audit_answer->value_answer}},
										@endif
										<?php $aswer_counter++; ?>
									@endforeach
								</td>
								<td class="c-5">
									{{$audit_ask->updated_at}}
								</td>
								<td class="c-6">
									<div class="checkbox">
										<i class="fas fa-check"></i>
									</div>
								</td>
							</tr>
							<?php $count_row++ ?>
						@endforeach
					</tbody>
				</table>
			</div>
	
			<!-- Modal for audit -->
			<div class="audit-modal" id="audit-modal">
				<div class="modal-box">
					<div class="modal-header">
						<h2>Создание вопроса и ответов аудита</h2>
						<button class="modal-exit">Закрыть</button>
					</div>
					<div class="modal-body">
						<div class="main-ask-info">
							<div class="audit-input_group">
								<label for="audit-ask-name">Вопрос</label>
								<textarea type="text" id="audit-ask-name" placeholder="Вопрос не должен превышать 500 символов"></textarea>
							</div>
							<div class="audit-input_group">
								<label for="audit-ask-type">Тип Вопроса</label>
								<select id="audit-ask-type" style="padding-left: 1px;">
										<option value="-1" disabled selected="">Выберите тип вопроса</option>
									@foreach($ask_types as $ask_type)
										<option value="{{$ask_type->id}}">{{$ask_type->type}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="ask-answer">
							<div class="row-nowrap" answer-id="1">
								<div class="audit-input_group">
									<label for="audit-answer-name-1">Ответ</label>
									<input type="text" id="audit-answer-name-1" class="audit-answer-name" placeholder="Ответ не должен превышать 100 символов"></input>
								</div>
								<div class="audit-input_group">
									<label for="audit-answer-value-1">Оценка</label>
									<input type="number" id="audit-answer-value-1" class="audit-answer-value" placeholder="1-100"></input>
								</div>
								<span class="disabled-delete-answer" answer-id="1"><i class="fas fa-trash-alt"></i></span>
							</div>
						</div>
						<div class="add-answer">
							<button id="add_answer_audit">Добавить</button>
						</div>
					</div>
					<div class="modal-footer">
						<div class="audit-ask-button">
							<button id="save-audit-ask">Сохранить</button>
							<button id="cancel-audit-ask">Отменить</button>
						</div>
					</div>
				</div>
			</div>

		</main>
	@endsection



	@section('scripts')
	<!-- Load Scripts Start -->
	<script>var scr = {"scripts":[
		{"src" : "{{asset('assets/js/libs.js')}}", "async" : false},
		{"src" : "{{asset(Config('page-settings.Notification'))}}", "async" : false},
		{"src" : "{{asset(Config('page-settings.AlertJS'))}}", "async" : false},
		{"src" : "{{asset(Config('page-settings.AAuditJS'))}}", "async" : false},
		]};!function(t,n,r){"use strict";var c=function(t){if("[object Array]"!==Object.prototype.toString.call(t))return!1;for(var r=0;r<t.length;r++){var c=n.createElement("script"),e=t[r];c.src=e.src,c.async=e.async,n.body.appendChild(c)}return!0};t.addEventListener?t.addEventListener("load",function(){c(r.scripts);},!1):t.attachEvent?t.attachEvent("onload",function(){c(r.scripts)}):t.onload=function(){c(r.scripts)}}(window,document,scr);
	</script>
	
	<!-- Load Scripts End -->
	@show	