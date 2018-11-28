<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\FrontEnd\ViewController;

class UserHomeController extends ViewController
{

    public function __construct()
    {
        $this->middleware('home');
    }

    
    public function getStatistics()
    {
       	return view(Config('page-settings.Folder'). '.user.statistics')->with([
    		'sidebar' => $this->getSidebar(),
    		'cap' => $this->getСap(),
            'umenu' => $this->getUmenu(),
    	]);
    }

    public function getDashboard()
    {
       	return view(Config('page-settings.Folder'). '.user.dashboard')->with([
    		'sidebar' => $this->getSidebar(),
    		'cap' => $this->getСap(),
            'umenu' => $this->getUmenu(),
    	]);
    }
}
