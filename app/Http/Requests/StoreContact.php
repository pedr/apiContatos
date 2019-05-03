<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContact extends FormRequest
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
            'sellerName' => 'required|max:128',
            'contactName' => 'required|max:128',
            'email' => 'required|email|max:256',
            'telephone' => 'required|max:16',
            'companyName' => 'nullable|max:128',
            'expirationDate' => 'nullable|date',
            'contactDate' => 'nullable|date', 
        ];
    }
}
