<?php
namespace App\Http\Requests\Dashboard;
use Illuminate\Foundation\Http\FormRequest;
class SuppliersRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            
        ];
    }
}
