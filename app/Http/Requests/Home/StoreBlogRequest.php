<?php

namespace App\Http\Requests\Home;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
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
            'category_id' => ['required'],
            'title' => ['required', 'string', 'max:150'],
            'short_description' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'tags' => ['required', 'string', 'max:25'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,svg'],
            'image_details' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg']
        ];
    }
}
