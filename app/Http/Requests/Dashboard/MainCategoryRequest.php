<?php
namespace App\Http\Requests\Dashboard;
use Illuminate\Foundation\Http\FormRequest;
class MainCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name'   =>  'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'  =>  trans('dashboard/sections.category_name_required'),
        ];
    }
}
