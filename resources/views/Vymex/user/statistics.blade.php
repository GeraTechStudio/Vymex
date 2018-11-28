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
			<section class="result">
				<script src="{{asset(Config('page-settings.StatisticsCanvasJS'))}}"></script>
				<div class="page-wrap-p">
					<h1>
						Итог прохождения аудита
						<div class="btn-group" current-type="rate">
							<button class="btn-vymex active" data-type="rate"><i class="fas fa-chart-line"></i></button>
							<button class="btn-vymex" data-type="pie"><i class="fas fa-chart-pie"></i></button>
							<button class="btn-vymex" data-type="history"><i class="fas fa-history"></i></button>
						</div>
					</h1>
					<div class="statistic_info" id="rate">
						<div class="result-info">
							<div class="result-info-nums">
								<span>10</span>
								<span>9</span>
								<span>8</span>
								<span>7</span>
								<span>6</span>
								<span>5</span>
								<span>4</span>
								<span>3</span>
								<span>2</span>
								<span>1</span>
							</div>
							<canvas id="UserStatistics" width="1450px" height="450" style="border-bottom: 2px solid #2a456e;padding-bottom: 1px;">h</canvas>
							<div class="result-info-descr">
								<div class="result-info-descr-itm">
									<p>Уровень нормы</p>
									<div></div>
								</div>
								<div class="result-info-descr-itm">
									<p>Уровень комфорта</p>
									<div></div>
								</div>
								<div class="result-info-descr-itm">
									<p>Уровень риска</p>
									<div></div>
								</div>
							</div>
						</div>
						<div class="result-stats">
							<div class="result-stats-itm">
								<p>27%</p>
								<div>Показатели</div>
							</div>
							<div class="result-stats-itm">
								<p>52%</p>
								<div>Процессы</div>
							</div>
							<div class="result-stats-itm">
								<p>46%</p>
								<div>Ресурсы</div>
							</div>
						</div>
						<script>

							drawl();
							drawStatistics(8.45, 7.36, 1.5, 9, 4, 1.1, 8, 3, 6);
						</script>
					</div>
					<div class="statistic_info" id="pie" style="display: none;">
						<div class="pie_diagrams">
							<div class="pie_diagram">
								<div class="canvas_pie_diagram">
									<canvas id="UserIndicators" width="180px" height="180px">h</canvas>
									<div class="pie_tittle">
										17%
									</div>
								</div>
								<div class="indicators_diagram">
									<h2>Показатели</h2>
									<table>
										<tbody>
											<tr>
												<td><div class="color-box" style="background-color: #2eb42e;"></div></td>
												<td><div class="box-name">Уровень нормы</div></td>
												<td><div class="box-padd">-</div></td>
												<td><div class="box-stats"><b>38.9%</b></div></td>
											</tr>
											<tr>
												<td><div class="color-box" style="background-color: #00aeef;"></div></td>
												<td><div class="box-name">Уровень комфорта</div></td>
												<td><div class="box-padd">-</div></td>
												<td><div class="box-stats"><b>17.9%</b></div></td>
											</tr>
											<tr>
												<td><div class="color-box" style="background-color: #f26522;"></div></td>
												<td><div class="box-name">Уровень риска</div></td>
												<td><div class="box-padd">-</div></td>
												<td><div class="box-stats"><b>27.9%</b></div></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="pie_diagram">
								<div class="canvas_pie_diagram">
									<canvas id="UserProcesses" width="150px" height="150px">h</canvas>
									<div class="pie_tittle">
										58%
									</div>
								</div>
								<div class="indicators_diagram">
									<h2>Процесы</h2>
									<table>
										<tbody>
											<tr>
												<td><div class="color-box" style="background-color: #2eb42e;"></div></td>
												<td><div class="box-name">Уровень нормы</div></td>
												<td><div class="box-padd">-</div></td>
												<td><div class="box-stats"><b>38.9%</b></div></td>
											</tr>
											<tr>
												<td><div class="color-box" style="background-color: #00aeef;"></div></td>
												<td><div class="box-name">Уровень комфорта</div></td>
												<td><div class="box-padd">-</div></td>
												<td><div class="box-stats"><b>17.9%</b></div></td>
											</tr>
											<tr>
												<td><div class="color-box" style="background-color: #f26522;"></div></td>
												<td><div class="box-name">Уровень риска</div></td>
												<td><div class="box-padd">-</div></td>
												<td><div class="box-stats"><b>27.9%</b></div></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="pie_diagram">
								<div class="canvas_pie_diagram">
									<canvas id="UserResources" width="150px" height="150px">h</canvas>
									<div class="pie_tittle">
										12%
									</div>
								</div>
								<div class="indicators_diagram">
									<h2>Ресурсы</h2>
									<table>
										<tbody>
											<tr>
												<td><div class="color-box" style="background-color: #2eb42e;"></div></td>
												<td><div class="box-name">Уровень нормы</div></td>
												<td><div class="box-padd">-</div></td>
												<td><div class="box-stats"><b>38.9%</b></div></td>
											</tr>
											<tr>
												<td><div class="color-box" style="background-color: #00aeef;"></div></td>
												<td><div class="box-name">Уровень комфорта</div></td>
												<td><div class="box-padd">-</div></td>
												<td><div class="box-stats"><b>17.9%</b></div></td>
											</tr>
											<tr>
												<td><div class="color-box" style="background-color: #f26522;"></div></td>
												<td><div class="box-name">Уровень риска</div></td>
												<td><div class="box-padd">-</div></td>
												<td><div class="box-stats"><b>27.9%</b></div></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="addition_info">	
							<div class="info-box">
								<h2>Заключительная оценка</h2>
								<div class="info-box-content">
									<canvas id="final_rate"></canvas>
									<div class="info-box-value">7.5</div>
								</div>
							</div>
							<div class="info-box">
								<h2>Дата прохождение аудита</h2>
								<div class="info-box-content">
									<div class="info-box-value date-start-audit">24.10.2018</div>
								</div>
							</div>
							<div class="info-box">
								<h2>Просмотреть Аудит</h2>
								<div class="info-box-content">
									<div class="info-box-value look-audit"><a href="#">Перейти</a></div>
								</div>
							</div>
						</div>
						<div class="addition_info">
							<div class="info-box">
								<h2>Cтатус Аудита</h2>
								<div class="info-box-content">
									<div class="info-box-value status-audit">Проверен</div>
								</div>
							</div>
						</div>
						<script>drawPieDiagrams();</script>
					</div>
					<div class="statistic_info" id="history" style="display: none">
						<div class="tittle">
							История прохождения аудита
						</div>
						<table class="history_table">
							<thead>
								<tr>
									<th>#</th>
									<th>Дата прохождения</th>
									<th>Итоговая оценка</th>
								</tr>
							</thead>
							<tbody>
								
								<tr>
									<td>1</td>
									<td>24.10.2018</td>
									<td>7.5</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</section>
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