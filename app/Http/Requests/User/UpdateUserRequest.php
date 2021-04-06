<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required|unique:users,email,'.auth()->id(),
            'password'=>'required',
            'gender'=>'required',
            'age'=>'required',
            'phone_no'=>'required|unique:users,phone_no,'.auth()->id(),
        ];
    }
}
