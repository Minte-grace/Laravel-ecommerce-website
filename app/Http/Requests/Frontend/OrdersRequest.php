<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class OrdersRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'address'=> 'required',
            'city'=> 'required',
            'phone'=> 'required',
        ];
    }
}
