<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\FrontEnd\ViewController;

class DashboardController extends ViewController
{


    public function getDashboard(){
    	return view(Config('page-settings.Folder'). '.admin.dashboard')->with([
    		'sidebar' => $this->getSidebarAdmin(),
    		'cap' => $this->getСapAdmin(),
    	]);

    }
}
