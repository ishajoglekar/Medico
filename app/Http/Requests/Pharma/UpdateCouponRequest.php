<?php

namespace App\Http\Requests\Pharma;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCouponRequest extends FormRequest
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
        // dd($this->coupon);
        return [
            'valid_till'=>'required',
            'code'=>'required|unique:coupons,code,'. $this->coupon->id
        ];
    }
}
