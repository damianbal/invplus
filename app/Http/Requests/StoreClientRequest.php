<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
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
            'name' => 'min:3|required',
            'address' => 'min:3',
            'address_city' => 'min:3',
            'address_state' => 'min:3',
            'address_country' => 'min:3',
            'address_zipcode' => 'min:3'
        ];
    }
}
