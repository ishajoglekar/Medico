<?php

namespace App\Http\Requests\Doctor\Slot;

use Illuminate\Foundation\Http\FormRequest;

class CreateSlotRequest extends FormRequest
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
            'slot_date'=>'required',
            'time'=>'required|array|min:1',
            'type'=>'required|array|min:1',
        ];
    }
}
