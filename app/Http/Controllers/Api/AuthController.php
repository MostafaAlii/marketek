<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Traits\Dashboard\Upload;
use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;
class AuthController extends BaseController {
    use Upload;
    public function store(Request $request) {
        $this->validate($request,[
            'email'     =>      'required|email',
            'password'  =>      'required',
        ]);
        if (!auth()->attempt($request->only('email', 'password'))) {
            throw new AuthenticationException();
        }
        return [
            'token' => auth()->user()->createToken('web')->plainTextToken
        ];
    }

    public function getUserInfo(Request $request) {
        return $request->user();
    }

    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);
   
        if($validator->fails()){
            return $this->handleError($validator->errors());       
        }
        $user = new User();
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = 0;
        $user->save();
        $success['token'] =  $user->createToken('supplierNewAccountRegisteration')->plainTextToken;
        $success['id'] =  $user->id;
        return $this->handleResponse($success, 'Supplier successfully registered First Widget!');
    }

    /*public function second_step_register() {
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);
   
        if($validator->fails()){
            return $this->handleError($validator->errors());       
        }
    }*/
}