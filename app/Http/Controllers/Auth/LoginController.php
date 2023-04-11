<?php

namespace App\Http\Controllers\Auth;

use App\Enum\StatusEnum;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Config;

class LoginController extends Controller
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
   
    }
    public function showCustomerLoginForm()
    {
        return view('auth.login', ['url' => route('vendor.login-view'), 'title'=>'vendor']);
    }
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if (Auth::guard('web')->attempt([
            'email'=>$request->email,
            'password'=>$request->password,
            ])) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }

            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
    public function customerLogin(Request $request)
    {
      
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::guard('customer')->attempt([
                    'email'=>$request->email,
                    'password'=>$request->password,
                    'status'=>StatusEnum::getAppoved()
                    ])){
            return redirect()->route('Frontend.Frontend.home');
        }else if (Auth::guard('employee')->attempt([
            'email'=>$request->email,
            'password'=>$request->password,
            'status'=>StatusEnum::getAppoved()
            ])) {
                return redirect()->route('Frontend.Frontend.home');

            }
            else{

            return back()->withInput($request->only('email', 'remember'));
        }
           
    }
    public function employeeLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::guard('employee')->attempt([
                    'email'=>$request->email,
                    'password'=>$request->password,
                    'status'=>StatusEnum::getAppoved()

                    ])){
            return redirect()->route('Frontend.Frontend.home');
        }else{

            return back()->withInput($request->only('email', 'remember'));
        }
           
    }
    public function logout(Request $request)
    {
        if(isset($request->guard)){
        Config::set('auth.guards.customer.driver','session');
        Config::set('auth.guards.employee.driver','session');

            if($request->guard == 'customer'){
                Auth::guard('customer')->logout();
                // $request->session()->invalidate();

                // $request->session()->regenerateToken();
        
                // if ($response = $this->loggedOut($request)) {
                //     return $response;
                // }
                return redirect()->route('Frontend.login');
            }else      if($request->guard == 'employee'){
                Auth::guard('employee')->logout();
                // $request->session()->invalidate();

                // $request->session()->regenerateToken();
        
                // if ($response = $this->loggedOut($request)) {
                //     return $response;
                // }
                return redirect()->route('Frontend.login');
            }
        }else{
         $this->guard()->logout();

            // $request->session()->invalidate();
    
            // $request->session()->regenerateToken();
    
            // if ($response = $this->loggedOut($request)) {
            //     return $response;
            // }
    
            return redirect()->route('auth.login');
        }

    }

    
 
  
  
}
