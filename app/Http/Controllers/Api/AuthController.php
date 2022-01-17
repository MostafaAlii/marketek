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

    public function second_step_register(Request $request, $id) {
        $dataRequest = Validator::make($request->all(), [
            'company_name'  =>  'required',
            'first_name'    =>  'required',
            'last_name'     =>  'required',
            'country_id'    =>  'required',
            'provience_id'  =>  'required',
            'city_id'       =>  'required',
            'address_primary'   =>  'required',
            'code'              =>  'nullable',
            'group_id'              =>  'nullable',
            'area_id'       =>  'required',
            'category_id'   =>  'required',
            'subCategory_id'    =>  'nullable',
            'currency_id'       =>  'required',
        ]);
   
        if($dataRequest->fails()){
            return $this->handleError($dataRequest->errors());       
        }

        $user = User::findOrFail($id);
        $dataRequest = $request->except(['code']);
        if($request->code) {
            if($user->code != 'default_barcode.png') {
                Storage::disk('public_uploads')->delete('/supplierBarCode/' . $user->code);
            }
            Image::make($request->code)->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/supplierBarCode/' . $request->code->hashName()));
            $dataRequest['code'] = $request->code->hashName();
        }
        $dataRequest['group_id'] = DB::table('categories')->select('group_id')->where('id', '=', $request->category_id)->get(); 
        //DB::table('categories')->where('id', '=', $request->category_id)->pluck('group_id');
        $user->update($dataRequest);
        $success['id'] =  $user->id;
        $success['category_id'] =  $user->category_id;
        $success['group_id'] =  $user->group_id;
        return $this->handleResponse($success, 'Supplier successfully registered Second Widget!');
    }
}