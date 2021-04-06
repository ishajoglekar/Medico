<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookOthersAppointmentRequest extends FormRequest
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
            //
            'patient_reason' => 'required',
            'patient_name' => 'required',
            'patient_no' => 'required',
            'phone' => 'required'
        ];
    }
}
