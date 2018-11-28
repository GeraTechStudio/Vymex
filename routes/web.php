<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', "FrontEnd\FrontEndController@getApp")->name('app');
Route::get('/blog', "FrontEnd\FrontEndController@getBlog")->name('blog');
Route::get('/blog/{slug}', "FrontEnd\FrontEndController@getBlogArticle")->name('blog-article');


/*Auth routes*/
	Route::get('/login', "Auth\LoginController@loginView")->name('viewLogin');
	Route::post('/login', "Auth\LoginController@login");
	Route::post('/registration', "Auth\RegisterController@register");
	Route::post('logout', 'Auth\LoginController@logout')->name('logout');
	/*Registration*/
	Route::get('/activation/{id}/{remember_token}', "Auth\RegisterController@activation")->name('activation');
	Route::get('/registration/{id}/{remember_token}', "Auth\FinalRegistration@getForm")->name('FinalRegistration');
		/*AJAX*/
		Route::post('/RegisterVerification/{user_id}', "Auth\FinalRegistration@RegisterVerification");
/*User routes*/
	Route::get('/statistics', 'User\UserHomeController@getStatistics')->name('home');
	Route::get('/dashboard', 'User\UserHomeController@getDashboard')->name('dashboard');
	Route::get('/profile', 'User\ProfileController@getProfile')->name('profile');
	/*Profile AJAX*/
		/*First Column*/
		Route::put('/profile/name', 'User\ProfileController@putName');
		Route::put('/profile/middle_name', 'User\ProfileController@putMiddleName');
		Route::put('/profile/last_name', 'User\ProfileController@putLastName');
		Route::put('/profile/country', 'User\ProfileController@putCountry');
		Route::put('/profile/calendar', 'User\ProfileController@putCalendar');
		Route::post('/profile/avatar', 'User\ProfileController@putAvatar');
		Route::delete('/profile/avatar/delete', 'User\ProfileController@deleteAvatar');
		/*Second Column*/
		Route::put('/profile/login', 'User\ProfileController@putLogin');
		Route::put('/profile/email', 'User\ProfileController@putEmail');
		Route::put('/profile/telephone', 'User\ProfileController@putTelephone');
		Route::put('/profile/seat', 'User\ProfileController@putSeat');
		Route::put('/profile/notifications', 'User\ProfileController@putNotifications');
		Route::put('/profile/additionalInfo', 'User\ProfileController@putAdditionalInfo'); 

/*Admin routes*/
	Route::prefix('admin')->middleware(['access:admin'])->group(function () {
		Route::get('/dashboard', "Admin\DashboardController@getDashboard")->name('admin-dashboard');
		/*Subscribers*/
		Route::get('/dashboard/users', "Admin\UsersController@getUsers")->name('users');
		Route::get('/dashboard/user/{id?}', "Admin\UsersController@getUserInfo")->where(['id' => '[0-9]+'])->name('userInfo');
		/*Blog*/
		Route::get('/blog', "Admin\BlogController@getTileBlog")->name('tile-blog');
		Route::get('/blog/create', "Admin\BlogController@СreateBlog")->name('create-blog');
		Route::get('/blog/manager/{id}', "Admin\BlogController@ManagerBlog")->name('manager-blog');
			/*Ajax*/
			Route::put('/blog/edit/main-info', "Admin\BlogController@chnageMainInfo");
			Route::post('/blog/upload/img', "Admin\BlogController@uploadBlogImg");
			Route::put('/blog/edit/choose-category', "Admin\BlogController@chooseCategory");
			Route::get('/blog/get/category', "Admin\BlogController@getCategory");
			Route::post('/blog/create/category', "Admin\BlogController@createCategory");
			Route::put('/blog/edit/category', "Admin\BlogController@editCategory");
			Route::delete('/blog/delete/category', "Admin\BlogController@deleteCategory");
			Route::post('/blog/create/block-img', "Admin\BlogController@uploadBlockImg");
			Route::post('/blog/create/block-text', "Admin\BlogController@uploadBlockText");
			Route::get('/blog/edit/blocks', "Admin\BlogController@getBlock");		
			Route::put('/blog/edit/block-text', "Admin\BlogController@changeBlockText");
			Route::put('/blog/edit/block-img', "Admin\BlogController@changeBlockImg");
			Route::post('/blog/reload/block-img', "Admin\BlogController@reloadBlockImg");
			Route::delete('/blog/delete/block', "Admin\BlogController@deleteBlock");
	});



Route::get('/s', function(){
	return view('Vymex.layouts.preloader');
});

Route::get('/product', "Controller@prdouctPass")->name('product');
Route::post('/product', "Controller@prdouctPassPost")->name('productPost');

// Auth::routes();

