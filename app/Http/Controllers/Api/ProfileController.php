<?php

namespace App\Http\Controllers\Api;

use App\Enum\GenderEnum;
use App\Http\Resources\CustomerResourse;
use App\Http\Resources\EmployeeResource;
use App\Http\Traits\ImageTrait;
use App\Models\Customer;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    use ImageTrait;
    public $customer;
    public $employee;
    public $path;
    public function __construct(Customer $customer,Employee $employee)
    {
        $this->customer = $customer;
        $this->employee = $employee;

    }
    public function index(Request $request)
    {
        if(auth('customer')->user())
        {
                $customer = auth('customer')->user();
                return $this->apiResponse(new CustomerResourse($customer));
            }else{
            $employee = auth('employee')->user();
            
            return $this->apiResponse(new EmployeeResource($employee));
        }
    }

    public function updateProfile(Request $request)
    {
        $request_data = $request->except(['confirmPassword', 'password','lang','type']);
        if(auth('customer')->user()){
          $email =  ['required',Rule::unique('customers','email')->ignore(auth('customer')->user()->id)];
         $phone =  ['required',Rule::unique('customers','phone')->ignore(auth('customer')->user()->id)];
        }else{
            $email =  ['required',Rule::unique('employees','email')->ignore(auth('employee')->user()->id)];
             $phone =  ['required',Rule::unique('employees','phone')->ignore(auth('employee')->user()->id)];
        }
        if($request->type !=null){
            $request->validate([
               'image' => 'nullable|mimes:jpg,jpeg,png,svg,webp',
            ]);
        }else{
            $validator = Validator::make($request->all(), [
              'image' => 'nullable|mimes:jpg,jpeg,png,svg,webp',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors()->tojson(),
                ]);
            }
        }
    
        
        if(auth('customer')->user()){
            $customer = $this->customer->find(auth('customer')->user()->id);
            $request_data['password'] = bcrypt($request->get('password'));
            $this->path = 'customers';
            if($request->image !=null){
            $this->deleteImage($customer->image,'customers');
            
            $request_data['image'] = $this->uploadImagesDynamic($request);
            $customer->update([
                'image'=>$request_data['image'],
                
                ]);
            }
           
                
            
            if($request->type != null){
                session()->flash('success',__('site.updated_successfuly'));
                return redirect()->back();
            }
            return response()->json([
                'status'  => true,
                'message' => 'succeess',
                'customer'=> new CustomerResourse($customer),
                
            ], 200);
        }else{
            $employee = $this->employee->find(auth('employee')->user()->id);
            $request_data['password'] = bcrypt($request->get('password'));
            $this->path = 'employees';
            
            if($request->image !=null){
                
            $this->deleteImage($employee->image,'employees');
            $request_data['image'] = $this->uploadImagesDynamic($request);
            $employee->update([
                'image'=>$request_data['image'],
                ]);
            }
            if($request->type != null){
                session()->flash('success',__('site.updated_successfuly'));
                return redirect()->back();
            }
            return response()->json([
                'status'  => true,
                'message' => 'succeess',
                'customer'=> new EmployeeResource($employee),
                
            ], 200);

        }
    }


}

