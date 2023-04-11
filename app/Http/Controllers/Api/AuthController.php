<?php
namespace App\Http\Controllers\Api;

use App\CustomClass\response;
use App\Enum\StatusEnum;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\CustomerResourse;
use App\Http\Resources\EmployeeResource;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenExpiredException;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenInvalidException;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public $customer;
    public $employee;
    public $guard;
    public function __construct(Customer $customer,Employee $employee)
    {
        $this->customer = $customer;
        $this->employee = $employee;


    }

    public function register(RegisterRequest $request)
    {
        $request_data = $request->except(['confirmPassword', 'password','auth']);
        $request_data['password'] = bcrypt($request->get('password'));
        // if($request->auth == 'employee'){

        //     $user = $this->employee->create($request_data);
        //     $token= JWTAuth::fromUser($user);
        //     return response()->json([
        //         "status" => true,
        //         'message'=> 'register success',
        //         'user'   =>$user,
        //         'token'  => $token,
        //         'auth'   =>'employee'
        //     ], 200);
        // }else{

            $user = $this->customer->create($request_data);
            $token= JWTAuth::fromUser($user);
            return response()->json([
                "status" => true,
                'message'=> 'register success',
                'user'   =>$user,
                'token'  => $token,
                'auth'   =>'customer'
            ], 200);
            
        // }


    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email_phone' => 'required|string',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response::falid($validator->errors(), 422);
        }

        $credentials = $this->credentials($request);
        try {
            if (!$token = auth($this->guard)->attempt($credentials)) {
                return response()->json([
                    'status' => false,
                    'message' => 'passwored or email is wrong',
                ], 401);
            }
        } catch (JWTException $e) {
            return response()->json([
                'status' => false,
                'message' => 'some thing is wrong',
            ], 401);
        }
        if($this->guard == 'customer'){
           Customer::where('id',auth($this->guard)->user()->id)->update([
            'token_firebase'=>$request->token_firebase,
           ]);
            return response()->json([
                'status'  => true,
                'message' => 'succeess',
                'user'=> auth($this->guard)->user(),
                'token' => $token,
                'auth'=>'customer'
            ], 200);
        }else{
            Employee::where('id',auth($this->guard)->user()->id)->update([
                'token_firebase'=>$request->token_firebase,
               ]);
            return response()->json([
                'status'  => true,
                'message' => 'succeess',
                'user'=> auth($this->guard)->user(),
                'token' => $token,
                'auth'=>'employee'
            ], 200);

        }

    }
    public function credentials($request)
    {
        if ($this->customer->where('email' , $request->email_phone)->first()) {
            $this->guard = 'customer';
            return  ['email' => $request->email_phone, 'password' => $request->password,'status'=>StatusEnum::getAppoved()];

        } else if ($this->customer->where('phone' , $request->email_phone)->first()) {
            $this->guard = 'customer';

            return  ['phone' => $request->email_phone, 'password' => $request->password,'status'=>StatusEnum::getAppoved()];
        } else if ($this->employee->where('email' , $request->email_phone)->first()) {
            $this->guard = 'employee';

            return  ['email' => $request->email_phone, 'password' => $request->password,'status'=>StatusEnum::getAppoved()];

        } else if ($this->employee->where('phone' , $request->email_phone)->first()) {
            $this->guard = 'employee';


            return  ['phone' => $request->email_phone, 'password' => $request->password,'status'=>StatusEnum::getAppoved()];
        } else {
            $this->guard = 'customer';

            return  ['email' => $request->email_phone, 'password' => $request->password,'status'=>StatusEnum::getAppoved()];
        }
    }
    public function logout(Request $request)
    {

        if (auth('customer')->user() == null && auth('employee')->user() == null) {
            return response::falid('user_not_found', 401);
        }
        if (Auth::guard('customer')->check()) {

            $user = auth('customer')->user();

            Auth::guard('customer')->logout();
        }else if(Auth::guard('employee')->check())
        {
            $user = auth('employee')->user();
            Auth::guard('employee')->logout();
        }
        return response()->json([
            'status' => true,
            'message' => 'Logout Successfully',
        ], 200);
    }
    public function forgetPassword(Request $request)
    {
        // $token = Str::random(4);
        $token = '1234';
        $customer = $this->customer
            ->where('email', $request->email_phone)
            ->orWhere('phone', $request->email_phone)->first();
        $employee = $this->employee
            ->where('email', $request->email_phone)
            ->orWhere('phone', $request->email_phone)->first();
        if (empty($customer) && empty($employee)) {
            return response()->json([
                'status' => false,
                'message' => 'Please Verify Your Account First',
            ]);
        }
        DB::table('password_resets')->where('email', $request->email_phone)->delete();
        $row = DB::table('password_resets')->where('email', $request->email_phone)
            ->insert([
                'email' => $request->email_phone,
                'token' => $token,
            ]);
        return $this->apiResponse(__('site.add_successfuly'));

    }
    public function verifiedToken(Request $request)
    {
        $token = PasswordReset::
            where('token', $request->token)
            ->where('verified', false)
            ->first();
        if ($token) {
            $token->update([
                'verified' => true,
            ]);
            $token->save();
            return response()->json([
                'status' => true,
                'message' => 'verified succefully',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Please Write the right code',
            ]);
        }
    }
    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required|exists:password_resets,token',
            'password' => 'required | min:6| confirmed',
            'password_confirmation' => "same:password",
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->tojson(),
            ]);
        }
        $tokenRow = PasswordReset::where('token', $request->token)
            ->where('verified', true)->first();
        if (empty($tokenRow)) {
            return response()->json([
                'status' => false,
                'message' => 'Please Write The Right Code',
            ]);
        }
        $customer = $this->customer->where('email', $tokenRow->email)
            ->orWhere('phone', $tokenRow->email)->first();
        $employee = $this->employee->where('email', $tokenRow->email)
            ->orWhere('phone', $tokenRow->email)->first();
        if (empty($customer) && empty($employee)) {
            return response()->json([
                'status' => false,
                'message' => 'Please Write The Right Code',
            ]);
        }
        $customer->update([
            'password' => bcrypt($request->password),
        ]);
        $tokenRow->delete();
        return response()->json([
            'status' => true,
            'message' => 'Your Password Reset Successfully',
        ]);
    }
    public function showProfile()
    {
        if(! is_null(auth()->user())){

            return $this->apiResponse(new CustomerResourse(auth()->user() ));
        }else {
            return $this->apiResponse(new EmployeeResource(auth('employee')->user() ));

        }
    }
    public function joinOrder(Request $request)
    {
        if($request->type !=null){

            $request->validate([
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'phone' => 'required|string',
                'email' => 'required|email|unique:customers,email',
                'company' => 'required|string',
                'note' => 'nullable|string',
            ]);
        }else{

            $validator = Validator::make($request->all(), [
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'phone' => 'required|string',
                'email' => 'required|email|unique:customers,email',
                'company' => 'required|string',
                'note' => 'nullable|string',
            ]);
            if ($validator->fails()) {
                return response::falid($validator->errors(), 422);
            }
        }
        $request_data = $request->except(['_method','auth','type']);
        $this->customer->create($request_data);
        if($request->type != null){
            session()->flash('success',__('site.add_successfuly'));
            return redirect()->back();
        }else
        {

            return response()->json([
                'status' => true,
                'message' => __('site.success_subscription'),
            ]);
        }



    }
}
