<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PictureRequest extends FormRequest
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
            'image' => 'nullable|image|mimes:jpg,jpeg,png,bmp|max:2000',
            'album_id'=>'required|exists:albums,id',

        ];
    }
    public function onUpdate()
    {
        return [
            'name' => 'required',
            'image.*' => 'image|mimes:jpg,jpeg,png,bmp|max:2000',
            'album_id'=>'required|exists:albums,id',
            

        ];
 
    }
}
