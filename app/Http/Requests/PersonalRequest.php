<?php

namespace App\Http\Requests;
use Auth;
use Illuminate\Foundation\Http\FormRequest;

class PersonalRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'f_name' => 'required',
            'l_name'   => 'required',
            'email'      => 'required|email|unique:users,email,'.Auth::user()->id,
            'mobile'      => 'required|numeric|unique:users,mobile,'.Auth::user()->id,
            'birth_date'   => 'required|date|before:today',
            'gender'   => 'required|in:1,2',
            'country' => 'required',
            'occupation' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'image.max' => trans("validation.image_size")
        ];
    }
}
