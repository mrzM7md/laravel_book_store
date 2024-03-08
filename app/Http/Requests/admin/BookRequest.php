<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'best_seller' => 'nullable',
            'cover_image' => ['image', 'mimes:jpeg,png,jpg', 'max:1024'], 
            'categories' => 'nullable',
            'authors' => 'nullable',
            'images.*' => ['image', 'mimes:jpeg,png,jpg', 'max:1024'],
            'description' => 'nullable',
            'publish_year' => 'numeric|nullable',
            'number_of_pages' => 'numeric|nullable',
            'number_of_copies' => 'numeric|nullable',
            'price' => 'numeric|nullable',
            'currency' => 'numeric|nullable',
        ];
    }
}
