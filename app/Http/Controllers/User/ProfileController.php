<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Dirape\Token\Token;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\FrontEnd\ViewController;
use Intervention\Image\ImageManagerStatic as Image;


class ProfileController extends ViewController
{
	public function __construct()
    {
        $this->middleware('home');
    }

	protected $month = ['Январь', 'Февраль', 'Maрт', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];

	protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255|unique:users',
        ]);
    }

    public function getProfile()
    {
		

       	return view(Config('page-settings.Folder'). '.user.profile')->with([
       		'umenu' => $this->getUmenu(),
       		'user' => Auth::user(),
       		'month_birth' =>Auth::user()->month == "E" ? 0 : $this->month[Auth::user()->month - 1]
    	]);
    }


     protected function putName(Request $request){
     	$user = Auth::user();
     	if(strlen($request->name) <= 0 || strlen($request->name) > 30){
     		if($user->first_name == "E"){
     			return Response::json(['access'=>'denied', 'old_name'=> 'None', 'error_code' => "PNE"]);
     		}else{
     			return Response::json(['access'=>'denied', 'old_name'=> $user->first_name, 'error_code' => "PNE"]);
     		}
     	}else{
     		$user->first_name = $request->name;
    		$user->save();
    		return Response::json(['access'=>'allow', 'success_code' => 'v702']);
     	}
     	
    }

    protected function putMiddleName(Request $request){
     	$user = Auth::user();
     	if(strlen($request->middle_name) <= 0 || strlen($request->middle_name) > 30){
     		if($user->middle_name == "E"){
     			return Response::json(['access'=>'denied', 'old_middle_name'=> 'None', 'error_code' => "PME"]);
     		}else{
     			return Response::json(['access'=>'denied', 'old_middle_name'=> $user->middle_name, 'error_code' => "PME"]);
     		}
     	}else{
     		$user->middle_name = $request->middle_name;
    		$user->save();
    		return Response::json(['access'=>'allow', 'success_code' => 'v702']);
     	}
     	
    }

    protected function putLastName(Request $request){
     	$user = Auth::user();
     	if(strlen($request->last_name) <= 0 || strlen($request->last_name) > 30){
     		if($user->last_name == "E"){
     			return Response::json(['access'=>'denied', 'old_last_name'=> 'None', 'error_code' => "PLE"]);
     		}else{
     			return Response::json(['access'=>'denied', 'old_last_name'=> $user->last_name, 'error_code' => "PLE"]);
     		}
     	}else{
     		$user->last_name = $request->last_name;
    		$user->save();
    		return Response::json(['access'=>'allow', 'success_code' => 'v702']);
     	}
    }

    protected function putCountry(Request $request){
     	$user = Auth::user();
     	if($request->country > 2){
     		return Response::json(['access'=>'denied', 'error_code' => "PE"]);
     	}
     	if($request->country == $user->country){
     		return Response::json(['access' => 'allow', 'change' => "NotChange"]);
     	}
	 	$user->country = $request->country;
	 	$user->save();
		return Response::json(['access'=>'allow', 'change' => "change", 'success_code' => 'v702']);
    }    

    protected function putCalendar(Request $request){
    	$user = Auth::user();
    	switch ($request->type) {
    		case 'year':
    			if($user->year == "E"){
    				if(strlen($request->value) == 0){
			    		return Response::json(['access'=>'allow', 'change' => "NotChange"]);
					}
    			}else{
    				if(strlen($request->value) == 0){
    					$user->year = "E";
    					$user->save();
			    		return Response::json(['access'=>'allow', 'change' => "Change", 'default' => 1, 'success_code' => 'calDel']);
					}
    			}
    			
    			if($request->value < 1960 || $request->value > 2002 || strlen($request->value) < 4 || strlen($request->value) > 4){
    				return Response::json(['access'=>'denied', 'error_code' => "calEy"]);
    			}else{
    				if($user->year == "E"){
    					$user->year = $request->value;
    					$user->save();
    					return Response::json(['access'=>'allow', 'change' => "Change", 'default' => 0, 'success_code' => 'v702']);
    				}else{
    					$user->year = $request->value;
    					$user->save();
    					return Response::json(['access'=>'allow', 'change' => "Change", 'default' => 0, 'success_code' => 'v702']);
    				}
    				
    			}
    			break;
    		case 'month':
    			if ($request->value == "delete") {
    				if($user->month != "E"){
    					$user->month = "E";
    					$user->save();
    					return Response::json(['access'=>'allow', 'change'=>"NotChange", 'success_code' => 'calDel']);
    				}else{
    					return Response::json(['access'=>'denied',  'error_code' => "calEm"]);
    				}
    			}
    			if($request->value <= 0 || $request->value > 12){
			    	return Response::json(['access'=>'denied',  'error_code' => "calEm"]);
				}
    			$user->month = $request->value;
    			$user->save();
    			return Response::json(['access'=>'allow', 'change' => "Change", 'success_code' => 'v702', 'val' => $this->month[$request->value - 1] ]);
    			break;
    		case 'day':
    			if ($request->value == "delete") {
    				if($user->day != "E"){
    					$user->day = "E";
    					$user->save();
    					return Response::json(['access'=>'allow', 'change'=>"NotChange", 'success_code' => 'calDel']);
    				}else{
    					return Response::json(['access'=>'denied',  'error_code' => "calEd"]);
    				}
    			}
    			if($request->value <= 0 || $request->value > 31){
			    	return Response::json(['access'=>'denied',  'error_code' => "calEd"]);
				}
				if(strlen($request->value) > 2 || strlen($request->value) <= 0){
					return Response::json(['access'=>'denied',  'error_code' => "calEd"]);
				}
    			$user->day = $request->value;
    			$user->save();
    			
    			return Response::json(['access'=>'allow', 'change'=>"Change", 'success_code' => 'v702']);
    			break;
    	}		
    }


    protected function putAvatar(Request $request){
    	$user = Auth::user();

    	if($request->hasFile('upAvatar')) {
    		$avatar = $request->file('upAvatar');
    		if($user->avatar == "E"){
    			$avatar_name = (new Token())->Unique('users', 'avatar', 30) . "." . $avatar->getClientOriginalExtension();
    			$avatar_resize = Image::make($avatar->getRealPath());              
   				$avatar_resize->resize(null, 150, function ($constraint) {
				    $constraint->aspectRatio();
				});
   				$avatar_resize->save('storage/avatars/' . $avatar_name);
    			$user->avatar = $avatar_name;
    			$user->save();
    		}
    		else{
    			unlink(storage_path('app/public/avatars/' . $user->avatar));
    			$avatar_name = (new Token())->Unique('users', 'avatar', 30) . "." . $avatar->getClientOriginalExtension();
    			$avatar_resize = Image::make($avatar->getRealPath());              
   				$avatar_resize->resize(null, 150, function ($constraint) {
				    $constraint->aspectRatio();
				});
   				$avatar_resize->save('storage/avatars/' . $avatar_name);
    			$user->avatar = $avatar_name;
    			$user->save();
    		}
    		return Response::json(['access'=>'allow', 'success_code' => 'v702', 'avatar_location' => url('storage') . '/avatars/' . $avatar_name]);
    	}else{
    		return Response::json(['access'=>'denied', 'error_code' => 'v702']);
    	}
    	
    }
    protected function deleteAvatar(){
    	$user = Auth::user();
    	unlink(storage_path('app/public/avatars/' . $user->avatar));
    	$user->avatar = "E";
    	$user->save();
    	return Response::json(['success_code' => 'AvD']);
    }



    protected function putLogin(Request $request){
    	$user = Auth::user();
    	if($request->login == $user->login){
			return Response::json(['access' => 'allow', 'change' => "NotChange"]);
		}
    	if(!empty(User::where('login', $request->login)->first())){
			return Response::json(['access' => 'denied', 'error_code' => "v603"]);
		}
		if(strlen($request->login) < 5){
			return Response::json(['access' => 'denied', 'error_code' => "SL"]);
		}
		if(strlen($request->login) > 30){
			return Response::json(['access' => 'denied', 'error_code' => "LL"]);
		}
		$user->login = $request->login;
    	$user->save();
    	return Response::json(['access' => 'allow', 'success_code' => 'v702', 'change' => "change"]);
    }

    protected function putEmail(Request $request){
    	$user = Auth::user();
    	if($request->email == $user->email){
			return Response::json(['access' => 'allow', 'change' => "NotChange"]);
		}
    	if(!empty(User::where('telephone', $request->email)->first())){
			return Response::json(['access' => 'denied', 'error_code' => "v604"]);
		}
		$valid = $this->validator($request->all())->validate();
    	$user->email = $request->email;
    	$user->save();
    	return Response::json(['access' => 'allow', 'success_code' => 'v702', 'change' => "change"]);
    }

    protected function putTelephone(Request $request){
    	$user = Auth::user();
    	if($request->login == $user->login){
			return Response::json(['access' => 'allow', 'change' => "NotChange"]);
		}
    	if(!empty(User::where('telephone', $request->telephone)->first())){
			return Response::json(['access' => 'denied', 'error_code' => "v604"]);
		}
    	if(substr($request->telephone, 0, 1) != "+"){
    		return Response::json(['access' => 'denied', 'error_code' => "v603"]);
    	}
    	$user->telephone = $request->telephone;
    	$user->save();
    	return Response::json(['access' => 'allow', 'success_code' => 'v702', 'change' => "change"]);
    }

    protected function putSeat(Request $request){
    	$user = Auth::user();
    	if($user->seat == "E"){
    		if(strlen($request->seat) == 0){
		    	return Response::json(['access'=>'allow', 'change' => "NotChange"]);
			}
    	}else{
    		if(strlen($request->seat) == 0){
    			$user->seat = "E";
    			$user->save();
				return Response::json(['access'=>'allow', 'change' => "Change", 'success_code' => 'calDel']);
			}
    	}
    	if($request->seat == $user->seat){
			return Response::json(['access' => 'allow', 'change' => "NotChange"]);
		}
		if(strlen($request->seat) > 60){
			return Response::json(['access' => 'denied', 'error_code' => "SB"]);
		}
    	$user->seat = $request->seat;
    	$user->save();
    	return Response::json(['access' => 'allow', 'success_code' => 'v702', 'change' => "Change"]);
    }

    protected function putNotifications(Request $request){
    	$user = Auth::user();
    	switch ($request->type) {
    		case 'enews':
    			$user->enews = $request->value;
    			break;
    		case 'eupd':
    			$user->eupd = $request->value;
    			break;
    		case 'mnews':
    			$user->mnews = $request->value;
    			break;
    		case 'mupd':
    			$user->mupd = $request->value;
    			break;
    	}
    	$user->save();
    	return Response::json(['success_code' => 'v702']);
    }

    protected function putAdditionalInfo(Request $request){
    	$user = Auth::user();
    	if(strlen($request->value) > 40){
    		return Response::json(['access' => 'denied', 'error_code' => "AIB"]);
    	}
    	if(strlen($request->value) == 0){
    		switch ($request->type) {
	    		case 'wtel':
	    			if($user->wtel != "E"){
    					$user->wtel = 'E';
    					$user->save();
    					return Response::json(['access'=>'allow', 'change' => "Change", 'success_code' => 'calDel']);
		    		}
	    			break;
	    		case 'htel':
	    			if($user->htel != "E"){
    					$user->htel = 'E';
		    		}
		    		$user->save();
    				return Response::json(['access'=>'allow', 'change' => "Change", 'success_code' => 'calDel']);
	    			break;
	    		case 'fax':
	    			if($user->fax != "E"){
    					$user->fax = 'E';
		    		}
		    		$user->save();
    				return Response::json(['access'=>'allow', 'change' => "Change", 'success_code' => 'calDel']);
	    			break;
	    		default:
	    			return Response::json(['access'=>'allow', 'change' => "NotChange"]);
	    			break;
	    	}
    	}
    	switch ($request->type) {
    		case 'wtel':
	    		if($request->value == $user->wtel){
					return Response::json(['access' => 'allow', 'change' => "NotChange"]);
				}
    			$user->wtel = $request->value;
    			break;
    		case 'htel':
    			if($request->value == $user->htel){
					return Response::json(['access' => 'allow', 'change' => "NotChange"]);
				}
    			$user->htel = $request->value;
    			break;
    		case 'fax':
    			if($request->value == $user->fax){
					return Response::json(['access' => 'allow', 'change' => "NotChange"]);
				}
    			$user->fax = $request->value;
    			break;
    	}
    	$user->save();
    	return Response::json(['access'=>'allow', 'change' => "Change", 'success_code' => 'v702']);
    }

}
