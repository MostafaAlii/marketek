<?php
namespace App\Http\Controllers\Api\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthRegistrationRequest;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
class AuthApiController extends BaseController  {
    public function register(AuthRegistrationRequest $request) {
        /*if($validator->fails()){
            return $this->handleError($validator->errors());       
        }*/
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
}
