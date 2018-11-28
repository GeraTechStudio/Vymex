$(document).ready(function(){

	/*Default init*/
	

	var month = ['Январь', 'Февраль', 'Maрт', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];
	/*Choose month*/
	$("#cmodal").on('click', '.calendar-toggler', function(){
		var toggle = $(this).attr('toggle'),
			curMonth = $('.choose-month').attr('data-month');
			
			switch (toggle) {
				case 'up':
					if(curMonth < 12){
						curMonth++;
					}else{
						curMonth = 1;
					}
					break;
				case 'down':
					if(curMonth > 1){
						curMonth--;
					}else{
						curMonth = 12;
					}
					break;
			}

			$('.choose-month').empty().append(month[curMonth-1]).attr('data-month', curMonth);
	});
	
	/*Open Day*/
	$(".calendar").on('click', ".calendar-day", function(){
		var days = '<div class="array-day">';
		if($(this).attr('data-value') == "None"){
			for(var i = 1; i<32; i++){
				days += '<span data-day="' + i + '">' + i + '</span>';		
			}
		}else{
			for(var i = 1; i<32; i++){
				if($(this).attr('data-value') == i){
					days += '<span class="active" data-day="' + i + '">' + i + '</span>';	
				}else{
					days += '<span data-day="' + i + '">' + i + '</span>';	
				}	
			}
			days += '<b class="delete_cal delete_day">Удалить</b>'
		}
		days += '</div>';

		$('.modal-body').empty().append(days);
		$('#cmodal .title').empty().append('Выберите День');
		$('#cmodal').addClass('active');
	});	

	/*Update and close input*/
	$("#cmodal").on('click', 'span', function(){
		if($('.calendar-day').attr('data-value') == "None"){
			var value = $(this).attr('data-day');
			putCalendar({
				type: 'day',
				value: value,
			});
		}else{
			if($('.calendar-day').attr('data-value') != $(this).attr('data-day')){
				var value = $(this).attr('data-day');
				putCalendar({
					type: 'day',
					value: value,
				});
			}else{
				$('#cmodal').removeClass('active');
			}
		}
		
	});

	$("#cmodal").on('click', '.delete_day', function(){
		putCalendar({
			type: 'day',
			value: 'delete',
		});		
	});


	/*Open Month*/
	$(".calendar").on('click', ".calendar-month", function(){
		if($('.calendar-month').attr('data-value') == "None"){
			var monthData = '<div class="array-month"><div class="calendar-toggler" toggle="up"><i class="fas fa-angle-up"></i></div><div class="choose-month" data-month="1">Январь</div><div class="calendar-toggler" toggle="down"><i class="fas fa-angle-down"></i></div></div>';
		}else{
			var monthData = '<div class="array-month"><div class="calendar-toggler" toggle="up"><i class="fas fa-angle-up"></i></div><div class="choose-month" data-month="' + $('.calendar-month').attr('data-value') + '">' + month[$('.calendar-month').attr('data-value')-1] + '</div><div class="calendar-toggler" toggle="down"><i class="fas fa-angle-down"></i></div><b style="position:absolute;bottom:-40px;margin-top:-20px;" class="delete_cal delete_month">Удалить</b></div>';
		}
		$('.modal-body').empty().append(monthData);
		$('#cmodal .title').empty().append('Выберите Месяц');
		$('#cmodal').addClass('active');
	});	

	/*Update and close input*/
	$("#cmodal").on('click', '.choose-month', function(){
		if($('.calendar-month').attr('data-value') == "None"){
			var value = $(this).attr('data-month');
			putCalendar({
				type: 'month',
				value: value,
			});
		}else{
			if($('.calendar-month').attr('data-value') != $(this).attr('data-month')){
				var value = $(this).attr('data-month');
				putCalendar({
					type: 'month',
					value: value,
				});
			}else{
				$('#cmodal').removeClass('active');
			}
		}
	});

	$("#cmodal").on('click', '.delete_month', function(){
		putCalendar({
			type: 'month',
			value: 'delete',
		});		
	});	


	/*Open Year*/
	$(".calendar").on('click', "#cal_year", function(){
		$(this).attr('placeholder', '1960');
		return false;
	});	


	/*Update and close input*/
	$(document).mouseup(function (e){ 
		var div = $("#cal_year"); 
		if (!div.is(e.target) && div.has(e.target).length === 0) { 
			var old_val = $('#cal_year').attr('data-value');
			if(old_val == "None"){
				if($('#cal_year').val() != 0){
					putCalendar({
						type: 'year',
						value: $('#cal_year').val(),
					});
				}else{
					$('#cal_year').attr('placeholder', 'Год');
				}
			}else{
				if(old_val != $('#cal_year').val()){
					putCalendar({
						type: 'year',
						value: $('#cal_year').val(),
					});
				}
			}
		}
	});








	/*Ajax funcction*/
		function putCalendar(dataForm){
			$.ajax({
	        url: '/profile/calendar/',
	        type: 'put',
	        dataType: 'json',
	        data: dataForm,
	        headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
	        success: function(data){
	        	switch(dataForm.type) {
	        		case 'year':
	        			/*Not correct year*/
	        			if(data.access == "denied"){
	        				modalStatus(data.error_code);
	        			}else{
	        				/*Saver func for addition help*/
	        				if(data.change == "NotChange"){
	        					$('#cal_year').attr('placeholder', 'Год');
	        				}else{
	        					modalStatus(data.success_code);
	        					if(data.default == 1){
	        						$('#cal_year').attr('placeholder', 'Год');
	        						$('#cal_year').attr('data-value', 'None');
	        					}else{
	        						$('#cal_year').attr('data-value',  dataForm.value);
	        					}
	        				}
	        				
	        			}
	        			break;
	        		case 'month':
	        			if(data.access == "denied"){
	        				modalStatus(data.error_code);
	        			}else{
	        				
	        				if(data.change == "NotChange"){
	        					$('.calendar-month').attr('data-value',  "None").empty().append("Месяц");
	        					$('#cmodal').removeClass('active');
	        					modalStatus(data.success_code);
	        				}else{
		        				modalStatus(data.success_code);
		        				$('.calendar-month').attr('data-value',  dataForm.value).empty().append(data.val);
		        				$('#cmodal').removeClass('active');
	        				}
	        			}
	        			break;
	        		case 'day':
	        			if(data.access == "denied"){
	        				modalStatus(data.error_code);
	        			}else{
	        				if(data.change == "NotChange"){
	        					$('.calendar-day').attr('data-value',  "None").empty().append("День");
	        					$('#cmodal').removeClass('active');
	        					modalStatus(data.success_code);
	        				}else{
		        				modalStatus(data.success_code);
		        				$('.calendar-day').attr('data-value',  dataForm.value).empty().append(dataForm.value);
		        				$('#cmodal').removeClass('active');
	        				}
	        			}
	        			break;
	        	}
	        	console.log(data);
	        	return false;
			},
	        error: function(data, textStatus, jQxhr){
	            console.log(data, textStatus, jQxhr);
	        	$('html').append( data.responseText );
	    	}
	    });
	}
		
	





	/*Close Modal Window*/
	$(document).mouseup(function (e){ // событие клика по веб-документу
			var div = $(".modal-wrap"); // тут указываем ID элемента
			if (!div.is(e.target) // если клик был не по нашему блоку
		    && div.has(e.target).length === 0) { // и не по его дочерним элементам
				$('#cmodal').removeClass('active').removeClass('active_avatar'); // скрываем его
		}
	});
	$('#hide_modal').click(function(){
		$('#cmodal').removeClass('active').removeClass('active_avatar');
	});

	/*Close Year Input*/
	

	
})