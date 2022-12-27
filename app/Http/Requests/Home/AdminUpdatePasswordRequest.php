<?php

namespace App\Http\Requests\Home;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class AdminUpdatePasswordRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'oldpassword' => ['required', 'max:255'],
            'password' => ['required', 'max:255', Password::min(8)],
            'password_confirmation' => ['required', 'confirmed'],
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'oldpassword.required' => 'Need to write your current password',
            'password.required' => 'Enter new password',
            'password_confirmation.required' => 'New password does not match',
        ];
    }
}
