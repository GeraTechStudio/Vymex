$(document).ready(function() {

	$('#name_article').liTranslit({
		elAlias: $('#article_slug'),
		reg:'" "="-"'
	});



	/*Function for main info for article */
		$('body').on('change', '#name_article', function(){
			var dataForm = 	{
				dataType: 'name_article',
				dataValue: $(this).val(),
				dataSlug: $('#article_slug').val(),
				dataBound: 140,
				blog_id: $('meta[name="blog-id"]').attr('value')
			}
			AJAXUPLOAD(dataForm);	
		})
		$('body').on('change', '#SEO_description', function(){
			var dataForm = 	{
				dataType: 'SEO_description',
				dataValue: $(this).val(),
				dataBound: 290,
				blog_id: $('meta[name="blog-id"]').attr('value')
			}
			AJAXUPLOAD(dataForm);	
		})
		$('body').on('change', '#SEO_keys', function(){
			var dataForm = 	{
				dataType: 'SEO_keys',
				dataValue: $(this).val(),
				dataBound: 160,
				blog_id: $('meta[name="blog-id"]').attr('value')
			}
			AJAXUPLOAD(dataForm);	
		})
		$('body').on('change', '#show_blog', function(){
			if($(this).hasClass('active')){
				$('#show_blog').removeClass('active');
				var show = 0;
			}else{
				$('#show_blog').addClass('active');
				var show = 1;
			}
			var dataForm = 	{
				dataType: 'blog_show',
				dataValue: show,
				blog_id: $('meta[name="blog-id"]').attr('value')
			}
			AJAXUPLOAD(dataForm);	
		})

		$('body').on('change', '#uploadBlogImg', function(){
			var blog_id = $('meta[name="blog-id"]').attr('value'),
			    blogImg = new FormData();
		   	blogImg.append("uploadBlogImg",this.files[0]);
		   	blogImg.append("blog_id",blog_id);
		    $.ajax({
		      	type: "POST",
			    url: '/admin/blog/upload/img',
		    	data: blogImg,
		        dataType: 'json',
		        processData: false,
		        contentType: false,
		        headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
			success: function (data) {
		       	if(data.access == "allow"){
		       		modalStatus(data.success_code);
		       		$('.blog-img img').remove();
		       		$('.blog-img').append('<img src="' + data.blog_img + '"/>');
		       	}else{
		       		modalStatus(data.error_code);
		       	}
		    },
		    error: function (data) {
		      	modalStatus("a3");
		      	$('html').append( data.responseText );
		 	}});
		});

	/*Function for open category box*/
		$('body').on('click', '#choose_category', function(){
			var box_category = '<div class="active" id="category"><h2>Выберите категорию <i class="fas fa-plus-circle"></i></h2><div class="new-category"><label for="new-category">Название Категории</label><div class="manager_category"><input type="text" id="new-category" /><i class="fas fa-check yes_category"></i><i class="fas fa-times not_category"></i></div></div>';
			$.ajax({
		       	type: "GET",
		        url: '/admin/blog/get/category',
		        data: {blog_id: $('meta[name="blog-id"]').attr('value')},
			    dataType: 'json',
		        headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
				success: function (data) {
					if(data.access == "allow"){
						data.categories.forEach( function(element, index) {
							if(element.id == data.blog_category_id){
								box_category += '<div class="category-item active cg-' + element.id + '" category-id="' + element.id + '"><span class="category_title"><i class="fas fa-check-circle"></i>' + element.category_name + '</span><span class="manger_category-item"><i class="fas fa-pencil-alt"></i><i class="fas fa-trash-alt"></i></span></div>';
							}else{
								box_category += '<div class="category-item cg-' + element.id + '" category-id="' + element.id + '"><span class="category_title"><i class="fas fa-check-circle"></i>' + element.category_name + '</span><span class="manger_category-item"><i class="fas fa-pencil-alt"></i><i class="fas fa-trash-alt"></i></span></div>';
							}
						});
						box_category += '</div>';
						$('#choose_category').parent('.blog-input_group').append(box_category);
			       	}
		       	},
		       	error: function (data) {
		        	modalStatus("a10");
		        	$('html').append( data.responseText );
		    }});
			
		})

		/*Function for choose Category*/
			$('body').on('click', '#category .category_title', function(){
				var category_id = $(this).parent('.category-item').attr('category-id');
				$.ajax({
			       	type: "PUT",
			        url: '/admin/blog/edit/choose-category',
			        data: {category_id: category_id, blog_id: $('meta[name="blog-id"]').attr('value')},
			        dataType: 'json',
			        headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
					success: function (data) {
						if(data.access == "allow"){
							modalStatus(data.success_code);
							$('#choose_category').val(data.categories.category_name);
							$('#category').remove();
				       	}else{
				       		modalStatus(data.error_code);
				       	}
			       	},
			       	error: function (data) {
			        	modalStatus("a10");
			        	$('html').append( data.responseText );
			    }});
			})





		/*Function for add Category*/
			$('body').on('click', '#category h2 i', function(){
				$('#category .new-category').addClass('active');
			})
		/*Function for close alert-msg and continue*/
			$('body').on('click', '.continueCategory', function(){
				$('.alert-msg').remove();
			});
		/*Function for close alert-msg and close ctegory-box*/
			$('body').on('click', '.closeCategory', function(){
				$('.alert-msg').remove();
				$('#category').remove();
			});
		/*Function for close creater category*/
			$('body').on('click', '.new-category .not_category', function(){
				$('#new-category').val('');
				$('.new-category.active').removeClass('active');
			});
		/*Function for create category*/
			$('body').on('click', '.new-category .yes_category', function(){
				$.ajax({
			       	type: "POST",
			        url: '/admin/blog/create/category',
			        data: {categoryName: $('#new-category').val()},
			        dataType: 'json',
			        headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
					success: function (data) {
						if(data.access == "allow"){
							var category_itm = '<div class="category-item cg-' + data.newCategory.id + '" category-id="' + data.newCategory.id + '"><span class="category_title"><i class="fas fa-check-circle"></i>' + data.newCategory.category_name + '</span><span class="manger_category-item"><i class="fas fa-pencil-alt"></i><i class="fas fa-trash-alt"></i></span></div>';
							$('#category').append(category_itm);
							modalStatus(data.success_code);
							$('#new-category').val('');
							$('.new-category.active').removeClass('active');
				       	}else{
				       		modalStatus(data.error_code);
				       	}
			       	},
			       	error: function (data) {
			        	modalStatus("a10");
			        	$('html').append( data.responseText );
			    }});
				// $('#new-category').val('');
				// $('.new-category.active').removeClass('active');
			});

		/*Function for show ask for deleting category*/
			$('body').on('click', '.manger_category-item .fas.fa-trash-alt', function(){
				var category_id = $(this).parent('.manger_category-item').parent('.category-item').attr('category-id');
				DeleteCategoryItem(category_id);
			});
		/*Function for close alert-msg and continue*/
			$('body').on('click', '.cancelCategory', function(){
				$('.alert-msg').remove();
			});
		/*Function for delete category*/
			$('body').on('click', '.deleteCategory', function(){
				$.ajax({
			       	type: "DELETE",
			        url: '/admin/blog/delete/category',
			        data: {category_id: $(this).val()},
			        dataType: 'json',
			        headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
					success: function (data) {
						console.log(data);
						if(data.access == "allow"){
							$('.cg-' + data.deleteСategory).fadeOut();
							modalStatus(data.success_code);
							$('.alert-msg').remove();
				       	}else{
				       		modalStatus(data.error_code);
				       	}
			       	},
			       	error: function (data) {
			        	modalStatus("a10");
			        	$('html').append( data.responseText );
			    }});
			});	
		
		/*Function for show ask for edit category*/
			$('body').on('click', '.manger_category-item .fas.fa-pencil-alt', function(){
				var category_id = $(this).parent('.manger_category-item').parent('.category-item').attr('category-id');
				var old_category_name = $('.cg-' + category_id + ' .category_title')[0].innerText; 
				$('.cg-' + category_id).replaceWith('<div class="edit-category ec-' + category_id + '"><label for="new-category">Название Категории</label><div class="manager_category"><input type="text" class="input-edit_category" category-id="' + category_id + '" value="' + old_category_name + '"/><textarea class="buffer_category" category-id="' + category_id + '" style="display:none;">' + old_category_name + '</textarea><i class="fas fa-check yes_category" category-id="' + category_id + '"></i><i class="fas fa-times not_category" category-id="' + category_id + '"></i></div>');
			});
		/*Function for cancel ask for edit category*/
			$('body').on('click', '.edit-category .not_category', function(){
				var category_id = $(this).attr('category-id');
				var category_name = $('.buffer_category[category-id="' + category_id + '"]').val();
				var category_itm = '<div class="category-item cg-' + category_id + '" category-id="' + category_id + '"><span class="category_title"><i class="fas fa-check-circle"></i>' + category_name + '</span><span class="manger_category-item"><i class="fas fa-pencil-alt"></i><i class="fas fa-trash-alt"></i></span></div>';
				$('.ec-' + category_id).replaceWith(category_itm);
			});
		/*Function edit category*/
			$('body').on('click', '.edit-category .yes_category', function(){
				var category_id = $(this).attr('category-id');
				var categoryName = $('.input-edit_category[category-id="' + category_id + '"]').val();
				$.ajax({
			       	type: "PUT",
			        url: '/admin/blog/edit/category',
			        data: {category_id: category_id, categoryName: categoryName},
			        dataType: 'json',
			        headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
					success: function (data) {
						console.log(data);
						if(data.access == "allow"){
							if(data.change == "Change"){
								modalStatus(data.success_code);
							}
							var category_itm = '<div class="category-item cg-' + category_id + '" category-id="' + category_id + '"><span class="category_title"><i class="fas fa-check-circle"></i>' + categoryName + '</span><span class="manger_category-item"><i class="fas fa-pencil-alt"></i><i class="fas fa-trash-alt"></i></span></div>';
				       		$('.ec-' + category_id).replaceWith(category_itm);
				       	}else{
				       		modalStatus(data.error_code);
				       	}
			       	},
			       	error: function (data) {
			        	modalStatus("a10");
			        	$('html').append( data.responseText );
			    }});
				// var category_itm = '<div class="category-item cg-' + category_id + '" category-id="' + category_id + '"><span class="category_title"><i class="fas fa-check-circle"></i>' + category_name + '</span><span class="manger_category-item"><i class="fas fa-pencil-alt"></i><i class="fas fa-trash-alt"></i></span></div>';
				// $('.ec-' + category_id).replaceWith(category_itm);
			});
	/*Function for close category box*/	
		$(document).mouseup(function (e){
			var div = $("#category");
			if (!div.is(e.target) && div.has(e.target).length === 0 && $("#category").hasClass('active') && !$("body div").hasClass('alert-msg')){
				if($('#category .new-category').hasClass('active') || $('#category div').hasClass('edit-category')){
					CloseCategoryManager();
				}else{
					$('#category').remove();
				}
				
			}
		});	




		function AJAXUPLOAD(dataForm){
			$.ajax({
		       	type: "PUT",
		        url: '/admin/blog/edit/main-info',
		        data: dataForm,
		        dataType: 'json',
		        headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
				success: function (data) {
					console.log(data);
					if(data.access == "allow"){
						modalStatus(data.success_code);
			       	}else{
			       		if(data.blog_show == 'cancel'){
			       			$('.switch input').removeClass('active');
			       		}
			       		modalStatus(data.error_code);
			       	}
		       	},
		       	error: function (data) {
		        	modalStatus("a10");
		        	$('html').append( data.responseText );
		    }});
		}






	/*Function for show adding blocks to blog atricle */
		$('body').on('click', '.add_block-pannel .add_block-button', function(){
			if($('.trash-delete').hasClass('active')){
				modalStatus("a1");
				return false;
			}
			if($('#change-block_img').hasClass('active') || $('#reload-block_img').hasClass('active') || $('#change-block_text').hasClass('active')){
				modalStatus("a1");
				scroller($('.pencil-editor.active').attr('data-edit'));
				return false;
			}
			var button_type = $(this).attr('button-type');
			switch(button_type) {
				case 'text':
					if($('#create-block_img').hasClass('active')){
						modalStatus("a1");
						scroller('img');
						return false;
					}
					$('#create-block_text').append("<div id='edit'></div>");
      				$('#edit').froalaEditor()
					$('.add_block-button[button-type="text"]').addClass('active');
					$('#create-block_text').addClass('active');
					scroller('text');
					break;
				case 'img':
					if($('#create-block_text').hasClass('active')){
						modalStatus("a1");
						scroller('text');
						return false;
					}
					/*Show img creator*/
					$('.add_block-button[button-type="img"]').addClass('active');
					$('#create-block_img').addClass('active');
					scroller('img');
					break;
			}
		});

	/*Function for upload imaпing block to blog atricle*/
		$('body').on('change', '#create-block_img .img_size input', function(){
			var imgType = $(this).attr('img-type'),
				blog_id = $('meta[name="blog-id"]').attr('value'),
			    blockImg = new FormData();
		   	blockImg.append("upBlockImg",this.files[0]);
		   	blockImg.append("imgType",imgType);
		   	blockImg.append("blog_id",blog_id);
		    $.ajax({
		      	type: "POST",
			    url: '/admin/blog/create/block-img',
		    	data: blockImg,
		        dataType: 'json',
		        processData: false,
		        contentType: false,
		        headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
			success: function (data) {
		       	if(data.access == "allow"){
		       		$('#create-block_img').removeClass('active');
		       		$('.blog-infos').append('<div class="block-change bc-' + data.block_id + '" block-type="' + data.block_type + '">' +  data.img_block + '<span class="pencil-editor" data-edit="' + data.block_id + '"><i class="fas fa-pencil-alt"></i></span><span class="trash-delete" data-delete="' + data.block_id + '"><i class="fas fa-trash-alt"></i></span></div>');
			       	$('.add_block-button[button-type="img"]').removeClass('active');
		       		$('#scroll-img').remove();
		       	}else{
		       		modalStatus(data.error_code);
		       	}
		    },
		    error: function (data) {
		      	modalStatus("a3");
		       	// $('html').append( data.responseText );
		 	}});
		});

	/*Function for show reload and edit imaging block to blog atricle*/
		$('body').on('click', '.pencil-editor', function(){
			if($('.trash-delete').hasClass('active')){
				modalStatus("a1");
				return false;
			}
			if($('#create-block_img').hasClass('active')){
				modalStatus("a1");
				scroller('img');
				return false;
			}
			if($('#create-block_text').hasClass('active')){
				modalStatus("a1");
				scroller('text');
				return false;
			}
			if($('#change-block_img').hasClass('active') || $('#reload-block_img').hasClass('active') || $('#change-block_text').hasClass('active')){
				modalStatus("a1");
				scroller($('.pencil-editor.active').attr('data-edit'));
				return false;
			}
			var block_id = $(this).attr('data-edit'),
				block_type = $('.bc-' + block_id).attr('block-type');
				switch (block_type) {
					case 'img':
						if(!$('.pencil-editor').hasClass('active')){
							var htmlEditManager = '<div id="scroll-' + block_id + '" class="pointScroll"></div><div class="manager-block_img active" id="change-block_img" data-edit="' + block_id + '" style="font-size: 0.9em;margin: 0px 5px;width: calc(100% - 10px);"><h2>Менеджер редактирования изображения</h2><div class="reload-block_img"><i class="fas fa-camera"></i> Изменить изображение </div> <div class="choose-block_img_size"><div class="img_size" img-type="1"><i class="fas fa-camera"></i> По всей ширине</div><div class="img_size_align"><div class="img_size" img-type="2"><i class="fas fa-camera"></i> Разместить слева</div><div class="img_size" img-type="3"><i class="fas fa-camera"></i> Разместить по центру</div> <div class="img_size" img-type="4"><i class="fas fa-camera"></i> Разместить справа</div></div></div></div>';
							$('.bc-' + block_id).append(htmlEditManager);
							$('.pencil-editor[data-edit="' + block_id + '"]').addClass('active');
							scroller(block_id);
						}else{
							scroller(block_id);
						}
						break;
					case 'text':
						if(!$('.pencil-editor').hasClass('active')){
							var htmlEditManager = '<div id="scroll-' + block_id + '" class="pointScroll"></div><div class="manager-block_text active" id="change-block_text" data-edit="' + block_id + '" style="font-size: 0.9em;margin: 0px 5px;width: calc(100% - 10px);"><h2>Менеджер редактирования текста</h2><div id="edit-block"></div></div>';
							$('.bc-' + block_id).append(htmlEditManager);
							$.ajax({
							   	type: "GET",
								url: '/admin/blog/edit/blocks',
							    data: {block_Id: block_id, blog_id: $('meta[name="blog-id"]').attr('value')},
							    dataType: 'json',
							    headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
							success: function (data) {
								
								$('#edit-block').froalaEditor();
								$('.pencil-editor[data-edit="' + block_id + '"]').addClass('active');	
								$('.fr-placeholder').remove();
								$('.fr-box.fr-basic .fr-element').empty().append(data.data);
					       	},
					       	error: function (data) {
								$('html').append( data.responseText );
							}});
							scroller(block_id);
						}else{
							scroller(block_id);
						}
						break;
				}
		});

	/*Function for edit imaging block to blog atricle*/
		$('body').on('click', '.choose-block_img_size div.img_size ', function(){
			var imgType = $(this).attr('img-type');
			$.ajax({
		       	type: "PUT",
		        url: '/admin/blog/edit/block-img',
		        data: {imgType: imgType, block_id: $('.pencil-editor.active').attr('data-edit'), blog_id: $('meta[name="blog-id"]').attr('value')},
		        dataType: 'json',
		        headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
				success: function (data) {
					console.log(data);
					if(data.access == "allow"){
			       		$('.bc-' + data.block_id).replaceWith('<div class="block-change bc-' + data.block_id + '" block-type="' + data.block_type + '">' + data.img_block + '<span class="pencil-editor" data-edit="' + data.block_id + '"><i class="fas fa-pencil-alt"></i></span><span class="trash-delete" data-delete="' + data.block_id + '"><i class="fas fa-trash-alt"></i></span></div>');
			       		$('#scroll-' + data.block_id).remove();
			       	}
		       	},
		       	error: function (data) {
		        	modalStatus("a3");
		        	// $('html').append( data.responseText );
		    }});
		});
	/*Function for show reload imaging block to blog atricle*/
		$('body').on('click', '.reload-block_img', function(){
			var block_id = $('.pencil-editor.active').attr('data-edit');
			$('#change-block_img[data-edit="' + block_id + '"]').replaceWith('<form class="manager-block_img active" id="reload-block_img" block-id="' + block_id + '" enctype="multipart/form-data" style="font-size: 0.9em;margin: 0px 5px;width: calc(100% - 10px);"><h2>Менеджер обновления изображения</h2><div class="choose-block_img_size"><label class="img_size"><i class="fas fa-camera"></i> По всей ширине <input type="file" img-type="1" name="uploadBlockImg" accept="image/*" style="display:none;"></label><div class="img_size_align"><label class="img_size"><i class="fas fa-camera"></i> Разместить слева <input type="file" img-type="2" name="uploadBlockImg" accept="image/*" style="display:none;"></label><label class="img_size"><i class="fas fa-camera"></i> Разместить по центру <input type="file" img-type="3" name="uploadBlockImg" accept="image/*" style="display:none;"></label><label class="img_size"><i class="fas fa-camera"></i> Разместить справа <input type="file" img-type="4" name="uploadBlockImg" accept="image/*" style="display:none;"></label></div></div></form>');
		});

	/*Function for  reload imaging block to blog atricle*/
		$('body').on('change', '#reload-block_img .img_size input', function(){
			var imgType = $(this).attr('img-type'),
				blog_id = $('meta[name="blog-id"]').attr('value'),
			    blockImg = new FormData();
		   	blockImg.append("upBlockImg",this.files[0]);
		   	blockImg.append("imgType",imgType);
		   	blockImg.append("blog_id",blog_id);
		   	blockImg.append("block_id",$('.pencil-editor.active').attr('data-edit'));
		    $.ajax({
		      	type: "POST",
			    url: '/admin/blog/reload/block-img',
		    	data: blockImg,
		        dataType: 'json',
		        processData: false,
		        contentType: false,
		        headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
			success: function (data) {
				console.log(data);
		       	if(data.access == "allow"){
		       		$('.bc-' + data.block_id).replaceWith('<div class="block-change bc-' + data.block_id + '" block-type="' + data.block_type + '">' + data.img_block + '<span class="pencil-editor" data-edit="' + data.block_id + '"><i class="fas fa-pencil-alt"></i></span><span class="trash-delete" data-delete="' + data.block_id + '"><i class="fas fa-trash-alt"></i></span></div>');
			       	$('#scroll-' + data.block_id).remove();
		       	}else{
		       		modalStatus(data.error_code);
		       	}
		    },
		    error: function (data) {
		      	modalStatus("a3");
		       	$('html').append( data.responseText );
		 	}});
		});

	/*Alerts and closers for img_manager */
		/*Create*/
			$(document).mouseup(function (e){
				var div = $("#create-block_img");
				if (!div.is(e.target) && div.has(e.target).length === 0 && $("#create-block_img").hasClass('active') && !$("body div").hasClass('alert-msg')){
					CloseImgManager('creator');
				}
			});
		/*Change*/
			$(document).mouseup(function (e){
				var div = $("#change-block_img");
				if (!div.is(e.target) && div.has(e.target).length === 0 && $("#change-block_img").hasClass('active') && !$("body div").hasClass('alert-msg')){
					CloseImgManager('editor');
				}
			});
			$(document).mouseup(function (e){
				var div = $("#reload-block_img");
				if (!div.is(e.target) && div.has(e.target).length === 0 && $("#reload-block_img").hasClass('active') && !$("body div").hasClass('alert-msg')){
					CloseImgManager('reloader');
				}
			});

			$('body').on('click', '#CImgManager', function(){
				var type_manager = $(this).attr('value');
				switch (type_manager) {
					case 'create':
						$('.add_block-button[button-type="img"]').removeClass('active');
						$('#create-block_img').removeClass('active');
						$('.alert-msg').remove();
						break;
					case 'edit':
						$('#scroll-' + $('.pencil-editor.active').attr('data-edit')).remove();
						$('.pencil-editor.active').removeClass('active');
						$('#change-block_img').remove();
						$('.alert-msg').remove();
						break;
					case 'reload':
						$('#scroll-' + $('.pencil-editor.active').attr('data-edit')).remove();
						$('.pencil-editor.active').removeClass('active');
						$('#reload-block_img').remove();
						$('.alert-msg').remove();
						break;
				}
			});
			$('body').on('click', '#ConImgManager', function(){
				var type_manager = $(this).attr('value');
				switch (type_manager) {
					case 'create':
						$('.alert-msg').remove();
						break;
					case 'edit':
						$('.alert-msg').remove();
						break;
					case 'reload':
						$('.alert-msg').remove();
						break;
				}
			});
		
	/*Alerts and closers for text_manager */
		/*Create*/
			$(document).mouseup(function (e){
				var div = $("#create-block_text");
				if (!div.is(e.target) && div.has(e.target).length === 0 && $("#create-block_text").hasClass('active') && !$("body div").hasClass('alert-msg')){
					var textGet = $('#edit').froalaEditor('html.get', true);
					if(textGet.length == 0){
						CloseTextManager('creatorEmpty');
					}else{
						CloseTextManager('creatorHas');
					}
					
				}
			});

			$(document).mouseup(function (e){
				var div = $("#change-block_text");
				if (!div.is(e.target) && div.has(e.target).length === 0 && $("#change-block_text").hasClass('active') && !$("body div").hasClass('alert-msg')){
					var textGet = $('#edit-block').froalaEditor('html.get', true);
					if(textGet.length == 0){
						CloseTextManager('changerEmpty');
					}else{
						CloseTextManager('changerHas');
					}
					
				}
			});		

			$('body').on('click', '#CTextManager', function(){
				var type_manager = $(this).attr('value');
				switch (type_manager) {
					case 'create':
						if($('#buffer_text').hasClass('disabled-buffer_textarea')){
							$('.blog-infos').append('<div class="block-change bc-' + $('#buffer_text').attr('block-id') + '" block-type="text">' +  $('#buffer_text').val() + '<span class="pencil-editor" data-edit="' + $('#buffer_text').attr('block-id') + '"><i class="fas fa-pencil-alt"></i></span><span class="trash-delete" data-delete="' + $('#buffer_text').attr('block-id') + '"><i class="fas fa-trash-alt"></i></span></div>');
							$('#buffer_text').remove();
						}
						$('.add_block-button[button-type="text"]').removeClass('active');
						$('#create-block_text').removeClass('active');
						$('.alert-msg').remove();
						$('#edit').remove();
						break;
					case 'change':
						if($('#buffer_text').hasClass('disabled-buffer_textarea')){
							$('.bc-' + $('#buffer_text').attr('block-id')).replaceWith('<div class="block-change bc-' + $('#buffer_text').attr('block-id') + '" block-type="text">' +  $('#buffer_text').val() + '<span class="pencil-editor" data-edit="' + $('#buffer_text').attr('block-id') + '"><i class="fas fa-pencil-alt"></i></span><span class="trash-delete" data-delete="' + $('#buffer_text').attr('block-id') + '"><i class="fas fa-trash-alt"></i></span></div>');
							$('#buffer_text').remove();
							console.log(1);
						}else{
							$('#change-block_text').remove();
						}
						$('#scroll-' + $('.pencil-editor.active').attr('data-edit')).remove();
						$('.pencil-editor.active').removeClass('active');
						$('.alert-msg').remove();
						break;
				}
			});	

			$('body').on('click', '#ConTextManager', function(){
				var type_manager = $(this).attr('value');
				switch (type_manager) {
					case 'create':
						$('.alert-msg').remove();
						break;
					case 'сhange':
						$('.alert-msg').remove();
						break;	
				}
			});

			$('body').on('click', '#STextManager', function(){
				var type_manager = $(this).attr('value');
				switch (type_manager) {
					case 'create':
						var textGet = $('#edit').froalaEditor('html.get', true);
						if(textGet.length == 0){
							modalStatus("a2");
							return false;
						}
						$.ajax({
				        	type: "POST",
				            url: '/admin/blog/create/block-text',
				            data: {BlockText: $('#edit').froalaEditor('html.get'), blog_id: $('meta[name="blog-id"]').attr('value')},
				            dataType: 'json',
				            headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
						success: function (data) {
								$('.alert-msg').remove();
								modalStatus(data.success_code);
				        		$('.blog_main').append('<textarea class="disabled-buffer_textarea" id="buffer_text" block-id="' + data.block_id + '">' + data.text_block + '</textarea>')				        		
				       	},
				       	error: function (data) {
				        	modalStatus("a3");
				        }});
						break;
					case 'change':
						var textGet = $('#edit-block').froalaEditor('html.get', true);
						if(textGet.length == 0){
							modalStatus("a2");
							return false;
						}
						$.ajax({
				        	type: "PUT",
				            url: '/admin/blog/edit/block-text',
				            data: {BlockText: $('#edit-block').froalaEditor('html.get'), blog_id: $('meta[name="blog-id"]').attr('value'), block_id: $('.pencil-editor.active').attr('data-edit')},
				            dataType: 'json',
				            headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
						success: function (data) {
							if(data.access == "allow"){
								$('.alert-msg').remove();
								modalStatus(data.success_code);
				        		$('.blog_main').append('<textarea class="disabled-buffer_textarea" id="buffer_text" block-id="' + data.block_id + '">' + data.text_block + '</textarea>')	
				        	}
				       	},
				       	error: function (data) {
				        	// modalStatus("PE");
				        	$('html').append( data.responseText );
				        }});
						break;	
				}
			});


	/*Function for show alert to delete block*/
	$('body').on('click', '.trash-delete', function(){
		$(this).addClass('active');
		DeleteTextManager();
	})

	/*Function for delete block*/
	$('body').on('click', '.deleteBlock', function(){
		var ask = $(this).val();
		switch (ask) {
			case 'accept':
				$.ajax({
				    type: "DELETE",
				    url: '/admin/blog/delete/block',
				    data: {blog_id: $('meta[name="blog-id"]').attr('value'), block_id: $('.trash-delete.active').attr('data-delete')},
				    dataType: 'json',
				    headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
				success: function (data) {
					if(data.access == "allow"){
						$('.bc-' + $('.trash-delete.active').attr('data-delete')).remove();
						modalStatus(data.success_code);
						$('.alert-msg').remove();
				    }else{
				    	modalStatus(data.error_code);
				    }
				},
				error: function (data) {
					modalStatus('a7');
					$('html').append( data.responseText );
				}});
				break;
			case 'cancel':
				$('.alert-msg').remove();
				$('.trash-delete.active').removeClass('active');
				break;
		}
	})

	/*Function for smooth scroll to choose object*/
	function scroller(id_scoller){
	    var destination = $("#scroll-" + id_scoller).offset().top;
		$('body').animate({ scrollTop: destination }, 1100);
	    return false; 
	}

});


		



