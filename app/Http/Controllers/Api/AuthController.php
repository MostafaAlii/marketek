<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
class AuthController extends BaseController {
    public function getUserInfo(Request $request) {
        return $request->user();
    }

    public function signin(Request $request) {
        $this->validate($request,[
            'email'     =>      'required|email',
            'password'  =>      'required',
        ]);
        if (!auth()->attempt($request->only('email', 'password'))) {
            throw new AuthenticationException();
        }
        return [
            'token' => auth()->user()->createToken('login')->plainTextToken,
            'id'    => auth()->user()->id,
            'group_id'    => auth()->user()->group_id,
        ]; 
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

    public function second_step_register(Request $request, $id) {
        $validation = Validator::make($request->all(), [
            'company_name'  =>  'required',
            'first_name'    =>  'required',
            'last_name'     =>  'required',
            'country_id'    =>  'required',
            'provience_id'  =>  'required',
            'city_id'       =>  'required',
            'address_primary'   =>  'required',
            'code'              =>  'nullable',
            'area_id'       =>  'required',
            'category_id'   =>  'required',
            'subCategory_id'    =>  'nullable',
            'currency_id'       =>  'required',
        ]);
        if($validation->fails()){
            return $this->handleError($validation->errors());       
        }
        $group_id = DB::table('categories')->select('group_id')->where('id', '=', $request->category_id)->value('group_id');
        $request->merge(['group_id' => $group_id]);
        $userRequest = $request->except(['code']);
        
        $user = User::findOrFail($id);
        if($request->code) {
            if($user->code != 'default_barcode.png') {
                Storage::disk('public_uploads')->delete('/supplierBarCode/' . $user->code);
            }
            Image::make($request->code)->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/supplierBarCode/' . $request->code->hashName()));
            $userRequest['code'] = $request->code->hashName();
        }
        $user->update($userRequest);
        $success['id'] =  $user->id;
        $success['company_name'] =  $user->company_name;
        $success['first_name'] =  $user->first_name;
        $success['last_name'] =  $user->last_name;
        $success['group_id'] =  $user->group_id;
        $success['category_id'] =  $user->category_id;
        $success['subCategory_id'] =  $user->subCategory_id;
        $success['country_id'] =  $user->country_id;
        $success['provience_id'] =  $user->provience_id;
        $success['city_id'] =  $user->city_id;
        $success['area_id'] =  $user->area_id;
        $success['address_primary'] =  $user->address_primary;
        return $this->handleResponse($success, 'Supplier successfully registered Second Widget!');
    }

    public function signOut() {
        auth()->user()->tokens()->delete();
        return [
            'message' => 'Tokens Was Revoked & Supplier Was Signout Successfully'
        ];
    }
}