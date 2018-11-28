$('body').append('<div class="alert-wrap"></div>');



/*Alert for imaging function*/
function CloseImgManager(type){
	$('.alert-msg').remove();
	switch (type) {
		case 'creator':
			closeHTML = "<div class='alert-msg'><h3>Закрыть менеджер загрузки изображений?</h3><div class='button-row'><button id='CImgManager' value='create'>Закрыть</button><button id='ConImgManager' value='create'>Продолжить</button></div></div>";
			break;
		case 'editor':
			closeHTML = "<div class='alert-msg'><h3>Закрыть менеджер редактирования изображений?</h3><div class='button-row'><button id='CImgManager' value='edit'>Закрыть</button><button id='ConImgManager' value='edit'>Продолжить</button></div></div>";
			break;
		case 'reloader':
			closeHTML = "<div class='alert-msg'><h3>Закрыть менеджер обновления изображений?</h3><div class='button-row'><button id='CImgManager' value='reload'>Закрыть</button><button id='ConImgManager' value='reload'>Продолжить</button></div></div>";
			break;	

	}
	$('.alert-wrap').append(closeHTML);
}

/*Alert for text function*/
function CloseTextManager(type){
	$('.alert-msg').remove();
	switch (type) {
		case 'creatorEmpty':
			closeHTML = "<div class='alert-msg'><h3>Закрыть менеджер создания текста?</h3><div class='button-row'><button id='CTextManager' value='create'>Закрыть</button><button id='ConTextManager' value='create'>Продолжить</button></div></div>";
			break;
		case 'creatorHas':
			closeHTML = "<div class='alert-msg'><h3 style='font-size:.9em;'>Закрыть или сохранить менеджер создания текста?</h3><div class='button-row'><button id='CTextManager' value='create'>Закрыть</button><button id='ConTextManager' value='create'>Продолжить</button><button id='STextManager' value='create'>Сохранить</button></div></div>";
			break;
		case 'changerEmpty':
			closeHTML = "<div class='alert-msg'><h3 style='font-size:.9em;'>Закрыть менеджер редактирования текста?</h3><div class='button-row'><button id='CTextManager' value='change'>Закрыть</button><button id='ConTextManager' value='сhange'>Продолжить</button></div></div>";
			break;
		case 'changerHas':
			closeHTML = "<div class='alert-msg'><h3 style='font-size:.9em;'>Закрыть или сохранить менеджер редактирования текста?</h3><div class='button-row'><button id='CTextManager' value='change'>Закрыть</button><button id='ConTextManager' value='сhange'>Продолжить</button><button id='STextManager' value='change'>Сохранить</button></div></div>";
			break;		

	}
	$('.alert-wrap').append(closeHTML);
}

function DeleteTextManager(){
	$('.alert-msg').remove();
	var deleteHTML = "<div class='alert-msg'><h3 style='font-size:.9em;'>Вы действительно хотите удалить блок?</h3><div class='button-row'><button class='deleteBlock' value='accept'>Удалить</button><button class='deleteBlock' value='cancel'>Отменить</button></div></div>";
	$('.alert-wrap').append(deleteHTML);
}

function CloseCategoryManager(){
	$('.alert-msg').remove();
	var categoryManagerHTML = "<div class='alert-msg'><h3 style='font-size:.9em;'>Закрыть менеджер управления категориями?</h3><div class='button-row'><button class='closeCategory'>Закрыть</button><button class='continueCategory'>Отменить</button></div></div>";
	$('.alert-wrap').append(categoryManagerHTML);
}

function DeleteCategoryItem(id){
	$('.alert-msg').remove();
	var deleteItemHTML = "<div class='alert-msg del_item'><h3 style='font-size:.9em;'>Уверены, что хотите удалить категорию?</h3><div class='button-row'><button class='deleteCategory' value='" + id + "'>Удалить</button><button class='cancelCategory' value='" + id + "'>Отменить</button></div></div>";
	$('.alert-wrap').append(deleteItemHTML);
}

/*Callback function*/
$('body').on('click', '#edit' ,function(){
	if($("body div").hasClass('alert-msg')){
		$('.alert-msg').remove();
	}
});
$('body').on('click', '#change-block_text' ,function(){
	if($("body div").hasClass('alert-msg')){
		$('.alert-msg').remove();
	}
});

$('body').on('click', '#category' ,function(){
	if($("body div").hasClass('alert-msg') && !$(".alert-msg").hasClass('del_item')){
		$('.alert-msg').remove();
	}
});