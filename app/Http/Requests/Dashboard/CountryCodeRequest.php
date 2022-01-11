<?php
namespace App\Http\Requests\Dashboard;
use Illuminate\Foundation\Http\FormRequest;
class CountryCodeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules() {
        return [
            'country_code' => 'required|numeric|unique:country_codes',
            'image' => 'required|image|mimes:jpg,png,jpeg,svg|max:2048',
        ];
    }

    public function messages() {
        return [
            // Code Validation
            'country_code.required'  =>  trans('dashboard/countryCode.country_code_required'),
            'country_code.numeric'  =>  trans('dashboard/countryCode.country_code_numeric'),
            'country_code.unique'  =>  trans('dashboard/countryCode.country_code_unique'),
            // Image Validation
            'image.required'  =>  trans('dashboard/countryCode.country_image_required'),
            'image.image'  =>  trans('dashboard/countryCode.country_image_image'),
            'image.mimes'  =>  trans('dashboard/countryCode.country_image_mimes'),
            'image.max'  =>  trans('dashboard/countryCode.country_image_max'),
        ];
    }
}
