<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreSkillsRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'short_description' => ['required', 'string', 'max:500'],
            'pros_list' => ['required', 'string'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,svg', 'dimensions:max_width=1500,max_height=1500'],
            'icon' => ['required', 'image', 'mimes:jpg,jpeg,png,svg', 'dimensions:max_width=1500,max_height=1500'],
        ];
    }
}
