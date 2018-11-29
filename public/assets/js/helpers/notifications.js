var message,
	styles = {},
	num_message = 0,
	notificationsBody = '<div class="modal_nowrap"></div>';
	$("main").append(notificationsBody);

function modalStatus (status) {
	switch(status) {
		case 422:
			message = "Введена некорректная почта";
			styles = {
				background: '#e20808',
	    		color: '#fff',
			}
			break;
		/*Admin Code*/
			case 'a1':
				message = "Сохраните предидущие изменения!";
				styles = {
					background: 'rgb(244, 112, 50)',
	    			color: '#fff',
				}
				break;
			case 'a2':
				message = "Поле не должно быть пустым";
				styles = {
					background: 'rgb(244, 112, 50)',
	    			color: '#fff',
				}
				break;
			case 'a3':
				message = "Ошибка при добавлении блока в статью!";
				styles = {
					background: '#e20808',
	    			color: '#fff',
				}
				break;
			case 'a4':
				message = "Блок успешно сохранен";
				styles = {
					background: '#5cb85c',
	    			color: '#fff',
				}
				break;
			case 'a5':
				message = "Изображение не работает";
				styles = {
					background: 'rgb(244, 112, 50)',
	    			color: '#fff'
				}
				break;
			case 'a6':
				message = "Блок успешно удален";
				styles = {
					background: '#5cb85c',
	    			color: '#fff',
				}
				break;
			case 'a7':
				message = "Ошибка удаления блока";
				styles = {
					background: '#e20808',
	    		color: '#fff',
				}
				break;
			case 'a8':
				message = "Данные не соответствуют требованиям";
				styles = {
					background: '#e20808',
	    			color: '#fff',
				}
				break;
			case 'a9':
				message = "Данные успешно сохранены";
				styles = {
					background: '#5cb85c',
	    			color: '#fff',
				}
				break;
			case 'a10':
				message = "Ошибка Сервера";
				styles = {
					background: '#e20808',
	    			color: '#fff',
				}
				break;
			case 'a11':
				message = "Длина категории должна быть больше 4 символов";
				styles = {
					background: '#e20808',
	    			color: '#fff',
				}
				break;
			case 'a12':
				message = "Длина категории не должна превышать 160 символов";
				styles = {
					background: '#e20808',
	    			color: '#fff',
				}
				break;
			case 'a13':
				message = "Категория с таким именем уже существует";
				styles = {
					background: '#e20808',
	    			color: '#fff',
				}
				break;
			case 'a14':
				message = "Категория успешно создана";
				styles = {
					background: '#5cb85c',
	    			color: '#fff',
				}
				break;
			case 'a15':
				message = "Категория успешно удалена";
				styles = {
					background: '#5cb85c',
	    			color: '#fff',
				}
				break;
			case 'a16':
				message = "Категория успешно обновлена";
				styles = {
					background: '#5cb85c',
	    			color: '#fff',
				}
				break;
			case 'a17':
				message = "Категория успешно добавлена";
				styles = {
					background: '#5cb85c',
	    			color: '#fff',
				}
				break;
			case 'a18':
				message = "Заполните все данные для отображения блога пользователям";
				styles = {
					background: 'rgb(244, 112, 50)',
	    			color: '#fff',
				}
				break;
			case 'a19':
				message = "Блог открыт для просмотра";
				styles = {
					background: '#5cb85c',
	    			color: '#fff',
				}
				break;
			case 'a20':
				message = "Блог закрыт для просмотра";
				styles = {
					background: '#5cb85c',
	    			color: '#fff',
				}
				break;
			case 'a21':
				message = "Заполните все поля ответов";
				styles = {
					background: 'rgb(244, 112, 50)',
	    			color: '#fff',
				}
				break;
			case 'a22':
				message = "Заполните все поля";
				styles = {
					background: 'rgb(244, 112, 50)',
	    			color: '#fff',
				}
				break;
		/*Custom Success Code*/
			case 'v700':
				message = "Авторизация пройдена успешно";
				styles = {
					background: '#5cb85c',
	    			color: '#fff',
				}
				break;
			case 'v701':
				message = "На вашу почту отправлено письмо с подтверждением";
				styles = {
					background: '#5cb85c',
	    			color: '#fff',
				}
				break;
			case 'v702':
				message = "Введенные данные сохранены";
				styles = {
					background: '#5cb85c',
	    			color: '#fff',
				}
				break;	
		/*Custom Errors Code*/
			case 'v600':
				message = "Логин или пароль введены неверно";
				styles = {
					background: '#e20808',
	    			color: '#fff',
				}
				break;
			case 'v601':
				message = "Такой почтовый адрес уже используется";
				styles = {
					background: '#e20808',
	    			color: '#fff',
				}
				break;
			
			case 'v603':
				message = "Такой логин уже используется";
				styles = {
					background: '#e20808',
	    			color: '#fff',
				}
				break;
			case 'v604':
				message = "Такой номер телефона уже используется";
				styles = {
					background: '#e20808',
	    			color: '#fff',
				}
				break;		


		//Small Login
		case 'SL':
			message = "Логин должен быть больше 4 символов";
			styles = {
				background: 'rgb(244, 112, 50)',
    			color: '#fff',
			}
			break;
		//Large Login
		case 'LL':
			message = "Логин не должен превышать 30 символов";
			styles = {
				background: 'rgb(244, 112, 50)',
    			color: '#fff',
			}
			break;
		//Empty Telephone
		case 'ET':
			message = "Введите номер телефона";
			styles = {
				background: '#e20808',
    			color: '#fff',
			}
			break;
		//Empty User Name
		case 'EUN':
			message = "Введите имя";
			styles = {
				background: '#e20808',
    			color: '#fff',
			}
			break;
		//Large User Name
		case 'LUN':
			message = "Длинна имени не должна превышать 30 символов";
			styles = {
				background: '#e20808',
    			color: '#fff',
			}
			break;
		//Empty User Last Name
		case 'EULN':
			message = "Введите Фамилию";
			styles = {
				background: '#e20808',
    			color: '#fff',
			}
			break;
		//Large User Last Name
		case 'LULN':
			message = "Длинна фамили не должна превышать 30 символов";
			styles = {
				background: '#e20808',
    			color: '#fff',
			}
			break;
		//Empty User Middle Name
		case 'EUMN':
			message = "Введите отчество";
			styles = {
				background: '#e20808',
    			color: '#fff',
			}
			break;
		//Large User Middle Name
		case 'LUMN':
			message = "Длинна отчества не должна превышать 30 символов";
			styles = {
				background: '#e20808',
    			color: '#fff',
			}
			break;
		//Small Password
		case 'SP':
			message = "Пароль должен содержать минимум 6 символов";
			styles = {
				background: '#e20808',
    			color: '#fff',
			}
			break;
		case 'LP':
			message = "Длинна пароля не должна превышать 30 символов";
			styles = {
				background: '#e20808',
    			color: '#fff',
			}
			break;	

		//Empty Number in Password
		case 'ENP':
			message = "Пароль должен содержать хотя бы одну цифру";
			styles = {
				background: '#e20808',
    			color: '#fff',
			}
			break;
		//Empty Uppercase Symbol in Password	
		case 'EUSP':
			message = "Пароль должен содержать хотя бы одну заглавную букву";
			styles = {
				background: '#e20808',
    			color: '#fff',
			}
			break;
		//Passwords do not match	
		case 'PNM':
			message = "Введенные пароли не идентичны";
			styles = {
				background: '#e20808',
    			color: '#fff',
			}
			break;

		/*Calendar Error*/	
		case 'calEy':
			message = "Некорректно введен год рождения";
			styles = {
				background: '#e20808',
    			color: '#fff',
			}
			break;
		case 'calEd':
			message = "Некорректно введен день рождения";
			styles = {
				background: '#e20808',
    			color: '#fff',
			}
			break;
		case 'calEm':
			message = "Некорректно введен месяц рождения";
			styles = {
				background: '#e20808',
    			color: '#fff',
			}
			break;
		case 'calDel':
				message = "Данные успешно удалены";
				styles = {
					background: '#5cb85c',
	    			color: '#fff',
				}
				break;
		/*Personal Data*/
		case 'PNE': 
			message = "Име не должно быть пустым или превышать 30 символов";
				styles = {
					background: '#e20808',
    				color: '#fff',
				}
				break;
		case 'PME': 
			message = "Отчество не должно быть пустым или превышать 30 символов";
				styles = {
					background: '#e20808',
    				color: '#fff',
				}
				break;
		case 'PLE': 
			message = "Фамилия не должна быть пустой или превышать 30 символов";
				styles = {
					background: '#e20808',
    				color: '#fff',
				}
				break;		
		case 'PE': 
			message = "Ошибка обработки персональных данных";
				styles = {
					background: '#e20808',
    				color: '#fff',
				}
				break;
		/*Avatar*/
		case 'AvE': 
			message = "Аватар не прогружен";
				styles = {
					background: '#e20808',
    				color: '#fff',
				}
				break;
		case 'AvD':
				message = "Аватар успешно удален";
				styles = {
					background: '#5cb85c',
	    			color: '#fff',
				}
				break;
		case 'AvDE':
				message = "Ошибка при удалении Аватара";
				styles = {
					background: '#e20808',
    				color: '#fff',
				}
				break;
		/*Seat Big*/
		case 'SB':
				message = "Название должности не должно превышать 60 символов";
				styles = {
					background: '#e20808',
    				color: '#fff',
				}
				break;
		/*Additional Information Big*/
		case 'AIB':
				message = "Поле не должно превышать 40 символов";
				styles = {
					background: '#e20808',
    				color: '#fff',
				}
				break;		
	}	
 	


	/*Messages Scripst Inline*/
	var script = '<script>setTimeout(function(){$(".fn-' + num_message + '").addClass("opacity");},10);setTimeout(function(){$(".fn-' + num_message + '").removeClass("opacity");},3000);setTimeout(function(){$(".fn-' + num_message + '").remove();}, 3760);</script>',
	 	notification = '<div class="fast_notification fn-' + num_message + '" num-notify="' + num_message + '">' + message + script + '</div>';

	/*Append Message in notificationsBody*/
	$(".modal_nowrap").append(notification);

	/*Css style for message*/
	$(".fn-" + num_message).css(styles);

	/*Increment message code*/
	num_message++;
	
}			
	
	/*Close Message Inline Extremely*/
	$('.modal_nowrap').on('click', '.fast_notification', function(){
		$('.fn-' + $(this).attr("num-notify")).remove();
	})


function alertStatus(message) {
	var	styles = {
			background: '#3eb5f1',
	    	color: '#fff',
		}
	var script = '<script>setTimeout(function(){$(".as-' + num_message + '").addClass("opacity");},10);setTimeout(function(){$(".as-' + num_message + '").removeClass("opacity");},7000);setTimeout(function(){$(".as-' + num_message + '").remove();}, 7760);</script>',
	 	notification = '<div class="fast_notification as-' + num_message + '">' + message + script + '</div>';

	/*Append Message in notificationsBody*/
	$(".modal_nowrap").append(notification);

	/*Css style for message*/
	$(".as-" + num_message).css(styles);

	/*Increment message code*/
	num_message++;
}






	//Example Script code

		// /*Show Message*/
		// setTimeout(function() {
		//  	$('.fast_notification').addClass('opacity');
		// }, 10);
		// /*Hide Message*/
		// setTimeout(function() {
		//  	$('.fast_notification').removeClass('opacity');
		// }, 3000);
		// /*Remove Message*/
		// setTimeout(function() {
		//  	$('.fast_notification').remove();
		// }, 3760);
    