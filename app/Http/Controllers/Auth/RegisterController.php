<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Dirape\Token\Token;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Support\Facades\Mail;
use App\Mail\VymexMail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/statistics';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255|unique:users',
        ]);
    }


    public function register(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if(empty($user)){
            $valid = $this->validator($request->all())->validate();

            $user_data = User::create([
                'login' => (new Token())->Unique('users', 'login', 30),
                'email' => $request->email,
                'telephone' => (new Token())->Unique('users', 'telephone', 30),
                'password' => (new Token())->Unique('users', 'password', 30),
                'ip' => request()->ip(),
            ]);


            Mail::to('99gerasimenko.oleg@gmail.com')->send(new VymexMail($user_data, '1'));
            return Response::json(['status'=>'v701']);
        }
        else{
            return Response::json(['status'=>'v601']);
        }
        


        // $user = $this->create($request->all());

        // Mail::to($user)->send(new PubQuizRegistration($user));
        // $request->session()->flash('message', 'На ваш адрес было выслано письмо с подтверждением регистрации.');
        // return back();
    } 



    public function activation($userId, $remember_token){

        $user = User::findOrFail($userId);
        /*If user hasn't rember token*/
        if (is_null($user->remember_token)){
            /*If user remember token is equal hash email*/
            if (md5($user->email) == $remember_token){
                $user->remember_token = (new Token())->Unique('users', 'telephone', 60);
                $user->stage = 1;
                $user->save();
                Auth::login($user, true);
                return redirect()->route('FinalRegistration', [
                    'id'=> $userId,
                    'remember_token' => $remember_token
                ]);
            }
            else{
                dd("Неверно указан ключ доступа!");
            }
        }
        else{
            if (md5($user->email) == $remember_token){
                if($user->stage <= 3){
                    Auth::login($user, true);
                    return redirect()->route('FinalRegistration', [
                        'id'=> $userId,
                        'remember_token' => $remember_token
                    ]);
                }
                else{
                     return redirect()->route('viewLogin');
                }
            }else{
                 return redirect()->route('viewLogin');
            }
        }
       
        
    }





    public function mail(){
        $status = Mail::to('geratechstudio@gmail.com')->send(new VymexMail(888));
        dd($status);
    }
}




// public function register(Request $request)
//     {
//         $user = User::where('email', $request->email)->first();
//         if(empty($user)){
//             $valid = $this->validator($request->all())->validate();
//             return Response::json($this->validator($request->all())->validate()); 
//             if($valid['status'] == 200){
//                 // $user = $this->create($request->all());

//                 $token_id = makeRandomToken();
//                 $token_key = makeRandomTokenKey();
//                  return Response::json(['status'=>601, 'tocken_id'=> $token_id, 'token_key'=> $token_key]);
//             }else{
//                  return Response::json($valid);
//             }
            
//         }
//         else{
//             return Response::json(['status'=>601]);
//         }
        


//         $user = $this->create($request->all());

//         // Mail::to($user)->send(new PubQuizRegistration($user));
//         // $request->session()->flash('message', 'На ваш адрес было выслано письмо с подтверждением регистрации.');
//         // return back();
//     } 