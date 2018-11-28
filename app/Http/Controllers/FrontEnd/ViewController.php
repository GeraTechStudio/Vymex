<?php

namespace App\Http\Controllers\FrontEnd;

use Config;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class ViewController extends Controller
{	

  /*Clients Function*/
    protected function getHeader($page, $color){
    	return view(Config('page-settings.Folder'). '.layouts.header')->with(['page'=>$page, 'color'=>$color])->render();
    }

    protected function getFooter(){
    	return view(Config('page-settings.Folder'). '.layouts.footer')->render();
    }

  /*User Function*/
  	protected function getSidebar(){
    	return view(Config('page-settings.Folder'). '.layouts.user.sidebar')->render();
    }

    protected function getСap(){
    	return view(Config('page-settings.Folder'). '.layouts.user.cap')->render();
    }

    protected function getUmenu(){
      return view(Config('page-settings.Folder'). '.layouts.user.umenu')->with([
        'auth' => Auth::user(),
      ])->render();
    }

    /*Admin Function*/
    protected function getSidebarAdmin(){
      return view(Config('page-settings.Folder'). '.layouts.admin.sidebar')->render();
    }

    protected function getСapAdmin(){
      return view(Config('page-settings.Folder'). '.layouts.admin.cap')->render();
    }

}
