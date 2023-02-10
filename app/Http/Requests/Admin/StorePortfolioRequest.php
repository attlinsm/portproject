<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StorePortfolioRequest extends FormRequest
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
            'portfolio_name' => ['required', 'string', 'max:100'],
            'portfolio_title' => ['required', 'string', 'max:255'],
            'portfolio_description' => ['required', 'string', 'max:2500'],
            'portfolio_image' => ['required', 'image', 'mimes:jpg,jpeg,png,svg'],
        ];
    }
}
