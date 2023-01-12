<?php

namespace App\Http\Requests\Home;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:60'],
            'email' => ['required', 'email'],
            'subject' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric', 'digits:11'],
            'message' => ['required', 'string'],
        ];
    }
}
