<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
            'category_id' => ['nullable'],
            'title' => ['nullable', 'string', 'max:150'],
            'short_description' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'tags' => ['nullable', 'string', 'max:25'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg'],
            'image_details' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg']
        ];
    }
}
