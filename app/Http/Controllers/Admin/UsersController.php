<?php

namespace App\Http\Controllers\Admin;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\FrontEnd\ViewController;

class UsersController extends ViewController
{

    public function getUsers(){
    	return view(Config('page-settings.Folder'). '.admin.users')->with([
    	]);
    }

    public function getUserInfo($id = 'Denied'){
    	/*Check empty uri*/
    	if($id == 'Denied')
    		return redirect()->route('users');

    	$user = User::where('id', $id)->first();

    	/*Check empty user*/
    	if(empty($user))
    		return redirect()->route('users');

    	return view(Config('page-settings.Folder'). '.admin.user-card')->with([
    	]);
    }
}
