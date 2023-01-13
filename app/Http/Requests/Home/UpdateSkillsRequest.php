<?php

namespace App\Http\Requests\Home;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSkillsRequest extends FormRequest
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
            'name' => ['nullable', 'string'],
            'short_description' => ['nullable', 'string', 'max:500'],
            'pros_list' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg', 'dimensions:max_width=1500,max_height=1500'],
            'icon' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg', 'dimensions:max_width=1500,max_height=1500'],
        ];
    }
}
