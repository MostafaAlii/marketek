<?php
namespace App\Http\Requests\Api;
use Illuminate\Foundation\Http\FormRequest;
class AuthRegistrationRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    protected function onRegisterFirstPage() {
        return [
            'phone' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ];
    }

    protected function onRegisterSecondPage() {
        return [
            
        ];
    }

    public function rules() {
        return request()->isMethod('post') ? $this->onRegisterSecondPage() : $this->onRegisterFirstPage();
    }

    public function messages() {
        return [
            'phone.required'  =>  trans('dashboard/auth.phone_required'),
        ];
    }
}
