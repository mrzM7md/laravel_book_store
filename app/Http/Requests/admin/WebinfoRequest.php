<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class WebinfoRequest extends FormRequest
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
            'description' => 'required|max:1024',
            'about' => 'required|max:1124',
            'location' => 'required',
            'web_cover_image' => ['image', 'mimes:jpeg,png,jpg', 'max:1124'],
            'logo' => ['image', 'mimes:jpeg,png,jpeg', 'max:1124'],
            'phone_number' => 'numeric|nullable',
            'whatsapp_number' => 'numeric|nullable',
            'whatsapp_first_group_url' => 'nullable|url',
            'whatsapp_second_group_url' => 'nullable|url',
            'whatsapp_third_group_url' => 'nullable|url',
            'whatsapp_forth_group_url' => 'nullable|url',
            'telegram_group_url' => 'nullable|url',
            'facebook_url' => 'nullable|url',
            'insta_url' => 'nullable|url',
        ];
    }
}
