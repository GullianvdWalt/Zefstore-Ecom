<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
        $emailValidation = auth()->user() ? 'required|email' : 'required|email|unique:users';
        // Validation
        return [
            'email' => $emailValidation,
            'fullName' => 'required',
            'address' => 'required',
            'city' => 'required',
            'province' => 'required',
            'postalCode' => 'required',
            'phone' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'You are already registered with this email address. Please <a href="/login">login</a> to continue.',
        ];
    }
}
