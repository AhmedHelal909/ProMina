<?php

namespace App\Http\Requests;

use App\Enum\GenderEnum;
use App\Enum\StatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use PhpOffice\PhpSpreadsheet\RichText\Run;
use Illuminate\Support\Facades\Route;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return request()->isMethod('put') || request()->isMethod('patch') ? $this->onUpdate() : $this->onCreate();
    }
    public function onCreate()
    {
        return [
            'name' => 'required',
            'address' => 'required',
            'ssn' => 'required',
            'age' => 'required',
            'gender'          => ['required', 'integer', Rule::in(GenderEnum::getKeyList())],
            'phone' => 'required|unique:users,phone',
            'email' => 'required|unique:users,email',
            'salary' => 'required|numeric',
            'password' => 'required|min:5|string|confirmed|max:100',
            'password_confirmation' => 'required|min:5|string|same:password|max:100',
            'image' => 'nullable|mimes:jpg,jpeg,png,svg,webp',
            'roles' => 'required|exists:roles,id',

        ];
    }
    public function onUpdate()
    {
        
        if(Route::is('dashboard.users.updateProfile')){
            
        return [
            'name' => 'required',
            'address' => 'required',
            'ssn' => 'required',
            'age' => 'required',
            'gender'          => ['required', 'integer', Rule::in(GenderEnum::getKeyList())],
            'phone' => ['required',Rule::unique('users','phone')->ignore($this->route()->parameter('user'))],
            'email' => ['required',Rule::unique('users','email')->ignore($this->route()->parameter('user'))],
            'salary' => 'required|numeric',
            'password' => 'required|min:5|string|confirmed|max:100',
            'password_confirmation' => 'required|min:5|string|same:password|max:100',
            'image' => 'nullable|mimes:jpg,jpeg,png,svg,webp',
            

        ];
        }else{
        return [
            'name' => 'required',
            'address' => 'required',
            'ssn' => 'required',
            'age' => 'required',
            'gender'          => ['required', 'integer', Rule::in(GenderEnum::getKeyList())],
            'phone' => ['required',Rule::unique('users','phone')->ignore($this->route()->parameter('user'))],
            'email' => ['required',Rule::unique('users','email')->ignore($this->route()->parameter('user'))],
            'salary' => 'required|numeric',
            'password' => 'nullable|min:5|string|confirmed|max:100',
            'password_confirmation' => 'nullable|min:5|string|same:password|max:100',
            'image' => 'nullable|mimes:jpg,jpeg,png,svg,webp',
            'roles' => 'required|exists:roles,id',

        ];
        }
    }
}
