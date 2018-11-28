<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\FrontEnd\ViewController as VC;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends VC
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function loginView(){
        return view(Config('page-settings.Folder'). '.auth.login')->with([
            'header' => $this->getHeader('login', 'blue'),
            'footer' => $this->getFooter()
        ]);
    }

    protected function login(Request $request)
    {   
        $this->validateLogin($request);
        if($this->guard()->attempt(['login' => $request->login, 'password'=> $request->password], ($request->remember == '1'))){
            return Response::json(['access' => 'allow', 'redirect' => route('home')]);
        }else{
            return Response::json(['access' => 'denied']);
        }
        

    }



    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        return redirect()->route('viewLogin');
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }  

}
