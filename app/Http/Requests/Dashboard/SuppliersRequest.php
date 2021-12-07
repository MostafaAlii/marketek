<?php
namespace App\Http\Requests\Dashboard;
use Illuminate\Foundation\Http\FormRequest;
class SuppliersRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:suppliers,email,',
            'password'  => 'required|confirmed|min:6',
            'password_confirmation' =>  'required',
            'phone'     =>  'required|numeric',
        ];
    }

    public function messages()
    {
        return  [
            'first_name.required'             =>  trans('dashboard/supplier.first_name_required'),
            'first_name.string'             =>  trans('dashboard/supplier.first_name_string'),
            'last_name.required'             =>  trans('dashboard/supplier.last_name_required'),
            'last_name.string'             =>  trans('dashboard/supplier.last_name_string'),

            'email.required'        =>  trans('dashboard/supplier.email_required'),
            'email.email'           =>  trans('dashboard/supplier.email_true'),
            'email.unique'              =>  trans('dashboard/supplier.email_unique'),

            'password.required'         =>  trans('dashboard/supplier.password_required'),
            'password.confirmed'         =>  trans('dashboard/supplier.password_confirmed'),
            'password_confirmation.required'     =>  trans('dashboard/supplier.password_confirmation_required'),

            'phone.required'        =>  trans('dashboard/supplier.phone_required'),
            'phone.max'             =>  trans('dashboard/supplier.phone_max'),
            'phone.min'             =>  trans('dashboard/supplier.phone_min'),
            'phone.numeric'             =>  trans('dashboard/supplier.pohne_numeric'),
        ];
    }
}
