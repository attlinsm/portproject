<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMultiImageRequest extends FormRequest
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
            'multi_image' => [
                'required',
                'image',
                'mimes:jpeg,png,jpg,gif,svg',
                'dimensions:max_width=250,max_height=250'
            ]
        ];
    }
}
