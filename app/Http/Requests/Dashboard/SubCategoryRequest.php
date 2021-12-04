<?php
namespace App\Http\Requests\Dashboard;
use Illuminate\Foundation\Http\FormRequest;
class SubCategoryRequest extends FormRequest
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
            'parent_id' => 'required|exists:categories,id',
            'name.required'  =>  trans('dashboard/sections.category_name_required'),
        ];
    }
}
