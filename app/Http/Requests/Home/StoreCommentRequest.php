<?php

namespace App\Http\Requests\Home;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
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
            'blog_id' => ['required', 'integer'],
            'comment' => ['required', 'string'],
            'user_id' => ['nullable', 'integer'],
            'parent_id' => ['nullable', 'integer'],
        ];
    }
}
