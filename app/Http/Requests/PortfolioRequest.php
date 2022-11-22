<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioRequest extends FormRequest
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
            'title' => 'required|min:3',
            'anons' => 'required|min:10',
            'description' => 'required|min:10',
            'main_photo' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'price' => 'nullable|max:20'
        ];
    }
}
