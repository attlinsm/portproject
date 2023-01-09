<?php

namespace App\Http\Requests\Home;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAboutRequest extends FormRequest
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
            'title' => ['string', 'required', 'max:150'],
            'short_title' => ['string', 'required', 'max:192'],
            'short_description' => ['string', 'required', 'max:500'],
            'long_description' => ['string', 'required', 'max:2500'],
            'about_image' => ['nullable', 'image'],
        ];
    }
}
