$(document).ready(function(){

      /*Preloader*/
      var disabled = function disabled(){
            $(".vymex-animation").fadeOut();
      }
      setTimeout(disabled, 1800);

      /*Slider*/

      $('.vymex-info').slick({
            autoplay: true,
            autoplaySpeed: 5000,
            arrows: false,
            fade: true,
            dots: true,
            infinite: true
      });

      /*Remember Switch*/
      $(".login_form").on('change', '.input_group .switch input', function(){
            var notif_type = $(this).attr('data-type');
            if($(this).attr("sw-toggle") == "on"){
                  $(this).attr("sw-toggle", "off");
                  $(this).attr('value', 0);
            }else{
                  $(this).attr("sw-toggle", "on");
                  $(this).attr('value', 1);
            }      
      });
      
      /*Login AJAX*/
      $('.login_form').submit(function(){
        $.ajax({
            url: 'login',
            data: {'login': $('#login').val(),'password': $('#password').val(), remember: $('#remember').val()},
            dataType: 'json',
            type: 'post',
            headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
            success: function( data, textStatus, jQxhr ){
                  console.log(data);
                  if(data.access == "allow"){
                      modalStatus("v700");
                      window.location.replace(data.redirect);  
                  }else{
                     modalStatus("v600");
                     $('#password').val("");   
                  }
                  },
            error: function(data, textStatus, jQxhr){
                  console.log(data);
                  modalStatus(data.status);
                  $('#password').val("");
                  $('html').append( data.responseText );
            }
        });

            return false;
      });

	/*Registration AJAX*/
	$('.register_form').submit(function(){
	  $.ajax({
            url: 'registration',
            data: {'email': $('.email_input').val()},
            dataType: 'json',
            type: 'post',
            headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
            success: function( data, textStatus, jQxhr ){
            	console.log(data);
            	modalStatus(data.status);
                  $('.register_form').trigger('reset');
			},
            error: function(data, textStatus, jQxhr){
            	console.log(data, textStatus, jQxhr);
            	modalStatus(data.status);
            	$('.register_form').trigger('reset');
            	$('html').append( data.responseText );
            }
        });

		return false;
	});
	

});