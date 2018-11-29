$(document).ready(function(){

	/*Open Audit Modal*/
	$('#create-audit-ask').click(function(){
		$('.audit-modal').fadeIn().addClass('active');
	})
	/*Close Audit Modal*/
	$('.modal-exit').click(function(){
		$('.audit-modal').fadeOut( 400 , function() {
	   		$('.audit-modal').removeClass('active');
	  	});
	})


	/*Add field answer audit*/
		$('#add_answer_audit').click(function(){
			var answers = $('.row-nowrap'),
				count_error = 0,
				last_id;
			for(var i = 0; i < answers.length; i++){
				var answer_id = $(answers[i]).attr('answer-id');
				if($('#audit-answer-name-' + answer_id).val().length == 0){
					$('#audit-answer-name-' + answer_id).addClass('error_border');
					count_error++;
				}else{
					$('#audit-answer-name-' + answer_id).removeClass('error_border');
				}
				if($('#audit-answer-value-' + answer_id).val().length == 0){
					$('#audit-answer-value-' + answer_id).addClass('error_border');
					count_error++;
				}else{
					$('#audit-answer-value-' + answer_id).removeClass('error_border');
				}
				last_id = answer_id;
			}
			if(count_error > 0){
				modalStatus('a21');
			}else{
				last_id++;
				$('.ask-answer').append('<div class="row-nowrap" answer-id="' + last_id + '"><div class="audit-input_group"><label for="audit-answer-name-' + last_id + '">Ответ</label><input type="text" id="audit-answer-name-' + last_id + '" class="audit-answer-name" placeholder="Ответ не должен превышать 100 символов"></input></div><div class="audit-input_group"><label for="audit-answer-value-' + last_id + '">Оценка</label><input type="number" id="audit-answer-value-' + last_id + '" class="audit-answer-value" placeholder="1-100"></input></div><span class="delete-answer-audit" answer-id="' + last_id + '"><i class="fas fa-trash-alt"></i></span></div>');
			}
			
		});

	/*Delete field in creater of answer audit*/	
		$('body').on('click', '.delete-answer-audit', function(){
			var answer_id = $(this).attr('answer-id');
			DeleteAuditAnswer(answer_id);
		});
			$('body').on('click', '.cancelAnswerAudit', function(){
				$('.alert-msg').remove();
			})
			$('body').on('click', '.creator .deleteAnswerAudit', function(){
				var answer_id = $(this).val();
				$('.row-nowrap[answer-id=' + answer_id + ']').fadeOut( 400 , function() {
			   		$('.row-nowrap[answer-id=' + answer_id + ']').remove();
			  	});
				$('.alert-msg').remove();
			})



	/*UpLoad ask and answer Audi on server AJAX*/
	$('body').on('click', '#save-audit-ask', function(){
		var audit_ask_name = $('#audit-ask-name').val(),
			audit_ask_type = $('#audit-ask-type').val(),
			answers = $('.row-nowrap'),
			count_error = 0,
			answer_array = {};
		if(audit_ask_name.length == 0 || audit_ask_type == -1){
			modalStatus('a22');
			return false;
		}
		for(var i = 0; i < answers.length; i++){
			var answer_id = $(answers[i]).attr('answer-id');
			var allow_push = true;
			if($('#audit-answer-name-' + answer_id).val().length == 0){
				$('#audit-answer-name-' + answer_id).addClass('error_border');
				count_error++;
				allow_push = false;
			}else{
				$('#audit-answer-name-' + answer_id).removeClass('error_border');
			}
			if($('#audit-answer-value-' + answer_id).val().length == 0){
				$('#audit-answer-value-' + answer_id).addClass('error_border');
				count_error++;
				allow_push = false;
			}else{
				$('#audit-answer-value-' + answer_id).removeClass('error_border');
			}
			if(allow_push == true){
				answer_array[$('#audit-answer-value-' + answer_id).val()] = $('#audit-answer-name-' + answer_id).val();
			}
		}
		if(count_error > 0){
			modalStatus('a21');
			return false;
		}
		
		$.ajax({
		    type: "POST",
		    url: '/admin/audit/create-ask',
		    data: {answer_array:answer_array, audit_ask_name:audit_ask_name, audit_ask_type:audit_ask_type},
			dataType: 'json',
		    headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
			success: function (data) {
				console.log(data)
				if(data.access == "allow"){
					
			   	}else{
			   		modalStatus(data.error_code);
			   	}
		    },
		    error: function (data) {
		       	modalStatus("a10");
		       	$('html').append( data.responseText );
		}});
	});
})