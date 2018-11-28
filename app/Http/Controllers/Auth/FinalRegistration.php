<?php

namespace App\Http\Controllers\Auth;

/*Models*/
	use App\User;

/*Mail Config*/
    use Illuminate\Support\Facades\Mail;
    use App\Mail\VymexMail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\FrontEnd\ViewController;

class FinalRegistration extends ViewController
{
    public function __construct()
    {
        $this->middleware('registration');
    }

     public function getForm($id, $rememver_token)
    {   
        return view(Config('page-settings.Folder'). '.auth.FinalRegistration')->with([
        	'user_id' => $id,
            'stage' => User::where('id', $id)->first()->stage
        ]);
    }



    /*AJAX FUNCTION*/

    	protected function RegisterVerification(Request $request, $user_id){
    		/*Variable access to the following actions*/
    		$access;
    		/*Variable success code*/
    		$success_code;

    		/*Verification of registration stage*/
    		switch ($request->stage) {
    			case 1:
    				if(!empty(User::where('login', $request->login)->first())){
		    			return Response::json(['access' => 'denied', 'error_code' => "v603"]);
		    		}
		    		if(!empty(User::where('telephone', $request->telephone)->first())){
		    			return Response::json(['access' => 'denied', 'error_code' => "v604"]);
		    		}

		    		User::where('id', $user_id)->update([
		    			'login' => $request->login,
		    			'telephone' => $request->telephone,
		    			'country' => $request->country,
		    			'stage' => 2
		    		]);

		    		$access = "allow";
		    		$success_code = "v702";
    				break;
                case 2:
                    if(strlen($request->user_name) == 0){
                        return Response::json(['access' => 'denied', 'error_code' => "EUN"]);
                    }
                    if(strlen($request->user_name) > 30){
                        return Response::json(['access' => 'denied', 'error_code' => "LUN"]);
                    }

                    if(strlen($request->user_middlename) == 0){
                        return Response::json(['access' => 'denied', 'error_code' => "EUMN"]);
                    }
                    if(strlen($request->user_middlename) > 30){
                        return Response::json(['access' => 'denied', 'error_code' => "LUMN"]);
                    }

                    if(strlen($request->user_lastname) == 0){
                        return Response::json(['access' => 'denied', 'error_code' => "EULN"]);
                    }
                    if(strlen($request->user_lastname) > 30){
                        return Response::json(['access' => 'denied', 'error_code' => "LULN"]);
                    }

                    User::where('id', $user_id)->update([
                        'first_name' => $request->user_name,
                        'middle_name' => $request->user_middlename,
                        'last_name' => $request->user_lastname,
                        'stage' => 3
                    ]);

                    $access = "allow";
                    $success_code = "v702";

                    break;
                case 3:
                    if(strlen($request->user_pass) == 0){
                        return Response::json(['access' => 'denied', 'error_code' => "SP"]);
                    }
                    if(strlen($request->user_pass) > 30){
                        return Response::json(['access' => 'denied', 'error_code' => "LP"]);
                    }

                    User::where('id', $user_id)->update([
                        'password' => bcrypt($request->user_pass),
                        'stage' => 4
                    ]);

                    Mail::to('99gerasimenko.oleg@gmail.com')->send(new VymexMail([
                        'user' => User::where('id', $user_id)->first(),
                        'password' => $request->user_pass,
                        ],2));

                    $access = "allow";
                    $success_code = "v702";

                    return Response::json(['access' => $access, 'success_code' => $success_code, 'redirect' => route('home'), 'next_stage' => $request->stage + 1]); 
                    break;
    		}
    		


			return Response::json(['access' => $access, 'success_code' => $success_code, 'next_stage' => $request->stage + 1]);	
    	}

}

