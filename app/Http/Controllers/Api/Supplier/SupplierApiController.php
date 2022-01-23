<?php
namespace App\Http\Controllers\Api\Supplier;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
class SupplierApiController extends BaseController {
    public function getSupplierById($id) {
        $supplier = User::find($id);
        return response()->json(['supplier'=>$supplier], 200);
    }

    public function updateSupplierInfo(Request $request, $id) {
        $validation = Validator::make($request->all(), [
            'company_name'  =>  'nullable',
            'email'         =>  'sometimes|nullable',
            'phone'         =>  'nullable',
            'first_name'    =>  'nullable',
            'last_name'     =>  'nullable',
            'country_id'    =>  'nullable',
            'provience_id'  =>  'nullable',
            'city_id'       =>  'nullable',
            'address_primary'   =>  'nullable',
            'code'              =>  'nullable',
            'area_id'       =>  'nullable',
            'category_id'   =>  'sometimes|nullable',
            'subCategory_id'    =>  'nullable',
            'currency_id'       =>  'nullable',
        ]);
        if($validation->fails()){
            return $this->handleError($validation->errors());       
        }
        $group_id = DB::table('categories')->select('group_id')->where('id', '=', $request->category_id)->value('group_id');
        $request->merge(['group_id' => $group_id]);
        $dataRequest = $request->except(['image', 'code']);
        $user = User::findOrFail($id);
        if($request->image) {
            if($user->image != 'default_avatar.png') {
                Storage::disk('public_uploads')->delete('/suppliersImage/' . $user->image);
            }
            Image::make($request->image)->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/suppliersImage/' . $request->image->hashName()));
            $dataRequest['image'] = $request->image->hashName();
        }
        $user->update($dataRequest);
        $success['id'] =  $user->id;
        $success['company_name'] =  $user->company_name;
        $success['email'] =  $user->email;
        $success['phone'] =  $user->phone;
        $success['first_name'] =  $user->first_name;
        $success['last_name'] =  $user->last_name;
        $success['group_id'] =  $user->group_id;
        $success['category_id'] =  $user->category_id;
        $success['description'] =  $user->description;
        $success['discount'] =  $user->discount;
        $success['latitude'] =  $user->latitude;
        $success['longitude'] =  $user->longitude;
        return $this->handleResponse($success, 'Supplier Successfully Updating Profile !');
    }
}