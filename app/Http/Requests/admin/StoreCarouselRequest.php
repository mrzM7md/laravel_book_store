<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarouselRequest extends FormRequest
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
            'carousels_photo_path.*' => ['image', 'mimes:jpeg,png,jpg', 'max:1024', 'required'],
        ];
    }

    public function messages()
    {
        return [
            'carousels_photo_path.*.required' => 'يرجى تحديد صورة',
            'carousels_photo_path.*.max' =>  'حجم الصورة الواحدة يجب ألا يتعدى 1 ميفا بايت',
            'carousels_photo_path.*.mimes' => 'الملف يجب أن يكون من صيغ: "jpeg,png,jpg"',
            'carousels_photo_path.*.image' => 'يرجى تحديد صورة',
        ];
    }
    


}
