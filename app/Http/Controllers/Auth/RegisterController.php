<?php

namespace App\Http\Controllers\Auth;

use App\Enum\GenderEnum;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Employee;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Validation\Rule;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
        // $this->middleware('guest:customer');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function showCustomerRegisterForm()
    {
        return view('auth.register', ['route' => route('customer.register-view'), 'title'=>'Admin']);
    }
    protected function createCustomer(array $data)
    {
        $admin = Customer::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'birth_date' => $data['birth_date'],
            'type' => $data['type'],
            'address' => $data['address'],
            'address_details' => $data['address_details'],
            'password' => Hash::make($data['password']),
        ]);
        return $admin;

    }
    protected function createEmployee(array $data)
    {
        $admin = Employee::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'birth_date' => $data['birth_date'],
            'type' => $data['type'],
            'address' => $data['address'],
            'address_details' => $data['address_details'],
            'password' => Hash::make($data['password']),
        ]);
        return $admin;
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    protected function customerValidator(array $data)
    {
        return Validator::make($data, [
            'first_name'=>'required|string|min:3|max:255',
            'last_name'=>'required|string|min:3|max:255',
            'email'=>'required|unique:customers,email',
            'phone'=>'required|unique:customers,phone',
            'birth_date'=>'required|date_format:Y-m-d',
            'password'          => 'required|string|min:6',
            'confirmPassword'   => 'required|string|same:password',
            'type'=>['required',Rule::in(GenderEnum::getKeyList())],
            'address'=>'required',
            'address_details'=>'required',
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function register(Request $request)
    {

        if($request->auth == 'customer'){
            $this->customerValidator($request->all())->validate();
            
            $user = $this->createCustomer($request->all());
            Config::set('auth.guards.customer.driver','session');
            event(new Registered($user));
            $login = new LoginController();
            //  Auth::guard('customer')->login($user);              
            return $login->customerLogin($request);

        } 
        // else  if($request->auth == 'employee'){
        //     Config::set('auth.guards.employee.driver','session');
        //     $this->customerValidator($request->all())->validate();
            
        //     $user = $this->createEmployee($request->all());
        //     event(new Registered($user));
        //     $login = new LoginController();
        //     // Auth::guard('employee')->login($user); 
        //     return $login->employeeLogin($request);
        // }
        
        
        else {
            $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);
        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect($this->redirectPath());
         }

    }

}