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
            'company_name'  =>  'required',
            'first_name'    =>  'required',
            'last_name'     =>  'required',
            'category_id'   =>  'required',
            'description'    =>  'nullable',
            'discount'      =>   'nullable',
            'latitude'       =>  'nullable',
            'longitude'     =>  'nullable',
        ]);
        if($validation->fails()){
            return $this->handleError($validation->errors());       
        }
        $group_id = DB::table('categories')->select('group_id')->where('id', '=', $request->category_id)->value('group_id');
        $request->merge(['group_id' => $group_id]);
        $dataRequest = $request->except(['image']);
        $supplier = User::findOrFail($id);
        if($request->image) {
            if($supplier->image != 'default_avatar.png') {
                Storage::disk('public_uploads')->delete('/suppliersImage/' . $supplier->image);
            }
            Image::make($request->image)->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/suppliersImage/' . $request->image->hashName()));
            $dataRequest['image'] = $request->image->hashName();
        }
        $supplier->update($dataRequest);
        $success['id'] =  $supplier->id;
        $success['company_name'] =  $supplier->company_name;
        $success['first_name'] =  $supplier->first_name;
        $success['last_name'] =  $supplier->last_name;
        $success['group_id'] =  $supplier->group_id;
        $success['category_id'] =  $supplier->category_id;
        $success['description'] =  $supplier->description;
        $success['discount'] =  $supplier->discount;
        $success['latitude'] =  $supplier->latitude;
        $success['longitude'] =  $supplier->longitude;
        return $this->handleResponse($success, 'Supplier Successfully Updating Profile !');
    }
}