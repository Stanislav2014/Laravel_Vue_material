<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
            'firstName' => 'required|min:2|max:12',
            'lastName' => 'required|min:2|max:12',
            'phone' => 'required|min:2|max:12',
            'amountInvest' => 'required',
            'email' => 'required|email',
            'confirmEmail' => 'required|email',
            'password' => 'required|min:8',
            'confirmPassword' => 'required|min:8',
            'agree' => 'required|boolean|accepted',
            'subscribe' =>'required|boolean|accepted',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'firstName.required' => ['required' => 'error'],
            'firstName.min:2' => ['minLength' => 'error'],
            'firstName.max:12' => ['maxLength' => 'error'],

            'lastName.required' => ['required' => 'error'],
            'lastName.min:2' => ['minLength' => 'error'],
            'lastName.max:12' => ['maxLength' => 'error'],

            'phone.required' => ['required' => 'error'],
            'phone.min:2' => ['minLength' => 'error'],
            'phone.max:12' => ['maxLength' => 'error'],

            'amountInvest.required' => ['required' => 'error'],

            'email.required' => ['required' => 'error'],
            'email.email' => ['email' => 'error'],

            'confirmEmail.required' => ['required' => 'error'],
            'confirmEmail.email' => ['email' => 'error'],

            'password.required' => ['required' => 'error'],
            'password.min:8' => ['minLength' => 'error'],

            'confirmPassword.required' => ['required' => 'error'],
            'confirmPassword.min:8' => ['minLength' => 'error'],

            'agree.required' => ['required' => 'error'],
            'agree.boolean' => ['boolean' => 'error'],
            'agree.accepted' => ['accepted' => 'error'],

            'subscribe.required' => ['required' => 'error'],
            'subscribe.boolean' => ['boolean' => 'error'],
            'subscribe.accepted' => ['accepted' => 'error'],
        ];
    }
}
