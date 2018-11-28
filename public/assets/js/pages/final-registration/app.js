$(document).ready(function(){

	$("#vmx_mask_tel").mask("+380(99) 99-99-999");
	/*Submit Form*/
	$(".main").on('click', '.submit_form', function(){
		var stage = $(this).val();
		switch (stage) {
			case '1':
				var login = $('#user_login').val();
				/*Verify length login*/
					if(login.length < 5){
						modalStatus("SL");
						return false;
					}
					if(login.length > 30){
						modalStatus("LL");
						return false;
					}
				
				var telephone = $('#vmx_mask_tel').val();
				/*Verify length telephone*/
					if(telephone.length == 0){
						modalStatus("ET");
						return false;
					}

				/*Grouping information to send*/
				var dataForm = {
					stage: stage,
					login: login,
					telephone: telephone,
					country: $('#hidden_country').val()
				}

				/*AJAX verification and putting information*/
				RegistrationVerify(stage, dataForm);
				break;
			case '2':
				var user_name = $('#user_name').val();
				/*Verify length user_name*/
					if(user_name.length == 0){
						modalStatus("EUN");
						return false;
					}
					if(user_name.length > 30){
						modalStatus("LUN");
						return false;
					}

				var user_middlename = $('#user_middlename').val();
				/*Verify length user_middlename*/
					if(user_middlename.length == 0){
						modalStatus("EUMN");
						return false;
					}
					if(user_middlename.length > 30){
						modalStatus("LUMN");
						return false;
					}

				var user_lastname = $('#user_lastname').val();
				/*Verify length user_lastname*/
					if(user_lastname.length == 0){
						modalStatus("EULN");
						return false;
					}
					if(user_lastname.length > 30){
						modalStatus("LULN");
						return false;
					}

				/*Grouping information to send*/
				var dataForm = {
					stage: stage,
					user_name: user_name,
					user_middlename: user_middlename,
					user_lastname: user_lastname,
				}

				/*AJAX verification and putting information*/
				RegistrationVerify(stage, dataForm);
				break;
			case '3':
				var user_pass = $('#user_pass').val();
				/*Verify length user_pass*/
					if(user_pass.length < 6){
						modalStatus("SP");
						return false;
					}
					if(user_pass.length > 30){
						modalStatus("LP");
						return false;
					}
					if (!/\d/.test(user_pass)) {
					    modalStatus("ENP");
						return false;
					}
					if(!/[A-Z]/.test(user_pass)){
						modalStatus("EUSP");
						return false;
					}

				var user_pass_rep = $('#user_pass_rep').val();
				/*Verify length user_pass_rep*/
					if(user_pass != user_pass_rep){
						modalStatus("PNM");
						return false;
					}

				/*Grouping information to send*/
				var dataForm = {
					stage: stage,
					user_pass: user_pass,
				}

				/*AJAX verification and putting information*/
				RegistrationVerify(stage, dataForm);
				break;
		}
		return false;
	});



	/*Custom function*/

	function RegistrationVerify(stage, dataForm){
		$.ajax({
	        url: '/RegisterVerification/' + $('meta[name="user_id"]').attr('value'),
	        type: 'post',
	        dataType: 'json',
	        data: dataForm,
	        headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
	        success: function(data){
	        	console.log(data);
	           	if(data.access == "denied"){
	           		modalStatus(data.error_code);
	           		return false;
	           	}else{
	           		modalStatus(data.success_code);
	           		switch(data.next_stage) {
	           			case 2:
	           				$('#stage-1').css('display', 'none');
							$('#stage-2').css('display', 'block');
	           				break;
	           			case 3:
	           				$('#stage-2').css('display', 'none');
							$('#stage-3').css('display', 'block');
	           				break;
	           			case 4:
							$('#stage-3').css('display', 'none');
							window.location.replace(data.redirect);
	           				break;
	           		}
	           	}
			},
	        error: function(data, textStatus, jQxhr){
	            console.log(data, textStatus, jQxhr);
	        	$('html').append( data.responseText );
	    	}
	    });
	}



});