$(document).ready(function(){

	/*Page Settings*/
		if($("#user_phone").attr('lang') == "ua"){
			$("#vmx_mask_tel").attr('placeholder', '+380(__) __-__-___').mask("+380(99) 99-99-999");
		}else{
			$("#vmx_mask_tel").attr('placeholder', '+7 ___ ___-__-__').mask("+7 999 999-99-99");
		}
	/*End Page Settings*/

	/*Open Modal for UpLoad Avatar*/
	$(".profile_main").on('click', '.loaded_avatar', function(){
		var modal_title = 'Обновление Аватара';
		var modal_body = '<div class="avatar_form">';
		if($(".form_profile .loaded_avatar").attr('data-avatar') == "true"){
			modal_body += '<div class="loaded_avatar" style="' + $(".form_profile .loaded_avatar").attr('style') + '"><i class="fas fa-info hover_avatar"></i></div>';
			modal_body += '<form enctype="multipart/form-data" class="row_button"><label for="upload_input" class="upload_file">Выберите Файл</label><input type="file" id="upload_input" name="upAvatar" accept="image/*"><div class="delete_avatar active">Удалить</div></form></div>';			
		}else{
			modal_body += '<div class="loaded_avatar"><i class="fas fa-user-astronaut static_avatar"></i><i class="fas fa-info hover_avatar"></i></div>';
			modal_body += '<form enctype="multipart/form-data" class="row_button"><label for="upload_input" class="upload_file">Выберите Файл</label><input type="file" id="upload_input" name="upAvatar" accept="image/*"><div class="delete_avatar">Удалить</div></form></div>';			
		}
			
		$('#cmodal .title').empty().append(modal_title);
		$('#cmodal .modal-body').empty().append(modal_body);
		$('#cmodal').addClass('active').addClass('active_avatar');
	});
	/*Help Avatar*/
	$("#cmodal").on('click', '.loaded_avatar', function(){
		alertStatus("Выберите изображение, где вы размещены по центру!");
	});
	/*AJAX UpLoad Avatar*/
	$("#cmodal").on('change', '#upload_input', function(){
        var userAvatar = new FormData();
       	userAvatar.append("upAvatar",this.files[0]);
        $.ajax({
        	type: "POST",
            url: 'profile/avatar',
            data: userAvatar,
            dataType: 'json',
            processData: false,
            contentType: false,
            headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
        beforeSend: function(){
            var preload_gif = "<div class='preload' style='position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; z-index: 3; background-image: url(http://vymex.loc/assets/img/Logo/preloader.svg); background-repeat: no-repeat; background-position: center center;'></div>";
			$("#cmodal .loaded_avatar").append(preload_gif);
		},
		success: function (data) {
			$(".loaded_avatar .preload").remove();
			if(data.access == "allow"){
	        	$(".loaded_avatar").attr("style", "background-image: url(" + data.avatar_location + ")!important;");
	        	$(".form_profile .loaded_avatar").attr('data-avatar', "true");
	        	$("#cmodal .row_button .delete_avatar").addClass('active');
	        	$(".static_avatar").remove();
	        	modalStatus(data.success_code);
			}else{
				modalStatus(data.error_code);
			}
        	console.log(data);
       	},
        error: function (data) {
        	$(".loaded_avatar .preload").remove();
        	modalStatus("AvE");
        }});
    });
    /*AJAX Delete Avatar*/
    $("#cmodal").on('click', '.delete_avatar.active', function(){
    	$.ajax({
        	type: "DELETE",
            url: 'profile/avatar/delete',
            headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
        beforeSend: function(){
            var preload_gif = "<div class='preload' style='position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; z-index: 3; background-image: url(http://vymex.loc/assets/img/Logo/preloader.svg); background-repeat: no-repeat; background-position: center center;'></div>";
			$("#cmodal .loaded_avatar").append(preload_gif);
		},
		success: function (data) {
        	$(".loaded_avatar").attr("style", "");
        	$(".loaded_avatar").append('<i class="fas fa-user-astronaut static_avatar"></i>');
        	$(".form_profile .loaded_avatar").attr('data-avatar', "false");
        	$("#cmodal .row_button .delete_avatar").removeClass('active');
        	$(".loaded_avatar .preload").remove();
        	modalStatus("AvD");
       	},
       	error: function (data) {
       		$(".loaded_avatar .preload").remove();
        	modalStatus("AvDE");
        }});
    });




    /*Personal Profile Data AJAX*/
    	/*AJAX First Name*/
	    $(".form_profile").on('change', '#user_name', function(){
	    	$.ajax({
	        	type: "put",
	            url: 'profile/name',
	            data: {name: $(this).val()},
	            dataType: 'json',
	            headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
			success: function (data) {
				if(data.access == "denied"){
					if(data.old_name == "None"){
						$("#user_name").val("");
					}else{
						$("#user_name").val(data.old_name);
					}
					modalStatus(data.error_code);
				}else{
					modalStatus(data.success_code);
				}
	       	},
	       	error: function (data) {
	        	modalStatus("PE");
	        	$('html').append( data.responseText );
	        }});
	    });
	    /*AJAX Middle Name*/
	    $(".form_profile").on('change', '#user_middlename', function(){
	    	$.ajax({
	        	type: "put",
	            url: 'profile/middle_name',
	            data: {middle_name: $(this).val()},
	            dataType: 'json',
	            headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
			success: function (data) {
				console.log(data);
				if(data.access == "denied"){
					if(data.old_middle_name == "None"){
						$("#user_middlename").val("");
					}else{
						$("#user_middlename").val(data.old_middle_name);
					}
					modalStatus(data.error_code);
				}else{
					modalStatus(data.success_code);
				}
	       	},
	       	error: function (data) {
	        	modalStatus("PE");
	        	$('html').append( data.responseText );
	        }});
	    });
	    /*AJAX Last Name*/
	    $(".form_profile").on('change', '#user_lastname', function(){
	    	$.ajax({
	        	type: "put",
	            url: 'profile/last_name',
	            data: {last_name: $(this).val()},
	            dataType: 'json',
	            headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
			success: function (data) {
				console.log(data);
				if(data.access == "denied"){
					if(data.old_last_name == "None"){
						$("#user_lastname").val("");
					}else{
						$("#user_lastname").val(data.old_last_name);
					}
					modalStatus(data.error_code);
				}else{
					modalStatus(data.success_code);
				}
	       	},
	       	error: function (data) {
	        	modalStatus("PE");
	        	$('html').append( data.responseText );
	        }});
	    });
	    /*AJAX Country*/
	    $(".form_profile").on('click', '.country_row ', function(){
	    	$.ajax({
	        	type: "put",
	            url: 'profile/country',
	            data: {country: $(this).attr('data-type')},
	            dataType: 'json',
	            headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
			success: function (data) {
				console.log(data);
				if(data.access == "denied"){
					modalStatus(data.error_code);
				}else{
					if(data.change != "NotChange"){
						modalStatus(data.success_code);
					}
					
				}
	       	},
	       	error: function (data) {
	        	// modalStatus("PE");
	        	$('html').append( data.responseText );
	        }});
	    });



	/*Authorization Profile Data AJAX*/
	   	/*AJAX Login*/
	    $(".form_profile").on('change', '#login', function(){
	    	$.ajax({
	        	type: "put",
	            url: 'profile/login',
	            data: {login: $(this).val()},
	            dataType: 'json',
	            headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
			success: function (data) {
				console.log(data);
				if(data.access == "denied"){
					if(data.old_name == "None"){
						$("#user_name").val("");
					}else{
						$("#user_name").val(data.old_name);
					}
					modalStatus(data.error_code);
				}else{
					if(data.change != "NotChange"){
						
					}
					modalStatus(data.success_code);
				}
	       	},
	       	error: function (data) {
	        	modalStatus("PE");
	        	$('html').append( data.responseText );
	        }});
	    });
	    /*AJAX Email*/
	    $(".form_profile").on('change', '#email', function(){
	    	$.ajax({
	        	type: "put",
	            url: 'profile/email',
	            data: {email: $(this).val()},
	            dataType: 'json',
	            headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
			success: function (data) {
				if(data.access == "denied"){
					modalStatus(data.error_code);
				}else{
					if(data.change != "NotChange"){
						modalStatus(data.success_code);
					}
				}
	       	},
	       	error: function (data) {
	        	modalStatus(data.status);
	        }});
	    });
	    /*AJAX Telephone*/
	    $(".form_profile").on('change', '#vmx_mask_tel', function(){
	    	$.ajax({
	        	type: "put",
	            url: 'profile/telephone',
	            data: {telephone: $(this).val()},
	            dataType: 'json',
	            headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
			success: function (data) {
				if(data.access == "denied"){
					modalStatus(data.error_code);
				}else{
					if(data.change != "NotChange"){
						modalStatus(data.success_code);
					}
				}
	       	},
	       	error: function (data) {
	        	modalStatus("PE");
	        	$('html').append( data.responseText );
	        }});
	    });

	/*Role Profile Data AJAX*/
	   	/*AJAX Role Cmpany*/
	    $(".form_profile").on('change', '#seat', function(){
	    	$.ajax({
	        	type: "put",
	            url: 'profile/seat',
	            data: {seat: $(this).val()},
	            dataType: 'json',
	            headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
			success: function (data) {
				console.log(data);
				if(data.access == "denied"){
					modalStatus(data.error_code);
				}else{
					if(data.change != "NotChange"){
						modalStatus(data.success_code);
					}
				}
	       	},
	       	error: function (data) {
	        	modalStatus("PE");
	        	$('html').append( data.responseText );
	        }});
	    });

	/*Notifications Profile Data AJAX*/
		/*Update and close Notifications*/
		$(".form_profile").on('change', '.notification_group .switch input', function(){
			var notif_type = $(this).attr('data-type'),
				value;
			if($(this).attr("sw-toggle") == "on"){
				$(this).attr("sw-toggle", "off");
				value = 0;
			}else{
				$(this).attr("sw-toggle", "on");
				value = 1;
			}
			putNotifications({type:notif_type, value:value})
		});

	   	/*Function AJAX*/
	    function putNotifications(dataForm){
	    	console.log(dataForm);
			$.ajax({
		        url: '/profile/notifications/',
		        type: 'put',
		        dataType: 'json',
		        data: dataForm,
		        headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
		    success: function(data){
		        modalStatus(data.success_code);
		       	return false;
			},
		    error: function(data, textStatus, jQxhr){
		       	modalStatus("PE");
		    }});
		}

	/*Additional Profile Data AJAX*/
		/*Update and close additional info*/
		$(".form_profile").on('change', '.additional_info', function(){
			var notif_type = $(this).attr('data-type'),
				value = $(this).val();
			putAdditionalInfo({type:notif_type, value:value})
		});

	   	/*Function AJAX*/
	    function putAdditionalInfo(dataForm){
	    	console.log(dataForm);
			$.ajax({
		        url: '/profile/additionalInfo/',
		        type: 'put',
		        dataType: 'json',
		        data: dataForm,
		        headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
		    success: function(data){
		    	if(data.access == "denied"){
					modalStatus(data.error_code);
				}else{
					if(data.change != "NotChange"){
						modalStatus(data.success_code);
					}
				}
		       	return false;
			},
		    error: function(data, textStatus, jQxhr){
		       	modalStatus("PE");
		    }});
		}		
});


