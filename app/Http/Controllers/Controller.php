<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\VymexMail;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    public function prdouctPass(){
    	return view('Functional.password_request');
    }

    public function blog(){
    	return view('blog');
    }

    public function prdouctPassPost(Request $request){

    	if("5953" == $request->product){
    		return view('product');
    	}else{
    		echo "<h1>Error Password</h1>";
    		return view('Functional.password_request');
    	}
    	
    }


    public function mail(){
        $status = Mail::to('geratechstudio@gmail.com')->send(new VymexMail(888));
        dd($status);
    }
}
